<?php

namespace App\Http\Controllers;
// use App\Models\lead;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use MongoDB\BSON\ObjectId;
use App\Imports\ContactsImport;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
           $contact= Contact::with('group')->get()->toArray();
           return response()->json([
    'success' => true,
    'data' => $contact
]);
}
            $groups = Group::all();
            return view('contacts', compact('groups'));
      
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        try {
            $groups = Group::where('status', 1)->orderBy('name')->get();
            return view('contacts.create', compact('groups'));
        } catch (\Exception $e) {
            Log::error('Contact create form error:', ['message' => $e->getMessage()]);
            return view('contacts.create', ['groups' => collect()]);
        }
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        try {
           

            // Log incoming request data
            Log::info('Contact store request data:', $request->all());

            // Validation rules
            $validator = Validator::make($request->all(), [
                'contact_name' => 'required|string|max:255',
                'mobile_no' => 'required|string|size:10|regex:/^[0-9]{10}$/|unique:contacts,mobile_no',
                'alt_mobile_no' => 'nullable|string|size:10|regex:/^[0-9]{10}$/',
                'group_id' => 'nullable|exists:groups,id',
                'new_group_name' => 'nullable|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'pincode' => 'nullable|string|size:6|regex:/^[0-9]{6}$/',
                'address_1' => 'required|string|max:500',
                'address_2' => 'nullable|string|max:500',
                'notes' => 'nullable|string|max:1000',
                'status' => 'nullable|boolean'
            ], [
                'mobile_no.size' => 'Mobile number must be exactly 10 digits.',
                'mobile_no.regex' => 'Mobile number must contain only digits.',
                'mobile_no.unique' => 'This mobile number is already registered.',
                'alt_mobile_no.size' => 'Alternate mobile number must be exactly 10 digits.',
                'alt_mobile_no.regex' => 'Alternate mobile number must contain only digits.',
                'pincode.size' => 'Pincode must be exactly 6 digits.',
                'pincode.regex' => 'Pincode must contain only digits.',
                'group_id.exists' => 'Selected group does not exist.',
            ]);

            if ($validator->fails()) {
                Log::warning('Contact validation failed:', $validator->errors()->toArray());
                
                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()->toArray(),
                        'message' => 'Validation failed'
                    ], 422);
                }

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

           $groupId = $request->group_id;

