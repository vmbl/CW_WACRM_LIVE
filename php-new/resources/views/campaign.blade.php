<?php $page = 'campaign'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @component('components.breadcrumb')
                @slot('title') WhatsApp Campaign @endslot
                @slot('item1') Dashboard @endslot
                @slot('item2') campaign @endslot
                @endcomponent

                <!-- Alert Container -->
                <div id="alert-container"></div>

                <!-- Dashboard Stats -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <i class="ti ti-brand-whatsapp fs-1 mb-2"></i>
                                <h3 id="total-campaigns">0</h3>
                                <p class="mb-0">Total Campaigns</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <i class="ti ti-send fs-1 mb-2"></i>
                                <h3 id="messages-sent">0</h3>
                                <p class="mb-0">Messages Sent</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <i class="ti ti-checks fs-1 mb-2"></i>
                                <h3 id="messages-delivered">0</h3>
                                <p class="mb-0">Messages Delivered</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <i class="ti ti-eye fs-1 mb-2"></i>
                                <h3 id="messages-read">0</h3>
                                <p class="mb-0">Messages Read</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Campaign List -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Campaign List</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campaignModal">
                            <i class="ti ti-plus me-2"></i>Create Campaign
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="campaignTable">
                                <thead>
                                    <tr>
                                        <th>Campaign Name</th>
                                        <th>Template</th>
                                        <th>Group</th>
                                        <th>Status</th>
                                        <th>Type</th>
                                        <th>Created Date</th>
                                        <th>Recipients</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="campaignList">
                                    <tr>
                                        <td colspan="8" class="text-center">Loading campaigns...</td>
                                    </tr>
                                </tbody>
                            </table>
                            <script>
                                function deleteCampaign(campaignId) {
    // Store the campaign ID and show the modal
    campaignIdToDelete = campaignId;
    $('#deleteConfirmModal').modal('show');
}

function performDelete(campaignId) {
    console.log('Deleting campaign:', campaignId);
    $.ajax({
        url: `/campaign/${campaignId}`,
        method: 'DELETE',
        timeout: 10000,
        success: function(response) {
            console.log('Delete campaign response:', response);
            if (response && response.success) {
                loadCampaigns();
                loadDashboardStats();
                showAlert('Campaign deleted successfully!', 'success');
            } else {
                showAlert(response?.message || 'Failed to delete campaign', 'error');
            }
        },
        error: function(xhr) {
            console.error('Delete campaign error:', xhr);
            showAlert(xhr.responseJSON?.message || 'Failed to delete campaign', 'error');
        }
    });
}
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Campaign Modal -->
<div class="modal fade" id="campaignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create WhatsApp Campaign</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="campaignForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Campaign Name *</label>
                                <input type="text" class="form-control" name="campaign_name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Template *</label>
                                <select class="form-select" name="template_id" id="templateSelect" >
                                    <option value="">Select Template</option>
                                    <option value="1">S Template</option>

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Group *</label>
                              <select name="group_id" id="group_id" class="form-control">
    <option value="">-- Select Group --</option>
    @foreach($groups as $group)
        <option value="{{ $group->id }}">{{ $group->name }}</option>
    @endforeach
</select>

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Campaign Type *</label>
                                <select class="form-select" name="campaign_type" required>
                                    <option value="">Select Type</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="promotion">Promotion</option>
                                    <option value="reminder">Reminder</option>
                                    <option value="follow-up">Follow-up</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Execution Type *</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="execution_type" value="immediate" id="immediate" required>
                                        <label class="form-check-label" for="immediate">Immediate</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="execution_type" value="scheduled" id="scheduled" required>
                                        <label class="form-check-label" for="scheduled">Schedule</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12" id="scheduleDiv" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Schedule Date & Time *</label>
                                <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduledAt">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Optional campaign description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span class="btn-text">Create Campaign</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ti ti-alert-triangle text-warning me-2"></i>
                    Confirm Delete
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Are you sure you want to delete this campaign?</p>
                <p class="text-muted small mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="ti ti-trash me-1"></i>
                    Delete Campaign
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Global variable to store campaign ID for deletion
let campaignIdToDelete = null;

