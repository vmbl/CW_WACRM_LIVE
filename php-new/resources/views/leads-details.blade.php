<?php $page = 'leads-details'; ?>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @if(!isset($lead))
            <div class="alert alert-danger">
                <h4>Lead Not Found</h4>
                <p>The requested lead could not be found.</p>
                <a href="{{ url('leads') }}" class="btn btn-primary">Back to Leads</a>
            </div>
        @else
            <!-- Lead Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl me-3 bg-primary text-white">
                                        {{ strtoupper(substr($lead['lead_name'], 0, 2)) }}
                                    </div>
                                    <div>
                                        <h4 class="mb-1">{{ $lead['lead_name'] }}</h4>
                                        <p class="mb-0 text-muted">{{ $lead['company_name'] ?? 'N/A' }}</p>
                                        <small class="text-muted">{{ $lead['email'] ?? '' }}</small>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <!-- Status Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-{{ getStatusColor($lead['status'] ?? 0) }}" data-bs-toggle="dropdown">
                                            {{ getStatusText($lead['status'] ?? 0) }} <i class="ti ti-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item update-status" href="#" data-status="0">New</a></li>
                                            <li><a class="dropdown-item update-status" href="#" data-status="1">Contacted</a></li>
                                            <li><a class="dropdown-item update-status" href="#" data-status="2">Qualified</a></li>
                                            <li><a class="dropdown-item update-status" href="#" data-status="3">Proposal</a></li>
                                            <li><a class="dropdown-item update-status" href="#" data-status="4">Won</a></li>
                                            <li><a class="dropdown-item update-status" href="#" data-status="5">Lost</a></li>
                                        </ul>
                                    </div>
                                    <!-- Actions -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#setReminderModal">
                                        <i class="ti ti-bell"></i> Set Reminder
                                    </button>
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                                        <i class="ti ti-upload"></i> Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left Column - Lead Info -->
                <div class="col-md-8">
                    <!-- Lead Details Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Lead Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr><td class="fw-medium">Phone:</td><td>{{ $lead['phone'] ?? 'N/A' }}</td></tr>
                                        <tr><td class="fw-medium">Source:</td><td>{{ $lead['source'] ?? 'N/A' }}</td></tr>
                                        <tr><td class="fw-medium">Value:</td><td>${{ number_format($lead['value'] ?? 0) }}</td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr><td class="fw-medium">Created:</td><td>{{ $lead['created_date'] ?? 'N/A' }}</td></tr>
                                        <tr><td class="fw-medium">Owner:</td><td>
                                            {{ $lead['owner'] ?? 'Unassigned' }}
                                            <button class="btn btn-sm btn-link p-0 ms-2" data-bs-toggle="modal" data-bs-target="#changeOwnerModal">Change</button>
                                        </td></tr>
                                        <tr><td class="fw-medium">Priority:</td><td>
                                            <span class="badge bg-{{ getPriorityColor($lead['priority'] ?? 'Medium') }}">
                                                {{ $lead['priority'] ?? 'Medium' }}
                                            </span>
                                        </td></tr>
                                        <tr><td class="fw-medium">Address:</td><td>{{ $lead['address'] ?? 'N/A' }}</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
 <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card1 {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px 16px;
            border-bottom: 1px solid #e9ecef;
            background-color: #fff;
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .card-body {
            padding: 24px;
            /* Add scrollable container */
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Custom scrollbar styling */
        .card-body::-webkit-scrollbar {
            width: 6px;
        }

        .card-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .card-body::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .card-body::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .timeline {
            position: relative;
            padding-left: 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 23px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #e9ecef 0%, #e9ecef 100%);
        }

        .timeline-item {
            position: relative;
            padding-left: 60px;
            padding-bottom: 32px;
            display: flex;
            align-items: flex-start;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-marker {
            position: absolute;
            left: 12px;
            top: 8px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .timeline-marker.bg-primary {
            background-color: #007bff;
        }

        .timeline-marker.bg-warning {
            background-color: #ffc107;
        }

        .timeline-marker.bg-info {
            background-color: #17a2b8;
        }

        .timeline-marker.bg-success {
            background-color: #28a745;
        }

        .timeline-marker::after {
            content: '';
            width: 8px;
            height: 8px;
            background-color: white;
            border-radius: 50%;
        }

        .timeline-content {
            flex: 1;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 16px 20px;
            margin-left: 12px;
            border-left: 3px solid #dee2e6;
            transition: all 0.2s ease;
        }

        .timeline-content:hover {
            background: #e9ecef;
            border-left-color: #007bff;
            transform: translateX(2px);
        }

        .timeline-content h6 {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .timeline-content p {
            color: #6c757d;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .timeline-content small {
            color: #868e96;
            font-size: 12px;
            display: block;
        }

        .timeline-date {
            position: absolute;
            left: -120px;
            top: 8px;
            text-align: right;
            color: #6c757d;
            font-size: 12px;
            font-weight: 500;
            width: 100px;
        }

        .timeline-date .date {
            display: block;
            font-size: 14px;
            color: #2c3e50;
            font-weight: 600;
        }

        .timeline-date .time {
            display: block;
            margin-top: 2px;
        }

        .activity-icon {
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 2px;
        }

        .no-activity {
            text-align: center;
            padding: 40px 20px;
            color: #6c757d;
            font-style: italic;
        }

        .activity-tag {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 500;
            margin-left: 8px;
        }

        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 10px;
            right: 20px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .scroll-indicator {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .timeline-date {
                position: static;
                text-align: left;
                margin-bottom: 8px;
                width: auto;
            }
            
            .timeline-item {
                padding-left: 50px;
            }

            .card-body {
                max-height: 400px;
            }
        }
    </style>

<div class="container">
        <!-- Activity History -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Activity History</h5>
            </div>
            <div class="card-body">
                <?php if(isset($activities) && count($activities) > 0): ?>
                    <div class="timeline">
                        <?php foreach($activities as $activity): ?>
                            <div class="timeline-item">
                                <div class="timeline-date">
                                    <?php if(isset($activity['formatted_date'])): ?>
                                        <span class="date"><?= htmlspecialchars($activity['formatted_date']) ?></span>
                                        <span class="time"><?= htmlspecialchars($activity['formatted_time']) ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="timeline-marker bg-<?= htmlspecialchars($activity['type'] ?? 'primary') ?>">
                                    <div class="activity-icon"></div>
                                </div>
                                <div class="timeline-content">
                                    <h6 class="mb-1"><?= htmlspecialchars($activity['title'] ?? 'Activity') ?></h6>
                                    <p class="mb-1 text-muted"><?= htmlspecialchars($activity['description'] ?? '') ?></p>
                                    <small class="text-muted">
                                        <?= htmlspecialchars($activity['date'] ?? '') ?> by <?= htmlspecialchars($activity['user'] ?? 'System') ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted text-center py-3">No activity recorded yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

                    <!-- Documents Section -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Documents</h5>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
                                <i class="ti ti-plus"></i> Add Document
                            </button>
                        </div>
                        <div class="card-body">
                            @if(isset($documents) && count($documents) > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($documents as $doc)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="ti ti-file me-2"></i>
                                                <strong>{{ $doc['name'] ?? 'Document' }}</strong>
                                                <br><small class="text-muted">{{ $doc['uploaded_date'] ?? '' }}</small>
                                            </div>
                                            <a href="{{ $doc['url'] ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="ti ti-download"></i> Download
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted text-center py-3">No documents uploaded yet.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sidebar -->
                <div class="col-md-4">
                    <!-- Upcoming Follow-ups -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title mb-0">Upcoming Follow-ups</h6>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#setReminderModal">
                                <i class="ti ti-plus"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            @if(isset($upcomingFollowups) && count($upcomingFollowups) > 0)
                                @foreach($upcomingFollowups as $followup)
                                    <div class="border-start border-3 border-warning ps-3 mb-3">
                                        <h6 class="mb-1">{{ $followup['title'] ?? 'Follow-up' }}</h6>
                                        <p class="mb-1 small">{{ $followup['description'] ?? '' }}</p>
                                        <small class="text-muted">{{ $followup['due_date'] ?? '' }}</small>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted small">No upcoming follow-ups</p>
                            @endif
                        </div>
                    </div>

                    <!-- Lead Statistics -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Lead Statistics</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label small">Progress</label>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" style="width: {{ getProgressPercentage($lead['status'] ?? 0) }}%"></div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $lead['interactions'] ?? 0 }}</h6>
                                    <small class="text-muted">Interactions</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $lead['days_active'] ?? 0 }}</h6>
                                    <small class="text-muted">Days Active</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Set Reminder Modal -->
<div class="modal fade" id="setReminderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Reminder / Follow-up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="reminderForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date & Time *</label>
                            <input type="datetime-local" class="form-control" name="due_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Priority</label>
                            <select class="form-control" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        Set Reminder
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- Upload Document Modal -->
<div class="modal fade" id="uploadDocModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="documentForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select File *</label>
                        <input type="file" class="form-control" name="document" required accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                        <small class="text-muted">Max size: 10MB. Supported: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
                    </div>
                    <div class="progress d-none" id="uploadProgress">
                        <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Owner Modal -->
<div class="modal fade" id="changeOwnerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Lead Owner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="ownerForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select New Owner *</label>
                       
                                    <select id="owner_id">
               @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
                </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                        Change Owner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success/Error Toast -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast" role="alert">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body"></div>
    </div>
    <div id="errorToast" class="toast" role="alert">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body"></div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    const leadId = '{{ $lead['id'] ?? '' }}';
    // const baseUrl = "{{ url('/') }}";
    
    // Ensure we have a valid lead ID
    if (!leadId) {
        console.error('Lead ID not found');
        showError('Lead ID is missing. Please refresh the page.');
        return;
    }

    // Update Status
    // $('.update-status').click(function(e) {
    //     e.preventDefault();
    //     const status = $(this).data('status');
    //     const statusText = $(this).text().trim();
        
    //     if (confirm(`Are you sure you want to change status to "${statusText}"?`)) {
    //         updateLeadStatus(status);
    //     }
    // });

    // Set Reminder Form
   
$('#reminderForm').submit(function(e) {
        alert('check');
        e.preventDefault();
        const formData = {
            title: $(this).find('input[name="title"]').val(),
            description: $(this).find('textarea[name="description"]').val(),
            due_date: $(this).find('input[name="due_date"]').val(),
            priority: $(this).find('select[name="priority"]').val(),
            _token: $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}'
        };
        
        submitAjaxRequest(
            `/leads/${leadId}/reminder`,
            formData,
            '#setReminderModal',
            'Reminder set successfully!',
            'reminderForm'
        );
    });
    // Document Upload Form
    $('#documentForm').submit(function(e) {
        e.preventDefault();
        const fileInput = this.querySelector('input[type="file"]');
        const file = fileInput.files[0];
        
        if (!file) {
            showError('Please select a file to upload.');
            return;
        }
        
        // Validate file size (10MB = 10 * 1024 * 1024 bytes)
        if (file.size > 10 * 1024 * 1024) {
            showError('File size must be less than 10MB.');
            return;
        }
        
        // Validate file type
        const allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];
        
        if (!allowedTypes.includes(file.type)) {
            showError('Invalid file type. Please upload PDF, DOC, DOCX, XLS, XLSX, JPG, or PNG files only.');
            return;
        }
        
        const formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}');
        
        submitFileUpload(formData);
    });

    // Change Owner Form
    $('#ownerForm').submit(function(e) {
        e.preventDefault();
        // const ownerId = $(this).find('select[name="owner_id"]').val();
        const ownerId=$("#owner_id").val();
        alert(ownerId);
        if (!ownerId) {
            showError('Please select a new owner.');
            return;
        }
        
        const formData = {
            owner_id: ownerId,
            _token: $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}'
        };
        
        submitAjaxRequest(
            `/leads/${leadId}/owner`,
            formData,
            '#changeOwnerModal',
            'Lead owner changed successfully!',
            'ownerForm'
        );
    });

   function updateLeadStatus(status) {
    const $clickedBtn = $('.update-status[data-status="' + status + '"]');

    $.ajax({
        url: `/leads/${leadId}/status`,
        method: 'POST',
        data: {
            status: status,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $clickedBtn.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status"></span> Updating...'
            );
        },
        success: function (response) {
            console.log('Status update response:', response);
            if (response.success) {
                showSuccess(response.message || 'Lead status updated!');
                setTimeout(() => location.reload(), 1000);
            } else {
                showError(response.message || response.error || 'Failed to update status');
            }
        },
        error: function (xhr) {
            console.error('AJAX Error:', xhr);
            let errorMessage = 'Error updating status';
            if (xhr.responseJSON?.error) errorMessage = xhr.responseJSON.error;
            if (xhr.status === 404) errorMessage = 'Lead not found';
            if (xhr.status === 422) errorMessage = 'Invalid data';
            showError(errorMessage);
        },
        complete: function () {
            $clickedBtn.prop('disabled', false).html(getStatusText(status) + ' <i class="ti ti-chevron-down"></i>');
        }
    });
}

