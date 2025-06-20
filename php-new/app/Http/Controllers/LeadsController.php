<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadDisposition;
use App\Models\LeadStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;

class LeadsController extends Controller
{
    /**
     * Display a listing of the leads.
     */
    public function index(Request $request)
    {
         $leadSources = LeadSource::all(); // Adjust based on your model
        $leadDispositions = LeadDisposition::all();
        $leadStatuses = LeadStatus::all();
       
        try {
            $search = $request->get('search');
            $stage = $request->get('stage');
            $source = $request->get('source');
            $owner = $request->get('owner');
            $perPage = $request->get('per_page', 15);

            // Build query
            $query = Lead::query();

            // Apply search filter
            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('lead_name', 'like', '%' . $search . '%')
                      ->orWhere('company_name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%')
                      ->orWhere('mobile_no', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%');
                });
            }

            // Apply stage filter
            if ($stage) {
                $query->where('stage', $stage);
            }

            // Apply source filter
            if ($source) {
                $query->where('lead_source', $source);
            }

            // Apply owner filter
            if ($owner) {
                $query->where('lead_owner', $owner);
            }

            // Order by created date desc (use custom field)
            $query->orderBy('created_date', 'desc');

            // Get paginated results
            $leads = $query->paginate($perPage);
            $totalLeads = Lead::count();

            // Transform leads for view
            $leadsArray = $leads->map(function ($lead) {
                return [
                    'id' => (string) $lead->_id, // MongoDB uses _id
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name ?? 'N/A',
                    'company_id' => $lead->company_id,
                    'company_image' => $lead->company_image,
                    'company_address' => $lead->company_address,
                    'phone' => $lead->phone ?? $lead->mobile_no,
                    'mobile_no' => $lead->mobile_no,
                    'alt_mobile_no' => $lead->alt_mobile_no,
                    'email' => $lead->email,
                    'status' => $lead->status,
                    'stage' => $lead->stage,
                    'city' => $lead->city,
                    'state' => $lead->state,
                    'pincode' => $lead->pincode,
                    'address1' => $lead->address1,
                    'address2' => $lead->address2,
                    'lead_source' => $lead->lead_source,
                    'other_source' => $lead->other_source,
                    'tags' => $lead->tags,
                    'notes' => $lead->notes,
                    'dispositions' => $lead->dispositions,
                    'owner' => $lead->lead_owner,
                    'created_date' => $lead->created_date ? Carbon::parse($lead->created_date)->format('d M Y') : 'N/A',
                    'created_by' => $lead->created_by,
                    'updated_by' => $lead->updated_by
                ];
            });

            // If AJAX request, return JSON
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $leadsArray,
                    'pagination' => [
                        'current_page' => $leads->currentPage(),
                        'last_page' => $leads->lastPage(),
                        'per_page' => $leads->perPage(),
                        'total' => $leads->total()
                    ]
                ]);
            }

            return view('leads', compact('leadsArray', 'totalLeads', 'leads', 'search','leadSources', 'leadDispositions', 'leadStatuses'));

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@index: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading leads: ' . $e->getMessage()
                ], 500);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Error loading leads: ' . $e->getMessage()
            ], 500);
        }
    }

 
public function source()
{
    try {
        $sources = LeadSource::select('_id', 'name')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $sources,
            'count' => $sources->count()
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching lead sources: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error fetching lead sources',
            'error' => config('app.debug') ? $e->getMessage() : null,
            'data' => []
        ], 500);
    }
}