$(document).ready(function() {
    // Ensure CSRF token is available
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    if (!csrfToken) {
        csrfToken = $('input[name="_token"]').val();
    }
    
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
    });
    
    // Set minimum datetime for scheduled campaigns
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    $('#scheduledAt').attr('min', now.toISOString().slice(0, 16));
    
    // Initialize page
    initializePage();
    
    // Handle execution type change
    $('input[name="execution_type"]').change(function() {
        if ($(this).val() === 'scheduled') {
            $('#scheduleDiv').show();
            $('#scheduledAt').attr('required', true);
        } else {
            $('#scheduleDiv').hide();
            $('#scheduledAt').removeAttr('required').val('');
        }
    });
    
    // Handle form submission
    $('#campaignForm').submit(function(e) {
        e.preventDefault();
        alert('check');
        console.log('Form submitted');
        clearValidationErrors();
        createCampaign();
    });

    // Handle modal events
    $('#campaignModal').on('hidden.bs.modal', function() {
        resetForm();
    });

    // Handle delete confirmation
    $('#confirmDeleteBtn').click(function() {
        if (campaignIdToDelete) {
            $('#deleteConfirmModal').modal('hide');
            performDelete(campaignIdToDelete);
            campaignIdToDelete = null;
        }
    });

    // Reset campaignIdToDelete when modal is hidden
    $('#deleteConfirmModal').on('hidden.bs.modal', function() {
        campaignIdToDelete = null;
    });
});

function initializePage() {
    console.log('Initializing page...');
    loadDashboardStats();
    loadCampaigns();
    // loadTemplates();
    loadGroups();
}

function loadDashboardStats() {
    console.log('Loading dashboard stats...');
    $.ajax({
        url: '/campaign/stats',
        method: 'GET',
        timeout: 10000,
        success: function(response) {
            console.log('Dashboard stats response:', response);
            if (response && response.success && response.data) {
                const data = response.data;
                $('#total-campaigns').text(data.total_campaigns || 0);
                $('#messages-sent').text(data.messages_sent || 0);
                $('#messages-delivered').text(data.messages_delivered || 0);
                $('#messages-read').text(data.messages_read || 0);
            } else {
                console.warn('Invalid dashboard stats response structure');
                setDefaultStats();
            }
        },
        error: function(xhr, status, error) {
            console.error('Failed to load dashboard stats:', {xhr, status, error});
            setDefaultStats();
        }
    });
}

function setDefaultStats() {
    $('#total-campaigns').text('0');
    $('#messages-sent').text('0');
    $('#messages-delivered').text('0');
    $('#messages-read').text('0');
}

function loadCampaigns() {
    console.log('Loading campaigns...');
    $.ajax({
        url: '/campaign',
        method: 'GET',
        timeout: 10000,
        success: function(response) {
            console.log('Campaigns response:', response);
            let html = '';
            if (response && response.success && response.data && Array.isArray(response.data) && response.data.length > 0) {
                response.data.forEach(function(campaign) {
                    html += buildCampaignRow(campaign);
                });
            } else {
                html = '<tr><td colspan="8" class="text-center">No campaigns found</td></tr>';
            }
            $('#campaignList').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Failed to load campaigns:', {xhr, status, error});
            $('#campaignList').html('<tr><td colspan="8" class="text-center text-danger">Error loading campaigns</td></tr>');
        }
    });
}

