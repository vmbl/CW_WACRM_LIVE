<?php $page = 'leads'; ?>
@extends('layout.mainlayout')
@section('content')

{{-- Render Leads --}}
@foreach ($leadsArray as $lead)
    {{-- Display lead details --}}
@endforeach

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h4 class="page-title">Leads<span class="count-title">{{ $totalLeads ?? 0 }}</span></h4>
                        </div>
                        <div class="col-8 text-end">
                            <div class="head-icons">
                                <a href="{{ url('leads') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Refresh">
                                    <i class="ti ti-refresh-dot"></i>
                                </a>
                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                                    <i class="ti ti-chevrons-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Dashboard Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Total Leads</h6>
                                        <h3>{{ $totalLeads ?? 0 }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <i class="ti ti-users bg-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Active Leads</h6>
                                        <h3>{{ $activeLeads ?? 0 }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <i class="ti ti-user-check bg-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>New Leads</h6>
                                        <h3>{{ $newLeads ?? 0 }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <i class="ti ti-user-plus bg-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Closed Won</h6>
                                        <h3>{{ $closedWonLeads ?? 0 }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <i class="ti ti-trophy bg-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stage-wise Lead Distribution -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="ti ti-chart-pie me-2"></i>Stage-wise Lead Distribution
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @php
                                        // Calculate stage statistics from leadsArray if not provided
                                        if (!isset($stageStats) && isset($leadsArray)) {
                                            $stageStats = [
                                                'New Lead' => 0,
                                                'Qualified' => 0,
                                                'Proposal Sent' => 0,
                                                'Negotiation' => 0,
                                                'Closed Won' => 0,
                                                'Closed Lost' => 0,
                                            ];
                                            
                                            foreach ($leadsArray as $lead) {
                                                $stage = $lead['stage'] ?? 'New Lead';
                                                if (isset($stageStats[$stage])) {
                                                    $stageStats[$stage]++;
                                                }
                                            }
                                        }
                                        
                                        // Calculate other statistics if not provided
                                        if (!isset($activeLeads) && isset($leadsArray)) {
                                            $activeLeads = collect($leadsArray)->where('status', 1)->count();
                                        }
                                        
                                        if (!isset($newLeads) && isset($leadsArray)) {
                                            $newLeads = collect($leadsArray)->where('stage', 'New Lead')->count();
                                        }
                                        
                                        if (!isset($closedWonLeads) && isset($leadsArray)) {
                                            $closedWonLeads = collect($leadsArray)->where('stage', 'Closed Won')->count();
                                        }
                                        
                                        if (!isset($totalLeads) && isset($leadsArray)) {
                                            $totalLeads = count($leadsArray);
                                        }
                                        
                                        $stageData = [
                                            'New Lead' => $stageStats['New Lead'] ?? 0,
                                            'Qualified' => $stageStats['Qualified'] ?? 0,
                                            'Proposal Sent' => $stageStats['Proposal Sent'] ?? 0,
                                            'Negotiation' => $stageStats['Negotiation'] ?? 0,
                                            'Closed Won' => $stageStats['Closed Won'] ?? 0,
                                            'Closed Lost' => $stageStats['Closed Lost'] ?? 0,
                                        ];
                                        
                                        $stageColors = [
                                            'New Lead' => 'primary',
                                            'Qualified' => 'info',
                                            'Proposal Sent' => 'warning',
                                            'Negotiation' => 'secondary',
                                            'Closed Won' => 'success',
                                            'Closed Lost' => 'danger',
                                        ];
                                    @endphp
                                    
                                    @foreach($stageData as $stage => $count)
                                    <div class="col-md-2 col-sm-4 col-6">
                                        <div class="stage-card text-center p-3 border rounded">
                                            <div class="stage-icon mb-2">
                                                <i class="ti ti-circle-dot text-{{ $stageColors[$stage] }}" style="font-size: 2rem;"></i>
                                            </div>
                                            <h4 class="text-{{ $stageColors[$stage] }}">{{ $count }}</h4>
                                            <p class="text-muted mb-0 small">{{ $stage }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Dashboard Cards -->

                <!-- Display Success/Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <!-- Search -->
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <div class="icon-form mb-3 mb-sm-0">
                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                    <input type="text" class="form-control" id="searchLeads" placeholder="Search Leads" value="{{ $search ?? '' }}">
                                </div>
                            </div>
                            
                            <div class="col-sm-8">
                                <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                    <!-- Bulk Actions - Hidden by default, shown when items are selected -->
                                    <div class="bulk-actions me-2" id="bulk-actions" style="display: none;">
                                        <div class="d-flex align-items-center gap-2">
                                            <button type="button" class="btn btn-danger" id="bulk-delete-btn">
                                                <i class="ti ti-trash"></i> Delete Selected
                                            </button>
                                            <span class="text-muted small" id="selection-count">0 items selected</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Export Dropdown -->
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item" onclick="exportLeads('pdf')"><i class="ti ti-file-type-pdf text-danger me-1"></i>Export as PDF</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item" onclick="exportLeads('excel')"><i class="ti ti-file-type-xls text-green me-1"></i>Export as Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Import Button -->
                                    <button type="button" class="btn btn-outline-primary me-2" id="importLeadsBtn" >
                                        <i class="ti ti-upload me-2"></i>Import
                                    </button>

                                    <!-- Add Leads Button -->
                                    <button type="button" class="btn btn-primary" id="addLeadsBtn">
                                        <i class="ti ti-square-rounded-plus me-2"></i>Add Leads
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /Search -->
                        
                        <script>
                            function exportLeads(format) {
                                const url = `/leads/export?format=${format}`;
                                
                                // Show loading toast
                                showToast('info', `Preparing ${format.toUpperCase()} export...`);
                                
                                // Create a temporary link to download the file
                                const link = document.createElement('a');
                                link.href = url;
                                link.download = `leads_export_${new Date().toISOString().split('T')[0]}.${format === 'excel' ? 'xlsx' : 'pdf'}`;
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
                        </script>
                    </div>

                    <div class="card-body">
                        <!-- Contact List -->
                        <div class="table-responsive custom-table">
                            <table class="table" id="leads_list1">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="no-sort">
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th>
                                        <th class="no-sort"></th>
                                        <th>Lead Name</th>
                                        <th>Company Name</th>
                                        <th>Phone</th>
                                        <th>Lead Status</th>
                                        <th>Stage</th>
                                        <th>City</th>
                                        <th>Created Date</th>
                                        <th>Lead Owner</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($leadsArray) && count($leadsArray) > 0)
                                        @foreach($leadsArray as $lead)
                                        <tr>
                                            <td>
                                                <label class="checkboxs">
                                                    <input type="checkbox" name="lead_ids[]" value="{{ $lead['id'] }}">
                                                    <span class="checkmarks"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="set-star rating-select">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('leads-details/' . $lead['id']) }}" class="title-name" target="_blank">{{ $lead['lead_name'] }}</a>
                                            </td>
                                            <td>
                                                <h2 class="d-flex align-items-center">
                                                    <!-- <a href="{{ url('company-details/' . ($lead['company_id'] ?? $lead['id'])) }}" class="avatar avatar-sm border rounded p-1 me-2">
                                                        <img class="w-auto h-auto" src="{{ $lead['company_image'] ?? asset('assets/img/companies/company-01.svg') }}" alt="Company Image">
                                                    </a> -->
                                                    <a href="{{ url('company-details/' . ($lead['company_id'] ?? $lead['id'])) }}" class="d-flex flex-column">
                                                        {{ $lead['company_name'] }}
                                                        <span class="text-default">{{ $lead['company_address'] ?? '' }}</span>
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>{{ $lead['phone'] }}</td>
                                            <!-- <td>{{ $lead['email'] }}</td> -->
                                            <td>
                                                @php
                                                    $statusClasses = [
                                                        1 => 'bg-success',
                                                        0 => 'bg-danger'
                                                    ];
                                                    $statusNames = [
                                                        1 => 'Active',
                                                        0 => 'Inactive'
                                                    ];
                                                    $statusClass = $statusClasses[$lead['status']] ?? 'bg-secondary';
                                                    $statusName = $statusNames[$lead['status']] ?? 'Unknown';
                                                @endphp
                                                <span class="badge badge-pill badge-status {{ $statusClass }}">{{ $statusName }}</span>
                                            </td>
                                            <td>
                                                @php
                                                    $stageColors = [
                                                        'New Lead' => 'primary',
                                                        'Qualified' => 'info',
                                                        'Proposal Sent' => 'warning',
                                                        'Negotiation' => 'secondary',
                                                        'Closed Won' => 'success',
                                                        'Closed Lost' => 'danger',
                                                    ];
                                                    $stageColor = $stageColors[$lead['stage']] ?? 'secondary';
                                                @endphp
                                                <span class="badge bg-{{ $stageColor }}">{{ $lead['stage'] ?? 'Not Set' }}</span>
                                            </td>
                                            <td>{{ $lead['city'] ?? '' }}</td>
                                            <td>{{ $lead['created_date'] }}</td>
                                            <td><span class="title-name">{{ $lead['owner'] }}</span></td>
                                            <td>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('leads-details/' . $lead['id']) }}" target="_blank">
                                                            <i class="ti ti-eye text-info"></i> View Details
                                                        </a>
                                                        <a class="dropdown-item edit-lead-btn" href="#" data-lead-id="{{ $lead['id'] }}">
                                                            <i class="ti ti-edit text-blue"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item delete-lead-btn" href="#" data-lead-id="{{ $lead['id'] }}">
                                                            <i class="ti ti-trash text-danger"></i> Delete
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <!-- <i class="ti ti-clipboard-copy text-blue-light"></i> Clone -->
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">No leads found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                      
                        {{-- Pagination links --}}
                        <div class="pagination-wrapper">
                        </div>
                        <!-- /Contact List -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

<!-- Bulk Delete Confirmation Modal -->
<div class="modal fade" id="bulk-delete-modal" tabindex="-1" aria-labelledby="bulkDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkDeleteModalLabel">Confirm Bulk Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the selected leads? This action cannot be undone.</p>
                <div class="alert alert-warning">
                    <i class="ti ti-alert-triangle"></i>
                    <span id="bulk-delete-count">0</span> lead(s) will be permanently deleted.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-bulk-delete">
                    <i class="ti ti-trash"></i> Delete Leads
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Lead Confirmation Modal -->
<div class="modal fade" id="delete_lead" tabindex="-1" aria-labelledby="deleteLeadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLeadModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this lead? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteLead">Delete Lead</button>
            </div>
        </div>
    </div>
</div>


<!-- Enhanced Add Lead Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_add" data-bs-backdrop="true" data-bs-scroll="false" data-bs-keyboard="true" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold">
            <i class="ti ti-user-plus me-2"></i>Add New Lead
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="addLeadForm" class="needs-validation" novalidate>
            <!-- Lead Name -->
            <div class="mb-3">
                <label for="leadName" class="form-label">Lead Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="leadName" name="lead_name" required>
                <!-- <div class="invalid-feedback">Please provide a lead name.</div> -->
            </div>

            <!-- Lead Source -->
         <div class="mb-3">
    <label for="leadSource" class="form-label">Lead Source <span class="text-danger">*</span></label>
    <select name="lead_source" id="lead_source" class="form-control">
    <option value="">-- Select source--</option>
    @foreach($leadSources as $source)
        <option value="{{ $source->id }}">{{ $source->name }}</option>
    @endforeach
</select>
</div>


            <!-- Other Source (Hidden by default) -->
            <div class="mb-3" id="otherSourceDiv" style="display: none;">
                <label for="otherSource" class="form-label">Specify Other Source <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="otherSource" name="other_source" placeholder="Enter the source">
                <!-- <div class="invalid-feedback">Please specify the other source.</div> -->
            </div>

            <!-- Company Name -->
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Enter company name">
            </div>

            <!-- Mobile Numbers -->
            <div class="row mb-3">
                <div class="col-6">
                    <label for="mobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="mobileNo" name="mobile_no" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit mobile number">
                    <!-- <div class="invalid-feedback">Please provide a valid 10-digit mobile number.</div> -->
                </div>
                <div class="col-6">
                    <label for="altMobileNo" class="form-label">Alt. Mobile No</label>
                    <input type="tel" class="form-control" id="altMobileNo" name="alt_mobile_no" pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit mobile number">
                    <!-- <div class="invalid-feedback">Please provide a valid 10-digit mobile number.</div> -->
                </div>
            </div>

            <!-- Lead Owner -->
            <div class="mb-3">
                <label for="leadOwner" class="form-label">Lead Owner <span class="text-danger">*</span></label>
                <select class="form-select" id="leadOwner" name="lead_owner" required>
                    <option value="">Select Lead Owner</option>
                    <option value="john_doe">John Doe</option>
                    <option value="jane_smith">Jane Smith</option>
                    <option value="mike_johnson">Mike Johnson</option>
                    <option value="sarah_wilson">Sarah Wilson</option>
                    <option value="jerald">Jerald</option>
                </select>
                <!-- <div class="invalid-feedback">Please select a lead owner.</div> -->
            </div>

            <!-- Tags -->
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags separated by commas (e.g., hot lead, qualified, follow up)">
                <small class="form-text text-muted">Separate multiple tags with commas</small>
            </div>

            <!-- Status and Stage -->
            <div class="row mb-3">
                <div class="col-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <div class="d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="statusActive" value="1" checked required>
                            <label class="form-check-label" for="statusActive">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="statusInactive" value="0" required>
                            <label class="form-check-label" for="statusInactive">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label for="stage" class="form-label">Stage <span class="text-danger">*</span></label>
                    <select class="form-select" id="stage" name="stage" required>
                        <option value="">Select Stage</option>
                        <option value="New Lead">New Lead</option>
                        <option value="Qualified">Qualified</option>
                        <option value="Proposal Sent">Proposal Sent</option>
                        <option value="Negotiation">Negotiation</option>
                        <option value="Closed Won">Closed Won</option>
                        <option value="Closed Lost">Closed Lost</option>
                    </select>
                    <!-- <div class="invalid-feedback">Please select a stage.</div> -->
                </div>
            </div>

            <!-- City, State, Pincode -->
            <div class="row mb-3">
                <div class="col-4">
                    <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="city" name="city" required placeholder="Enter city">
                    <!-- <div class="invalid-feedback">Please provide a city.</div> -->
                </div>
                <div class="col-4">
                    <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                    <select class="form-select" id="state" name="state" required>
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
                    <!-- <div class="invalid-feedback">Please select a state.</div> -->
                </div>
                <div class="col-4">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" pattern="[0-9]{6}" maxlength="6" placeholder="Enter 6-digit pincode">
                    <!-- <div class="invalid-feedback">Please provide a valid 6-digit pincode.</div> -->
                </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address1" class="form-label">Address 1 <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address1" name="address1" required placeholder="Enter primary address">
                <!-- <div class="invalid-feedback">Please provide Address 1.</div> -->
            </div>

            <div class="mb-3">
                <label for="address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter secondary address (optional)">
            </div>

            <!-- Notes/Description -->
            <div class="mb-3">
                <label for="notes" class="form-label">Notes/Description</label>
                <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Enter any additional notes or description..."></textarea>
            </div>

           <!-- Dispositions Dropdown -->
<div class="mb-4">
    <label for="dispositions" class="form-label">Dispositions</label>
      <select name="dispositions" id="dispositions" class="form-control">
    <option value="">-- Select disposition--</option>
    @foreach($leadDispositions as $disposition)
        <option value="{{ $disposition->id }}">{{ $disposition->name }}</option>
    @endforeach
</select>
</div>


           <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                    <i class="ti ti-x me-1"></i>Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-check me-1"></i>Save Lead
                </button>
            </div>
        </form>
 <script>
    $(document).ready(function () {
        $.ajax({
            url: '/lead-sources', // ✅ Corrected URL (matches the route below)
            method: 'GET',
            success: function (response) {
                if (response.success && Array.isArray(response.data)) {
                    let options = '<option value="">Choose Source</option>';
                    response.data.forEach(function (source) {
                        options += `<option value="${source._id}">${source.name}</option>`;
                    });
                    $('#leadSource').html(options);
                } else {
                    alert('No sources found');
                }
            },
            error: function () {
                alert('Error loading lead sources');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Fetch lead dispositions
        $.ajax({
            url: '/lead-dispositions', // Make sure route matches
            method: 'GET',
            success: function (response) {
                if (response.success && Array.isArray(response.data)) {
                    let options = '<option value="">Select Disposition</option>';
                    response.data.forEach(function (item) {
                        options += `<option value="${item._id}">${item.name}</option>`;
                    });
                    $('#dispositions').html(options);
                } else {
                    alert('No dispositions found');
                }
            },
            error: function () {
                alert('Error loading dispositions');
            }
        });
    });
</script>



    </div>
</div>
<!-- /Add Lead Offcanvas -->

<!-- Edit Lead Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_edit" data-bs-backdrop="true" data-bs-scroll="false" data-bs-keyboard="true" style="width: 600px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold">
            <i class="ti ti-edit me-2"></i>Edit Lead
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="editLeadForm" class="needs-validation" novalidate>
            <input type="hidden" id="editLeadId" name="lead_id">
            
            <!-- Lead Name -->
            <div class="mb-3">
                <label for="editLeadName" class="form-label">Lead Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="editLeadName" name="lead_name" required>
                <!-- <div class="invalid-feedback">Please provide a lead name.</div> -->
            </div>

            <!-- Lead Source -->
            <div class="mb-3">
                <label for="editLeadSource" class="form-label">Lead Source <span class="text-danger">*</span></label>
                <select name="lead_source" id="lead_source" class="form-control">
    <option value="">-- Select source--</option>
    @foreach($leadSources as $source)
        <option value="{{ $source->id }}">{{ $source->name }}</option>
    @endforeach
</select>
                <!-- <div class="invalid-feedback">Please select a lead source.</div> -->
            </div>

            <!-- Other Source (Hidden by default) -->
            <div class="mb-3" id="editOtherSourceDiv" style="display: none;">
                <label for="editOtherSource" class="form-label">Specify Other Source <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="editOtherSource" name="other_source" placeholder="Enter the source">
                <!-- <div class="invalid-feedback">Please specify the other source.</div> -->
            </div>

            <!-- Company Name -->
            <div class="mb-3">
                <label for="editCompanyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="editCompanyName" name="company_name" placeholder="Enter company name">
            </div>

            <!-- Mobile Numbers -->
            <div class="row mb-3">
                <div class="col-6">
                    <label for="editMobileNo" class="form-label">Mobile No <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="editMobileNo" name="mobile_no" required pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit mobile number">
                    <!-- <div class="invalid-feedback">Please provide a valid 10-digit mobile number.</div> -->
                </div>
                <div class="col-6">
                    <label for="editAltMobileNo" class="form-label">Alt. Mobile No</label>
                    <input type="tel" class="form-control" id="editAltMobileNo" name="alt_mobile_no" pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit mobile number">
                    <!-- <div class="invalid-feedback">Please provide a valid 10-digit mobile number.</div> -->
                </div>
            </div>

            <!-- Lead Owner -->
            <div class="mb-3">
                <label for="editLeadOwner" class="form-label">Lead Owner <span class="text-danger">*</span></label>
                <select class="form-select" id="editLeadOwner" name="lead_owner" required>
                    <option value="">Select Lead Owner</option>
                    <option value="john_doe">John Doe</option>
                    <option value="jane_smith">Jane Smith</option>
                    <option value="mike_johnson">Mike Johnson</option>
                    <option value="sarah_wilson">Sarah Wilson</option>
                    <option value="jerald">Jerald</option>
                </select>
                <!-- <div class="invalid-feedback">Please select a lead owner.</div> -->
            </div>

            <!-- Tags -->
            <div class="mb-3">
                <label for="editTags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="editTags" name="tags" placeholder="Enter tags separated by commas (e.g., hot lead, qualified, follow up)">
                <small class="form-text text-muted">Separate multiple tags with commas</small>
            </div>

            <!-- Status and Stage -->
            <div class="row mb-3">
                <div class="col-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <div class="d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="editStatusActive" value="1" required>
                            <label class="form-check-label" for="editStatusActive">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="editStatusInactive" value="0" required>
                            <label class="form-check-label" for="editStatusInactive">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label for="editStage" class="form-label">Stage <span class="text-danger">*</span></label>
                    <select class="form-select" id="editStage" name="stage" required>
                        <option value="">Select Stage</option>
                        <option value="New Lead">New Lead</option>
                        <option value="Qualified">Qualified</option>
                        <option value="Proposal Sent">Proposal Sent</option>
                        <option value="Negotiation">Negotiation</option>
                        <option value="Closed Won">Closed Won</option>
                        <option value="Closed Lost">Closed Lost</option>
                    </select>
                    <!-- <div class="invalid-feedback">Please select a stage.</div> -->
                </div>
            </div>

            <!-- City, State, Pincode -->
            <div class="row mb-3">
                <div class="col-4">
                    <label for="editCity" class="form-label">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="editCity" name="city" required placeholder="Enter city">
                    <!-- <div class="invalid-feedback">Please provide a city.</div> -->
                </div>
                <div class="col-4">
                    <label for="editState" class="form-label">State <span class="text-danger">*</span></label>
                    <select class="form-select" id="editState" name="state" required>
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
                    <!-- <div class="invalid-feedback">Please select a state.</div> -->
                </div>
                <div class="col-4">
                    <label for="editPincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="editPincode" name="pincode" pattern="[0-9]{6}" maxlength="6" placeholder="Enter 6-digit pincode">
                    <!-- <div class="invalid-feedback">Please provide a valid 6-digit pincode.</div> -->
                </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="editAddress1" class="form-label">Address 1 <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="editAddress1" name="address1" required placeholder="Enter primary address">
                <!-- <div class="invalid-feedback">Please provide Address 1.</div> -->
            </div>

            <div class="mb-3">
                <label for="editAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="editAddress2" name="address2" placeholder="Enter secondary address (optional)">
            </div>

            <!-- Notes/Description -->
            <div class="mb-3">
                <label for="editNotes" class="form-label">Notes/Description</label>
                <textarea class="form-control" id="editNotes" name="notes" rows="4" placeholder="Enter any additional notes or description..."></textarea>
            </div>

            <!-- Dispositions -->
            <div class="mb-4">
                <label for="editDispositions" class="form-label">Dispositions</label>
         <select name="dispositions" id="dispositions" class="form-control">
    <option value="">-- Select disposition--</option>
    @foreach($leadDispositions as $disposition)
        <option value="{{ $disposition->id }}">{{ $disposition->name }}</option>
    @endforeach
</select>
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                    <i class="ti ti-x me-1"></i>Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-check me-1"></i>Update Lead
                </button>
            </div>
        </form>
    </div>
</div>
<!-- /Edit Lead Offcanvas -->

<!-- Import Leads Modal -->
<div class="modal fade" id="importLeadsModal" tabindex="-1" aria-labelledby="importLeadsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importLeadsModalLabel">
                    <i class="ti ti-upload me-2"></i>Import Leads
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="importLeadsForm" enctype="multipart/form-data">
                    <div class="mb-4">
                        <div class="alert alert-info">
                            <i class="ti ti-info-circle me-2"></i>
                            <strong>Import Instructions:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Please use the provided template for importing leads</li>
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
                        <a href="{{ url('leads/download-template') }}" class="btn btn-outline-primary">
                            <i class="ti ti-download me-1"></i>Download Template
                        </a>
                    </div>
                      <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="ti ti-x me-1"></i>Cancel
                </button>
                <button type="submit" id="importLeadsFormbtn" class="btn btn-primary">
                    <i class="ti ti-upload me-1"></i>Import Leads
                </button>
            </div>
                </form>
            </div>
          
  
        </div>
    </div>
</div>
<!-- /Import Leads Modal -->






@endsection
@section('scripts')
<script>



// Checkbox selection and bulk delete functionality
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all');
    const leadCheckboxes = document.querySelectorAll('input[name="lead_ids[]"]');
    const bulkActionsDiv = document.getElementById('bulk-actions');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const selectionCount = document.getElementById('selection-count');
    const bulkDeleteModal = new bootstrap.Modal(document.getElementById('bulk-delete-modal'));
    const confirmBulkDeleteBtn = document.getElementById('confirm-bulk-delete');
    const bulkDeleteCountSpan = document.getElementById('bulk-delete-count');
    
    // Individual delete functionality
    const deleteLeadModal = new bootstrap.Modal(document.getElementById('delete_lead'));
    const deleteLeadBtns = document.querySelectorAll('.delete-lead-btn');
    const confirmDeleteLeadBtn = document.getElementById('confirmDeleteLead');
    let currentLeadId = null;

    // Function to update bulk actions visibility and count
    function updateBulkActions() {
        const checkedBoxes = document.querySelectorAll('input[name="lead_ids[]"]:checked');
        const count = checkedBoxes.length;
        
        if (count > 0) {
            bulkActionsDiv.style.display = 'block';
            selectionCount.textContent = `${count} item${count > 1 ? 's' : ''} selected`;
            bulkDeleteCountSpan.textContent = count;
        } else {
            bulkActionsDiv.style.display = 'none';
        }
        
        // Update select all checkbox state
        if (count === 0) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = false;
        } else if (count === leadCheckboxes.length) {
            selectAllCheckbox.indeterminate = false;
            selectAllCheckbox.checked = true;
        } else {
            selectAllCheckbox.indeterminate = true;
        }
    }

    // Select All functionality
    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = this.checked;
        leadCheckboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        });
        updateBulkActions();
    });

    // Individual checkbox change
    leadCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateBulkActions();
        });
    });


      // Import Leads Button
    $('#importLeadsBtn').on('click', function() {
        var importModal = new bootstrap.Modal(document.getElementById('importLeadsModal'));
        importModal.show();
    });


      // Import Leads Button Click
    $('#importLeadsBtn').on('click', function() {
        $('#importLeadsModal').modal('show');
    });

    // Start Import Button Click
    $('#startImport').on('click', function() {
        var formData = new FormData($('#importLeadsForm')[0]);
        
        if (!$('#importFile')[0].files.length) {
            showAlert('Please select a file to import.', 'error');
            return;
        }

        $.ajax({
            url: '{{ url("leads/import") }}',
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
                    $('#importLeadsModal').modal('hide');
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
    
    // Bulk delete button click
    bulkDeleteBtn.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('input[name="lead_ids[]"]:checked');
        if (checkedBoxes.length > 0) {
            bulkDeleteModal.show();
        }
    });

    // Confirm bulk delete
    confirmBulkDeleteBtn.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('input[name="lead_ids[]"]:checked');
        const leadIds = Array.from(checkedBoxes).map(cb => cb.value);
        
        if (leadIds.length > 0) {
            // Show loading state
            confirmBulkDeleteBtn.innerHTML = '<i class="ti ti-loader-2 spin"></i> Deleting...';
            confirmBulkDeleteBtn.disabled = true;
            
            // Make AJAX request to delete leads
            fetch('/leads/bulk-delete', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    lead_ids: leadIds
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showToast('success', `${leadIds.length} lead(s) deleted successfully!`);
                    
                    // Remove deleted rows from table
                    checkedBoxes.forEach(checkbox => {
                        const row = checkbox.closest('tr');
                        if (row) {
                            row.remove();
                        }
                    });
                    
                    // Update counts and hide bulk actions
                    updateBulkActions();
                    bulkDeleteModal.hide();
                    
                    // Update dashboard counts if they exist
                    updateDashboardCounts();
                } else {
                    showToast('error', data.message || 'Failed to delete leads');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'An error occurred while deleting leads');
            })
            .finally(() => {
                // Reset button state
                confirmBulkDeleteBtn.innerHTML = '<i class="ti ti-trash"></i> Delete Leads';
                confirmBulkDeleteBtn.disabled = false;
            });
        }
    });

    // Individual delete functionality
    deleteLeadBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            currentLeadId = this.getAttribute('data-lead-id');
            deleteLeadModal.show();
        });
    });

    // Confirm individual delete
    confirmDeleteLeadBtn.addEventListener('click', function() {
        if (currentLeadId) {
            // Show loading state
            confirmDeleteLeadBtn.innerHTML = '<i class="ti ti-loader-2 spin"></i> Deleting...';
            confirmDeleteLeadBtn.disabled = true;
            
            // Make AJAX request to delete single lead
            fetch(`/leads/${currentLeadId}/delete`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showToast('success', 'Lead deleted successfully!');
                    
                    // Remove row from table
                    const row = document.querySelector(`input[value="${currentLeadId}"]`).closest('tr');
                    if (row) {
                        row.remove();
                    }
                    
                    // Update counts and hide modal
                    updateBulkActions();
                    deleteLeadModal.hide();
                    
                    // Update dashboard counts
                    updateDashboardCounts();
                } else {
                    showToast('error', data.message || 'Failed to delete lead');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'An error occurred while deleting the lead');
            })
            .finally(() => {
                // Reset button state
                confirmDeleteLeadBtn.innerHTML = 'Delete Lead';
                confirmDeleteLeadBtn.disabled = false;
                currentLeadId = null;
            });
        }
    });


     // Import Leads Form Submission
    $('#importLeadsForm').on('submit', function(e) {
        e.preventDefault();
        // alert('check');
        var formData = new FormData(this);
        
        $.ajax({
            url: '/leads/import',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                // Show loading state
                $('#importLeadsForm button[type="submit"]').prop('disabled', true).html('<i class="ti ti-loader me-1"></i>Importing...');
            },
            success: function(response) {
                // Hide modal
                bootstrap.Modal.getInstance(document.getElementById('importLeadsModal')).hide();
                
                // Show success message
                showAlert('success', response.message || 'Leads imported successfully!');
                
                // Reload page
                location.reload();
            },
            error: function(xhr) {
                showAlert('danger', xhr.responseJSON.message || 'Error importing leads. Please try again.');
            },
            complete: function() {
                // Reset button state
                $('#importLeadsForm button[type="submit"]').prop('disabled', false).html('<i class="ti ti-upload me-1"></i>Import Leads');
            }
        });
    });
    // Function to update dashboard counts after deletion
    function updateDashboardCounts() {
        // Get current table rows count
        const remainingRows = document.querySelectorAll('tbody tr').length;
        const noDataRow = document.querySelector('tbody tr td[colspan]');
        const actualCount = noDataRow ? 0 : remainingRows;
        
        // Update total leads count
        const totalLeadsElements = document.querySelectorAll('h3');
        totalLeadsElements.forEach(el => {
            if (el.textContent.match(/^\d+$/)) {
                const currentCount = parseInt(el.textContent);
                if (currentCount > actualCount) {
                    el.textContent = actualCount;
                }
            }
        });
        
        // Update page title count
        const pageTitleCount = document.querySelector('.count-title');
        if (pageTitleCount) {
            pageTitleCount.textContent = actualCount;
        }
    }

    // Initial check on page load
    updateBulkActions();
});

