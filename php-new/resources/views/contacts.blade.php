<?php $page = 'contacts'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

                    @component('components.breadcrumb')
                        @slot('title')
                            Contacts
                        @endslot
                        @slot('item1')
                            Dashboard
                        @endslot
                        @slot('item2')
                            contacts
                        @endslot
                    @endcomponent

                    <div class="card">
						<div class="card-header">
							<!-- Search -->
							<div class="row align-items-center">
								<div class="col-sm-4">
									<div class="icon-form mb-3 mb-sm-0">
										<span class="form-icon"><i class="ti ti-search"></i></span>
										<input type="text" class="form-control" id="global-search" placeholder="Search Contacts">
									</div>							
								</div>		
								<div class="col-sm-8">	
                                     <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                    <!-- Bulk Actions - Hidden by default, shown when items are selected -->
                                    <div class="bulk-actions me-2" id="bulk-actions" >
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" class="btn btn-danger" id="bulk-delete-btn" style="display:none">
                                                <i class="ti ti-trash"></i> Delete Selected
                                            </button>
                                            <!-- <span class="text-muted small" id="selection-count">0 items selected</span> -->
                                        </div>
                                    </div>

									<div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
										<div class="dropdown me-2">
											<a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
											<div class="dropdown-menu dropdown-menu-end">
												<ul>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" onclick="exportContacts('pdf')"><i class="ti ti-file-type-pdf text-danger me-1"></i>Export as PDF</a>
													</li>
													<li>
														<a href="javascript:void(0);" class="dropdown-item" onclick="exportContacts('excel')"><i class="ti ti-file-type-xls text-green me-1"></i>Export as Excel </a>
													</li>
												</ul>
											</div>
										</div>	
                                         <!-- Import Button -->
                                    <button type="button" class="btn btn-outline-primary me-2" id="importContactsBtn" >
                                        <i class="ti ti-upload me-2"></i>Import
                                    </button>
                                        <!-- Add Group Button -->
                                        <button type="button" class="btn btn-outline-primary rounded-pill shadow-sm me-2" data-bs-toggle="modal" data-bs-target="#addGroupModal">
                                            <i class="ti ti-plus me-2"></i>Add Group
                                        </button> 

										
										<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add1"><i class="ti ti-square-rounded-plus me-2"></i>Add Contacts</a>
									</div>
								</div>
							</div>
                            
							<!-- /Search -->
						</div>
						<div class="card-body">
							<!-- Contact List -->
							<div class="table-responsive custom-table">
								<table class="table" id="contactsTable">
									<thead class="thead-light">
										<tr>
											<th class="no-sort">
												<label class="checkboxs"><input type="checkbox" id="select-all"><span class="checkmarks"></span></label>
											</th>
											<th>Name</th>
											<th>Mobile No</th>
											<th>Alt Mobile</th>
											<th>Group</th>
											<th>City</th>
											<th>State</th>
											<th>Pincode</th>
											<th>Address</th>
											<th>Status</th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
										<!-- Data will be populated via AJAX -->
									</tbody>
								</table>
							</div>
							<!-- /Contact List -->
						</div>
					</div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Add Group Modal -->
    <div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="addGroupForm" method="POST" action="{{ route('groups.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGroupModalLabel">Add New Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="groupName" class="form-label">Group Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="groupName" name="group_name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Group</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Group Modal -->
    <div class="modal fade" id="editGroupModal" tabindex="-1" aria-labelledby="editGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editGroupForm" method="POST">
                @csrf
                <!-- @method('PUT') -->
                <input type="hidden" id="editGroupId" name="group_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGroupModalLabel">Edit Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editGroupName" class="form-label">Group Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editGroupName" name="group_name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Group</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <!-- Delete Group Modal -->
    <div class="modal fade" id="deleteGroupModal" tabindex="-1" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteGroupModalLabel">Delete Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this group? All contacts in this group will be unassigned.</p>
                    <input type="hidden" id="deleteGroupId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteGroup">Delete Group</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Delete Confirmation Modal -->
<div class="modal fade" id="bulk-delete-modal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkDeleteModalLabel">Confirm Bulk Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected contacts? This action cannot be undone.</p>
                <div class="alert alert-warning">
                    <i class="ti ti-alert-triangle"></i>
                    <span id="bulk-delete-count">0</span> contacts will be permanently deleted.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-bulk-delete">
                    <i class="ti ti-trash"></i> Delete Contacts
                </button>
            </div>
        </div>
    </div>
