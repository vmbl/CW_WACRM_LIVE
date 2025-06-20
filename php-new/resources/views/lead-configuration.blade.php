<?php $page = 'lead-configuration'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    @component('components.breadcrumb')
                        @slot('title')
                            Lead Configuration
                        @endslot
                        @slot('item2')
                            Settings
                        @endslot
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Configuration Header -->
                    <div class="contact-head">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="contact-breadcrumb">
                                    <li><a href="{{url('leads')}}"><i class="ti ti-arrow-narrow-left"></i>Back to Leads</a></li>
                                    <li>Lead Configuration</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <div class="contact-pagination">
                                    <p>Manage Lead Settings</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Success/Error Messages -->
                    <div id="alert-container"></div>

                    <!-- Configuration Tabs -->
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#sources" data-bs-toggle="tab" data-bs-target="#sources" class="nav-link active" role="tab">
                                        <i class="ti ti-source-code me-1"></i>Lead Sources
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#dispositions" data-bs-toggle="tab" data-bs-target="#dispositions" class="nav-link" role="tab">
                                        <i class="ti ti-clipboard-list me-1"></i>Lead Dispositions
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#statuses" data-bs-toggle="tab" data-bs-target="#statuses" class="nav-link" role="tab">
                                        <i class="ti ti-flag me-1"></i>Lead Statuses
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content pt-4">

                                <!-- Lead Sources Tab -->
                                <div class="tab-pane active show" id="sources" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h4 class="fw-semibold">Lead Sources</h4>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_source_modal">
                                            <i class="ti ti-plus me-1"></i>Add Source
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="sources-table">
                                            <thead>
                                                <tr>
                                                    <th>Source Name</th>
                                                    <th>Description</th>
                                                    <th>Color</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th class="no-sort">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sources-table-body">
                                                @if(isset($leadSources) && count($leadSources) > 0)
                                                    @foreach($leadSources as $source)
                                                        <tr data-id="{{ $source['_id'] ?? '' }}">
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge me-2" style="background-color: {{ $source['color'] ?? '#007bff' }}; width: 12px; height: 12px; border-radius: 50%;"></span>
                                                                    {{ $source['name'] ?? 'Unknown' }}
                                                                </div>
                                                            </td>
                                                            <td>{{ $source['description'] ?? 'No description' }}</td>
                                                            <td>
                                                                <span class="color-preview" style="background-color: {{ $source['color'] ?? '#007bff' }}; width: 30px; height: 20px; display: inline-block; border-radius: 4px; border: 1px solid #ddd;"></span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{ ($source['is_active'] ?? true) ? 'success' : 'danger' }}">
                                                                    {{ ($source['is_active'] ?? true) ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ isset($source['created_at']) ? \Carbon\Carbon::parse($source['created_at'])->format('M d, Y H:i') : 'N/A' }}</td>
                                                            <td>
                                                                <div class="action-table-data">
                                                                    <div class="edit-delete-action">
                                                                        <a class="me-2 p-2 edit-source" href="javascript:void(0);"  data-id="{{ $source['_id'] ?? '' }}">
                                                                            <i class="ti ti-edit text-info"></i>
                                                                        </a>
                                                                        <a class="p-2 delete-source" href="javascript:void(0);" data-type="source" data-id="{{ $source['_id'] ?? '' }}">
                                                                            <i class="ti ti-trash text-danger"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6" class="text-center py-4">
                                                            <p class="text-muted">No lead sources configured yet.</p>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Lead Dispositions Tab -->
                                <div class="tab-pane fade" id="dispositions" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h4 class="fw-semibold">Lead Dispositions</h4>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_disposition_modal">
                                            <i class="ti ti-plus me-1"></i>Add Disposition
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="dispositions-table">
                                            <thead>
                                                <tr>
                                                    <th>Disposition Name</th>
                                                    <th>Description</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Order</th>
                                                    <th>Created Date</th>
                                                    <th class="no-sort">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dispositions-table-body">
                                                @if(isset($leadDispositions) && count($leadDispositions) > 0)
                                                    @foreach($leadDispositions as $disposition)
                                                        <tr data-id="{{ $disposition['_id'] ?? '' }}">
                                                            <td>{{ $disposition['name'] ?? 'Unknown' }}</td>
                                                            <td>{{ $disposition['description'] ?? 'No description' }}</td>
                                                            <td>
                                                                <span class="badge badge-{{ ($disposition['type'] ?? 'positive') == 'positive' ? 'success' : (($disposition['type'] ?? 'positive') == 'negative' ? 'danger' : 'warning') }}">
                                                                    {{ ucfirst($disposition['type'] ?? 'positive') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{ ($disposition['is_active'] ?? true) ? 'success' : 'danger' }}">
                                                                    {{ ($disposition['is_active'] ?? true) ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $disposition['sort_order'] ?? 0 }}</td>
                                                            <td>{{ isset($disposition['created_at']) ? \Carbon\Carbon::parse($disposition['created_at'])->format('M d, Y H:i') : 'N/A' }}</td>
                                                            <td>
                                                                <div class="action-table-data">
                                                                    <div class="edit-delete-action">
                                                                        <a class="me-2 p-2 edit-disposition" href="javascript:void(0);" data-id="{{ $disposition['_id'] ?? '' }}">
                                                                            <i class="ti ti-edit text-info"></i>
                                                                        </a>
                                                                        <a class="p-2 delete-disposition" href="javascript:void(0);" data-type="disposition" data-id="{{ $disposition['_id'] ?? '' }}">
                                                                            <i class="ti ti-trash text-danger"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="7" class="text-center py-4">
                                                            <p class="text-muted">No lead dispositions configured yet.</p>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Lead Statuses Tab -->
                                <div class="tab-pane fade" id="statuses" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h4 class="fw-semibold">Lead Statuses</h4>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_status_modal">
                                            <i class="ti ti-plus me-1"></i>Add Status
                                        </button>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="statuses-table">
                                            <thead>
                                                <tr>
                                                    <th>Status Name</th>
                                                    <th>Description</th>
                                                    <th>Color</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Order</th>
                                                    <th>Created Date</th>
                                                    <th class="no-sort">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="statuses-table-body">
                                                @if(isset($leadStatuses) && count($leadStatuses) > 0)
                                                    @foreach($leadStatuses as $status)
                                                        <tr data-id="{{ $status['_id'] ?? '' }}">
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge me-2" style="background-color: {{ $status['color'] ?? '#007bff' }}; width: 12px; height: 12px; border-radius: 50%;"></span>
                                                                    {{ $status['name'] ?? 'Unknown' }}
                                                                </div>
                                                            </td>
                                                            <td>{{ $status['description'] ?? 'No description' }}</td>
                                                            <td>
                                                                <span class="color-preview" style="background-color: {{ $status['color'] ?? '#007bff' }}; width: 30px; height: 20px; display: inline-block; border-radius: 4px; border: 1px solid #ddd;"></span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{ ($status['category'] ?? 'open') == 'open' ? 'primary' : (($status['category'] ?? 'open') == 'converted' ? 'success' : 'secondary') }}">
                                                                    {{ ucfirst($status['category'] ?? 'open') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-{{ ($status['is_active'] ?? true) ? 'success' : 'danger' }}">
                                                                    {{ ($status['is_active'] ?? true) ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $status['sort_order'] ?? 0 }}</td>
                                                            <td>{{ isset($status['created_at']) ? \Carbon\Carbon::parse($status['created_at'])->format('M d, Y H:i') : 'N/A' }}</td>
                                                            <td>
                                                                <div class="action-table-data">
                                                                    <div class="edit-delete-action">
                                                                        <a class="me-2 p-2 edit-status" href="javascript:void(0);" data-id="{{ $status['_id'] ?? '' }}">
                                                                            <i class="ti ti-edit text-info"></i>
                                                                        </a>
                                                                        <a class="p-2 delete-status" href="javascript:void(0);" data-type="status" data-id="{{ $status['_id'] ?? '' }}">
                                                                            <i class="ti ti-trash text-danger"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8" class="text-center py-4">
                                                            <p class="text-muted">No lead statuses configured yet.</p>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Add Source Modal -->
    <div class="modal fade" id="add_source_modal" tabindex="-1" aria-labelledby="add_source_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_source_modal_label">Add Lead Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-source-form">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="source_name" class="form-label">Source Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="source_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="source_description" class="form-label">Description</label>
                            <textarea class="form-control" id="source_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="source_color" class="form-label">Color</label>
                            <input type="color" class="form-control form-control-color" id="source_color" name="color" value="#007bff">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="source_is_active" name="is_active" checked>
                                <label class="form-check-label" for="source_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-primary" onClick="check1(event)">Add Source</button>

                    </div>
                </form>
                <script>
                    //    $('#add-source-form').on('submit', function(e) {
function check1(e){


    e.preventDefault();
    // alert('your form is submitted !');
    // return;
    
   let form = document.getElementById('add-source-form');
    let formData = new FormData(form);
    
    // Handle checkbox manually if needed
    if (!$('#source_is_active').is(':checked')) {
        formData.append('is_active', true);
        
    }
    console.log('form submitted ');
    $.ajax({
        url: '{{ route("lead.sources.store") }}',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log("response.message");
            if(response.success) {
                $('#add_source_modal').modal('hide');
                showAlert('success', response.message);
                location.reload();
            } else {
                showAlert('error', response.message);
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText); // Add this for debugging
            let errorMessage = 'An error occurred';
            if(xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            showAlert('error', errorMessage);
        }
    });
// });
}
                </script>
            </div>
        </div>
    </div>

    <!-- Edit Source Modal -->
    <div class="modal fade" id="edit_source_modal" tabindex="-1" aria-labelledby="edit_source_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_source_modal_label">Edit Lead Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-source-form">
                    <input type="hidden" id="edit_source_id" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_source_name" class="form-label">Source Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_source_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_source_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_source_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_source_color" class="form-label">Color</label>
                            <input type="color" class="form-control form-control-color" id="edit_source_color" name="color">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_source_is_active" name="is_active">
                                <label class="form-check-label" for="edit_source_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Source</button>
                    </div>
                </form>
              
            </div>
        </div>
    </div>

    <!-- Add Disposition Modal -->
    <div class="modal fade" id="add_disposition_modal" tabindex="-1" aria-labelledby="add_disposition_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_disposition_modal_label">Add Lead Disposition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-disposition-form">
                     @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="disposition_name" class="form-label">Disposition Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="disposition_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="disposition_description" class="form-label">Description</label>
                            <textarea class="form-control" id="disposition_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="disposition_type" class="form-label">Type</label>
                            <select class="form-select" id="disposition_type" name="type">
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                                <option value="neutral">Neutral</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disposition_sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="disposition_sort_order" name="sort_order" value="0">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="disposition_is_active" name="is_active" checked>
                                <label class="form-check-label" for="disposition_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" onClick="check2(event)">Add Disposition</button>
                    </div>
                </form>
                <script>
                     // Add Disposition Form Submit
   
    function check2(e){

        e.preventDefault();
        // alert('your form is submitted !');
    // return;
        const $form = $('#add-disposition-form');

//    let form = document.getElementById('add-disposition-form');
//     let formData = new FormData(form);
    //      if (!$('#disposition_is_active').is(':checked')) {
    //     formData.append('is_active', true);
        
    // }
    console.log('form submitted ');
    console.log( $form.serialize());
        $.ajax({
            url: '{{ route("lead.dispositions.store") }}',
            method: 'POST',
            data: $form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.success) {
                    $('#add_disposition_modal').modal('hide');
                    showAlert('success', response.message);
                    location.reload();
                } else {
                    showAlert('error', response.message);
                }
            },
            error: function(xhr) {
                let errorMessage = 'An error occurred';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showAlert('error', errorMessage);
            }
        });
}
                </script>
            </div>
        </div>
    </div>

    <!-- Edit Disposition Modal -->
    <div class="modal fade" id="edit_disposition_modal" tabindex="-1" aria-labelledby="edit_disposition_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_disposition_modal_label">Edit Lead Disposition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-disposition-form">
                    <input type="hidden" id="edit_disposition_id" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_disposition_name" class="form-label">Disposition Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_disposition_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_disposition_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_disposition_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_disposition_type" class="form-label">Type</label>
                            <select class="form-select" id="edit_disposition_type" name="type">
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                                <option value="neutral">Neutral</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_disposition_sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="edit_disposition_sort_order" name="sort_order">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_disposition_is_active" name="is_active">
                                <label class="form-check-label" for="edit_disposition_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Disposition</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Status Modal -->
    <div class="modal fade" id="add_status_modal" tabindex="-1" aria-labelledby="add_status_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_status_modal_label">Add Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-status-form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status_name" class="form-label">Status Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="status_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_description" class="form-label">Description</label>
                            <textarea class="form-control" id="status_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status_color" class="form-label">Color</label>
                            <input type="color" class="form-control form-control-color" id="status_color" name="color" value="#007bff">
                        </div>
                        <div class="mb-3">
                            <label for="status_category" class="form-label">Category</label>
                            <select class="form-select" id="status_category" name="type">
                                <option value="open">Open</option>
                                <option value="converted">Converted</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="status_sort_order" name="sort_order" value="0">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="status_is_active" name="is_active" checked>
                                <label class="form-check-label" for="status_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"onClick="check3(event)">Add Status</button>
                    </div>
                </form>
                <script>
                    // Add Status Form Submit
    // $('#add-status-form').on('submit', function(e) {
     function check3(e){

        e.preventDefault();
        // alert('your form is submitted !');
    // return;
        const $form = $('#add-status-form');
        e.preventDefault();
        
        $.ajax({
            url: '{{ route("lead.statuses.store") }}',
            method: 'POST',
            data: $form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.success) {
                    $('#add_status_modal').modal('hide');
                    showAlert('success', response.message);
                    location.reload();
                } else {
                    showAlert('error', response.message);
                }
            },
            error: function(xhr) {
                let errorMessage = 'An error occurred';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showAlert('error', errorMessage);
            }
        });
     }
                </script>
            </div>
        </div>
    </div>

    <!-- Edit Status Modal -->
    <div class="modal fade" id="edit_status_modal" tabindex="-1" aria-labelledby="edit_status_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_status_modal_label">Edit Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-status-form">
                    <input type="hidden" id="edit_status_id" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_status_name" class="form-label">Status Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_status_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_status_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_color" class="form-label">Color</label>
                            <input type="color" class="form-control form-control-color" id="edit_status_color" name="color">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_category" class="form-label">Category</label>
                            <select class="form-select" id="edit_status_category" name="type">
                                <option value="open">Open</option>
                                <option value="converted">Converted</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_status_sort_order" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="edit_status_sort_order" name="sort_order">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_status_is_active" name="is_active">
                                <label class="form-check-label" for="edit_status_is_active">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="delete_confirmation_modal" tabindex="-1" aria-labelledby="delete_confirmation_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_confirmation_modal_label">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger"  id="confirm-delete-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTables for all tables
    $('#sources-table, #dispositions-table, #statuses-table').DataTable({
        "pageLength": 25,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": "no-sort" }
        ]
    });

    // Show alert function
    function showAlert(type, message) {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        $('#alert-container').html(alertHtml);
        
        // Auto dismiss after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }

    // Edit Source Click
    $(document).on('click', '.edit-source', function() {
        const sourceId = $(this).data('id');

        $.ajax({
            url: `{{ url('leads/configuration/sources') }}/${sourceId}`,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    const source = response.data;
                    $('#edit_source_id').val(sourceId);
                    $('#edit_source_name').val(source.name);
                    $('#edit_source_description').val(source.description);
                    $('#edit_source_color').val(source.color);
                    $('#edit_source_is_active').prop('checked', source.is_active);
                    $('#edit_source_modal').modal('show');
                } else {
                    showAlert('danger', response.message || 'Error loading source data.');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                showAlert('danger', 'Error loading source data.');
            }
        });
    });

    // Edit Source Form Submit
    $('#edit-source-form').on('submit', function(e) {
        e.preventDefault();
         
        const sourceId = $('#edit_source_id').val();
        const formData = {
            name: $('#edit_source_name').val(),
            description: $('#edit_source_description').val(),
            color: $('#edit_source_color').val(),
            is_active: $('#edit_source_is_active').is(':checked')
        };

        $.ajax({
            url: `{{ url('leads/configuration/sources') }}/${sourceId}`,
            type: 'PUT',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#edit_source_modal').modal('hide');
                    showAlert('success', 'Lead source updated successfully!');
                    location.reload();
                } else {
                    showAlert('danger', response.message || 'Error updating lead source.');
                }
            },
            error: function(xhr) {
                let errorMessage = 'Error updating lead source.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showAlert('danger', errorMessage);
            }
        });
    });

    // Edit Disposition Click
    $(document).on('click', '.edit-disposition', function () {
        const dispositionId = $(this).data('id');
        if (!dispositionId) {
            showAlert('danger', 'Disposition ID missing.');
            return;
        }

        $.ajax({
            url: `{{ url('leads/configuration/dispositions') }}/${dispositionId}`,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log('Response:', response);
                if (response.success && response.data) {
                    const disposition = response.data;
                    $('#edit_disposition_id').val(disposition._id);
                    $('#edit_disposition_name').val(disposition.name);
                    $('#edit_disposition_description').val(disposition.description);
                    $('#edit_disposition_type').val(disposition.type);
                    $('#edit_disposition_sort_order').val(disposition.sort_order);
                    $('#edit_disposition_is_active').prop('checked', disposition.is_active);
                    $('#edit_disposition_modal').modal('show');
                } else {
                    showAlert('danger', response.message || 'Error loading disposition data.');
                }
            },
            error: function (xhr) {
                console.error(xhr);
                showAlert('danger', 'Error loading disposition data.');
            }
        });
    });

    // Edit Disposition Form Submit
    $('#edit-disposition-form').on('submit', function(e) {
        e.preventDefault();
        
        const dispositionId = $('#edit_disposition_id').val();
        const formData = {
            name: $('#edit_disposition_name').val(),
            description: $('#edit_disposition_description').val(),
            type: $('#edit_disposition_type').val(),
            sort_order: $('#edit_disposition_sort_order').val(),
            is_active: $('#edit_disposition_is_active').is(':checked')
        };

        $.ajax({
            url: `{{ url('leads/configuration/dispositions') }}/${dispositionId}`,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#edit_disposition_modal').modal('hide');
                    showAlert('success', 'Lead disposition updated successfully!');
                    location.reload();
                } else {
                    showAlert('danger', response.message || 'Error updating lead disposition.');
                }
            },
            error: function(xhr) {
                let errorMessage = 'Error updating lead disposition.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showAlert('danger', errorMessage);
            }
        });
    });

    // Edit Status Click
    $(document).on('click', '.edit-status', function() {
        const statusId = $(this).data('id');
        
        $.ajax({
            url: `{{ url('leads/configuration/statuses') }}/${statusId}`,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    const status = response.data;
                    $('#edit_status_id').val(status._id);
                    $('#edit_status_name').val(status.name);
                    $('#edit_status_description').val(status.description);
                    $('#edit_status_color').val(status.color);
                    $('#edit_status_category').val(status.type);
                    $('#edit_status_sort_order').val(status.sort_order);
                    $('#edit_status_is_active').prop('checked', status.is_active);
                    $('#edit_status_modal').modal('show');
                } else {
                    showAlert('danger', response.message || 'Error loading status data.');
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                showAlert('danger', 'Error loading status data.');
            }
        });
    });

    // Edit Status Form Submit
    $('#edit-status-form').on('submit', function(e) {
        e.preventDefault();
        
        const statusId = $('#edit_status_id').val();
        const formData = {
            name: $('#edit_status_name').val(),
            description: $('#edit_status_description').val(),
            color: $('#edit_status_color').val(),
            type: $('#edit_status_category').val(),
            sort_order: $('#edit_status_sort_order').val(),
            is_active: $('#edit_status_is_active').is(':checked')
        };

        $.ajax({
            url: `{{ url('leads/configuration/statuses') }}/${statusId}`,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#edit_status_modal').modal('hide');
                    showAlert('success', 'Lead status updated successfully!');
                    location.reload();
                } else {
                    showAlert('danger', response.message || 'Error updating lead status.');
                }
            },
            error: function(xhr) {
                let errorMessage = 'Error updating lead status.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showAlert('danger', errorMessage);
            }
        });
    });

    // Delete functionality
    let deleteId = null;
    let deleteType = null;

    // Delete Actions
    $(document).on('click', '.delete-source, .delete-disposition, .delete-status', function() {
        deleteId = $(this).data('id');
        deleteType = $(this).data('type');

        $('#confirm-delete-btn').data('id', deleteId);
        $('#confirm-delete-btn').data('type', deleteType);
        $('#delete-item-type').text(deleteType);
        $('#delete_confirmation_modal').modal('show');
    });

    // Confirm Delete
    $('#confirm-delete-btn').on('click', function() {
        const id = $(this).data('id');
        const type = $(this).data('type');
        
        if (id && type) {
            let deleteUrl = '';

            switch(type) {
                case 'source':
                    deleteUrl = `{{ url('leads/configuration/sources') }}/${id}`;
                    break;
                case 'disposition':
                    deleteUrl = `{{ url('leads/configuration/dispositions') }}/${id}`;
                    break;
                case 'status':
                    deleteUrl = `{{ url('leads/configuration/statuses') }}/${id}`;
                    break;
                default:
                    showAlert('danger', 'Invalid delete type.');
                    return;
            }

            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#delete_confirmation_modal').modal('hide');
                    if (response.success) {
                        showAlert('success', `${type} deleted successfully!`);
                        location.reload();
                    } else {
                        showAlert('danger', response.message || `Error deleting ${type}.`);
                    }
                },
                error: function(xhr) {
                    $('#delete_confirmation_modal').modal('hide');
                    let errorMessage = `Error deleting ${type}.`;
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    showAlert('danger', errorMessage);
                }
            });

            // Reset
            deleteId = null;
            deleteType = null;
        }
    });

    // Reset forms when modals are hidden
    $('.modal').on('hidden.bs.modal', function() {
        const form = $(this).find('form')[0];
        if (form) form.reset();
    });
});
</script>
@endsection