// CSS for loading spinner animation
const style = document.createElement('style');
style.textContent = `
    .spin {
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style); 





$(document).ready(function() {
    // Initialize DataTable
    // var table = $('#leads_list1').DataTable({
    //     "pageLength": 25,
    //     "ordering": true,
    //     "searching": false,
    //     "lengthChange": false,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    //     "columnDefs": [
    //         { "orderable": false, "targets": [0, 1, 10] }
    //     ],
    //     "language": {
    //         "emptyTable": "No leads found",
    //         "info": "Showing _START_ to _END_ of _TOTAL_ leads",
    //         "infoEmpty": "Showing 0 to 0 of 0 leads",
    //         "infoFiltered": "(filtered from _MAX_ total leads)"
    //     }
    // });

    // Custom search functionality
    $('#searchLeads').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Select all checkbox functionality
    $('#select-all').on('change', function() {
        $('input[name="lead_ids[]"]').prop('checked', this.checked);
    });

    // Individual checkbox change
    $(document).on('change', 'input[name="lead_ids[]"]', function() {
        var allChecked = $('input[name="lead_ids[]"]:checked').length === $('input[name="lead_ids[]"]').length;
        $('#select-all').prop('checked', allChecked);
    });

    // Add Lead Button
    $('#addLeadsBtn').on('click', function() {
        $('#addLeadForm')[0].reset();
        $('#addLeadForm').removeClass('was-validated');
        $('#otherSourceDiv').hide();
        var addOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvas_add'));
        addOffcanvas.show();
    });

    // Edit Lead Button
    $(document).on('click', '.edit-lead-btn', function(e) {
        e.preventDefault();
        var leadId = $(this).data('lead-id');
        
        // Here you would typically make an AJAX call to fetch lead details
        // For now, we'll just show the edit form
        $('#editLeadId').val(leadId);
        var editOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvas_edit'));
        editOffcanvas.show();
        
        // Example of how you might populate the form with existing data
        // This would typically come from an AJAX call
        /*
        $.ajax({
            url: '/leads/' + leadId + '/edit',
            method: 'GET',
            success: function(response) {
                $('#editLeadName').val(response.lead_name);
                $('#editLeadSource').val(response.lead_source);
                $('#editCompanyName').val(response.company_name);
                // ... populate other fields
            }
        });
        */
    });

 


  
    // Add Lead Form Submission
    $('#addLeadForm').on('submit', function(e) {
        e.preventDefault();
        
        if (this.checkValidity() === false) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        var formData = new FormData(this);
        
        $.ajax({
            url: '/leads',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Hide offcanvas
                bootstrap.Offcanvas.getInstance(document.getElementById('offcanvas_add')).hide();
                
                // Show success message
                showAlert('success', 'Lead added successfully!');
                
                // Reload page or add row to table
                location.reload();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    // Display validation errors
                    for (var field in errors) {
                        var input = $('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        input.siblings('.invalid-feedback').text(errors[field][0]);
                    }
                } else {
                    showAlert('danger', 'Error adding lead. Please try again.');
                }
            }
        });
    });

    // Edit Lead Form Submission
    $('#editLeadForm').on('submit', function(e) {
        e.preventDefault();
        
        if (this.checkValidity() === false) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        var formData = new FormData(this);
        var leadId = $('#editLeadId').val();
        
        $.ajax({
            url: '/leads/' + leadId,
            method: 'PUT',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Hide offcanvas
                bootstrap.Offcanvas.getInstance(document.getElementById('offcanvas_edit')).hide();
                
                // Show success message
                showAlert('success', 'Lead updated successfully!');
                
                // Reload page or update row in table
                location.reload();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    // Display validation errors
                    for (var field in errors) {
                        var input = $('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        input.siblings('.invalid-feedback').text(errors[field][0]);
                    }
                } else {
                    showAlert('danger', 'Error updating lead. Please try again.');
                }
            }
        });
    });

   

    // Clear validation on input change
    $(document).on('input change', '.form-control, .form-select', function() {
        $(this).removeClass('is-invalid');
    });
});

// Toggle Other Source field
function toggleSourceOther(select) {
    var otherDiv = document.getElementById('otherSourceDiv');
    var otherInput = document.getElementById('otherSource');
    
    if (select.value === 'Other') {
        otherDiv.style.display = 'block';
        otherInput.required = true;
    } else {
        otherDiv.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

// Toggle Other Source field for edit form
function toggleEditSourceOther(select) {
    var otherDiv = document.getElementById('editOtherSourceDiv');
    var otherInput = document.getElementById('editOtherSource');
    
    if (select.value === 'Other') {
        otherDiv.style.display = 'block';
        otherInput.required = true;
    } else {
        otherDiv.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

// Show Alert Function
function showAlert(type, message) {
    var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>';
    
    // Remove existing alerts
    $('.alert').remove();
    
    // Add new alert at the top of content
    $('.content').prepend(alertHtml);
    
    // Auto-hide after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 5000);
}
</script>


<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#leads_list1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": [0, 1, 10] }
        ],
        "pageLength": 25,
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });

    // Search functionality
    $('#searchLeads').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Select all functionality
    $('#select-all').on('click', function() {
        var isChecked = $(this).is(':checked');
        $('input[name="lead_ids[]"]').prop('checked', isChecked);
    });

    // Add Lead Button Click
    $('#addLeadsBtn').on('click', function() {
        $('#offcanvas_add').offcanvas('show');
        resetAddForm();
    });

  

    // Edit Lead Button Click
    $(document).on('click', '.edit-lead-btn', function(e) {
        e.preventDefault();
        var leadId = $(this).data('lead-id');
        
        // Fetch lead details and populate edit form
        $.ajax({
            url: '{{ url("leads") }}/' + leadId + '/edit',
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    populateEditForm(response.data);
                    $('#offcanvas_edit').offcanvas('show');
                } else {
                    showAlert('Failed to fetch lead details', 'error');
                }
            },
            error: function() {
                showAlert('Failed to fetch lead details', 'error');
            }
        });
    });


    // Add Lead Form Submit
    $('#addLeadForm').on('submit', function(e) {
        e.preventDefault();
        
        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        var formData = $(this).serialize();
        
        $.ajax({
            url: '{{ url("leads") }}',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#addLeadForm button[type="submit"]').prop('disabled', true).html('<i class="spinner-border spinner-border-sm me-1"></i>Creating...');
            },
            success: function(response) {
                if (response.success) {
                    showAlert(response.message, 'success');
                    $('#offcanvas_add').offcanvas('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert(response.message || 'Failed to create lead', 'error');
                }
            },
            error: function(xhr) {
                var errorMsg = 'Failed to create lead';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors)[0][0];
                }
                showAlert(errorMsg, 'error');
            },
            complete: function() {
                $('#addLeadForm button[type="submit"]').prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i>Create Lead');
            }
        });
    });

    // Edit Lead Form Submit
    $('#editLeadForm').on('submit', function(e) {
        e.preventDefault();
        
        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        var formData = $(this).serialize();
        var leadId = $('#editLeadId').val();
        
        $.ajax({
            url: '{{ url("leads") }}/' + leadId,
            type: 'PUT',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('#editLeadForm button[type="submit"]').prop('disabled', true).html('<i class="spinner-border spinner-border-sm me-1"></i>Updating...');
            },
            success: function(response) {
                if (response.success) {
                    showAlert(response.message, 'success');
                    $('#offcanvas_edit').offcanvas('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert(response.message || 'Failed to update lead', 'error');
                }
            },
            error: function(xhr) {
                var errorMsg = 'Failed to update lead';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors)[0][0];
                }
                showAlert(errorMsg, 'error');
            },
            complete: function() {
                $('#editLeadForm button[type="submit"]').prop('disabled', false).html('<i class="ti ti-device-floppy me-1"></i>Update Lead');
            }
        });
    });

    // Helper Functions
    function resetAddForm() {
        $('#addLeadForm')[0].reset();
        $('#addLeadForm').removeClass('was-validated');
        $('#otherSourceDiv').hide();
        $('#statusActive').prop('checked', true);
    }

    function populateEditForm(data) {
        $('#editLeadId').val(data.id);
        $('#editLeadName').val(data.lead_name);
        $('#editLeadSource').val(data.lead_source);
        $('#editCompanyName').val(data.company_name);
        $('#editMobileNo').val(data.mobile_no);
        $('#editAltMobileNo').val(data.alt_mobile_no);
        $('#editLeadOwner').val(data.lead_owner);
        $('#editTags').val(data.tags);
        $('#editCity').val(data.city);
        $('#editState').val(data.state);
        $('#editPincode').val(data.pincode);
        $('#editAddress1').val(data.address1);
        $('#editAddress2').val(data.address2);
        $('#editNotes').val(data.notes);
        $('#editDispositions').val(data.dispositions);
        $('#editStage').val(data.stage);
        
        // Set status radio buttons
        if (data.status == 1) {
            $('#editStatusActive').prop('checked', true);
        } else {
            $('#editStatusInactive').prop('checked', true);
        }
        
        // Handle other source
        if (data.lead_source === 'Other') {
            $('#editOtherSourceDiv').show();
            $('#editOtherSource').val(data.other_source);
        } else {
            $('#editOtherSourceDiv').hide();
        }
    }

    function showAlert(message, type) {
        var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        var alertHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                       message +
                       '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                       '</div>';
        
        $('.content').prepend(alertHtml);
        
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    }
});

// Toggle Other Source field for Add Form
function toggleSourceOther(select) {
    if (select.value === 'Other') {
        $('#otherSourceDiv').show();
        $('#otherSource').prop('required', true);
    } else {
        $('#otherSourceDiv').hide();
        $('#otherSource').prop('required', false);
    }
}

// Toggle Other Source field for Edit Form
function toggleEditSourceOther(select) {
    if (select.value === 'Other') {
        $('#editOtherSourceDiv').show();
        $('#editOtherSource').prop('required', true);
    } else {
        $('#editOtherSourceDiv').hide();
        $('#editOtherSource').prop('required', false);
    }
}
</script>





<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#leads_list1').DataTable({
        "pageLength": 25,
        "responsive": true,
        "order": [[9, "desc"]], // Order by Created Date descending
        "columnDefs": [
            { "orderable": false, "targets": [0, 1, 11] }, // Disable sorting for checkbox, star, and action columns
            { "searchable": false, "targets": [0, 1, 11] }
        ],
        "language": {
            "emptyTable": "No leads found",
            "zeroRecords": "No matching leads found"
        }
    });

    // Search functionality
    $('#searchLeads').on('keyup', function() {
        $('#leads_list1').DataTable().search(this.value).draw();
    });

    // Select all checkbox functionality
    $('#select-all').on('change', function() {
        $('input[name="lead_ids[]"]').prop('checked', this.checked);
    });

    // Individual checkbox change
    $(document).on('change', 'input[name="lead_ids[]"]', function() {
        var totalCheckboxes = $('input[name="lead_ids[]"]').length;
        var checkedCheckboxes = $('input[name="lead_ids[]"]:checked').length;
        $('#select-all').prop('checked', totalCheckboxes === checkedCheckboxes);
    });

    // Add Lead Button
    $('#addLeadsBtn').on('click', function() {
        $('#offcanvas_add').offcanvas('show');
        resetAddForm();
    });

    // Edit Lead Button
    $(document).on('click', '.edit-lead-btn', function(e) {
console.log('button clicked');
alert('button cilcked');
        e.preventDefault();
        var leadId = $(this).data('lead-id');
        loadLeadData(leadId);
        $('#offcanvas_edit').offcanvas('show');
    });


    // Import Leads Button
    $('#importLeadsBtn').on('click', function() {
        $('#importLeadsModal').modal('show');
    });

    // Add Lead Form Submission
    $('#addLeadForm').on('submit', function(e) {
        e.preventDefault();
        if (this.checkValidity()) {
            submitAddLeadForm();
        }
        $(this).addClass('was-validated');
    });

    // Edit Lead Form Submission
    $('#editLeadForm').on('submit', function(e) {
        e.preventDefault();
        if (this.checkValidity()) {
            submitEditLeadForm();
        }
        $(this).addClass('was-validated');
    });

    // Import Leads Form Submission
    // $('#importLeadsForm').on('submit', function(e) {
    //     e.preventDefault();
    //     alert('check');
    //     if (this.checkValidity()) {
    //         submitImportForm();
    //     }
    //     $(this).addClass('was-validated');
    // });

    // Functions
    function resetAddForm() {
        $('#addLeadForm')[0].reset();
        $('#addLeadForm').removeClass('was-validated');
        $('#otherSourceDiv').hide();
        $('#statusActive').prop('checked', true);
    }


    function loadLeadData(leadId) {
        alert('function called');
        console.log('function called');
        // AJAX call to load lead data
        $.ajax({
            url: '/leads/' + leadId + '/edit',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    var lead = response.lead;
                    $('#editLeadId').val(lead.id);
                    $('#editLeadName').val(lead.lead_name);
                    $('#editLeadSource').val(lead.lead_source);
                    $('#editCompanyName').val(lead.company_name);
                    $('#editMobileNo').val(lead.mobile_no);
                    $('#editAltMobileNo').val(lead.alt_mobile_no);
                    $('#editLeadOwner').val(lead.lead_owner);
                    $('#editTags').val(lead.tags);
                    $('input[name="edit_status"][value="' + lead.status + '"]').prop('checked', true);
                    $('#editStage').val(lead.stage);
                    $('#editCity').val(lead.city);
                    $('#editState').val(lead.state);
                    $('#editPincode').val(lead.pincode);
                    $('#editAddress1').val(lead.address1);
                    $('#editAddress2').val(lead.address2);
                    $('#editNotes').val(lead.notes);
                    $('#editDispositions').val(lead.dispositions);
                    
                    // Handle other source
                    if (lead.lead_source === 'Other') {
                        $('#editOtherSourceDiv').show();
                        $('#editOtherSource').val(lead.other_source);
                    }
                }
            },
            error: function() {
                showAlert('error', 'Failed to load lead data');
            }
        });
    }

    function submitAddLeadForm() {
        console.log('form submitted');
        var formData = new FormData($('#addLeadForm')[0]);
        
        $.ajax({
            url: '/leads/store',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#offcanvas_add').offcanvas('hide');
                    showAlert('success', response.message);
                    alert(response.message);                    
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', response.message);
            
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON?.errors;
                if (errors) {
                    var errorMessage = Object.values(errors).flat().join('<br>');
                    showAlert('error', errorMessage);
                } else {
                    showAlert('error', 'Failed to create lead');
                }
            }
        });
    }

    function submitEditLeadForm() {
        var formData = new FormData($('#editLeadForm')[0]);
        var leadId = $('#editLeadId').val();
        
        $.ajax({
            url: '/leads/' + leadId + '/update',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#offcanvas_edit').offcanvas('hide');
                    showAlert('success', response.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showAlert('error', response.message);
                    console.log(response.message);
                }
            },
            error: function(xhr) {
                var errors = xhr.responseJSON?.errors;
                if (errors) {
                    var errorMessage = Object.values(errors).flat().join('<br>');
                    showAlert('error', errorMessage);
                } else {
                    showAlert('error', 'Failed to update lead');
                }
            }
        });
    }

    document.ready(function(){

    
    // Export leads

  
    function submitImportForm() {
        var formData = new FormData($('#importLeadsForm')[0]);
        alert('check');
        $.ajax({
            url: '/leads/import',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#importLeadsModal').modal('hide');
                if (response.success) {
                    showAlert('success', response.message);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    showAlert('error', response.message);
                }
            },
            error: function(xhr) {
                $('#importLeadsModal').modal('hide');
                var message = xhr.responseJSON?.message || 'Failed to import leads';
                showAlert('error', message);
            }
        });
    }

    function showAlert(type, message) {
        var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        var alertIcon = type === 'success' ? 'ti-check-circle' : 'ti-alert-circle';
        
        var alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="ti ${alertIcon} me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        $('.content').prepend(alertHtml);
        
        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            $('.alert').fadeOut();
        }, 5000);
    }
});

// Toggle Other Source Field - Add Form
function toggleSourceOther(select) {
    var otherDiv = document.getElementById('otherSourceDiv');
    var otherInput = document.getElementById('otherSource');
    
    if (select.value === 'Other') {
        otherDiv.style.display = 'block';
        otherInput.required = true;
    } else {
        otherDiv.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

// Toggle Other Source Field - Edit Form
function toggleEditSourceOther(select) {
    var otherDiv = document.getElementById('editOtherSourceDiv');
    var otherInput = document.getElementById('editOtherSource');
    
    if (select.value === 'Other') {
        otherDiv.style.display = 'block';
        otherInput.required = true;
    } else {
        otherDiv.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}

// Mobile number validation
$(document).on('input', 'input[type="tel"]', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Pincode validation
$(document).on('input', 'input[name="pincode"], #editPincode', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});

</script>
@component('components.model-popup')
@endcomponent

<!-- Enhanced JavaScript -->
<script>
    // Pass PHP data to JavaScript
    window.leadsData = @json($leadsArray ?? []);
    
    // Initialize leads page when document is ready
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM Content Loaded - Initializing leads page');
        console.log('Leads Data:', window.leadsData);
        
        // Initialize the page
        if (typeof initializeLeadsPage === 'function') {
            initializeLeadsPage();
        }
        
        // Initialize Bootstrap components
        initializeBootstrapComponents();
        
        // Setup event listeners
        setupLeadsEventListeners();
        
        // Initialize form validation
        initializeFormValidation();
        
        
    });
    
    function initializeBootstrapComponents() {
        try {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Initialize dropdowns
            const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
            
            console.log('Bootstrap components initialized');
        } catch (error) {
            console.error('Error initializing Bootstrap components:', error);
        }
    }
    
    function initializeFormValidation() {
        // Bootstrap form validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
        
        console.log('Form validation initialized for', forms.length, 'forms');
    }
    
    function setupLeadsEventListeners() {
        console.log('Setting up leads event listeners');
        
        // Add Lead Button
        setupAddLeadButton();
        
        // Add Lead Form Submit
        setupAddLeadForm();
        
        // Edit Lead Buttons
        setupEditLeadButtons();
        
        // Edit Lead Form Submit
        setupEditLeadForm();
        
        
        
        // View Details Buttons
        setupViewDetailsButtons();
        
        // Search functionality
        setupSearchFunctionality();
        
        // Select all checkbox functionality
        setupSelectAllCheckbox();
        
        // Lead type radio button changes
        setupLeadTypeRadios();
        
        // Visibility radio button changes
        setupVisibilityRadios();
    }
    
    function setupAddLeadButton() {
        const addLeadsBtn = document.getElementById('addLeadsBtn');
        if (addLeadsBtn) {
            addLeadsBtn.addEventListener('click', function() {
                console.log('Add lead button clicked');
                
                // Reset form
                const addLeadForm = document.getElementById('addLeadForm');
                if (addLeadForm) {
                    addLeadForm.reset();
                    addLeadForm.classList.remove('was-validated');
                }
                
                // Show offcanvas
                const offcanvasElement = document.getElementById('offcanvas_add');
                if (offcanvasElement) {
                    const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                    offcanvas.show();
                } else {
                    console.error('Add lead offcanvas element not found');
                }
            });
            console.log('Add lead button listener attached');
        } else {
            console.warn('Add leads button not found');
        }
    }
    
    function setupAddLeadForm() {
        const addLeadForm = document.getElementById('addLeadForm');
        if (addLeadForm) {
            addLeadForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Add lead form submitted');
                
                if (this.checkValidity()) {
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn ? submitBtn.textContent : '';
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Saving...';
                    }
                    
                    // Collect form data properly
                    const formData = new FormData(this);
                    
                    // Log form data for debugging
                    console.log('Form Data being sent:');
                    for (let [key, value] of formData.entries()) {
                        console.log(key, value);
                    }
                    
                    // Submit via AJAX
                    fetch('/leads/store', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success response:', data);
                        
                        // Reset button state
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                        
                        if (data.success) {
                            // Hide offcanvas
                            const offcanvasElement = document.getElementById('offcanvas_add');
                            if (offcanvasElement) {
                                const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                                if (offcanvas) {
                                    offcanvas.hide();
                                }
                            }
                            
                            // Show success message
                            showAlert(data.message || 'Lead created successfully!', 'success');
                            
                            // Reset form
                            addLeadForm.reset();
                            addLeadForm.classList.remove('was-validated');
                            
                            // Reload page after delay
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            showAlert(data.message || 'Failed to create lead', 'danger');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        
                        // Reset button state
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                        
                        showAlert('An error occurred while creating the lead', 'danger');
                    });
                } else {
                    // Form is invalid
                    this.classList.add('was-validated');
                    showAlert('Please fill in all required fields correctly', 'warning');
                }
            });
            console.log('Add lead form listener attached');
        } else {
            console.warn('Add lead form not found');
        }
    }
    
    function setupEditLeadButtons() {
        // Use event delegation for dynamically loaded buttons
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('edit-lead-btn') || e.target.closest('.edit-lead-btn')) {
                e.preventDefault();
                const btn = e.target.classList.contains('edit-lead-btn') ? e.target : e.target.closest('.edit-lead-btn');
                const leadId = btn.getAttribute('data-lead-id') || btn.dataset.leadId;
                
                console.log('Edit button clicked for lead ID:', leadId);
                console.log('Available leads data:', window.leadsData);
                
                if (!leadId) {
                    console.error('Lead ID not found on edit button');
                    showAlert('Lead ID not found', 'danger');
                    return;
                }
                
                // Find lead data
                const leadData = window.leadsData.find(lead => lead.id == leadId);
                console.log('Found lead data:', leadData);
                
                if (leadData) {
                    populateEditForm(leadData);
                    
                    // Show offcanvas
                    const offcanvasElement = document.getElementById('offcanvas_edit');
                    if (offcanvasElement) {
                        const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                        offcanvas.show();
                    } else {
                        console.error('Edit offcanvas element not found');
                        showAlert('Edit form not found', 'danger');
                    }
                } else {
                    console.error('Lead data not found for ID:', leadId);
                    showAlert('Lead data not found', 'danger');
                }
            }
        });
        
        console.log('Edit lead buttons listener attached with event delegation');
    }
    
    function populateEditForm(leadData) {
        console.log('Populating edit form with data:', leadData);
        
        // Populate basic fields
        const fields = {
            'editLeadId': leadData.id,
            'editLeadName': leadData.lead_name || leadData.name || '',
            'editCompanyName': leadData.company_name || '',
            'editMobileNo': leadData.mobile_no || '',
            'editAltMobileNo':leadData.alt_mobile_no,
            'editLeadOwner': leadData.Lead_owner || '',
            'editTags': leadData.tags || '',
            'editStage': leadData.stage || '' ,
            'editCity': leadData.city || '',
            'editState':leadData.state || '',
            'editPincode':leadData.pincode || '',
            'editAddress1':leadData.address1 || '',
            'editAddress2':leadData.address2 || '',
            'editNotes':leadData.notes || '',
            'editDispositions':leadData.dispositions|| '',
        };
        
        // Set field values
        Object.keys(fields).forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.value = fields[fieldId];
                console.log(`Set ${fieldId} to:`, fields[fieldId]);
            } else {
                console.warn(`Field ${fieldId} not found`);
            }
        });
        
        // Handle lead type radio buttons
        // const leadType = leadData.lead_type || leadData.type || 'person';
        // const leadTypeRadio = document.querySelector(`input[name="edit_lead_type"][value="${leadType}"]`);
        // if (leadTypeRadio) {
        //     leadTypeRadio.checked = true;
        //     console.log('Set lead type to:', leadType);
        // } else {
        //     console.warn('Lead type radio not found for value:', leadType);
        // }
        
        // Handle visibility radio buttons
        const visibility = leadData.visibility || 'public';
        const visibilityRadio = document.querySelector(`input[name="edit_visibility"][value="${visibility}"]`);
        // if (visibilityRadio) {
        //     visibilityRadio.checked = true;
        //     console.log('Set visibility to:', visibility);
        // } else {
        //     console.warn('Visibility radio not found for value:', visibility);
        // }
        
        // Handle status radio buttons
        const status = leadData.status != undefined ? leadData.status.toString() : '1';
        const statusRadio = document.querySelector(`input[name="edit_status"][value="${status}"]`);
        if (statusRadio) {
            statusRadio.checked = true;
            console.log('Set status to:', status);
        } else {
            console.warn('Status radio not found for value:', status);
        }
        
        // Handle tags (if available)
        if (leadData.tags && Array.isArray(leadData.tags)) {
            const tagsSelect = document.getElementById('editTags').value;
            console.log( tagsSelect);
            if (tagsSelect) {
                Array.from(tagsSelect).forEach(option => {
                    option.selected = leadData.tags.includes(option.value);
                });
                console.log('Set tags to:', leadData.tags);
            }
        }
        
        // Reset validation
        const editLeadForm = document.getElementById('editLeadForm');
        if (editLeadForm) {
            editLeadForm.classList.remove('was-validated');
        }
    }
    
    function setupEditLeadForm() {
        const editLeadForm = document.getElementById('editLeadForm');
        if (editLeadForm) {
            editLeadForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Edit lead form submitted');
                
                if (this.checkValidity()) {
                    const formData = new FormData(this);
                    const leadId = formData.get('lead_id') || document.getElementById('editLeadId')?.value;
                    
                    if (!leadId) {
                        showAlert('Lead ID not found', 'danger');
                        return;
                    }
                    
                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn ? submitBtn.textContent : '';
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Updating...';
                    }
                    
                    // Add method spoofing for PUT request
                    formData.append('_method', 'PUT');
                    
                    console.log('Updating lead with ID:', leadId);
                    
                    fetch(`/leads/${leadId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Reset button state
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                        
                        if (data.success) {
                            // Hide offcanvas
                            const offcanvasElement = document.getElementById('offcanvas_edit');
                            if (offcanvasElement) {
                                const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                                if (offcanvas) {
                                    offcanvas.hide();
                                }
                            }
                            
                            showAlert(data.message || 'Lead updated successfully!', 'success');
                            
                            // Reload page after delay
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        } else {
                            showAlert(data.message || 'Failed to update lead', 'danger');
                        }
                    })
                    .catch(error => {
                        // console.error('Error updating lead:', error);
                        
                        // Reset button state
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.textContent = originalText;
                        }
                        console.log(error.message);
                        showAlert('An error occurred while updating the lead', 'danger');
                    });
                } else {
                    this.classList.add('was-validated');
                    showAlert('Please fill in all required fields correctly', 'warning');
                }
            });
            console.log('Edit lead form listener attached');
        } else {
            console.warn('Edit lead form not found');
        }
    }
    
    
    
 
    
    function populateViewDetails(leadData) {
        console.log('Populating view details with data:', leadData);
        
        // Common field mappings
        const fieldMappings = {
             'viewLeadId': leadData.id,
            'viewLeadName': leadData.lead_name || leadData.name || '',
            'viewCompanyName': leadData.company_name || '',
            'viewMobileNo': leadData.mobile_no || '',
            'viewAltMobileNo':leadData.alt_mobile_no,
            'viewLeadOwner': leadData.Lead_owner || '',
            'viewTags': leadData.tags || '',
            'viewStage': leadData.stage || '' ,
            'viewCity': leadData.city || '',
            'viewState':leadData.state || '',
                    'viewPincode':leadData.pincode || '',
                    'viewAddress1':leadData.address1 || '',
                    'viewAddress2':leadData.address2 || '',
                    'viewNotes':leadData.notes || '',
                    'viewDispositions':leadData.dispositions|| '',
        };
        
        // Populate fields
        Object.keys(fieldMappings).forEach(fieldId => {
            const element = document.getElementById(fieldId);
            if (element) {
                element.textContent = fieldMappings[fieldId];
            }
        });
        
        // Handle special fields
        const leadTypeElement = document.getElementById('viewLeadType');
        if (leadTypeElement) {
            leadTypeElement.textContent = (leadData.lead_type || leadData.type || 'person').charAt(0).toUpperCase() + (leadData.lead_type || leadData.type || 'person').slice(1);
        }
        
        const statusElement = document.getElementById('viewStatus');
        if (statusElement) {
            const statusText = leadData.status == 1 ? 'Active' : 'Inactive';
            statusElement.textContent = statusText;
            statusElement.className = `badge ${leadData.status == 1 ? 'bg-success' : 'bg-secondary'}`;
        }
        
        const visibilityElement = document.getElementById('viewVisibility');
        if (visibilityElement) {
            visibilityElement.textContent = (leadData.visibility || 'public').charAt(0).toUpperCase() + (leadData.visibility || 'public').slice(1);
        }
    }
    

    
    function setupSearchFunctionality() {
        const searchInput = document.getElementById('searchLeads');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('#leads_list1 tbody tr, .leads-table tbody tr, [data-lead-row]');
                
                tableRows.forEach(function(row) {
                    const cells = row.querySelectorAll('td');
                    let rowText = '';
                    cells.forEach(cell => {
                        rowText += cell.textContent.toLowerCase() + ' ';
                    });
                    
                    if (rowText.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
            console.log('Search functionality attached');
        } else {
            console.warn('Search input not found');
        }
    }
    
    function setupSelectAllCheckbox() {
        const selectAllCheckbox = document.getElementById('select-all');
        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('input[name="lead_ids[]"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
            
            // Individual checkbox change
            const leadCheckboxes = document.querySelectorAll('input[name="lead_ids[]"]');
            leadCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const allCheckboxes = document.querySelectorAll('input[name="lead_ids[]"]');
                    const checkedCheckboxes = document.querySelectorAll('input[name="lead_ids[]"]:checked');
                    
                    selectAllCheckbox.checked = allCheckboxes.length === checkedCheckboxes.length;
                });
            });
            
            console.log('Select all checkbox functionality attached');
        } else {
            console.warn('Select all checkbox not found');
        }
    }
    
    function setupLeadTypeRadios() {
        // Add form lead type radios
        const leadTypeRadios = document.querySelectorAll('input[name="lead_type"]');
        leadTypeRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                handleLeadTypeChange(this.value, 'companyName');
            });
        });
        
        // Edit form lead type radios
        const editLeadTypeRadios = document.querySelectorAll('input[name="edit_lead_type"]');
        editLeadTypeRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                handleLeadTypeChange(this.value, 'editCompanyName');
            });
        });
        
        console.log('Lead type radio listeners attached');
    }
    
    function handleLeadTypeChange(value, companyFieldId) {
        const companyField = document.getElementById(companyFieldId);
        const companyLabel = companyField?.parentElement.querySelector('label');
        
        if (value === 'organization') {
            if (companyField) {
                companyField.required = true;
            }
            if (companyLabel) {
                companyLabel.innerHTML = 'Company Name <span class="text-danger">*</span>';
            }
        } else {
            if (companyField) {
                companyField.required = false;
            }
            if (companyLabel) {
                companyLabel.innerHTML = 'Company Name';
            }
        }
    }
    
    function setupVisibilityRadios() {
        const visibilityRadios = document.querySelectorAll('input[name="visibility"], input[name="edit_visibility"]');
        visibilityRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'select_people') {
                    console.log('Select people option chosen');
                    // Here you could show a people selection modal or dropdown
                }
            });
        });
        
        console.log('Visibility radio listeners attached');
    }


    // Form validation helper functions
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
    
    function validatePhone(phone) {
        const re = /^[\+]?[1-9][\d]{0,15}$/;
        return re.test(phone.replace(/\s+/g, ''));
    }
    
   
