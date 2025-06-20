<?php $page = 'profile'; ?>
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
                profile
                @endslot
                @endcomponent

                <!-- Settings Menu -->
                <!-- @component('components.settings-menu')
                @endcomponent -->
                <!-- /Settings Menu -->

                <div class="row">
                    <div class="col-xl-3 col-lg-12 theiaStickySidebar">

                        <!-- Settings Sidebar -->
                        <div class="card">
                            <div class="card-body">
                                <div class="settings-sidebar">
                                    <h4 class="fw-semibold mb-3">General Settings</h4>
                                    <div class="list-group list-group-flush settings-sidebar">
                                        <a href="{{route('profile')}}" class="fw-medium active">Profile</a>
                                        <a href="{{route('security')}}" class="fw-medium">Security</a>
                                        <!-- <a href="{{route('notifications')}}" class="fw-medium">Notifications</a>
                                        <a href="{{route('connected-apps')}}" class="fw-medium">Connected Apps</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Settings Sidebar -->

                    </div>

                    <div class="col-xl-9 col-lg-12">

                        <!-- Settings Info -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-semibold mb-3">Profile Settings</h4>
                                
                                <!-- Success/Error Messages -->
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('profile.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="border-bottom mb-3 pb-3">
                                        <h5 class="fw-semibold mb-1">Employee Information</h5>
                                        <p>Provide the information below</p>
                                    </div>
                                    <div class="mb-3">
                                        <div class="profile-upload">
                                            <div class="profile-upload-img">
                                                <span><i class="ti ti-photo"></i></span>
                                                <!-- <img id="ImgPreview" 
                                                     src="{{ Auth::user()->profile_image_base64 ?? URL::asset('/build/img/profiles/avatar-02.jpg') }}" 
                                                     alt="img" 
                                                     class="preview1"> -->
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
                        <!-- /Settings Info -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->

@section('scripts')
<script>
$(document).ready(function() {
    // Image preview functionality
    $('#imag').change(function() {
        const file = this.files[0];
        if (file) {
            // Validate file size (800KB = 819200 bytes)
            if (file.size > 819200) {
                alert('File size must be less than 800KB');
                this.value = '';
                return;
            }

            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please select a valid image file (JPG, PNG, GIF)');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#ImgPreview').attr('src', e.target.result);
                $('#removeImage1').show();
            }
            reader.readAsDataURL(file);
        }
    });

    // Remove image functionality
    $('#removeImage1').click(function() {
        $('#ImgPreview').attr('src', '{{ URL::asset("/build/img/profiles/avatar-02.jpg") }}');
        $('#imag').val('');
        $(this).hide();
    });

    // Form validation
    $('form').submit(function(e) {
        let isValid = true;
        let errorMessage = '';

        // Check required fields
        const requiredFields = [
            { field: 'first_name', name: 'First Name' },
            { field: 'last_name', name: 'Last Name' },
            { field: 'username', name: 'User Name' },
            { field: 'phone_number', name: 'Phone Number' },
            { field: 'email', name: 'Email' },
            { field: 'address', name: 'Address' },
            { field: 'country', name: 'Country' },
            { field: 'state', name: 'State' },
            { field: 'city', name: 'City' },
            { field: 'postal_code', name: 'Postal Code' }
        ];

        requiredFields.forEach(function(item) {
            
            const value = $('input[name="' + item.field + '"]').val().trim();
            if (item.field=="email"){
                alert(value);
               
            }
            if (!value) {
                isValid = false;
                errorMessage += item.name + ' is required.\n';
            }
        });

        // Email validation
        const email = $('input[name="email"]').val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            errorMessage += 'Please enter a valid email address.\n';
        }
    alert(email);

        // Phone number validation (basic)
        const phone = $('input[name="phone_number"]').val().trim();
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        if (phone && !phoneRegex.test(phone)) {
            isValid = false;
            errorMessage += 'Please enter a valid phone number.\n';
        }

        if (!isValid) {
            e.preventDefault();
            alert(errorMessage);
        }
    });

    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

    // Character limit indicators (optional)
    $('input[type="text"], input[type="email"]').each(function() {
        const maxLength = $(this).attr('maxlength');
        if (maxLength) {
            $(this).after('<small class="text-muted char-count"></small>');
            $(this).on('input', function() {
                const remaining = maxLength - $(this).val().length;
                $(this).next('.char-count').text(remaining + ' characters remaining');
            });
        }
    });
});
</script>
@endsection