</div>

    <!-- Delete Contact Modal -->
    <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContactModalLabel">Delete Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this contact? This action cannot be undone.</p>
                    <input type="hidden" id="deleteContactId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteContact">Delete Contact</button>
                </div>
            </div>
        </div>
    </div>




    

    <!-- Add Contact Offcanvas -->
   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_add1" style="margin-left:50%">

        <div class="offcanvas-header">
            <h4 id="offcanvas_add_label">Add New Contact</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form id="contactForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                <input type="hidden" name="contact_id" id="contact_id" value="">
                <div class="row">
                    <!-- Name Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="contact_name" id="name" placeholder="Enter full name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Mobile No Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Mobile No <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter mobile number" pattern="[0-9]{10}" required>
                            <div class="invalid-feedback"></div>
                            <small class="text-muted">Enter 10 digit mobile number</small>
                        </div>
                    </div>

                    <!-- Alt Mobile No Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Alt. Mobile No</label>
                            <input type="tel" class="form-control" name="alt_mobile_no" id="alt_mobile_no" placeholder="Enter alternate mobile number" pattern="[0-9]{10}">
                            <div class="invalid-feedback"></div>
                            <small class="text-muted">Enter 10 digit mobile number (optional)</small>
                        </div>
                    </div>

                    <!-- Group Field with Management -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">Group <span class="text-danger">*</span></label>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="refreshGroups()" title="Refresh Groups">
                                        <i class="ti ti-refresh"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGroupModal" title="Add New Group">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- <label class="form-label">Contact Group *</label> -->
                                                    <select name="group_id" id="group_id" class="form-control">
                            <option value="">-- Select Group --</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                            <div class="invalid-feedback">Please select a group.</div>
                        </div>
                    </div>

                    <!-- City Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- State Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select class="form-select" name="state" id="state" required>
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Pincode Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Pincode</label>
                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter pincode" pattern="[0-9]{6}" maxlength="6">
                            <div class="invalid-feedback"></div>
                            <small class="text-muted">Enter 6 digit pincode (optional)</small>
                        </div>
                    </div>

                    <!-- Address 1 Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Address 1 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address_1" id="address_1" placeholder="Enter primary address" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Address 2 Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Address 2</label>
                            <input type="text" class="form-control" name="address_2" id="address_2" placeholder="Enter secondary address (optional)">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Notes/Description Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Notes/Description</label>
                            <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Enter any additional notes or description"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!-- Status Field -->
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Contact</button>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="importContactsModal" tabindex="-1" aria-labelledby="importContactsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importContactsModalLabel">
                    <i class="ti ti-upload me-2"></i>Import Contacts
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="importContactsForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <div class="alert alert-info">
                            <i class="ti ti-info-circle me-2"></i>
                            <strong>Import Instructions:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Please use the provided template for importing contacts</li>
                                <li>Supported formats: Excel (.xlsx, .xls), CSV (.csv)</li>
                                <li>Maximum file size: 10MB</li>
                                <li>Ensure all required fields are filled</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="importFile" class="form-label">Select File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="importFile" name="import_file" accept=".xlsx,.xls,.csv" required>
                        <div class="invalid-feedback">Please select a file to import.</div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="skipDuplicates" name="skip_duplicates" checked>
                            <label class="form-check-label" for="skipDuplicates">
                                Skip duplicate entries (based on mobile number)
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <a href="{{ url('contacts/download-template') }}" class="btn btn-outline-primary">
                            <i class="ti ti-download me-1"></i>Download Template
                        </a>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="ti ti-x me-1"></i>Cancel
                        </button>
                        <button type="submit" id="importContactsFormbtn" class="btn btn-primary">
                            <i class="ti ti-upload me-1"></i>Import Contacts
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- /Add Contact Offcanvas -->

    <script>
        // Global variables
        let contactsTable;
        let isEditing = false;
        let editingContactId = null;

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeDataTable();
            initializeFormHandlers();
            initializeEventListeners();
            initializeDeleteModal();
            initializeGroupModal();
            loadGroups();
             // Load groups on page load
        });

        // Initialize DataTable
        function initializeDataTable() {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#contactsTable')) {
                $('#contactsTable').DataTable().destroy();
            }

            contactsTable = $('#contactsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('contacts.data') }}",
                    type: 'GET',
                    error: function(xhr, error, thrown) {
                        console.error('DataTable Ajax Error:', error, thrown);
                        showToast('error', 'Error loading data. Please refresh the page.');
                    }
                },
                columns: [
                    { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'mobile_no', name: 'mobile_no' },
                    { data: 'alt_mobile_no', name: 'alt_mobile_no' },
                    { data: 'group_id', name: 'group.name' },
                    { data: 'city', name: 'city' },
                    { data: 'state', name: 'state' },
                    { data: 'pincode', name: 'pincode' },
                    { data: 'address', name: 'address' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                pageLength: 10,
                responsive: true,
                order: [[1, 'asc']],
                language: {
                    search: "",
                    searchPlaceholder: "Search contacts...",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _TOTAL_ total entries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                },
                drawCallback: function() {
                    // Re-initialize checkboxes after table redraw
                    initializeCheckboxes();
                    // Re-initialize feather icons
                    if (typeof feather !== 'undefined') {
                        feather.replace();
                    }
                }
            });
        }

        // Refresh groups
        function refreshGroups() {
            loadGroups();
            showToast('success', 'Groups refreshed');
        }  

        // Initialize group modal handlers
        function initializeGroupModal() {
            // Add Group Form Submission
            const addGroupForm = document.getElementById('addGroupForm');
            if (addGroupForm) {
                addGroupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.textContent;
                    
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('success', data.message || 'Group added successfully!');
                            bootstrap.Modal.getInstance(document.getElementById('addGroupModal')).hide();
                            loadGroups(); // Refresh groups dropdown
                            this.reset(); // Reset form
                        } else {
                            if (data.errors) {
                                Object.keys(data.errors).forEach(field => {
                                    const input = this.querySelector(`[name="${field}"]`);
                                    if (input) {
                                        input.classList.add('is-invalid');
                                        const feedback = input.nextElementSibling;
                                        if (feedback && feedback.classList.contains('invalid-feedback')) {
                                            feedback.textContent = data.errors[field][0];
                                        }
                                    }
                                });
                            }
                            showToast('error', data.message || 'Please fix the validation errors');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('error', 'Error adding group. Please try again.');
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.textContent = originalText;
                    });
                });
            }

            // Edit Group Form Submission
            const editGroupForm = document.getElementById('editGroupForm');
            if (editGroupForm) {
                editGroupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const groupId = document.getElementById('editGroupId').value;
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalText = submitButton.textContent;
                    
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';
                    
                    fetch(`/groups/${groupId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('success', data.message || 'Group updated successfully!');
                            bootstrap.Modal.getInstance(document.getElementById('editGroupModal')).hide();
                            loadGroups(); // Refresh groups dropdown
                            if (contactsTable) {
                                contactsTable.ajax.reload(); // Refresh contacts table
                            }
                        } else {
                            if (data.errors) {
                                Object.keys(data.errors).forEach(field => {
                                    const input = this.querySelector(`[name="${field}"]`);
                                    if (input) {
                                        input.classList.add('is-invalid');
                                        const feedback = input.nextElementSibling;
                                        if (feedback && feedback.classList.contains('invalid-feedback')) {
                                            feedback.textContent = data.errors[field][0];
                                        }
                                    }
                                });
                            }
                            showToast('error', data.message || 'Please fix the validation errors');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('error', 'Error updating group. Please try again.');
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.textContent = originalText;
                    });
                });
            }

            // Confirm Delete Group
            const confirmDeleteGroupBtn = document.getElementById('confirmDeleteGroup');
            if (confirmDeleteGroupBtn) {
                confirmDeleteGroupBtn.addEventListener('click', function() {
                    const groupId = document.getElementById('deleteGroupId').value;
                    
                    const originalText = this.textContent;
                    this.disabled = true;
                    this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Deleting...';
                    
                    fetch(`/groups/${groupId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showToast('success', data.message || 'Group deleted successfully!');
                            bootstrap.Modal.getInstance(document.getElementById('deleteGroupModal')).hide();
                            loadGroups(); // Refresh groups dropdown
                            if (contactsTable) {
                                contactsTable.ajax.reload(); // Refresh contacts table
                            }
                        } else {
                            showToast('error', data.message || 'Error deleting group');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('error', 'Error deleting group. Please try again.');
                    })
                    .finally(() => {
                        this.disabled = false;
                        this.textContent = originalText;
                    });
                });
            }
        }



        // Import Contacts Button
