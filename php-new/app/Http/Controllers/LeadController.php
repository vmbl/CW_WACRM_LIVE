<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\Users;
use App\Models\LeadDocument;
use App\Models\LeadReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class LeadController extends Controller
{
    private $s3Client;
    private $bucketName;
    private $region;
    
    public function __construct()
    {
        // Get AWS configuration
        $this->region = config('aws.region', env('AWS_DEFAULT_REGION', 'us-east-1'));
        $this->bucketName = config('aws.bucket_name', env('AWS_BUCKET', 'rmjjewellery'));
        
        // Initialize S3 Client with proper error handling
        try {
            $this->s3Client = new S3Client([
                'version' => 'latest',
                'region' => $this->region,
                'credentials' => [
                    'key' => config('aws.access_key_id', env('AWS_ACCESS_KEY_ID')),
                    'secret' => config('aws.secret_access_key', env('AWS_SECRET_ACCESS_KEY')),
                ],
                'http' => [
                    'verify' => env('APP_ENV') === 'production' // Only disable SSL verification in non-production
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to initialize S3 Client: ' . $e->getMessage());
            throw new \Exception('S3 configuration error');
        }
    }
    
    /**
     * Display lead details
     */
    public function show($id)
    {
        try {
            $lead = Lead::find($id);
            
            if (!$lead) {
                return view('leads-details', ['lead' => null]);
            }
            
            $leadData = [
                'id' => $lead->_id,
                'lead_name' => $lead->lead_name,
                'company_name' => $lead->company_name,
                'phone' => $lead->mobile_no ?? $lead->phone,
                'source' => $lead->lead_source,
                'value' => $lead->value ?? 0,
                'created_date' => $lead->created_date ? Carbon::parse($lead->created_date)->format('d M Y, h:i A') : 'N/A',
                'owner' => $lead->lead_owner ?? 'Unassigned',
                'priority' => $lead->priority ?? 'Medium',
                'address' => $lead->full_address ?? 'N/A',
                'status' => $this->getStatusFromStage($lead->stage ?? 'new'),
                'stage' => $lead->stage ?? 'new',
                'interactions' => $this->getInteractionCount($lead->_id),
                'days_active' => $lead->created_date ? Carbon::parse($lead->created_date)->diffInDays(Carbon::now()) : 0
            ];
            
            $activities = $this->getLeadActivities($lead->_id);
            $documents = $this->getLeadDocuments($lead->_id);
            $upcomingFollowups = $this->getUpcomingFollowups($lead->_id);
            $users = $this->getUsers();
            
            return view('leads-details', compact('leadData', 'activities', 'documents', 'upcomingFollowups', 'users'))
                ->with('lead', $leadData);
                
        } catch (\Exception $e) {
            Log::error('Error fetching lead details: ' . $e->getMessage());
            return view('leads-details')->with('error', 'Unable to fetch lead details');
        }
    }
    
    /**
     * Upload document to S3 - Properly Fixed Version
     */
    public function uploadDocument(Request $request, $id)
    {
//         return response()->json([
//     'original_name' => $request->file('document')->getClientOriginalName(),
//     'extension' => $request->file('document')->getClientOriginalExtension(),
//     'mime_type' => $request->file('document')->getMimeType(),
//     'client_mime_type' => $request->file('document')->getClientMimeType(),
// ]);
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                // 'document' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,gif,webp|max:10240', // 10MB max
                'description' => 'nullable|string|max:500'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'error' => $validator->errors()->first()
                ], 400);
            }
            
            // Check if lead exists
            $lead = Lead::find($id);
            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'error' => 'Lead not found'
                ], 404);
            }
            
            $file = $request->file('document');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            
            // Generate unique S3 key
            $timestamp = now()->timestamp;
            $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);
            $sanitizedName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
            $s3Key = "leads/{$id}/documents/{$timestamp}_{$randomString}_{$sanitizedName}.{$extension}";
            
            // Upload to S3
            try {
                $result = $this->s3Client->putObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $s3Key,
                    'SourceFile' => $file->getPathname(), // Use SourceFile instead of Body for better handling
                    // 'ACL' => 'public-read',
                    'ContentType' => $mimeType,
                    'ContentDisposition' => 'inline; filename="' . str_replace('"', '\\"', $originalName) . '"',
                    'CacheControl' => 'max-age=31536000',
                    'Metadata' => [
                        'original-name' => $originalName,
                        'uploaded-by' => (string)(Auth::id() ?? 'system'),
                        'lead-id' => (string)$id,
                        'upload-timestamp' => (string)$timestamp
                    ]
                ]);
                
                // Generate the public URL
                $s3Url = $this->generateS3Url($s3Key);
                
                // Verify the upload by checking if object exists
                $this->s3Client->headObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $s3Key
                ]);
                
                Log::info('S3 Upload Successful', [
                    'bucket' => $this->bucketName,
                    'key' => $s3Key,
                    'url' => $s3Url,
                    'original_name' => $originalName
                ]);
                
            } catch (AwsException $e) {
                Log::error('S3 Upload Failed', [
                    'error' => $e->getMessage(),
                    'code' => $e->getAwsErrorCode(),
                    'type' => $e->getAwsErrorType(),
                    'request_id' => $e->getAwsRequestId(),
                    'bucket' => $this->bucketName,
                    'key' => $s3Key
                ]);
                
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to upload to S3: ' . $e->getAwsErrorMessage()
                ], 500);
            }
            
            // Save document record to MongoDB
            try {
                $document = new LeadDocument();
                $document->lead_id = $id;
                $document->original_name = $originalName;
                $document->file_name = basename($s3Key);
                $document->file_size = $fileSize;
                $document->mime_type = $mimeType;
                $document->extension = $extension;
                $document->description = $request->description ?? '';
                $document->s3_url = $s3Url;
                $document->s3_key = $s3Key;
                $document->s3_bucket = $this->bucketName;
                $document->uploaded_by = Auth::id() ?? 'system';
                $document->uploaded_date = Carbon::now();
                $document->is_active = true;
                $document->document_type = $this->getDocumentType($extension);
                $document->save();
                
                Log::info('Document saved to MongoDB', [
                    'document_id' => $document->_id,
                    'lead_id' => $id,
                    's3_url' => $s3Url
                ]);
                
            } catch (\Exception $e) {
                // If database save fails, try to clean up S3 object
                try {
                    $this->s3Client->deleteObject([
                        'Bucket' => $this->bucketName,
                        'Key' => $s3Key
                    ]);
                } catch (\Exception $cleanupError) {
                    Log::error('Failed to cleanup S3 object after database error', [
                        'cleanup_error' => $cleanupError->getMessage(),
                        's3_key' => $s3Key
                    ]);
                }
                
                Log::error('Failed to save document to database', [
                    'error' => $e->getMessage(),
                    's3_key' => $s3Key
                ]);
                
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to save document record: ' . $e->getMessage()
                ], 500);
            }
            
            // Log activity
            $this->logActivity($id, 'Document Uploaded', "Document '{$originalName}' was uploaded successfully");
            
            return response()->json([
                'success' => true,
                'message' => 'Document uploaded successfully',
                'document' => [
                    'id' => $document->_id,
                    'name' => $originalName,
                    'url' => $s3Url,
                    'size' => $this->formatBytes($fileSize),
                    'uploaded_date' => $document->uploaded_date->format('d M Y, h:i A'),
                    'type' => $extension,
                    'description' => $document->description,
                    'document_type' => $document->document_type
                ]
            ]);
            
        } catch (\Exception $e) {
            Log::error('Document upload error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'lead_id' => $id
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Upload multiple images to S3
     */
    public function uploadImages(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'images' => 'required|array|max:4',
                'images.*' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB max per image
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'error' => $validator->errors()->first()
                ], 400);
            }
            
            $lead = Lead::find($id);
            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'error' => 'Lead not found'
                ], 404);
            }
            
            $uploadedImages = [];
            $errors = [];
            
            foreach ($request->file('images') as $index => $file) {
                try {
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileSize = $file->getSize();
                    $mimeType = $file->getMimeType();
                    
                    // Generate unique S3 key for image
                    $timestamp = now()->timestamp;
                    $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
                    $sanitizedName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
                    $s3Key = "leads/{$id}/images/{$timestamp}_{$index}_{$randomString}_{$sanitizedName}.{$extension}";
                    
                    // Upload to S3
                    $result = $this->s3Client->putObject([
                        'Bucket' => $this->bucketName,
                        'Key' => $s3Key,
                        'SourceFile' => $file->getPathname(),
                        // 'ACL' => 'public-read',
                        'ContentType' => $mimeType,
                        'CacheControl' => 'max-age=31536000',
                        'Metadata' => [
                            'original-name' => $originalName,
                            'uploaded-by' => (string)(Auth::id() ?? 'system'),
                            'lead-id' => (string)$id,
                            'type' => 'image'
                        ]
                    ]);
                    
                    $s3Url = $this->generateS3Url($s3Key);
                    
                    // Save to database
                    $document = new LeadDocument();
                    $document->lead_id = $id;
                    $document->original_name = $originalName;
                    $document->file_name = basename($s3Key);
                    $document->file_size = $fileSize;
                    $document->mime_type = $mimeType;
                    $document->extension = $extension;
                    $document->s3_url = $s3Url;
                    $document->s3_key = $s3Key;
                    $document->s3_bucket = $this->bucketName;
                    $document->uploaded_by = Auth::id() ?? 'system';
                    $document->uploaded_date = Carbon::now();
                    $document->is_active = true;
                    $document->document_type = 'image';
                    $document->save();
                    
                    $uploadedImages[] = [
                        'id' => $document->_id,
                        'name' => $originalName,
                        'url' => $s3Url,
                        'size' => $this->formatBytes($fileSize),
                        'uploaded_date' => $document->uploaded_date->format('d M Y, h:i A'),
                        'type' => $extension
                    ];
                    
                } catch (\Exception $e) {
                    Log::error("Error uploading image {$index}", [
                        'error' => $e->getMessage(),
                        'original_name' => $originalName ?? 'unknown'
                    ]);
                    $errors[] = "Failed to upload image: " . ($originalName ?? 'unknown');
                }
            }
            
            // Log activity
            if (!empty($uploadedImages)) {
                $count = count($uploadedImages);
                $this->logActivity($id, 'Images Uploaded', "{$count} image(s) uploaded successfully");
            }
            
            return response()->json([
                'success' => true,
                'message' => count($uploadedImages) . ' images uploaded successfully',
                'images' => $uploadedImages,
                'errors' => $errors
            ]);
            
        } catch (\Exception $e) {
            Log::error('Images upload error', [
                'error' => $e->getMessage(),
                'lead_id' => $id
            ]);
            return response()->json([
                'success' => false,
                'error' => 'Failed to upload images'
            ], 500);
        }
    }
    
    /**
     * Delete document from S3 and database
     */
    public function deleteDocument(Request $request, $id, $documentId)
    {
        try {
            $document = LeadDocument::where('lead_id', $id)
                ->where('_id', $documentId)
                ->where('is_active', true)
                ->first();
                
            if (!$document) {
                return response()->json([
                    'success' => false,
                    'error' => 'Document not found'
                ], 404);
            }
            
            // Delete from S3
            try {
                $this->s3Client->deleteObject([
                    'Bucket' => $this->bucketName,
                    'Key' => $document->s3_key
                ]);
                Log::info('Document deleted from S3', ['s3_key' => $document->s3_key]);
            } catch (AwsException $e) {
                Log::warning('Failed to delete from S3', [
                    'error' => $e->getMessage(),
                    's3_key' => $document->s3_key
                ]);
                // Continue with database deletion even if S3 deletion fails
            }
            
            // Mark as inactive in database (soft delete)
            $document->is_active = false;
            $document->deleted_at = Carbon::now();
            $document->deleted_by = Auth::id() ?? 'system';
            $document->save();
            
            // Log activity
            $this->logActivity($id, 'Document Deleted', "Document '{$document->original_name}' was deleted");
            
            return response()->json([
                'success' => true,
                'message' => 'Document deleted successfully'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error deleting document', [
                'error' => $e->getMessage(),
                'document_id' => $documentId,
                'lead_id' => $id
            ]);
            return response()->json([
                'success' => false,
                'error' => 'Failed to delete document'
            ], 500);
        }
    }
    
    
   public function updateStatus(Request $request, $id)
{
    try {
        $validator = Validator::make($request->all(), [
            'status' => 'required|integer|between:0,5'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid status'], 422);
        }

        $lead = Lead::find($id);

        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }

        $stageMapping = [
            0 => 'new',
            1 => 'contacted',
            2 => 'qualified',
            3 => 'proposal',
            4 => 'closed_won',
            5 => 'closed_lost'
        ];

        $oldStage = $lead->stage;
        $lead->stage = $stageMapping[$request->status];
        $lead->updated_by = Auth::id() ?? 'system';
        $lead->updated_at = Carbon::now();
        $lead->save();

        // Optional: add logActivity if you have it
        if (method_exists($this, 'logActivity')) {
            $this->logActivity(
                $id,
                'Status Updated',
                "Lead status changed from " .
                $this->getStatusText($this->getStatusFromStage($oldStage)) .
                " to " . $this->getStatusText($request->status)
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Lead status updated successfully'
        ]);
    } catch (\Exception $e) {
        Log::error('Status update error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to update status'], 500);
    }
}

    /**
     * Set reminder/follow-up
     */
    public function setReminder(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255', 
                'description' => 'nullable|string|max:1000',
                'due_date' => 'required|date|after:now',
                'priority' => 'required|in:Low,Medium,High'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }
            
            $lead = Lead::find($id);
            if (!$lead) {
                return response()->json(['error' => 'Lead not found'], 404);
            }
            
            $reminder = new LeadReminder();
            $reminder->lead_id = $id;
            $reminder->title = $request->title;
            $reminder->description = $request->description ?? '';
            $reminder->due_date = Carbon::parse($request->due_date);
            $reminder->priority = $request->priority;
            $reminder->status = 'pending';
            $reminder->created_by = Auth::id() ?? 'system';
            $reminder->created_at = Carbon::now();
            $reminder->save();
            
            $this->logActivity($id, 'Reminder Set', "Reminder '{$request->title}' set for " . Carbon::parse($request->due_date)->format('d M Y, h:i A'));
            
            return response()->json([
                'success' => true, 
                'message' => 'Reminder set successfully',
                'reminder' => [
                    'id' => $reminder->_id,
                    'title' => $reminder->title,
                    'description' => $reminder->description,
                    'due_date' => $reminder->due_date->format('d M Y, h:i A'),
                    'priority' => $reminder->priority
                ]
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error setting reminder: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to set reminder'], 500);
        }
    }
    
    /**
     * Change lead owner
     */
   public function changeOwner(Request $request, $id)
{
    try {
        // Validate input
        $validator = Validator::make($request->all(), [
            'owner_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Retrieve lead
        $lead = Lead::find($id);
        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }

        // Retrieve new owner
        $newOwner = \App\Models\Users::find($request->owner_id); // Ensure model name is singular: User
        if (!$newOwner) {
            return response()->json(['error' => 'New owner not found'], 404);
        }

        // Change owner
        $oldOwner = $lead->lead_owner ?? 'Unassigned';
        $lead->lead_owner = $newOwner->name;
        $lead->lead_owner_id = $newOwner->id;
        $lead->updated_by = Auth::id() ?? 'system';
        $lead->updated_at = now(); // More concise
        $lead->save();

        // Log activity
        $this->logActivity(
            $lead->id,
            'Owner Changed',
            "Lead owner changed from '{$oldOwner}' to '{$newOwner->name}'"
        );

        return response()->json([
            'success' => true,
            'message' => 'Lead owner changed successfully',
            'new_owner' => $newOwner->name,
        ]);

    } catch (\Exception $e) {
        Log::error('Error changing lead owner: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to change owner'], 500);
    }
}

    // Helper Methods
    
    /**
     * Generate S3 URL
     */
    private function generateS3Url($s3Key)
    {
        return sprintf(
            'https://%s.s3.%s.amazonaws.com/%s',
            $this->bucketName,
            $this->region,
            $s3Key
        );
    }
    
    /**
     * Get document type based on extension
     */
    private function getDocumentType($extension)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $documentExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
        
        $extension = strtolower($extension);
        
        if (in_array($extension, $imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $documentExtensions)) {
            return 'document';
        }
        
        return 'other';
    }
    
    /**
     * Get lead activities
     */
    private function getLeadActivities($leadId)
    {
        try {
            $activities = LeadActivity::where('lead_id', $leadId)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
                ->map(function ($activity) {
                    return [
                        'title' => $activity->title,
                        'description' => $activity->description,
                        'type' => $activity->type ?? 'primary',
                        'date' => Carbon::parse($activity->created_at)->format('d M Y, h:i A'),
                        'user' => $activity->user ?? 'System'
                    ];
                })
                ->toArray();
                
            return $activities;
        } catch (\Exception $e) {
            Log::error('Error fetching activities: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get lead documents
     */
    private function getLeadDocuments($leadId)
    {
        try {
            $documents = LeadDocument::where('lead_id', $leadId)
                ->where('is_active', true)
                ->orderBy('uploaded_date', 'desc')
                ->get()
                ->map(function ($doc) {
                    return [
                        'id' => $doc->_id,
                        'name' => $doc->original_name,
                        'url' => $doc->s3_url,
                        'uploaded_date' => Carbon::parse($doc->uploaded_date)->format('d M Y'),
                        'size' => $this->formatBytes($doc->file_size ?? 0),
                        'type' => $doc->extension,
                        'document_type' => $doc->document_type ?? 'document',
                        'description' => $doc->description ?? ''
                    ];
                })
                ->toArray();
                
            return $documents;
        } catch (\Exception $e) {
            Log::error('Error fetching documents: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get upcoming follow-ups
     */
    private function getUpcomingFollowups($leadId)
    {
        try {
            $followups = LeadReminder::where('lead_id', $leadId)
                ->where('status', 'pending')
                ->where('due_date', '>=', Carbon::now())
                ->orderBy('due_date', 'asc')
                ->limit(5)
                ->get()
                ->map(function ($reminder) {
                    return [
                        'id' => $reminder->_id,
                        'title' => $reminder->title,
                        'description' => $reminder->description ?? '',
                        'due_date' => Carbon::parse($reminder->due_date)->format('d M Y, h:i A'),
                        'priority' => $reminder->priority
                    ];
                })
                ->toArray();
                
            return $followups;
        } catch (\Exception $e) {
            Log::error('Error fetching followups: ' . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Log activity
     */
    private function logActivity($leadId, $title, $description)
    {
        try {
            $activity = new LeadActivity();
            $activity->lead_id = $leadId;
            $activity->title = $title;
            $activity->description = $description;
            $activity->type = 'primary';
            $activity->user = Auth::user()->name ?? 'System';
            $activity->created_at = Carbon::now();
            $activity->save();
        } catch (\Exception $e) {
            Log::error('Error logging activity: ' . $e->getMessage());
        }
    }
    
    // Additional Helper Methods
    
    private function getSourceText($source)
    {
        $sources = [
            'website' => 'Website',
            'facebook' => 'Facebook',
            'google' => 'Google',
            'referral' => 'Referral',
            'direct' => 'Direct',
            'other' => 'Other'
        ];
        
        return $sources[$source] ?? ucfirst(str_replace('_', ' ', $source));
    }
    
    private function getStatusFromStage($stage)
    {
        $stageToStatus = [
            'new' => 0,
            'contacted' => 1,
            'qualified' => 2,
            'proposal' => 3,
            'closed_won' => 4,
            'closed_lost' => 5
        ];
        
        return $stageToStatus[$stage] ?? 0;
    }
    
    private function getStatusText($status)
    {
        $texts = ['New', 'Contacted', 'Qualified', 'Proposal', 'Won', 'Lost'];
        return $texts[$status] ?? 'New';
    }
    
    private function getInteractionCount($leadId)
    {
        try {
            return LeadActivity::where('lead_id', $leadId)->count();
        } catch (\Exception $e) {
            return 0;
        }
    }
    
    private function getUsers()
    {
        try {
            return \App\Models\Users::select('id', 'name')
                ->orderBy('name')
                ->get();
        } catch (\Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return [];
        }
    }
    
    private function formatBytes($size, $precision = 2)
    {
        if ($size <= 0) return '0 B';
        
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }
}