public function dispositions()
{
    try {
        $dispositions = LeadDisposition::select('_id', 'name')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $dispositions,
            'count' => $dispositions->count()
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching dispositions: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error fetching dispositions',
            'error' => config('app.debug') ? $e->getMessage() : null
        ], 500);
    }
}

    /**
     * Store a newly created lead.
     */
    public function store(Request $request)
    {
        
        try {
            // Log incoming request for debugging
            Log::info('Lead store request data:', $request->all());

            // Validation rules
            $validator = Validator::make($request->all(), [
                'lead_name' => 'required|string|max:255',
                'lead_source' => 'required|string|max:100',
                'other_source' => 'required_if:lead_source,Other|string|max:255|nullable',
                'mobile_no' => [
                    'required',
                    'string',
                    'regex:/^[0-9]{10}$/',
                    function ($attribute, $value, $fail) {
                        if (Lead::where('mobile_no', $value)->exists()) {
                            $fail('The mobile number has already been taken.');
                        }
                    }
                ],
                'alt_mobile_no' => 'nullable|string|regex:/^[0-9]{10}$/',
                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                    function ($attribute, $value, $fail) {
                        if ($value && Lead::where('email', $value)->exists()) {
                            $fail('The email has already been taken.');
                        }
                    }
                ],
                'company_name' => 'nullable|string|max:255',
                'lead_owner' => 'required|string|max:100',
                'status' => 'required|integer|in:0,1',
                'stage' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'pincode' => 'nullable|string|regex:/^[0-9]{6}$/',
                'address1' => 'required|string|max:500',
                'address2' => 'nullable|string|max:500',
                'tags' => 'nullable|string',
                'notes' => 'nullable|string',
                'dispositions' => 'nullable|string'
            ]);

            
            if ($validator->fails()) {
                Log::error('Lead validation failed:', $validator->errors()->toArray());
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            // Prepare lead data
            $leadData = $request->only([
                'lead_name', 'lead_source', 'other_source', 'company_name',
                'mobile_no', 'alt_mobile_no', 'email', 'lead_owner', 'status',
                'stage', 'city', 'state', 'pincode', 'address1', 'address2',
                'tags', 'notes', 'dispositions'
            ]);

            // Set phone to mobile_no if not provided
            $leadData['phone'] = $leadData['mobile_no'];
            
            // Convert tags to array if it's a string
            if (isset($leadData['tags']) && is_string($leadData['tags']) && !empty($leadData['tags'])) {
                $leadData['tags'] = array_filter(array_map('trim', explode(',', $leadData['tags'])));
            } else {
                $leadData['tags'] = [];
            }
            
            // Set metadata
            $leadData['created_by'] = auth()->check() ? auth()->user()->name : 'System';
            $leadData['updated_by'] = auth()->check() ? auth()->user()->name : 'System';
            $leadData['created_date'] = Carbon::now();
            $leadData['updated_date'] = Carbon::now();

            // Log the data being saved
            Log::info('Lead data to be saved:', $leadData);

            // Create the lead
            $lead = new Lead();
            $lead->fill($leadData);
            $result = $lead->save();

            // Log the save result
            Log::info('Lead save result:', ['success' => $result, 'id' => $lead->_id]);

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to save lead to database'
                ], 500);
            }

            // Verify the lead was actually saved
            $savedLead = Lead::find($lead->_id);
            if (!$savedLead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead was not found after saving'
                ], 500);
            }

            Log::info('Lead successfully created with ID: ' . $lead->_id);

            return response()->json([
                'success' => true,
                'message' => 'Lead created successfully!',
                'data' => [
                    'id' => (string) $lead->_id,
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name,
                    'mobile_no' => $lead->mobile_no,
                    'email' => $lead->email,
                    'stage' => $lead->stage,
                    'status' => $lead->status
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@store: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error creating lead: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified lead.
     */
    public function show($id)
    {
        try {
            // Handle MongoDB ObjectId
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }
            
            if (!$lead) {
                if (request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Lead not found.'
                    ], 404);
                }
                return back()->with('error', 'Lead not found.');
            }

            // Format data for response
            $leadData = [
                'id' => (string) $lead->_id,
                'lead_name' => $lead->lead_name,
                'company_name' => $lead->company_name,
                'mobile_no' => $lead->mobile_no,
                'alt_mobile_no' => $lead->alt_mobile_no,
                // 'email' => $lead->email,
                'lead_source' => $lead->lead_source,
                // 'other_source' => $lead->other_source,
                'lead_owner' => $lead->lead_owner,
                'status' => $lead->status,
                'stage' => $lead->stage,
                'city' => $lead->city,
                'state' => $lead->state,
                'pincode' => $lead->pincode,
                'address1' => $lead->address1,
                'address2' => $lead->address2,
                'tags' => $lead->tags,
                'notes' => $lead->notes,
                'dispositions' => $lead->dispositions,
                'created_date' => $lead->created_date ? Carbon::parse($lead->created_date)->format('d M Y, H:i A') : 'N/A',
                'created_by' => $lead->created_by,
                'updated_by' => $lead->updated_by,
                'updated_date' => $lead->updated_date ? Carbon::parse($lead->updated_date)->format('d M Y, H:i A') : 'N/A'
            ];

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $leadData
                ]);
            }
            return view('leads-details', compact('lead', 'leadData'));
            
        } catch (\Exception $e) {
            Log::error('Error in LeadsController@show: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading lead details: ' . $e->getMessage()
                ], 500);
            }
            dd($e->getMessage());
            return back()->with('error', 'Error loading lead details.');
        }
    }

    /**
     * Update the specified lead.
     */
    public function update(Request $request, $id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }
$request->merge(['status' => 1]);
            // Validation rules
            $validator = Validator::make($request->all(), [
                'lead_name' => 'required|string|max:255',
                'lead_source' => 'required|string|max:100',
                'other_source' => 'required_if:lead_source,Other|string|max:255|nullable',
                'mobile_no' => [
                    'required',
                    'string',
                    'regex:/^[0-9]{10}$/',
                    function ($attribute, $value, $fail) use ($lead) {
                        $existingLead = Lead::where('mobile_no', $value)
                                          ->where('_id', '!=', $lead->_id)
                                          ->first();
                        if ($existingLead) {
                            $fail('The mobile number has already been taken.');
                        }
                    }
                ],
                'alt_mobile_no' => 'nullable|string|regex:/^[0-9]{10}$/',
                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                    function ($attribute, $value, $fail) use ($lead) {
                        if ($value) {
                            $existingLead = Lead::where('email', $value)
                                              ->where('_id', '!=', $lead->_id)
                                              ->first();
                            if ($existingLead) {
                                $fail('The email has already been taken.');
                            }
                        }
                    }
                ],
                'company_name' => 'nullable|string|max:255',
                'lead_owner' => 'required|string|max:100',
                'status' => 'required|integer|in:0,1',
                'stage' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'pincode' => 'nullable|string|regex:/^[0-9]{6}$/',
                'address1' => 'required|string|max:500',
                'address2' => 'nullable|string|max:500',
                'tags' => 'nullable|string',
                'notes' => 'nullable|string',
                'dispositions' => 'nullable|string'
            ]);
 
            if ($validator->fails()) {
                Log::error('Lead update validation failed:', $validator->errors()->toArray());
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Update lead data
            $leadData = $request->only([
                'lead_name', 'lead_source', 'other_source', 'company_name',
                'mobile_no', 'alt_mobile_no', 'email', 'lead_owner', 'status',
                'stage', 'city', 'state', 'pincode', 'address1', 'address2',
                'tags', 'notes', 'dispositions'
            ]);

            // Set phone to mobile_no
            $leadData['phone'] = $leadData['mobile_no'];
            
            // Convert tags to array if it's a string
            if (isset($leadData['tags']) && is_string($leadData['tags']) && !empty($leadData['tags'])) {
                $leadData['tags'] = array_filter(array_map('trim', explode(',', $leadData['tags'])));
            } else {
                $leadData['tags'] = [];
            }
            
            // Set updated metadata
            $leadData['updated_by'] = auth()->check() ? auth()->user()->name : 'System';
            $leadData['updated_date'] = Carbon::now();

            // Log the data being updated
            // Log::info('Lead update data:', $leadData);
            // Log::info('Lead ID being updated:', (string) $lead->_id);

            $result = $lead->update($leadData);

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update lead in database'
                ], 500);
            }

            // Log::info('Lead successfully updated with ID: ' . $lead->_id);

            return response()->json([
                'success' => true,
                'message' => 'Lead updated successfully!',
                'data' => [
                    'id' => (string) $lead->_id,
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name,
                    'mobile_no' => $lead->mobile_no,
                    'email' => $lead->email,
                    'stage' => $lead->stage,
                    'status' => $lead->status
                ]
            ]);

        } catch (\Exception $e) {
            // Log::error('Error in LeadsController@update: ' . $e->getMessage());
            // Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified lead.
     */
    public function destroy($id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }

            // Log::info('Attempting to delete lead with ID: ' . (string) $lead->_id);
            
            $result = $lead->delete();

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete lead from database'
                ], 500);
            }

            // Log::info('Lead successfully deleted with ID: ' . $id);

            return response()->json([
                'success' => true,
                'message' => 'Lead deleted successfully!'
            ]);

        } catch (\Exception $e) {
            // Log::error('Error in LeadsController@destroy: ' . $e->getMessage());
            // Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting lead: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get lead data for editing.
     */
    public function edit($id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
                 return response()->json([
                    'success' => false,
                    'message' => 'Lead mongodb.'
                ], 404);
            } else {
                $lead = Lead::find($id);
                 return response()->json([
                    'success' => false,
                    'message' => 'Lead not mongodb.'
                ], 404);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }

            Log::info('Fetching lead for edit with ID: ' . (string) $lead->_id);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => (string) $lead->_id,
                    'lead_name' => $lead->lead_name,
                    'lead_source' => $lead->lead_source,
                    'other_source' => $lead->other_source,
                    'company_name' => $lead->company_name,
                    'mobile_no' => $lead->mobile_no,
                    'alt_mobile_no' => $lead->alt_mobile_no,
                    'email' => $lead->email,
                    'lead_owner' => $lead->lead_owner,
                    'status' => $lead->status,
                    'stage' => $lead->stage,
                    'city' => $lead->city,
                    'state' => $lead->state,
                    'pincode' => $lead->pincode,
                    'address1' => $lead->address1,
                    'address2' => $lead->address2,
                    'tags' => is_array($lead->tags) ? implode(', ', $lead->tags) : $lead->tags,
                    'notes' => $lead->notes,
                    'dispositions' => $lead->dispositions
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@edit: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error loading lead for editing: ' . $e->getMessage()
            ], 500);
        }
    }

    public function exportPdf(Request $request)
{
    try {
        $query = Lead::with(['source', 'status', 'assignedUser']); // Adjust relationships as needed

        // If specific leads are selected
        if ($request->has('selected_ids') && !empty($request->selected_ids)) {
            $selectedIds = is_string($request->selected_ids) 
                ? json_decode($request->selected_ids, true) 
                : $request->selected_ids;
            
            if (is_array($selectedIds) && !empty($selectedIds)) {
                $query->whereIn('id', $selectedIds);
            }
        }

        $leads = $query->orderBy('name')->get();

        if ($leads->isEmpty()) {
            return redirect()->back()->with('warning', 'No leads found to export.');
        }

        $pdf = Pdf::loadView('leads.exports.pdf', compact('leads'));
        
        return $pdf->download('leads-' . date('Y-m-d') . '.pdf');

    } catch (\Exception $e) {
        Log::error('Lead PDF export error:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect()->back()->with('error', 'Error exporting PDF: ' . $e->getMessage());
    }
}

/**
 * Export leads to Excel
 */
public function exportExcel(Request $request)
{
    try {
        $selectedIds = null;
        if ($request->has('selected_ids') && !empty($request->selected_ids)) {
            $selectedIds = is_string($request->selected_ids) 
                ? json_decode($request->selected_ids, true) 
                : $request->selected_ids;
        }

        return Excel::download(
            new LeadsExport($selectedIds), 
            'leads-' . date('Y-m-d') . '.xlsx'
        );

    } catch (\Exception $e) {
        Log::error('Lead Excel export error:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect()->back()->with('error', 'Error exporting Excel: ' . $e->getMessage());
    }
}
    /**
     * Download sample template.
     */
    public function downloadTemplate()
    {
        try {
            $headers = [
                ['Lead Name', 'Company Name', 'Mobile No', 'Alt Mobile No', 'Email', 'Lead Source', 'Other Source', 'Lead Owner', 'Status', 'Stage', 'City', 'State', 'Pincode', 'Address1', 'Address2', 'Tags', 'Notes', 'Dispositions'],
                ['John Doe', 'ABC Company', '9876543210', '9876543211', 'john@example.com', 'Website', '', 'john_doe', '1', 'New Lead', 'Mumbai', 'Maharashtra', '400001', '123 Main St', 'Near Park', 'hot lead, qualified', 'Sample notes', 'Follow up required']
            ];
            
            return response()->streamDownload(function() use ($headers) {
                $handle = fopen('php://output', 'w');
                foreach ($headers as $row) {
                    fputcsv($handle, $row);
                }
                fclose($handle);
            }, 'leads_import_template.csv', [
                'Content-Type' => 'text/csv',
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@downloadTemplate: ' . $e->getMessage());
            return back()->with('error', 'Error generating template file.');
        }
    }

    /**
     * Get leads statistics.
     */
    public function getStats()
    {
        try {
            $stats = [
                'total' => Lead::count(),
                'active' => Lead::where('status', 1)->count(),
                'inactive' => Lead::where('status', 0)->count(),
                'new_leads' => Lead::where('stage', 'New Lead')->count(),
                'qualified' => Lead::where('stage', 'Qualified')->count(),
                'closed_won' => Lead::where('stage', 'Closed Won')->count(),
                'closed_lost' => Lead::where('stage', 'Closed Lost')->count(),
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@getStats: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching statistics.'
            ], 500);
        }
    }

    /**
     * Bulk delete leads.
     */
    public function bulkDelete(Request $request)
    {
      
        try {

            $leadIds = $request->get('lead_ids', []);
            
            if (empty($leadIds)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No leads selected for deletion.'
                ], 400);
            }

            // Convert string IDs to MongoDB ObjectIds if needed
            $objectIds = array_map(function($id) {
                if (strlen($id) === 24 && ctype_xdigit($id)) {
                    
                    return new \MongoDB\BSON\ObjectId($id);
                }
                return $id;
            }, $leadIds);

            $deletedCount = Lead::whereIn('_id', $objectIds)->delete();

            return response()->json([
                'success' => true,
                'message' => "Successfully deleted {$deletedCount} lead(s)."
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@bulkDelete: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting leads: ' . $e->getMessage()
            ], 500);
        }
    }

   
    /*** Update lead stage.
     */
    public function updateStage(Request $request, $id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'stage' => 'required|string|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $lead->stage = $request->stage;
            $lead->updated_by = auth()->check() ? auth()->user()->name : 'System';
            $lead->updated_date = Carbon::now();
            
            $result = $lead->save();

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update lead stage'
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Lead stage updated successfully!',
                'data' => [
                    'id' => (string) $lead->_id,
                    'stage' => $lead->stage
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@updateStage: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead stage: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update lead status (active/inactive).
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'status' => 'required|integer|in:0,1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $lead->status = $request->status;
            $lead->updated_by = auth()->check() ? auth()->user()->name : 'System';
            $lead->updated_date = Carbon::now();
            
            $result = $lead->save();

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update lead status'
                ], 500);
            }

            $statusText = $request->status == 1 ? 'Active' : 'Inactive';

            return response()->json([
                'success' => true,
                'message' => "Lead status updated to {$statusText} successfully!",
                'data' => [
                    'id' => (string) $lead->_id,
                    'status' => $lead->status,
                    'status_text' => $statusText
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@updateStatus: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead status: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get leads by stage for dashboard/reports.
     */
    public function getLeadsByStage()
    {
        try {
            $leadsByStage = Lead::raw(function($collection) {
                return $collection->aggregate([
                    [
                        '$group' => [
                            '_id' => '$stage',
                            'count' => ['$sum' => 1],
                            'active_count' => [
                                '$sum' => [
                                    '$cond' => [
                                        ['$eq' => ['$status', 1]],
                                        1,
                                        0
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        '$sort' => ['count' => -1]
                    ]
                ]);
            });

            $result = [];
            foreach ($leadsByStage as $stage) {
                $result[] = [
                    'stage' => $stage['_id'] ?? 'Unknown',
                    'total_count' => $stage['count'] ?? 0,
                    'active_count' => $stage['active_count'] ?? 0
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@getLeadsByStage: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching leads by stage: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get leads by source for analytics.
     */
    public function getLeadsBySource()
    {
        try {
            $leadsBySource = Lead::raw(function($collection) {
                return $collection->aggregate([
                    [
                        '$group' => [
                            '_id' => '$lead_source',
                            'count' => ['$sum' => 1],
                            'conversion_rate' => [
                                '$avg' => [
                                    '$cond' => [
                                        ['$eq' => ['$stage', 'Closed Won']],
                                        1,
                                        0
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        '$sort' => ['count' => -1]
                    ]
                ]);
            });

            $result = [];
            foreach ($leadsBySource as $source) {
                $result[] = [
                    'source' => $source['_id'] ?? 'Unknown',
                    'count' => $source['count'] ?? 0,
                    'conversion_rate' => round(($source['conversion_rate'] ?? 0) * 100, 2)
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@getLeadsBySource: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching leads by source: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get recent leads activity.
     */
    public function getRecentActivity(Request $request)
    {
        try {
            $days = $request->get('days', 30);
            $startDate = Carbon::now()->subDays($days);

            $recentLeads = Lead::where('created_date', '>=', $startDate)
                              ->orderBy('created_date', 'desc')
                              ->limit(50)
                              ->get();

            $activities = $recentLeads->map(function ($lead) {
                return [
                    'id' => (string) $lead->_id,
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name,
                    'stage' => $lead->stage,
                    'lead_source' => $lead->lead_source,
                    'created_date' => $lead->created_date ? Carbon::parse($lead->created_date)->format('d M Y, H:i A') : 'N/A',
                    'created_by' => $lead->created_by,
                    'days_ago' => $lead->created_date ? Carbon::parse($lead->created_date)->diffForHumans() : 'N/A'
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $activities
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@getRecentActivity: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching recent activity: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search leads for autocomplete/suggestions.
     */
    public function search(Request $request)
    {
        try {
            $query = $request->get('q', '');
            $limit = $request->get('limit', 10);

            if (empty($query)) {
                return response()->json([
                    'success' => true,
                    'data' => []
                ]);
            }

            $leads = Lead::where(function($q) use ($query) {
                $q->where('lead_name', 'like', '%' . $query . '%')
                  ->orWhere('company_name', 'like', '%' . $query . '%')
                  ->orWhere('email', 'like', '%' . $query . '%')
                  ->orWhere('mobile_no', 'like', '%' . $query . '%');
            })
            ->where('status', 1) // Only active leads
            ->limit($limit)
            ->get(['_id', 'lead_name', 'company_name', 'email', 'mobile_no', 'stage']);

            $results = $leads->map(function ($lead) {
                return [
                    'id' => (string) $lead->_id,
                    'label' => $lead->lead_name . ($lead->company_name ? ' (' . $lead->company_name . ')' : ''),
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name,
                    'email' => $lead->email,
                    'mobile_no' => $lead->mobile_no,
                    'stage' => $lead->stage
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $results
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@search: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error searching leads: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function importLeads(Request $request)
{
    $validator = Validator::make($request->all(), [
        'import_file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        'skip_duplicates' => 'nullable|boolean'
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Invalid file uploaded'], 422);
    }

    try {
        $file = $request->file('import_file');
        $skipDuplicates = $request->has('skip_duplicates');

        // Read the file into an array of rows
        $rows = Excel::toArray([], $file)[0]; // [0] = first sheet
        $header = array_map('strtolower', array_map('trim', $rows[0] ?? [])); // normalize headers

        $inserted = 0;
        $skipped = 0;

        for ($i = 1; $i < count($rows); $i++) {
            $row = array_combine($header, $rows[$i]);

            // Validate required fields
            if (empty($row['lead_name']) || empty($row['mobile_no'])) {
                $skipped++;
                continue;
            }

            // Duplicate check by mobile number
            if ($skipDuplicates && Lead::where('mobile_no', $row['mobile_no'])->exists()) {
                $skipped++;
                continue;
            }

            Lead::create([
                'lead_name'     => $row['lead_name'] ?? '',
                'company_name'  => $row['company_name'] ?? '',
                'email'         => $row['email'] ?? '',
                'mobile_no'     => $row['mobile_no'],
                'source'        => $row['source'] ?? 'Imported',
                'stage'         => $row['stage'] ?? 'new',
                'priority'      => $row['priority'] ?? 'Low',
                'created_by'    => Auth::id() ?? 'system',
            ]);

            $inserted++;
        }

        return response()->json([
            'success' => true,
            'message' => "Imported successfully: $inserted added, $skipped skipped."
        ]);
    } catch (\Exception $e) {
        Log::error('Lead Import Error: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong during import'], 500);
    }
}
    /**
     * Add note to lead.
     */
    public function addNote(Request $request, $id)
    {
        try {
            // Handle MongoDB ObjectId properly
            if (strlen($id) === 24 && ctype_xdigit($id)) {
                $lead = Lead::where('_id', new \MongoDB\BSON\ObjectId($id))->first();
            } else {
                $lead = Lead::find($id);
            }

            if (!$lead) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead not found.'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'note' => 'required|string|max:1000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $currentNotes = $lead->notes ?? '';
            $newNote = '[' . Carbon::now()->format('d M Y, H:i A') . '] ' . 
                      (auth()->check() ? auth()->user()->name : 'System') . ': ' . 
                      $request->note;
            
            $lead->notes = $currentNotes ? $currentNotes . "\n\n" . $newNote : $newNote;
            $lead->updated_by = auth()->check() ? auth()->user()->name : 'System';
            $lead->updated_date = Carbon::now();
            
            $result = $lead->save();

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to add note'
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Note added successfully!',
                'data' => [
                    'id' => (string) $lead->_id,
                    'notes' => $lead->notes
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@addNote: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error adding note: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get leads for specific owner.
     */
    public function getLeadsByOwner(Request $request)
    {
        try {
            $owner = $request->get('owner');
            $perPage = $request->get('per_page', 15);

            if (!$owner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Owner parameter is required.'
                ], 400);
            }

            $leads = Lead::where('lead_owner', $owner)
                        ->where('status', 1)
                        ->orderBy('created_date', 'desc')
                        ->paginate($perPage);

            $leadsArray = $leads->map(function ($lead) {
                return [
                    'id' => (string) $lead->_id,
                    'lead_name' => $lead->lead_name,
                    'company_name' => $lead->company_name ?? 'N/A',
                    'mobile_no' => $lead->mobile_no,
                    'email' => $lead->email,
                    'stage' => $lead->stage,
                    'lead_source' => $lead->lead_source,
                    'created_date' => $lead->created_date ? Carbon::parse($lead->created_date)->format('d M Y') : 'N/A'
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $leadsArray,
                'pagination' => [
                    'current_page' => $leads->currentPage(),
                    'last_page' => $leads->lastPage(),
                    'per_page' => $leads->perPage(),
                    'total' => $leads->total()
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in LeadsController@getLeadsByOwner: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching leads by owner: ' . $e->getMessage()
            ], 500);
        }
    }
}