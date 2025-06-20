<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LeadSource;
use App\Models\LeadDisposition;
use App\Models\LeadStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MongoDB\BSON\ObjectId;


class LeadConfigurationController extends Controller
{
    /**
     * Display the lead configuration page
     */




// In your LeadConfigurationController or similar
public function index()
{
    try {
        // Fetch lead sources from your database/collection
        $leadSources = LeadSource::all(); // Adjust based on your model
        $leadDispositions = LeadDisposition::all();
        $leadStatuses = LeadStatus::all();
        
        return view('lead-configuration', compact('leadSources', 'leadDispositions', 'leadStatuses'));
        
    } catch (\Exception $e) {
        \Log::error('Error fetching lead configuration data: ' . $e->getMessage());
        
        // Return with empty arrays if there's an error
        return view('lead-configuration', [
            'leadSources' => [],
            'leadDispositions' => [],
            'leadStatuses' => []
        ]);
    }
}
    /**
     * Get sources data with error handling
     */
    private function getSourcesData()
    {
        try {
            return LeadSource::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            Log::error('Error fetching lead sources in getSourcesData: ' . $e->getMessage());
            return collect();
        }
    }

    /**
     * Get dispositions data with error handling
     */
    private function getDispositionsData()
    {
        try {
            return LeadDisposition::orderBy('sort_order', 'asc')->get();
        } catch (\Exception $e) {
            Log::error('Error fetching lead dispositions in getDispositionsData: ' . $e->getMessage());
            return collect();
        }
    }

    /**
     * Get statuses data with error handling
     */
    private function getStatusesData()
    {
        try {
            return LeadStatus::orderBy('sort_order', 'asc')->get();
        } catch (\Exception $e) {
            Log::error('Error fetching lead statuses in getStatusesData: ' . $e->getMessage());
            return collect();
        }
    }

    /**
     * Handle form submission from GET request
     */
    private function handleFormSubmission(Request $request)
    {
        // Validate the data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:lead_sources,name',
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string',
            'is_active' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed: ' . implode(', ', $validator->errors()->all()));
        }

