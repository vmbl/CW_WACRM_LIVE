<?php $page = 'security'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">

                    @component('components.breadcrumb')
                        @slot('title')
                            Settings
                        @endslot
                        @slot('item2')
                            security
                        @endslot
                    @endcomponent

                    <div class="row">
                        <div class="col-xl-3 col-lg-12 theiaStickySidebar">
                            <!-- Settings Sidebar -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="settings-sidebar">
                                        <h4 class="fw-semibold mb-3">General Settings</h4>
                                        <div class="list-group list-group-flush settings-sidebar">
                                            <a href="{{url('profile')}}" class="fw-medium">Profile</a>
                                            <a href="{{url('security')}}" class="fw-medium active">Security</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Settings Sidebar -->
                        </div>

                        <div class="col-xl-9 col-lg-12">
                            <!-- User Profiles Table -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-semibold mb-3">User Profiles</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="profilesTable">
                                            <thead>
                                                <tr>
                                                    <th>Profile Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($profiles as $profile)
                                                <tr id="profile-row-{{ $profile->_id }}">
                                                    <td>
                                                        <img src="{{ $profile->profile_image_url }}" 
                                                             alt="Profile" class="rounded-circle" width="40" height="40">
                                                    </td>
                                                    <td>{{ $profile->full_name }}</td>
                                                    <td>{{ $profile->email }}</td>
                                                    <td>{{ $profile->phone_number }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary me-2" 
                                                                onclick="openPasswordModal('{{ $profile->_id }}')">
                                                            Update Password
                                                        </button>
                                                        <button class="btn btn-sm btn-secondary" 
                                                                onclick="openEditModal('{{ $profile->_id }}')">
                                                            Edit Profile
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Profiles Table -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Password Update Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="passwordForm">
                    <div class="modal-body">
                        <input type="hidden" id="password_profile_id" name="profile_id">
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
 <form action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">


                                    @csrf
                                    <div class="border-bottom mb-3 pb-3">
                                        <h5 class="fw-semibold mb-1">Employee Information</h5>
                                        <p>Provide the information below</p>
                                    </div>
                                    <div class="mb-3">
                                        <div class="profile-upload">
                                            <div class="profile-upload-img">
                                                <span><i class="ti ti-photo"></i></span>
                                                <img id="ImgPreview" 
                                                     src="{{ Auth::user()->profile_image_base64 ?? URL::asset('/build/img/profiles/avatar-02.jpg') }}" 
                                                     alt="img" 
                                                     class="preview1">
                                            </div>
                                            <div class="profile-upload-content">
                                                <label class="profile-upload-btn">
                                                    <i class="ti ti-file-broken"></i> Upload File 
                                                    <input type="file" id="imag" name="profile_image" class="input-img" accept="image/*">
                                                </label>
                                                <p>JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        First Name  <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           name="first_name" 
                                                           class="form-control" 
                                                           value="{{ old('first_name', Auth::user()->first_name ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Last Name  <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           name="last_name" 
                                                           class="form-control" 
                                                           value="{{ old('last_name', Auth::user()->last_name ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        User Name  <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           name="username" 
                                                           class="form-control" 
                                                           value="{{ old('username', Auth::user()->username ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Phone Number  <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" 
                                                           name="phone_number" 
                                                           class="form-control" 
                                                           value="{{ old('phone_number', Auth::user()->phone_number ?? '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Email  <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" 
                                                           name="email" 
                                                           class="form-control" 
                                                           value="{{ old('email', Auth::user()->email ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom mb-3 pb-3">
                                        <h5 class="fw-semibold mb-1">Address</h5>
                                        <p>Please enter the address details</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Address  <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="address" 
                                                       class="form-control" 
                                                       value="{{ old('address', Auth::user()->address ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Country <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="country" 
                                                       class="form-control" 
                                                       value="{{ old('country', Auth::user()->country ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    State / Province <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="state" 
                                                       class="form-control" 
                                                       value="{{ old('state', Auth::user()->state ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    City <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="city" 
                                                       class="form-control" 
                                                       value="{{ old('city', Auth::user()->city ?? '') }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Postal Code <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" 
                                                       name="postal_code" 
                                                       class="form-control" 
                                                       value="{{ old('postal_code', Auth::user()->postal_code ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-light me-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
            </div>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loadingSpinner" class="d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @section('scripts')
    <script>
        $(document).ready(function() {
            // CSRF Token setup for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        // Open Password Update Modal
        function openPasswordModal(profileId) {
            $('#password_profile_id').val(profileId);
            $('#passwordForm')[0].reset();
            $('#passwordModal').modal('show');
        }

        // Open Edit Profile Modal
        function openEditModal(profileId) {
            showLoading();
            
            $.ajax({
                url: `/profile/${profileId}/edit-data`,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        const profile = response.profile;
                        $('#edit_profile_id').val(profileId);
                        $('#first_name').val(profile.first_name);
                        $('#last_name').val(profile.last_name);
                        $('#email').val(profile.email);
                        $('#phone_number').val(profile.phone_number);
                        $('#username').val(profile.username);
                        $('#job_title').val(profile.job_title);
                        $('#company').val(profile.company);
                        $('#bio').val(profile.bio);
                        
                        hideLoading();
                        $('#editModal').modal('show');
                    }
                },
                error: function(xhr) {
                    hideLoading();
                    showAlert('Error fetching profile data', 'danger');
                }
            });
        }

        // Handle Password Form Submission
        $('#passwordForm').on('submit', function(e) {
            e.preventDefault();
            
            const profileId = $('#password_profile_id').val();
            const formData = new FormData(this);
            
            showLoading();
            
            $.ajax({
                url: `/profile/${profileId}/password`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    hideLoading();
                    if (response.success) {
                        $('#passwordModal').modal('hide');
                        showAlert(response.message, 'success');
                        $('#passwordForm')[0].reset();
                    }
                },
                error: function(xhr) {
                    hideLoading();
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Password update failed. ';
                    
                    if (errors) {
                        errorMessage += Object.values(errors).flat().join(' ');
                    }
                    
                    showAlert(errorMessage, 'danger');
                }
            });
        });

        // Handle Edit Profile Form Submission
        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            
            const profileId = $('#edit_profile_id').val();
            const formData = new FormData(this);
            
            showLoading();
            
            $.ajax({
                url: `/profile/${profileId}`,
                type: 'PUT', 
                data: $(this).serialize(),
                success: function(response) {
                    hideLoading();
                    if (response.success) {
                        $('#editModal').modal('hide');
                        showAlert(response.message, 'success');
                        
                        // Update table row with new data
                        updateTableRow(profileId, response.profile);
                    }
                },
                error: function(xhr) {
                    hideLoading();
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Profile update failed. ';
                    
                    if (errors) {
                        errorMessage += Object.values(errors).flat().join(' ');
                    }
                    
                    showAlert(errorMessage, 'danger');
                }
            });
        });

        // Update table row with new data
        function updateTableRow(profileId, profile) {
            const row = $(`#profile-row-${profileId}`);
            row.find('td:nth-child(2)').text(profile.full_name);
            row.find('td:nth-child(3)').text(profile.email);
            row.find('td:nth-child(4)').text(profile.phone_number);
        }

        // Show loading spinner
        function showLoading() {
            $('#loadingSpinner').removeClass('d-none');
        }

        // Hide loading spinner
        function hideLoading() {
            $('#loadingSpinner').addClass('d-none');
        }

        // Show alert message
        function showAlert(message, type) {
            const alertHtml = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            
            $('.content').prepend(alertHtml);
            
            // Auto dismiss after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        }
    </script>

    @component('components.model-popup')
    @endcomponent
@endsection