function buildCampaignRow(campaign) {
    return `
        <tr>
            <td>${escapeHtml(campaign.campaign_name || 'N/A')}</td>
            <td>${escapeHtml(campaign.template_name || 'N/A')}</td>
            <td>${escapeHtml(campaign.group.name|| 'N/A')}</td>
            <td>${getStatusBadge(campaign.status)}</td>
            <td><span class="badge bg-info">${escapeHtml(campaign.campaign_type || 'N/A')}</span></td>
            <td>${formatDate(campaign.created_at)}</td>
            <td>${campaign.recipients || 0}</td>
           <td>
    ${['draft', 'scheduled'].includes(campaign.status) ? 
        `<button class="btn btn-sm btn-success me-1" onclick="runCampaign('${campaign.id}')" title="Run Campaign">
            <i class="ti ti-play"></i>
        </button>` : ''}
    
    ${campaign.status !== 'running' ? 
        `<button class="btn btn-sm btn-danger" onclick="performDelete('${campaign.id}')" title="Delete Campaign">
            <i class="ti ti-trash"></i>
        </button>` : ''}
</td>

        </tr>
    `;
}

// function loadTemplates() {
//     console.log('Loading templates...');
//     $.ajax({
//         url: '/api/whatsapp-templates',
//         method: 'GET',
//         timeout: 10000,
//         success: function(response) {
//             console.log('Templates response:', response);
//             let options = '<option value="">Select Template</option>';
//             if (response && response.success && response.data && Array.isArray(response.data)) {
//                 response.data.forEach(function(template) {
//                     options += `<option value="${template.id}">${escapeHtml(template.name)}</option>`;
//                 });
//             }
//             $('#templateSelect').html(options);
//         },
//         error: function(xhr, status, error) {
//             console.error('Failed to load templates:', {xhr, status, error});
//             $('#templateSelect').html('<option value="">Error loading templates</option>');
//         }
//     });
// }