// Handle new group creation
if ($request->filled('new_group_name')) {
    $groupName = trim($request->new_group_name);

    // Check if group with same name already exists
    $existingGroup = Group::where('name', $groupName)->first();
    if ($existingGroup) {
        $groupId = $existingGroup->id;
    } else {
        $newGroup = Group::create([
            'name' => $groupName,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $groupId = $newGroup->id;
        Log::info('New group created:', ['id' => $groupId, 'name' => $newGroup->name]);
    }
}


            // Prepare contact data
            $contactData = [
                'name' => trim($request->contact_name),
                'mobile_no' => $request->mobile_no,
                'alt_mobile_no' => $request->alt_mobile_no,
                'group_id' => $groupId,
                'city' => trim($request->city),
                'state' => trim($request->state),
                'pincode' => $request->pincode,
                'address_1' => trim($request->address_1),
                'address_2' => $request->address_2 ? trim($request->address_2) : null,
                'notes' => $request->notes ? trim($request->notes) : null,
                'status' => $request->has('status') ? (bool)$request->status : true,
                'created_at' => now(),
                'updated_at' => now()
            ];

            // Create contact
            $contact = Contact::create($contactData);

            if (!$contact) {
                throw new \Exception('Failed to create contact record');
            }

            Log::info('Contact created successfully:', ['id' => $contact->id]);

      

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact created successfully!',
                    'contact' => $contact->load('group'),
                    'redirect' => url('/contacts'),
                ], 201);
            }
            

            return redirect()->route('contacts.index')
                ->with('success', 'Contact created successfully!');

        } catch (\Exception $e) {
       
            
            Log::error('Contact creation error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error creating contact: ' . $e->getMessage(),
                    'errors' => ['general' => [$e->getMessage()]]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating contact: ' . $e->getMessage());
        }
    }


    public function importContacts(Request $request)
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
            if (empty($row['contact_name']) || empty($row['mobile_no'])) {
                $skipped++;
                continue;
            }

            // Duplicate check by mobile number
            if ($skipDuplicates && Contact::where('mobile_no', $row['mobile_no'])->exists()) {
                $skipped++;
                continue;
            }

            Contact::create([
                'contact_name'  => $row['contact_name'] ?? '',
                'company_name'  => $row['company_name'] ?? '',
                'email'         => $row['email'] ?? '',
                'mobile_no'     => $row['mobile_no'],
                'source'        => $row['source'] ?? 'Imported',
                'position'      => $row['position'] ?? '',
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
        Log::error('Contact Import Error: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong during import'], 500);
    }
}

     public function getGroups()
{
    try {
        $groups = Group::select('id', 'name')
            ->withCount('contacts') // This gives you contacts_count
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $groups
        ]);
    } catch (\Exception $e) {
        Log::error('Failed to fetch contact groups:', ['error' => $e->getMessage()]);
        return response()->json([
            'success' => false,
            'message' => 'Failed to load groups'
        ], 500);
    }
}

    /**
     * Display the specified contact.
     */
    public function show($id)
    {
        try {
            // For MongoDB, try multiple approaches to find the contact
            $contact = null;
            
            // Method 1: Direct find with string ID
            $contact = Contact::with('group')->find($id);
            
            // Method 2: If not found, try with MongoDB ObjectId
            if (!$contact && class_exists('\MongoDB\BSON\ObjectId')) {
                try {
                    $objectId = new \MongoDB\BSON\ObjectId($id);
                    $contact = Contact::with('group')->find($objectId);
                } catch (\Exception $e) {
                    Log::warning('Failed to convert to ObjectId in show:', ['id' => $id, 'error' => $e->getMessage()]);
                }
            }
            
            // Method 3: Try querying by _id field directly
            if (!$contact) {
                $contact = Contact::with('group')->where('_id', $id)->first();
            }

            if (!$contact) {
                throw new \Exception('Contact not found check5');
            }

            return view('contacts.show', compact('contact'));
        } catch (\Exception $e) {
            Log::error('Contact show error:', ['id' => $id, 'message' => $e->getMessage()]);
            return redirect()->route('contacts.index')
                ->with('error', 'Contact not found check 6');
        }
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit($id)
    {
        try {
            // For MongoDB, try multiple approaches to find the contact
            $contact = null;
            
            // Method 1: Direct find with string ID
            $contact = Contact::with('group')->find($id);
            
            // Method 2: If not found, try with MongoDB ObjectId
            if (!$contact && class_exists('\MongoDB\BSON\ObjectId')) {
                try {
                    $objectId = new \MongoDB\BSON\ObjectId($id);
                    $contact = Contact::with('group')->find($objectId);
                } catch (\Exception $e) {
                    Log::warning('Failed to convert to ObjectId in edit:', ['id' => $id, 'error' => $e->getMessage()]);
                }
            }
            
            // Method 3: Try querying by _id field directly
            if (!$contact) {
                $contact = Contact::with('group')->where('_id', $id)->first();
            }

            if (!$contact) {
                throw new \Exception('Contact not found check7');
            }

            $groups = Group::where('status', 1)->orderBy('name')->get();

            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'contact' => $contact,
                    'groups' => $groups
                ]);
            }

            return view('contacts.edit', compact('contact', 'groups'));
        } catch (\Exception $e) {
            Log::error('Contact edit error:', ['id' => $id, 'message' => $e->getMessage()]);
            
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found check 8'
                ], 404);
            }

            return redirect()->route('contacts.index')
                ->with('error', 'Contact not found 9');
        }
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, $id)
    {
        
        try {
            // DB::beginTransaction();

            // For MongoDB, try multiple approaches to find the contact
            $contact = null;
            
            
            // Method 1: Direct find with string ID
           $contact = Contact::where('_id', new ObjectId($id))->first();

            
            
            // Method 2: If not found, try with MongoDB ObjectId
            if (!$contact && class_exists('\MongoDB\BSON\ObjectId')) {
                try {
                    $objectId = new \MongoDB\BSON\ObjectId($id);
                    $contact = Contact::find($objectId);
                } catch (\Exception $e) {
                    Log::warning('Failed to convert to ObjectId in update:', ['id' => $id, 'error' => $e->getMessage()]);
                }
            }
            
            // Method 3: Try querying by _id field directly
            if (!$contact) {
                $contact = Contact::where('_id', $id)->first();
            }

            if (!$contact) {
                throw new \Exception('Contact not found 10');
            }

            // Log incoming request data
            Log::info('Contact update request data:', ['id' => $id, 'data' => $request->all()]);

            // Get the actual ID for validation (MongoDB uses _id)
            $actualId = $contact->_id ?? $contact->id;

            // Validation rules
            $validator = Validator::make($request->all(), [
                'contact_name' => 'nullable|string|max:255',
                'mobile_no' => 'required|string|size:10|regex:/^[0-9]{10}$/|unique:contacts,mobile_no,' . $actualId,
                'alt_mobile_no' => 'nullable|string|size:10|regex:/^[0-9]{10}$/',
                'group_id' => 'nullable|exists:groups,id',
                'new_group_name' => 'nullable|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'pincode' => 'nullable|string|size:6|regex:/^[0-9]{6}$/',
                'address_1' => 'required|string|max:500',
                'address_2' => 'nullable|string|max:500',
                'notes' => 'nullable|string|max:1000',
                'status' => 'nullable|boolean'
            ], [
                'mobile_no.size' => 'Mobile number must be exactly 10 digits.',
                'mobile_no.regex' => 'Mobile number must contain only digits.',
                'mobile_no.unique' => 'This mobile number is already registered.',
                'alt_mobile_no.size' => 'Alternate mobile number must be exactly 10 digits.',
                'alt_mobile_no.regex' => 'Alternate mobile number must contain only digits.',
                'pincode.size' => 'Pincode must be exactly 6 digits.',
                'pincode.regex' => 'Pincode must contain only digits.',
                'group_id.exists' => 'Selected group does not exist.',
            ]);

            if ($validator->fails()) {
                Log::warning('Contact update validation failed:', $validator->errors()->toArray());
                
                if ($request->expectsJson() || $request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors(),
                        'message' => 'Validation failed'
                    ], 422);
                }

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Handle new group creation
            $groupId = $request->group_id;
            
            // If new group name is provided, create or find the group
            if ($request->filled('new_group_name')) {
                $groupName = trim($request->new_group_name);
                
                // Check if group with same name already exists
                $existingGroup = Group::where('name', $groupName)->first();
                if ($existingGroup) {
                    $groupId = $existingGroup->id;
                } else {
                    $group = Group::create([
                        'name' => $groupName,
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    $groupId = $group->id;
                    Log::info('New group created during update:', ['id' => $groupId, 'name' => $group->name]);
                }
            }

            // Prepare update data
            $updateData = [
                'name' => trim($request->contact_name),
                'mobile_no' => $request->mobile_no,
                'alt_mobile_no' => $request->alt_mobile_no,
                'group_id' => $groupId,
                'city' => trim($request->city),
                'state' => trim($request->state),
                'pincode' => $request->pincode,
                'address_1' => trim($request->address_1),
                'address_2' => $request->address_2 ? trim($request->address_2) : null,
                'notes' => $request->notes ? trim($request->notes) : null,
                'status' => $request->has('status') ? (bool)$request->status : true,
                'updated_at' => now()
            ];

            Log::info('Attempting to update contact with data:', $updateData);

            // Update contact
            $updated = $contact->update($updateData);

            if (!$updated) {
                throw new \Exception('Failed to update contact record');
            }

            Log::info('Contact updated successfully:', ['id' => $actualId]);

            // DB::commit();

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact updated successfully!',
                    'contact' => $contact->fresh()->load('group'),
                    'redirect' => route('contacts.index')
                ]);
            }

            return redirect()->route('contacts.index')
                ->with('success', 'Contact updated successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            
            Log::error('Contact update error:', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating contact: ' . $e->getMessage(),
                    'errors' => ['general' => [$e->getMessage()]]
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating contact: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id): JsonResponse
    {
        try {
            // Log the deletion attempt
            Log::info("Attempting to delete contact with ID: {$id}");
            
            // Validate the ID format (assuming you're using MongoDB ObjectId or similar)
            if (empty($id) || strlen($id) < 10) {
                Log::warning("Invalid contact ID provided: {$id}");
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid contact ID provided'
                ], 400);
            }
            
            // Find the contact - adjust this based on your model
            // If using Eloquent with auto-incrementing IDs:
            // $contact = Contact::findOrFail($id);
            
            // If using MongoDB or custom IDs:
            $contact = \App\Models\Contact::where('_id', $id)->first();
            
            // Alternative if using a different ID field:
            // $contact = \App\Models\Contact::where('contact_id', $id)->first();
            
            if (!$contact) {
                Log::warning("Contact not found with ID: {$id}");
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found  check1'
                ], 404);
            }
            
           
            
            // Store contact info for logging
            $contactInfo = [
                'id' => $contact->id ?? $contact->_id,
                'name' => $contact->name ?? 'Unknown',
                'email' => $contact->email ?? 'No email'
            ];
            
            // Delete the contact
            $deleted = $contact->delete();
            
            if ($deleted) {
                Log::info("Contact deleted successfully", $contactInfo);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Contact deleted successfully!',
                    'deleted_contact' => $contactInfo
                ], 200);
            } else {
                Log::error("Failed to delete contact", $contactInfo);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete contact. Please try again.'
                ], 500);
            }
            
        } catch (ModelNotFoundException $e) {
            Log::warning("Contact not found (ModelNotFoundException): {$id}", [
                'exception' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Contact not found   chwck2'
            ], 404);
            
        } catch (Exception $e) {
            Log::error("Error deleting contact ID: {$id}", [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Don't expose internal errors in production
            $message = app()->environment('production') 
                ? 'An error occurred while deleting the contact' 
                : 'Error: ' . $e->getMessage();
            
            return response()->json([
                'success' => false,
                'message' => $message,
                'error_code' => 'DELETE_CONTACT_ERROR'
            ], 500);
        }
    }
    
   

    /**
     * Get contacts data for DataTables
     */
    public function getData(Request $request): JsonResponse
    {
        try {
            // Create aggregation pipeline using MongoDB native syntax
            $pipeline = [
                ['$lookup' => [
                    'from' => 'groups',
                    'localField' => 'group_id',
                    'foreignField' => '_id',
                    'as' => 'group'
                ]],
                ['$unwind' => [
                    'path' => '$group',
                    'preserveNullAndEmptyArrays' => true
                ]],
                ['$project' => [
                    'id' => '$_id',
                    'name' => 1,
                    'mobile_no' => 1,
                    'alt_mobile_no' => 1,
                    'city' => 1,
                    'state' => 1,
                    'pincode' => 1,
                    'address_1' => 1,
                    'address_2' => 1,
                    'status' => 1,
                    'group_id' => 1,
                      'group_name' => ['$ifNull' => ['$group.name', 'N/A']], // 

                ]]
            ];

            $query = \App\Models\Contact::raw(function($collection) use ($pipeline) {

                return $collection->aggregate($pipeline);
            });

            return DataTables::collection($query)
                ->addColumn('checkbox', function ($contact) {
                    return '<label class="checkboxs">
                        <input type="checkbox" value="' . $contact['_id'] . '">
                        <span class="checkmarks"></span>
                    </label>';
                })
                ->addColumn('group', function ($contact) {
                    return $contact['group_name'] ?? 'N/A';
                })
                ->addColumn('address', function ($contact) {
                    $address = $contact['address_1'] ?? '';
                    if (!empty($contact['address_2'])) {
                        $address .= ', ' . $contact['address_2'];
                    }
                    return strlen($address) > 50 ? htmlspecialchars(substr($address, 0, 50)) . '...' : htmlspecialchars($address);
                })
                ->addColumn('status', function ($contact) {
                    $status = $contact['status'] ?? false;
                    $statusClass = $status ? 'success' : 'danger';
                    $statusText = $status ? 'Active' : 'Inactive';
                    return '<span class="badge bg-' . $statusClass . '">' . $statusText . '</span>';
                })
                ->addColumn('action', function ($contact) {
                    return '
                        <div class="dropdown table-action">
                            <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editContact(\'' . $contact['_id'] . '\')">
                                    <i class="ti ti-edit me-2"></i>Edit
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteContact(\'' . $contact['_id'] . '\')">
                                    <i class="ti ti-trash me-2"></i>Delete
                                </a>
                            </div>
                        </div>';
                })
                ->rawColumns(['checkbox', 'status', 'action'])
                ->make(true);

        } catch (\Exception $e) {
            Log::error('DataTables error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Error fetching data: ' . $e->getMessage(),
                'draw' => $request->get('draw', 1),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ], 500);
        }
    }

    /**
     * Show grid view of contacts
     */
    public function grid()
    {
        try {
            $groups = Group::where('status', 1)->orderBy('name')->get();
            return view('contacts.grid', compact('groups'));
        } catch (\Exception $e) {
            Log::error('Contact grid error:', ['message' => $e->getMessage()]);
            return view('contacts.grid', ['groups' => collect()]);
        }
    }

    /**
     * Export contacts to PDF
     */
    public function exportPdf(Request $request)
    {
        try {
            $query = Contact::with('group');

            // If specific contacts are selected
            if ($request->has('selected_ids') && !empty($request->selected_ids)) {
                $selectedIds = is_string($request->selected_ids) 
                    ? json_decode($request->selected_ids, true) 
                    : $request->selected_ids;
                
                if (is_array($selectedIds) && !empty($selectedIds)) {
                    $query->whereIn('id', $selectedIds);
                }
            }

            $contacts = $query->orderBy('name')->get();

            if ($contacts->isEmpty()) {
                return redirect()->back()->with('warning', 'No contacts found to export.');
            }

            $pdf = Pdf::loadView('contacts.exports.pdf', compact('contacts'));
            
            return $pdf->download('contacts-' . date('Y-m-d') . '.pdf');

        } catch (\Exception $e) {
            Log::error('PDF export error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error exporting PDF: ' . $e->getMessage());
        }
    }

    /**
     * Export contacts to Excel
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
                new ContactsExport($selectedIds), 
                'contacts-' . date('Y-m-d') . '.xlsx'
            );

        } catch (\Exception $e) {
            Log::error('Excel export error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Error exporting Excel: ' . $e->getMessage());
        }
    }
    
    public function bulkDelete(Request $request)
    {
      
        try {

            $contactIds = $request->get('contact_ids', []);
            
            if (empty($contactIds)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No contact selected for deletion.'
                ], 400);
            }

            // Convert string IDs to MongoDB ObjectIds if needed
            $objectIds = array_map(function($id) {
                if (strlen($id) === 24 && ctype_xdigit($id)) {
                    
                    return new \MongoDB\BSON\ObjectId($id);
                }
                return $id;
            }, $contactIds);

            $deletedCount = Contact::whereIn('_id', $objectIds)->delete();

            return response()->json([
                'success' => true,
                'message' => "Successfully deleted {$deletedCount} contact(s)."
            ]);

        } catch (\Exception $e) {
            Log::error('Error in ContactController@bulkDelete: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error deleting contact: ' . $e->getMessage()
            ], 500);
        }
    }

   

}