</script>
<!-- Custom CSS for enhanced styling -->
<style>
    .offcanvas-end {
        border-left: 1px solid #dee2e6;
    }
    
    .offcanvas-header {
        background-color: #f8f9fa;
    }
    
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    
    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .invalid-feedback {
        display: block;
    }
    
    .was-validated .form-control:valid,
    .was-validated .form-select:valid {
        border-color: #198754;
    }
    
    .was-validated .form-control:invalid,
    .was-validated .form-select:invalid {
        border-color: #dc3545;
    }
    
    .badge-status {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }
    
    .bg-pending {
        background-color: #ffc107 !important;
        color: #212529;
    }
    
    .table-action .dropdown-menu {
        min-width: 120px;
    }
    
    .table-action .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
    
    .table-action .dropdown-item:hover {
        background-color: #f8f9fa;
    }
    
    .avatar img {
        object-fit: cover;
        border-radius: 4px;
    }
    
    .title-name {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 500;
    }
    
    .title-name:hover {
        text-decoration: underline;
    }
    
    .set-star i {
        color: #ffc107;
        cursor: pointer;
    }
    
    .set-star i:hover {
        color: #ffcd39;
    }
    
    .checkboxs {
        position: relative;
        cursor: pointer;
    }
    
    .checkboxs input[type="checkbox"] {
        opacity: 0;
        position: absolute;
    }
    
    .checkmarks {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #fff;
        border: 2px solid #dee2e6;
        border-radius: 3px;
    }
    
    .checkboxs input[type="checkbox"]:checked ~ .checkmarks {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .checkmarks:after {
        content: "";
        position: absolute;
        display: none;
    }
    
    .checkboxs input[type="checkbox"]:checked ~ .checkmarks:after {
        display: block;
    }
    
    .checkboxs .checkmarks:after {
        left: 5px;
        top: 2px;
        width: 4px;
        height: 8px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    
    .modal-content {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .modal-header {
        background-color: #f8f9fa;
    }
    
    @media (max-width: 768px) {
        .offcanvas-end {
            width: 100% !important;
        }
        
        .table-responsive {
            font-size: 0.875rem;
        }
        
        .page-title {
            font-size: 1.25rem;
        }
    }

    
</style>
<style>
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination {
        display: flex;
        list-style: none;
        padding-left: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
        color: #007bff;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #ccc;
        pointer-events: none;
        border-color: #ddd;
    }

    .pagination li a:hover {
        background-color: #e9ecef;
        border-color: #007bff;
    }
</style>


@endsection 