$('#importContactsBtn').on('click', function() {
    var importModal = new bootstrap.Modal(document.getElementById('importContactsModal'));
    importModal.show();
});

// Import Contacts Button Click (alternative)
$('#importContactsBtn').on('click', function() {
    $('#importContactsModal').modal('show');
});

// Start Import Button Click
$('#startImport').on('click', function() {
    var formData = new FormData($('#importContactsForm')[0]);

    if (!$('#importFile')[0].files.length) {
        showAlert('Please select a file to import.', 'error');
        return;
    }

    $.ajax({
        url: '{{ url("contacts/import") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#startImport').prop('disabled', true).html('<i class="spinner-border spinner-border-sm me-1"></i>Importing...');
        },
        success: function(response) {
            if (response.success) {
                showAlert(response.message, 'success');
                $('#importContactsModal').modal('hide');
                setTimeout(function() {
                    location.reload();
                }, 1500);
            } else {
                showAlert(response.message || 'Import failed', 'error');
            }
        },
        error: function(xhr) {
            var errorMsg = 'Import failed';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
            }
            showAlert(errorMsg, 'error');
        },
        complete: function() {
            $('#startImport').prop('disabled', false).html('<i class="ti ti-upload me-1"></i>Start Import');
        }
    });
});

        // Initialize form handlers
        function initializeFormHandlers() {
            const form = document.getElementById('contactForm');
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                submitForm();
            });

            // Real-time validation for mobile numbers
            const mobileInputs = [document.getElementById('mobile_no'), document.getElementById('alt_mobile_no')];
            mobileInputs.forEach(input => {
                if (input) {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                        if (this.value.length > 10) {
                            this.value = this.value.slice(0, 10);
                        }
                        validateMobileInput(this);
                    });
                }
            });

            // Real-time validation for pincode
            const pincodeInput = document.getElementById('pincode');
            if (pincodeInput) {
                pincodeInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    if (this.value.length > 6) {
                        this.value = this.value.slice(0, 6);
                    }
                    validatePincodeInput(this);
                });
            }
        }

        // Initialize event listeners
        function initializeEventListeners() {
           // Global search
            const globalSearch = document.getElementById('global-search');
            if (globalSearch) {
                globalSearch.addEventListener('keyup', function() {
                    if (contactsTable) {
                        contactsTable.search(this.value).draw();
                    }
                });
            }

            // Reset form when offcanvas is hidden
            const offcanvas = document.getElementById('offcanvas_add1');
            if (offcanvas) {
                offcanvas.addEventListener('hidden.bs.offcanvas', function() {
                    resetForm();
                });
            }

            // Clear validation errors when modal is shown
            ['addGroupModal', 'editGroupModal'].forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.addEventListener('shown.bs.modal', function() {
                        // Clear validation errors
                        const form = this.querySelector('form');
                        if (form) {
                            clearValidationErrors(form);
                        }
                    });
                }
            });
        }

  
    function initializeDeleteModal() {
        const confirmDeleteBtn = document.getElementById('confirmDeleteContact');

        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', function () {
                const contactId = document.getElementById('deleteContactId').value;
                const deleteButton = this;
                const originalText = deleteButton.innerHTML;

                // Show loading state
                deleteButton.disabled = true;
                deleteButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Deleting...';

                // Perform DELETE request
                fetch(`/contacts/${contactId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success toast
                        showToast('success', data.message || 'Contact deleted successfully!');

                        // Hide the modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteContactModal'));
                        if (modal) modal.hide();

                        // Reload DataTable without resetting page
                        if (window.contactsTable) {
                            contactsTable.ajax.reload(null, false); // false => retain current page
                        }
                    } else {
                        // Show error toast
                        showToast('error', data.message || 'Error deleting contact');
                    }
                })
                .catch(error => {
                    console.error('Delete Error:', error);
                    showToast('error', 'Error deleting contact. Please try again.');
                })
                .finally(() => {
                    // Re-enable the button and restore original text
                    deleteButton.disabled = false;
                    deleteButton.innerHTML = originalText;
                });
            });
        }
    }

    // Call this once your DOM and DataTable are loaded
    document.addEventListener('DOMContentLoaded', function () {
        initializeDeleteModal();
    });


        function loadGroups() {
    console.log('Loading groups...');
    $.ajax({
        url: '/contacts/contact-groups',
        method: 'GET',
        timeout: 10000,
        success: function(response) {
            console.log('Groups response:', response);
            let options = '<option value="">Select Group</option>';
            if (response && response.success && response.data && Array.isArray(response.data)) {
                response.data.forEach(function(group) {
                    options += `<option value="${group.id}">${escapeHtml(group.name)} (${group.contacts_count || 0} contacts)</option>`;
                });
            }
            $('#groupSelect').html(options);
        },
        error: function(xhr, status, error) {
            console.error('Failed to load groups:', {xhr, status, error});
            $('#groupSelect').html('<option value="">Error loading groups</option>');
        }
    });
}

        // Initialize checkboxes
        function initializeCheckboxes() {
            const selectAllCheckbox = document.getElementById('select-all');
            const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
            
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    toggleBulkDeleteButton();
                });
            }

            // Individual checkbox event listeners
            document.addEventListener('change', function(e) {
                if (e.target.matches('tbody input[type="checkbox"]')) {
                    toggleBulkDeleteButton();
                    updateSelectAllCheckbox();
                }
            });

            // Bulk delete button
            if (bulkDeleteBtn) {
                bulkDeleteBtn.addEventListener('click', function() {
                    const selectedIds = getSelectedContactIds();
                    if (selectedIds.length > 0) {
                        if (confirm(`Are you sure you want to delete ${selectedIds.length} selected contact(s)?`)) {
                            bulkDeleteContacts(selectedIds);
                        }
                    }
                });
            }
        }

        // Toggle bulk delete button visibility
        function toggleBulkDeleteButton() {
            const selectedCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
            
            if (bulkDeleteBtn) {
                if (selectedCheckboxes.length > 0) {
                    bulkDeleteBtn.style.display = 'inline-block';
                } else {
                    bulkDeleteBtn.style.display = 'none';
                }
            }
        }

        // Update select all checkbox state
        function updateSelectAllCheckbox() {
            const selectAllCheckbox = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            const checkedCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            
            if (selectAllCheckbox && checkboxes.length > 0) {
                if (checkedCheckboxes.length === checkboxes.length) {
                    selectAllCheckbox.checked = true;
                    selectAllCheckbox.indeterminate = false;
                } else if (checkedCheckboxes.length > 0) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = true;
                } else {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = false;
                }
            }
        }

        // Get selected contact IDs
        function getSelectedContactIds() {
            const selectedCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            const ids = [];
            selectedCheckboxes.forEach(checkbox => {
                ids.push(checkbox.value);
            });
            return ids;
        }

        // Bulk delete contacts
        function bulkDeleteContacts(contactIds) {
            const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
            const originalText = bulkDeleteBtn.innerHTML;
            
            bulkDeleteBtn.disabled = true;
            bulkDeleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Deleting...';
            
            fetch('/contacts/bulk-delete', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ contact_ids: contactIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('success', data.message || `${contactIds.length} contact(s) deleted successfully!`);
                    contactsTable.ajax.reload();
                    document.getElementById('select-all').checked = false;
                } else {
                    showToast('error', data.message || 'Error deleting contacts');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Error deleting contacts. Please try again.');
            })
            .finally(() => {
                bulkDeleteBtn.disabled = false;
                bulkDeleteBtn.innerHTML = originalText;
                bulkDeleteBtn.style.display = 'none';
            });
        }

        // Submit form
        function submitForm() {
            const form = document.getElementById('contactForm');
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Clear previous validation errors
            clearValidationErrors(form);
            
            // Disable submit button and show loading
            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
            
            const url = isEditing ? `/contacts/${editingContactId}` : '/contacts';
            const met = isEditing ? 'PUT' : 'POST';
            
            if (isEditing) {
                formData.append('_method', 'PUT');
            }
            
            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('success', data.message || (isEditing ? 'Contact updated successfully!' : 'Contact added successfully!'));
                    bootstrap.Offcanvas.getInstance(document.getElementById('offcanvas_add1')).hide();
                    contactsTable.ajax.reload();
                    resetForm();
                } else {
                    if (data.errors) {
                        displayValidationErrors(form, data.errors);
                    }
                    showToast('error', data.message || 'Please fix the validation errors');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Error saving contact. Please try again.');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            });
        }

        // Edit contact function (called from table actions)
        function editContact(contactId) {
            fetch(`/contacts/${contactId}/edit`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.contact) {
                    populateForm(data.contact);
                    isEditing = true;
                    editingContactId = contactId;
                    
                    // Update form title and button
                    document.getElementById('offcanvas_add_label').textContent = 'Edit Contact';
                    document.querySelector('#contactForm button[type="submit"]').textContent = 'Update Contact';
                    
                    // Show offcanvas
                    const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvas_add1'));
                    offcanvas.show();
                } else {
                    showToast('error', data.message || 'Error loading contact data');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Error loading contact data. Please try again.');
            });
        }

 function setupDeleteContactButtons() {
    // Use event delegation for dynamically loaded buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-contact-btn') || e.target.closest('.delete-contact-btn')) {
            e.preventDefault();
            const btn = e.target.classList.contains('delete-contact-btn') ? e.target : e.target.closest('.delete-contact-btn');
            const contactId = btn.getAttribute('data-contact-id') || btn.dataset.contactId;
            
            console.log('Delete button clicked for contact ID:', contactId);
            
            if (!contactId) {
                console.error('Contact ID not found on delete button');
                showToast('error', 'Contact ID not found');
                return;
            }
            
            // Store contact ID for deletion
            const confirmDeleteBtn = document.getElementById('confirmDeleteContact');
            if (confirmDeleteBtn) {
                confirmDeleteBtn.setAttribute('data-contact-id', contactId);
            }
            
            // Show modal
            const modalElement = document.getElementById('delete_contact');
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            } else {
                console.error('Delete modal not found');
                showToast('error', 'Delete confirmation modal not found');
            }
        }
    });
    
    console.log('Delete contact buttons listener attached with event delegation');
}

function setupConfirmDeleteContactButton() {
    const confirmDeleteBtn = document.getElementById('confirmDeleteContact');
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function() {
            const contactId = this.getAttribute('data-contact-id');
            console.log('Confirm delete clicked for contact ID:', contactId);
            
            if (!contactId) {
                console.error('No contact ID found for deletion');
                showToast('error', 'No contact selected for deletion');
                return;
            }
            
            // Show loading state
            const originalText = this.textContent;
            this.disabled = true;
            this.textContent = 'Deleting...';
            
            // Enhanced AJAX request with better error handling
            $.ajax({
                url: '/contacts/' + contactId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                timeout: 30000, // 30 second timeout
                success: function(response) {
                    console.log('Delete response:', response);
                    
                    // Reset button state
                    confirmDeleteBtn.disabled = false;
                    confirmDeleteBtn.textContent = originalText;
                    
                    if (response.success) {
                        // Hide modal
                        const modalElement = document.getElementById('delete_contact');
                        if (modalElement) {
                            const modal = bootstrap.Modal.getInstance(modalElement);
                            if (modal) {
                                modal.hide();
                            }
                        }
                        
                        showToast('success', response.message || 'Contact deleted successfully!');
                        
                        // Reload DataTable if it exists, otherwise reload page
                        if (typeof window.contactsTable !== 'undefined' && window.contactsTable) {
                            setTimeout(() => {
                                window.contactsTable.ajax.reload(null, false); // false = don't reset paging
                            }, 1500);
                        } else {
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    } else {
                        showToast('error', response.message || 'Failed to delete contact');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Delete contact error details:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error,
                        readyState: xhr.readyState,
                        contactId: contactId
                    });
                    
                    // Reset button state
                    confirmDeleteBtn.disabled = false;
                    confirmDeleteBtn.textContent = originalText;
                    
                    // Enhanced error message handling
                    let errorMessage = 'An error occurred while deleting the contact';
                    
                    // Handle different error scenarios
                    if (xhr.status === 0) {
                        errorMessage = 'Network error. Please check your internet connection.';
                    } else if (xhr.status === 404) {
                        errorMessage = 'Contact not found. It may have already been deleted.';
                    } else if (xhr.status === 403) {
                        errorMessage = 'You do not have permission to delete this contact.';
                    } else if (xhr.status === 422) {
                        errorMessage = 'Invalid request. Please try again.';
                    } else if (xhr.status === 500) {
                        errorMessage = 'Server error. Please try again later.';
                    } else if (status === 'timeout') {
                        errorMessage = 'Request timed out. Please try again.';
                    } else {
                        // Try to parse JSON error response
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message) {
                                errorMessage = response.message;
                            } else if (response.error) {
                                errorMessage = response.error;
                            } else if (response.errors) {
                                // Handle Laravel validation errors
                                if (typeof response.errors === 'object') {
                                    const firstError = Object.values(response.errors)[0];
                                    if (Array.isArray(firstError)) {
                                        errorMessage = firstError[0];
                                    } else {
                                        errorMessage = firstError;
                                    }
                                } else {
                                    errorMessage = response.errors;
                                }
                            }
                        } catch (e) {
                            console.warn('Could not parse error response as JSON:', e);
                            // If we can't parse JSON, check if there's readable text
                            if (xhr.responseText && xhr.responseText.length < 200) {
                                errorMessage = xhr.responseText;
                            }
                        }
                    }
                    
                    showToast('error', errorMessage);
                }
            });
        });
        console.log('Confirm delete contact button listener attached');
    } else {
        console.warn('Confirm delete contact button not found');
    }
}

// Enhanced legacy function for backward compatibility
function deleteContact(contactId) {
    console.warn('deleteContact() function is deprecated. Use the modal-based deletion instead.');
    
    if (!contactId) {
        showToast('error', 'Contact ID is required');
        return;
    }
    
    if (confirm('Are you sure you want to delete this contact?')) {
        $.ajax({
            url: '/contacts/' + contactId,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            timeout: 30000,
            success: function(response) {
                console.log('Delete response:', response);
                
                if (response.success) {
                    showToast('success', response.message || 'Contact deleted successfully!');
                    
                    // Reload DataTable if it exists
                    if (typeof window.contactsTable !== 'undefined' && window.contactsTable) {
                        window.contactsTable.ajax.reload(null, false);
                    } else {
                        // Reload page after a short delay
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }
                } else {
                    showToast('error', response.message || 'Error deleting contact');
                }
            },
            error: function(xhr, status, error) {
                console.error('Delete contact error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: xhr.responseText,
                    error: error,
                    contactId: contactId
                });
                
                // Same enhanced error handling as above
                let errorMessage = 'An error occurred while deleting the contact';
                
                if (xhr.status === 0) {
                    errorMessage = 'Network error. Please check your internet connection.';
                } else if (xhr.status === 404) {
                    errorMessage = 'Contact not found. It may have already been deleted.';
                } else if (xhr.status === 403) {
                    errorMessage = 'You do not have permission to delete this contact.';
                } else if (xhr.status === 422) {
                    errorMessage = 'Invalid request. Please try again.';
                } else if (xhr.status === 500) {
                    errorMessage = 'Server error. Please try again later.';
                } else if (status === 'timeout') {
                    errorMessage = 'Request timed out. Please try again.';
                } else {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            errorMessage = response.message;
                        } else if (response.error) {
                            errorMessage = response.error;
                        } else if (response.errors) {
                            if (typeof response.errors === 'object') {
                                const firstError = Object.values(response.errors)[0];
                                if (Array.isArray(firstError)) {
                                    errorMessage = firstError[0];
                                } else {
                                    errorMessage = firstError;
                                }
                            } else {
                                errorMessage = response.errors;
                            }
                        }
                    } catch (e) {
                        if (xhr.responseText && xhr.responseText.length < 200) {
                            errorMessage = xhr.responseText;
                        }
                    }
                }
                
                showToast('error', errorMessage);
            }
        });
    }
}

// Utility function to check if required elements exist
function checkRequiredElements() {
    const issues = [];
    
    // Check for CSRF token
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    if (!csrfToken) {
        issues.push('CSRF token meta tag not found');
    }
    
    // Check for modal
    const modal = document.getElementById('delete_contact');
    if (!modal) {
        issues.push('Delete confirmation modal (#delete_contact) not found');
    }
    
    // Check for confirm button
    const confirmBtn = document.getElementById('confirmDeleteContact');
    if (!confirmBtn) {
        issues.push('Confirm delete button (#confirmDeleteContact) not found');
    }
    
    // Check for showToast function
    if (typeof showToast !== 'function') {
        issues.push('showToast function not defined');
    }
    
    if (issues.length > 0) {
        console.warn('Contact delete setup issues found:', issues);
        return false;
    }
    
    return true;
}

// Initialize the delete functionality when DOM is ready
$(document).ready(function() {
    console.log('Initializing contact delete functionality...');
    
    // Check for required elements
    if (checkRequiredElements()) {
        setupDeleteContactButtons();
        setupConfirmDeleteContactButton();
        console.log('Contact delete functionality initialized successfully');
    } else {
        console.error('Contact delete functionality initialization failed due to missing elements');
    }
});

// Alternative initialization for vanilla JS
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - initializing contact delete functionality...');
    
    // Small delay to ensure jQuery and Bootstrap are loaded
    setTimeout(() => {
        if (checkRequiredElements()) {
            setupDeleteContactButtons();
            setupConfirmDeleteContactButton();
            console.log('Contact delete functionality initialized successfully (vanilla JS)');
        } else {
            console.error('Contact delete functionality initialization failed (vanilla JS)');
        }
    }, 100);
});

// Toast notification function (you can customize this based on your notification system)
function showToast(type, message) {
    // Example using a simple alert (replace with your preferred notification system)
    if (type === 'success') {
        alert('Success: ' + message);
    } else {
        alert('Error: ' + message);
    }
    
    // Or if you're using a toast library like Toastr:
    // toastr[type](message);
    
    // Or if you're using SweetAlert:
    // Swal.fire({
    //     title: type === 'success' ? 'Success!' : 'Error!',
    //     text: message,
    //     icon: type === 'success' ? 'success' : 'error'
    // });
}
        // Edit group function (called from table actions)
        // function editGroup(groupId) {
        //     fetch(`/groups/${groupId}/edit`, {
        //         method: 'GET',
        //         headers: {
        //             'X-Requested-With': 'XMLHttpRequest',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.success && data.group) {
        //             document.getElementById('editGroupId').value = data.group.id;
        //             document.getElementById('editGroupName').value = data.group.name;
                    
        //             const modal = new bootstrap.Modal(document.getElementById('editGroupModal'));
        //             modal.show();
        //         } else {
        //             showToast('error', data.message || 'Error loading group data');
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //         showToast('error', 'Error loading group data. Please try again.');
        //     });
        // }

        // Delete group function (called from table actions)
        function deleteGroup(groupId) {
            document.getElementById('deleteGroupId').value = groupId;
            const modal = new bootstrap.Modal(document.getElementById('deleteGroupModal'));
            modal.show();
        }

        // Populate form with contact data
        function populateForm(contact) {
            document.getElementById('contact_id').value = contact.id;
            document.getElementById('name').value = contact.name || '';
            document.getElementById('mobile_no').value = contact.mobile_no || '';
            document.getElementById('alt_mobile_no').value = contact.alt_mobile_no || '';
            document.getElementById('group_id').value = contact.group_id || '';
            document.getElementById('city').value = contact.city || '';
            document.getElementById('state').value = contact.state || '';
            document.getElementById('pincode').value = contact.pincode || '';
            document.getElementById('address_1').value = contact.address_1 || '';
            document.getElementById('address_2').value = contact.address_2 || '';
            document.getElementById('notes').value = contact.notes || '';
            document.getElementById('status').value = contact.status !== undefined ? contact.status : '1';
        }

        // Reset form
        function resetForm() {
            const form = document.getElementById('contactForm');
            form.reset();
            clearValidationErrors(form);
            
            // Reset form state
            isEditing = false;
            editingContactId = null;
            
            // Reset form title and button
            document.getElementById('offcanvas_add_label').textContent = 'Add New Contact';
            document.querySelector('#contactForm button[type="submit"]').textContent = 'Save Contact';
            document.getElementById('form-method').value = 'POST';
            document.getElementById('contact_id').value = '';
        }

        // Clear validation errors
        function clearValidationErrors(form) {
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            const feedbacks = form.querySelectorAll('.invalid-feedback');
            feedbacks.forEach(feedback => {
                feedback.textContent = '';
            });
        }

        // Display validation errors
        function displayValidationErrors(form, errors) {
            Object.keys(errors).forEach(field => {
                const input = form.querySelector(`[name="${field}"]`);
                if (input) {
                    input.classList.add('is-invalid');
                    const feedback = input.parentNode.querySelector('.invalid-feedback');
                    if (feedback) {
                        feedback.textContent = errors[field][0];
                    }
                }
            });
        }

        // Validate mobile input
        function validateMobileInput(input) {
            const value = input.value;
            const isRequired = input.hasAttribute('required');
            
            input.classList.remove('is-invalid', 'is-valid');
            
            if (isRequired && !value) {
                input.classList.add('is-invalid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = 'Mobile number is required';
                }
            } else if (value && (value.length !== 10 || !/^[0-9]+$/.test(value))) {
                input.classList.add('is-invalid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = 'Please enter a valid 10-digit mobile number';
                }
            } else if (value) {
                input.classList.add('is-valid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = '';
                }
            }
        }

        // Validate pincode input
        function validatePincodeInput(input) {
            const value = input.value;
            
            input.classList.remove('is-invalid', 'is-valid');
            
            if (value && (value.length !== 6 || !/^[0-9]+$/.test(value))) {
                input.classList.add('is-invalid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = 'Please enter a valid 6-digit pincode';
                }
            } else if (value) {
                input.classList.add('is-valid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = '';
                }
            }
        }

        // Export contacts
        function exportContacts(format) {
            const url = `/contacts/export?format=${format}`;
            
            // Show loading toast
            showToast('info', `Preparing ${format.toUpperCase()} export...`);
            
            // Create a temporary link to download the file
            const link = document.createElement('a');
            link.href = url;
            link.download = `contacts_export_${new Date().toISOString().split('T')[0]}.${format === 'excel' ? 'xlsx' : 'pdf'}`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Show success message after a delay
            setTimeout(() => {
                showToast('success', `${format.toUpperCase()} export completed!`);
            }, 1000);
        }

        // Show toast notification
        function showToast(type, message) {
            // Create toast HTML
            const toastHtml = `
                <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="ti ti-${type === 'success' ? 'check' : type === 'error' ? 'x' : 'info-circle'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;
            
            // Create toast container if it doesn't exist
            let toastContainer = document.getElementById('toast-container');
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toast-container';
                toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                toastContainer.style.zIndex = '9999';
                document.body.appendChild(toastContainer);
            }
            
            // Add toast to container
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            
            // Initialize and show the toast
            const toastElement = toastContainer.lastElementChild;
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: type === 'error' ? 5000 : 3000
            });
            
            toast.show();
            
            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                this.remove();
            });
        }

        // Utility function to toggle contact status
        function toggleContactStatus(contactId, currentStatus) {
            const newStatus = currentStatus === 1 ? 0 : 1;
            
            fetch(`/contacts/${contactId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('success', data.message || 'Contact status updated successfully!');
                    contactsTable.ajax.reload();
                } else {
                    showToast('error', data.message || 'Error updating contact status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Error updating contact status. Please try again.');
            });
        }
    </script>
    <style>
        .offcanvas:{
            display: none;

        }
        </style>
@endsection