        try {
            // Convert 'on' to boolean for is_active
            $isActive = $request->input('is_active') === 'on' ? 1 : 0;
            
            // Clean the color value (remove URL encoding)
            $color = urldecode($request->input('color'));
            
            $leadSources = LeadSource::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'color' => $color,
                'is_active' => $isActive,
            ]);

            return redirect()->route('lead-configuration')
                ->with('success', 'Lead source "' . $leadSources->name . '" created successfully!');

        } catch (\Exception $e) {
            Log::error('Error creating lead source: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating lead source. Please try again.');
        }
    }

    // LEAD SOURCES CRUD

    /**
     * Store a new lead source (API endpoint)
     */
    public function storeSource(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Lead Source Store Request:', $request->all());

        // Normalize is_active field before validation
        $data = $request->all();
        if ($request->has('is_active')) {
            $data['is_active'] = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string',
            'is_active' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            Log::error('Lead Source Validation Failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Check for duplicate name
            $existingSource = LeadSource::where('name', trim($data['name']))->first();
            if ($existingSource) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead source with this name already exists',
                    'errors' => ['name' => ['The name has already been taken.']]
                ], 422);
            }

            $leadSources = LeadSource::create([
                'name' => trim($data['name']),
                'description' => $data['description'] ?? null,
                'color' => $data['color'],
                'is_active' => $data['is_active'] ?? true,
            ]);

            Log::info('Lead Source Created Successfully:', $leadSources->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Lead source created successfully',
                'data' => $leadSources
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating lead source: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error creating lead source. Please try again.',
                'error_details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Get all lead sources
     */
    public function getSources()
    {
   
    
        try {
            $leadSources = LeadSource::orderBy('created_at', 'desc')->get();
            Log::info('getSources() method called'); 
            Log::info('Fetched Lead Sources:', [
                'count' => $leadSources->count(),
                'data' => $leadSources->toArray()
            ]);

            return response()->json([
                'success' => true,
                'data' => $leadSources,
                'count' => $leadSources->count()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching lead sources: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead sources',
                'error_details' => config('app.debug') ? $e->getMessage() : null,
                'data' => []
            ], 500);
        }
    }

    /**
     * Get a specific lead source
     */
    public function showSource($id)
    {
        try {

            $leadSources = LeadSource::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $leadSources
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead source not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching lead source: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead source'
            ], 500);
        }
    }

    /**
     * Update a lead source
     */
    public function updateSource(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:lead_sources,name,' . $id,
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string',
            'is_active' => 'sometimes|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $leadSources = LeadSource::findOrFail($id);
            $leadSources->update([
                'name' => trim($request->input('name')),
                'description' => $request->input('description'),
                'color' => $request->input('color'),
                'is_active' => $request->boolean('is_active', $leadSources->is_active),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Lead source updated successfully',
                'data' => $leadSources
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead source not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error updating lead source: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead source. Please try again.'
            ], 500);
        }
    }

    /**
     * Delete a lead source
     */
    public function deleteSource($id)
    {
        try {
            $leadSources = LeadSource::findOrFail($id);
            
            // Check if lead source is being used
            if (method_exists($leadSources, 'leads') && $leadSources->leads()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete lead source as it is being used by existing leads'
                ], 409);
            }

            $leadSources->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lead source deleted successfully'
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead source not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting lead source: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting lead source. Please try again.'
            ], 500);
        }
    }

    // LEAD DISPOSITIONS CRUD

    /**
     * Store a new lead disposition
     */
    public function storeDisposition(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Lead Disposition Store Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|in:positive,negative,neutral',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        if ($validator->fails()) {
            Log::error('Lead Disposition Validation Failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Check for duplicate name
            $existingDisposition = LeadDisposition::where('name', trim($request->input('name')))->first();
            if ($existingDisposition) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead disposition with this name already exists',
                    'errors' => ['name' => ['The name has already been taken.']]
                ], 422);
            }

            // Auto-generate sort_order if not provided
            $sortOrder = $request->input('sort_order');
            if ($sortOrder === null || $sortOrder === '') {
                $maxOrder = LeadDisposition::max('sort_order') ?? 0;
                $sortOrder = $maxOrder + 1;
            }

            // Handle is_active field - convert 'on' to true, anything else to false
            $isActive = in_array($request->input('is_active'), ['on', '1', 'true', true], true);

            $leadDisposition = LeadDisposition::create([
                'name' => trim($request->input('name')),
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'sort_order' => (int)$sortOrder,
                'is_active' => $isActive,
            ]);

            Log::info('Lead Disposition Created Successfully:', $leadDisposition->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Lead disposition created successfully',
                'data' => $leadDisposition
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating lead disposition: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error creating lead disposition. Please try again.',
                'error_details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Get all lead dispositions
     */
    public function getDispositions()
    {
        try {
            $leadDispositions = LeadDisposition::orderBy('sort_order', 'asc')->get();
            
            Log::info('Fetched Lead Dispositions:', [
                'count' => $leadDispositions->count(),
                'data' => $leadDispositions->toArray()
            ]);

            return response()->json([
                'success' => true,
                'data' => $leadDispositions,
                'count' => $leadDispositions->count()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching lead dispositions: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead dispositions',
                'error_details' => config('app.debug') ? $e->getMessage() : null,
                'data' => []
            ], 500);
        }
    }

    /**
     * Get a specific lead disposition
     */
    public function showDisposition($id)
    {
        try {
            $leadDisposition = LeadDisposition::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $leadDisposition
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead disposition not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching lead disposition: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead disposition'
            ], 500);
        }
    }

    /**
     * Update a lead disposition
     */
    public function updateDisposition(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:lead_dispositions,name,' . $id,
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|in:positive,negative,neutral',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $leadDispositions = LeadDisposition::findOrFail($id);
            
            $updateData = [
                'name' => trim($request->input('name')),
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'is_active' => in_array($request->input('is_active'), ['on', '1', 'true', true], true),
            ];

            if ($request->has('sort_order') && $request->input('sort_order') !== '') {
                $updateData['sort_order'] = (int)$request->input('sort_order');
            }

            $leadDispositions->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Lead disposition updated successfully',
                'data' => $leadDispositions
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead disposition not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error updating lead disposition: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead disposition. Please try again.'
            ], 500);
        }
    }

    /**
     * Delete a lead disposition
     */
    public function deleteDisposition($id)
    {
        try {
            $leadDisposition = LeadDisposition::findOrFail($id);
            
            // Check if disposition is being used
            if (method_exists($leadDisposition, 'leads') && $leadDisposition->leads()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete lead disposition as it is being used by existing leads'
                ], 409);
            }

            $leadDisposition->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lead disposition deleted successfully'
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead disposition not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting lead disposition: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting lead disposition. Please try again.'
            ], 500);
        }
    }

    // LEAD STATUSES CRUD

    /**
     * Store a new lead status
     */
    public function storeStatus(Request $request)
    {
        // Log incoming request for debugging
        Log::info('Lead Status Store Request:', $request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string',
            'type' => 'required|string|in:open,closed,lost',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        if ($validator->fails()) {
            Log::error('Lead Status Validation Failed:', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Check for duplicate name
            $existingStatus = LeadStatus::where('name', trim($request->input('name')))->first();
            if ($existingStatus) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lead status with this name already exists',
                    'errors' => ['name' => ['The name has already been taken.']]
                ], 422);
            }

            // Auto-generate sort_order if not provided
            $sortOrder = $request->input('sort_order');
            if ($sortOrder === null || $sortOrder === '') {
                $maxOrder = LeadStatus::max('sort_order') ?? 0;
                $sortOrder = $maxOrder + 1;
            }

            // Handle is_active field
            $isActive = in_array($request->input('is_active'), ['on', '1', 'true', true], true);

            $leadStatus = LeadStatus::create([
                'name' => trim($request->input('name')),
                'description' => $request->input('description'),
                'color' => $request->input('color'),
                'type' => $request->input('type'),
                'sort_order' => (int)$sortOrder,
                'is_active' => $isActive,
            ]);

            Log::info('Lead Status Created Successfully:', $leadStatus->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Lead status created successfully',
                'data' => $leadStatus
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error creating lead status: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error creating lead status. Please try again.',
                'error_details' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Get all lead statuses
     */
    public function getStatuses()
    {
        try {
            $leadStatuses = LeadStatus::orderBy('sort_order', 'asc')->get();
            
            Log::info('Fetched Lead Statuses:', [
                'count' => $leadStatuses->count(),
                'data' => $leadStatuses->toArray()
            ]);

            return response()->json([
                'success' => true,
                'data' => $leadStatuses,
                'count' => $leadStatuses->count()
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching lead statuses: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead statuses',
                'error_details' => config('app.debug') ? $e->getMessage() : null,
                'data' => []
            ], 500);
        }
    }

    /**
     * Get a specific lead status
     */
    public function showStatus($id)
    {
        try {
            $leadStatus = LeadStatus::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $leadStatus
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead status not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching lead status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching lead status'
            ], 500);
        }
    }

    /**
     * Update a lead status
     */
    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:lead_statuses,name,' . $id,
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string',
            'type' => 'required|string|open,closed,converted',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $leadStatus = LeadStatus::findOrFail($id);
            
            $updateData = [
                'name' => trim($request->input('name')),
                'description' => $request->input('description'),
                'color' => $request->input('color'),
                'type' => $request->input('type'),
                'is_active' => in_array($request->input('is_active'), ['on', '1', 'true', true], true),
            ];

            if ($request->has('sort_order') && $request->input('sort_order') !== '') {
                $updateData['sort_order'] = (int)$request->input('sort_order');
            }

            $leadStatus->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Lead status updated successfully',
                'data' => $leadStatus
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead status not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error updating lead status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating lead status. Please try again.'
            ], 500);
        }
    }

    /**
     * Delete a lead status  
     */
    public function deleteStatus($id)
    {
        try {
            $leadStatus = LeadStatus::findOrFail($id);
            
            // Check if status is being used
            if (method_exists($leadStatus, 'leads') && $leadStatus->leads()->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete lead status as it is being used by existing leads'
                ], 409);
            }

            $leadStatus->delete();

            return response()->json([
                'success' => true,
                'message' => 'Lead status deleted successfully'
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lead status not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting lead status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting lead status. Please try again.'
            ], 500);
        }
    }

    /**
     * Test endpoint to check backend connectivity
     */
    public function testConnection()
    {
        return response()->json([
            'success' => true,
            'message' => 'Backend is connected and working!',
            'timestamp' => now(),
            'app_env' => config('app.env'),
            'app_debug' => config('app.debug')
        ]);
    }

    /**
     * Debug endpoint to check database data
     */
    public function debugData()
    {
        try {
            $sources = LeadSource::all();
            $dispositions = LeadDisposition::all();
            $statuses = LeadStatus::all();

            return response()->json([
                'success' => true,
                'data' => [
                    'sources' => [
                        'count' => $sources->count(),
                        'data' => $sources->toArray()
                    ],
                    'dispositions' => [
                        'count' => $dispositions->count(),
                        'data' => $dispositions->toArray()
                    ],
                    'statuses' => [
                        'count' => $statuses->count(),
                        'data' => $statuses->toArray()
                    ]
                ],
                'database_tables' => [
                    'lead_sources_exists' => DB::connection()->getSchemaBuilder()->hasTable('lead_sources'),
                    'lead_dispositions_exists' => DB::connection()->getSchemaBuilder()->hasTable('lead_dispositions'),
                    'lead_statuses_exists' => DB::connection()->getSchemaBuilder()->hasTable('lead_statuses')
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Debug failed',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}