function loadGroups() {
    console.log('Loading groups...');
    $.ajax({
        url: '/campaign/groups',
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

function createCampaign() {
    console.log('Creating campaign...');
    const $submitBtn = $('#submitBtn');
    const $btnText = $submitBtn.find('.btn-text');
    const $spinner = $submitBtn.find('.spinner-border');
    
    // Show loading state
    $submitBtn.prop('disabled', true);
    $btnText.text('Creating...');
    $spinner.removeClass('d-none');
    
    // Validate form
    if (!validateForm()) {
        resetSubmitButton();
        return;
    }
    
    // Get form data
    const formData = {};
    $('#campaignForm').serializeArray().forEach(function(item) {
        if (item.value.trim()) {
            formData[item.name] = item.value.trim();
        }
    });
    
    console.log('Form data:', formData);
    
    $.ajax({
        url: '/campaign',
        method: 'POST',
        data: formData,
        timeout: 15000,
        success: function(response) {
            console.log('Campaign creation success:', response);
            if (response && response.success) {
                $('#campaignModal').modal('hide');
                resetForm();
                loadCampaigns();
                loadDashboardStats();
                showAlert('Campaign created successfully!', 'success');
            } else {
                const message = response?.message || 'Failed to create campaign';
                console.error('Campaign creation failed:', message);
                showAlert(message, 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error('Campaign creation error:', {xhr, status, error, response: xhr.responseJSON});
            
            let message = 'Failed to create campaign';
            
            if (xhr.responseJSON) {
                if (xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.responseJSON.errors) {
                    handleValidationErrors(xhr.responseJSON.errors);
                    const errors = Object.values(xhr.responseJSON.errors).flat();
                    message = errors.join(', ');
                }
            } else if (xhr.status === 0) {
                message = 'Network error. Please check your connection.';
            } else if (xhr.status === 404) {
                message = 'API endpoint not found. Please check your routes.';
            } else if (xhr.status === 500) {
                message = 'Server error. Please try again later.';
            }
            
            showAlert(message, 'error');
        },
        complete: function() {
            resetSubmitButton();
        }
    });
}

function validateForm() {
    let isValid = true;
    const requiredFields = [
        'campaign_name',
        'template_id', 
        'group_id',
        'campaign_type',
        'execution_type'
    ];
    
    requiredFields.forEach(function(fieldName) {
        const $field = $(`[name="${fieldName}"]`);
        if (!$field.val() || $field.val().trim() === '') {
            showFieldError($field, 'This field is required');
            isValid = false;
        }
    });
    
    // Validate scheduled date if scheduled is selected
    if ($('input[name="execution_type"]:checked').val() === 'scheduled') {
        const $scheduledAt = $('#scheduledAt');
        if (!$scheduledAt.val()) {
            showFieldError($scheduledAt, 'Schedule date and time is required');
            isValid = false;
        } else {
            const scheduledDate = new Date($scheduledAt.val());
            const now = new Date();
            if (scheduledDate <= now) {
                showFieldError($scheduledAt, 'Schedule date must be in the future');
                isValid = false;
            }
        }
    }
    
    return isValid;
}

function showFieldError($field, message) {
    $field.addClass('is-invalid');
    $field.siblings('.invalid-feedback').text(message);
}

function clearValidationErrors() {
    $('.form-control, .form-select').removeClass('is-invalid');
    $('.invalid-feedback').text('');
}

function handleValidationErrors(errors) {
    Object.keys(errors).forEach(function(fieldName) {
        const $field = $(`[name="${fieldName}"]`);
        if ($field.length) {
            showFieldError($field, errors[fieldName][0]);
        }
    });
}

function resetSubmitButton() {
    const $submitBtn = $('#submitBtn');
    const $btnText = $submitBtn.find('.btn-text');
    const $spinner = $submitBtn.find('.spinner-border');
    
    $submitBtn.prop('disabled', false);
    $btnText.text('Create Campaign');
    $spinner.addClass('d-none');
}

function resetForm() {
    $('#campaignForm')[0].reset();
    $('#scheduleDiv').hide();
    $('#scheduledAt').removeAttr('required');
    clearValidationErrors();
    resetSubmitButton();
}

function runCampaign(campaignId) {
    if (confirm('Are you sure you want to run this campaign?')) {
        console.log('Running campaign:', campaignId);
        $.ajax({
            url: `/campaign/${campaignId}/run`,
            method: 'POST',
            timeout: 10000,
            success: function(response) {
                console.log('Run campaign response:', response);
                if (response && response.success) {
                    loadCampaigns();
                    loadDashboardStats();
                    showAlert('Campaign started successfully!', 'success');
                } else {
                    showAlert(response?.message || 'Failed to run campaign', 'error');
                }
            },
            error: function(xhr) {
                console.error('Run campaign error:', xhr);
                showAlert(xhr.responseJSON?.message || 'Failed to run campaign', 'error');
            }
        });
    }
}



function getStatusBadge(status) {
    const badges = {
        'draft': '<span class="badge bg-secondary">Draft</span>',
        'running': '<span class="badge bg-primary">Running</span>',
        'completed': '<span class="badge bg-success">Completed</span>',
        'scheduled': '<span class="badge bg-warning">Scheduled</span>',
        'failed': '<span class="badge bg-danger">Failed</span>',
        'paused': '<span class="badge bg-info">Paused</span>'
    };
    return badges[status] || '<span class="badge bg-light text-dark">Unknown</span>';
}

function formatDate(dateString) {
    if (!dateString) return 'N/A';
    try {
        return new Date(dateString).toLocaleDateString('en-GB', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    } catch (e) {
        return 'Invalid Date';
    }
}

function escapeHtml(text) {
    if (!text) return '';
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
}

function showAlert(message, type) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const iconClass = type === 'success' ? 'ti-check' : 'ti-alert-circle';
    
    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="ti ${iconClass} me-2"></i>
            ${escapeHtml(message)}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    // Remove existing alerts
    $('.alert').remove();
    
    // Add new alert
    $('#alert-container').html(alertHtml);
    
    // Auto-hide after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut(300, function() {
            $(this).remove();
        });
    }, 5000);
    
    // Scroll to top to show alert
    $('html, body').animate({
        scrollTop: $('#alert-container').offset().top - 20
    }, 300);
}

// Global error handler
$(document).ajaxError(function(event, xhr, settings, thrownError) {
    if (xhr.status === 419) {
        showAlert('Session expired. Please refresh the page.', 'error');
    }
});
</script> 
@endsection