$('.update-status').click(function(e) {
    e.preventDefault();
    const status = $(this).data('status');
    const statusText = getStatusText(status);
    if (confirm(`Are you sure you want to change status to "${statusText}"?`)) {
        updateLeadStatus(status);
    }
});

function getStatusText(status) {
    switch (parseInt(status)) {
        case 0: return 'New';
        case 1: return 'Contacted';
        case 2: return 'Qualified';
        case 3: return 'Proposal';
        case 4: return 'Won';
        case 5: return 'Lost';
        default: return 'Unknown';
    }
}



    // Generic AJAX Request Function
    function submitAjaxRequest(url, data, modal, successMessage, formId) {
        const submitBtn = $(`#${formId}`).find('button[type="submit"]');
        const spinner = submitBtn.find('.spinner-border');
        const originalText = submitBtn.text();
        
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            beforeSend: function() {
                submitBtn.prop('disabled', true);
                spinner.removeClass('d-none');
                submitBtn.text('Processing...');
            },
            success: function(response) {
                console.log('AJAX Success:', response);
                if (response.success) {
                    $(modal).modal('hide');
                    showSuccess(successMessage);
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showError(response.error || response.message || 'Operation failed');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: xhr.responseText,
                    error: error
                });
                
                let errorMessage = 'Operation failed';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    } else if (xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseJSON.errors) {
                        const errors = Object.values(xhr.responseJSON.errors).flat();
                        errorMessage = errors.join(', ');
                    }
                }
                
                showError(errorMessage);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
                submitBtn.text(originalText);
            }
        });
    }

    // File Upload Function
    function submitFileUpload(formData) {
        const submitBtn = $('#documentForm').find('button[type="submit"]');
        const spinner = submitBtn.find('.spinner-border');
        const progressBar = $('#uploadProgress');
        const originalText = submitBtn.text();
        
        $.ajax({
            url: `/leads/${leadId}/document`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                submitBtn.prop('disabled', true);
                spinner.removeClass('d-none');
                submitBtn.text('Uploading...');
                progressBar.removeClass('d-none');
            },
            xhr: function() {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(evt) {
                    if (evt.lengthComputable) {
                        const percentComplete = (evt.loaded / evt.total) * 100;
                        progressBar.find('.progress-bar').css('width', percentComplete + '%');
                        progressBar.find('.progress-bar').text(Math.round(percentComplete) + '%');
                    }
                }, false);
                return xhr;
            },
            success: function(response) {
                console.log('File Upload Success:', response);
                if (response.success) {
                    $('#uploadDocModal').modal('hide');
                    showSuccess('Document uploaded successfully!');
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showError(response.error || response.message || 'Document upload failed');
                }
            },
            error: function(xhr, status, error) {
                console.error('File Upload Error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: xhr.responseText,
                    error: error
                });
                
                let errorMessage = 'Document upload failed';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error;
                    } else if (xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseJSON.errors) {
                        const errors = Object.values(xhr.responseJSON.errors).flat();
                        errorMessage = errors.join(', ');
                    }
                }
                
                showError(errorMessage);
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
                submitBtn.text(originalText);
                progressBar.addClass('d-none');
                progressBar.find('.progress-bar').css('width', '0%');
                progressBar.find('.progress-bar').text('');
            }
        });
    }

    // Utility Functions
    function showSuccess(message) {
        const toast = $('#successToast');
        toast.find('.toast-body').text(message);
        const bsToast = new bootstrap.Toast(toast[0], {
            autohide: true,
            delay: 3000
        });
        bsToast.show();
    }

    function showError(message) {
        const toast = $('#errorToast');
        toast.find('.toast-body').text(message);
        const bsToast = new bootstrap.Toast(toast[0], {
            autohide: true,
            delay: 5000
        });
        bsToast.show();
    }

    function getStatusText(status) {
        const texts = ['New', 'Contacted', 'Qualified', 'Proposal', 'Won', 'Lost'];
        return texts[status] || 'New';
    }

    // Reset forms when modals are hidden
    $('.modal').on('hidden.bs.modal', function() {
        const form = $(this).find('form')[0];
        if (form) {
            form.reset();
        }
        $(this).find('.spinner-border').addClass('d-none');
        $(this).find('button[type="submit"]').prop('disabled', false);
        $('#uploadProgress').addClass('d-none').find('.progress-bar').css('width', '0%').text('');
    });

    // Initialize tooltips if needed
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
});
</script>
@endsection

@php
function getStatusColor($status) {
    $colors = ['secondary', 'primary', 'info', 'warning', 'success', 'danger'];
    return $colors[$status] ?? 'secondary';
}

function getStatusText($status) {
    $texts = ['New', 'Contacted', 'Qualified', 'Proposal', 'Won', 'Lost'];
    return $texts[$status] ?? 'New';
}

function getPriorityColor($priority) {
    return $priority === 'High' ? 'danger' : ($priority === 'Medium' ? 'warning' : 'success');
}

function getProgressPercentage($status) {
    return min(($status + 1) * 20, 100);
}
@endphp

@endsection