<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\WhatsAppTemplate;
use Illuminate\Http\Request;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    // Show campaign page
    public function index(Request $request)
    {
        if ($request->ajax()) {
           $campaign= Campaign::with('group')->get()->toArray();
           return response()->json([
    'success' => true,
    'data' => $campaign
]);
        }
        $groups=Group::all();
        return view('campaign',compact('groups'));
    }

    // Get dashboard statistics
    public function getStats()
    {
        try {
            $stats = [
                'total_campaigns' => Campaign::count(),
                'messages_sent' => Campaign::sum('messages_sent') ?? 0,
                'messages_delivered' => Campaign::sum('messages_delivered') ?? 0,
                'messages_read' => Campaign::sum('messages_read') ?? 0
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching campaign stats: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'data' => [
                    'total_campaigns' => 0,
                    'messages_sent' => 0,
                    'messages_delivered' => 0,
                    'messages_read' => 0
                ]
            ]);
        }
    }

    // Get all campaigns
    public function getCampaigns()
    {
        try {
            $campaigns = Campaign::with(['template', 'group'])
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($campaign) {
                    return [
                        'id' => $campaign->id,
                        'campaign_name' => $campaign->campaign_name,
                        'template_name' => $campaign->template ? $campaign->template->name : 'N/A',
                        'group_name' => $campaign->group ? $campaign->group->name : 'N/A',
                        'status' => $campaign->status,
                        'campaign_type' => $campaign->campaign_type,
                        'created_at' => $campaign->created_at->format('Y-m-d H:i:s'),
                        'recipients' => $campaign->recipients ?? 0
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $campaigns
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching campaigns: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error loading campaigns',
                'data' => []
            ], 500);
        }
    }

    // Create new campaign
    public function store(Request $request)
    {
        try {
            // Log the incoming request data for debugging
            Log::info('Campaign creation request:', $request->all());

            // Validation with better error handling
            $validated = $request->validate([
                'campaign_name' => 'required|string|max:255',
                'template_id' => 'string',
                'group_id' => 'required|string|exists:groups,id',
                'campaign_type' => 'required|string|in:marketing,promotion,reminder,follow-up',
                'execution_type' => 'required|string|in:immediate,scheduled',
                'scheduled_at' => 'nullable|date|after:now',
                'description' => 'nullable|string|max:1000'
            ]);

            // Additional validation for scheduled campaigns
            if ($validated['execution_type'] === 'scheduled') {
                if (empty($validated['scheduled_at'])) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Schedule date and time is required for scheduled campaigns',
                        'errors' => ['scheduled_at' => ['Schedule date and time is required']]
                    ], 422);
                }
            }


            try {
                // Get recipients count from group
                $group = Group::find($validated['group_id']);
                if (!$group) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Selected contact group not found'
                    ], 422);
                }

              

                // Prepare data for campaign creation
                $campaignData = [
                    'campaign_name' => $validated['campaign_name'],
                    'template_id' => $validated['template_id'],
                    'group_id' => $validated['group_id'],
                    'campaign_type' => $validated['campaign_type'],
                    'description' => $validated['description'] ?? null,
                    'recipients' => $group->contacts_count ?? 0,
                    'messages_sent' => 0,
                    'messages_delivered' => 0,
                    'messages_read' => 0
                ];

                // Set status and handle scheduled date
                if ($validated['execution_type'] === 'immediate') {
                    $campaignData['status'] = 'draft';
                    $campaignData['scheduled_at'] = null;
                } else {
                    $campaignData['status'] = 'scheduled';
                    $campaignData['scheduled_at'] = Carbon::parse($validated['scheduled_at']);
                }

                // Create campaign
                $campaign = Campaign::create($campaignData);

                // Commit transaction
                // DB::commit();

                Log::info('Campaign created successfully:', [
                    'id' => $campaign->id, 
                    'name' => $campaign->campaign_name,
                    'data' => $campaignData
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Campaign created successfully',
                    'data' => [
                        'id' => $campaign->id,
                        'campaign_name' => $campaign->campaign_name,
                        'status' => $campaign->status,
                        'recipients' => $campaign->recipients
                    ]
                ]);

            } catch (\Exception $e) {
                // DB::rollback();
                throw $e;
            }

        } catch (ValidationException $e) {
            Log::error('Validation error creating campaign:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating campaign: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create campaign: ' . $e->getMessage()
            ], 500);
        }
    }

    // Run campaign
    public function run($id)
    {
        try {
            $campaign = Campaign::findOrFail($id);
            // $today=\Carbon\Carbon::now();
            // $campaign=Campaign::where('scheduled_at',$today)->get();

            if (!in_array($campaign->status, ['draft', 'scheduled'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Campaign can only be run from draft or scheduled status'
                ], 400);
            }

            // Check if we have recipients
            if ($campaign->recipients <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Campaign has no recipients to send to'
                ], 400);
            }

            $campaign->update(['status' => 'running']);
            
            // Execute campaign logic here
            $this->executeCampaign($campaign);

            return response()->json([
                'success' => true,
                'message' => 'Campaign started successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Error running campaign: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to run campaign: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete campaign
    public function destroy($id)
    {
        try {
            $campaign = Campaign::findOrFail($id);
            
            // Prevent deletion of running campaigns
            if ($campaign->status === 'running') {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete a running campaign'
                ], 400);
            }
            
            $campaign->delete();

            return response()->json([
                'success' => true,
                'message' => 'Campaign deleted successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting campaign: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete campaign: ' . $e->getMessage()
            ], 500);
        }
    }

    // // Get WhatsApp templates
    // public function getTemplates()
    // {
    //     try {
    //         $templates = WhatsAppTemplate::where('status', 'active')
    //             ->select('id', 'name')
    //             ->orderBy('name')
    //             ->get();

    //         return response()->json([
    //             'success' => true,
    //             'data' => $templates
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching templates: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error loading templates',
    //             'data' => []
    //         ], 500);
    //     }
    // }

    // Get contact groups
    public function getGroups()
    {
        try {
            $groups = Group::select('id', 'name', 'contacts_count')
                ->orderBy('name')
                ->get();
                
            return response()->json([
                'success' => true,
                'data' => $groups
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching groups: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error loading groups',
                'data' => []
            ], 500);
        }
    }

    // Update campaign status
    public function updateStatus($id, Request $request)
    {
        try {
            $campaign = Campaign::findOrFail($id);
            
            $validated = $request->validate([
                'status' => 'required|string|in:draft,scheduled,running,completed,paused,cancelled'
            ]);

            $oldStatus = $campaign->status;
            $newStatus = $validated['status'];

            // Validate status transitions
            $allowedTransitions = [
                'draft' => ['running', 'scheduled', 'cancelled'],
                'scheduled' => ['running', 'cancelled'],
                'running' => ['paused', 'completed', 'cancelled'],
                'paused' => ['running', 'cancelled'],
                'completed' => [],
                'cancelled' => []
            ];

            if (!in_array($newStatus, $allowedTransitions[$oldStatus])) {
                return response()->json([
                    'success' => false,
                    'message' => "Cannot change status from {$oldStatus} to {$newStatus}"
                ], 400);
            }

            $campaign->update(['status' => $newStatus]);

            Log::info('Campaign status updated:', [
                'id' => $campaign->id,
                'old_status' => $oldStatus,
                'new_status' => $newStatus
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Campaign status updated successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating campaign status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update campaign status: ' . $e->getMessage()
            ], 500);
        }
    }

    // Get campaign details
    public function show($id)
    {
        try {
            $campaign = Campaign::with(['template', 'group'])->findOrFail($id);

            $campaignData = [
                'id' => $campaign->id,
                'campaign_name' => $campaign->campaign_name,
                'description' => $campaign->description,
                'campaign_type' => $campaign->campaign_type,
                'status' => $campaign->status,
                'template' => $campaign->template ? [
                    'id' => $campaign->template->id,
                    'name' => $campaign->template->name
                ] : null,
                'group' => $campaign->group ? [
                    'id' => $campaign->group->id,
                    'name' => $campaign->group->name,
                    'contacts_count' => $campaign->group->contacts_count
                ] : null,
                'recipients' => $campaign->recipients,
                'messages_sent' => $campaign->messages_sent,
                'messages_delivered' => $campaign->messages_delivered,
                'messages_read' => $campaign->messages_read,
                'scheduled_at' => $campaign->scheduled_at ? $campaign->scheduled_at->format('Y-m-d H:i:s') : null,
                'created_at' => $campaign->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $campaign->updated_at->format('Y-m-d H:i:s')
            ];

            return response()->json([
                'success' => true,
                'data' => $campaignData
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching campaign details: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found'
            ], 404);
        }
    }

    // Private method to execute campaign
    private function executeCampaign($campaign)
    {
        try {
            Log::info('Executing campaign:', ['id' => $campaign->id, 'name' => $campaign->campaign_name]);
            
            // Simulate campaign execution
            // In real implementation, this would integrate with WhatsApp API
            
            // Update campaign statistics (simulate)
            $recipients = $campaign->recipients ?? 0;
            $delivered = $recipients > 0 ? rand(floor($recipients * 0.8), $recipients) : 0;
            $read = $delivered > 0 ? rand(floor($delivered * 0.6), $delivered) : 0;
            
            // Update campaign with simulated results
            $campaign->update([
                'messages_sent' => $recipients,
                'messages_delivered' => $delivered,
                'messages_read' => $read,
                'status' => 'completed',
                'executed_at' => Carbon::now()
            ]);

            Log::info('Campaign execution completed:', [
                'id' => $campaign->id,
                'sent' => $recipients,
                'delivered' => $delivered,
                'read' => $read
            ]);

            // Here you would integrate with actual WhatsApp Business API
            // Example:
            // $this->sendWhatsAppMessages($campaign);
            
        } catch (\Exception $e) {
            Log::error('Error executing campaign: ' . $e->getMessage());
            $campaign->update(['status' => 'failed']);
            throw $e;
        }
    }

    // Private method for actual WhatsApp API integration (placeholder)
    private function sendWhatsAppMessages($campaign)
    {
        
        Log::info('WhatsApp API integration placeholder for campaign: ' . $campaign->id);
        
        // Example implementation structure:
        /*
        $contacts = $campaign->group->contacts;
        $template = $campaign->template;
        
        foreach ($contacts as $contact) {
            try {
                // Send message via WhatsApp API
                $response = $this->whatsappApiService->sendMessage(
                    $contact->phone_number,
                    $template->content,
                    $template->template_id
                );
                
                // Update delivery status
                if ($response['success']) {
                    // Track successful send
                }
            } catch (\Exception $e) {
                Log::error('Failed to send message to: ' . $contact->phone_number);
            }
        }
        */
    }

    // Get campaign analytics
    public function getAnalytics($id)
    {
        try {
            $campaign = Campaign::findOrFail($id);
            
            $analytics = [
                'campaign_id' => $campaign->id,
                'campaign_name' => $campaign->campaign_name,
                'total_recipients' => $campaign->recipients,
                'messages_sent' => $campaign->messages_sent,
                'messages_delivered' => $campaign->messages_delivered,
                'messages_read' => $campaign->messages_read,
                'delivery_rate' => $campaign->messages_sent > 0 ? 
                    round(($campaign->messages_delivered / $campaign->messages_sent) * 100, 2) : 0,
                'read_rate' => $campaign->messages_delivered > 0 ? 
                    round(($campaign->messages_read / $campaign->messages_delivered) * 100, 2) : 0,
                'status' => $campaign->status,
                'created_at' => $campaign->created_at->format('Y-m-d H:i:s'),
                'executed_at' => $campaign->executed_at ? $campaign->executed_at->format('Y-m-d H:i:s') : null
            ];

            return response()->json([
                'success' => true,
                'data' => $analytics
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching campaign analytics: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch campaign analytics'
            ], 500);
        }
    }
}