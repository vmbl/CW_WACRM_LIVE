<?php $page = 'contact-details'; ?>
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
                    123
                    @endslot
                    @slot('item2')
                    contact-details
                    @endslot
                    @endcomponent

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Contact User -->
                    <div class="contact-head">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <ul class="contact-breadcrumb">
                                    <li><a href="{{ url('contact-grid') }}"><i
                                                class="ti ti-arrow-narrow-left"></i>Contacts</a></li>
                                    <li>Jackson Daniel</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <div class="contact-pagination">
                                    <p>1 of 40</p>
                                    <ul>
                                        <li>
                                            <a href="{{ url('contact-details') }}"><i class="ti ti-chevron-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('contact-details') }}"><i class="ti ti-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="avatar avatar-xxl online online-sm me-3 flex-shrink-0">									
                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                        <span class="status online"></span>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Jackson Daniel</h5>
                                        <p class="mb-2">Facility Manager, Global INC</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge badge-light bg-light-600 text-default me-3"><i class="ti ti-lock me-1"></i>Private</span> 
                                            <p class="d-inline-flex align-items-center mb-0"><i class="fa-solid fa-star text-warning me-1"></i> 5.0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="contacts-action">
                                    <a href="#" class="btn-icon rating"><i class="fa-solid fa-star"></i></a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add_2">
                                        <i class="ti ti-circle-plus"></i>Add Deal
                                    </a>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_compose">
                                        <i class="ti ti-mail"></i>Send Email
                                    </a>
                                    <a href="{{url('chat')}}" class="btn-icon">
                                        <i class="ti ti-brand-hipchat"></i>
                                    </a>
                                    <a href="#" class="btn-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit-circle"></i></a>	
                                    <div class="act-dropdown">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i>Delete</a>
                                        </div>
                                    </div>
                                </div>	
                            </div>								
                        </div>
					</div>
                    <!-- /Contact User -->

                </div>

                <!-- Contact Sidebar -->
                <div class="col-xl-3 theiaStickySidebar">
                    <div class="card">
                        <div class="card-body p-3">
                            <h6 class="mb-3 fw-semibold">Basic Information</h6>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
                                        <i class="ti ti-mail"></i>
                                    </span>
                                    <p>darleeo@example.com</p>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
                                        <i class="ti ti-phone"></i>
                                    </span>
                                    <p>+1 12445-47878</p>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                    <p>22, Ave Street, Newyork, USA</p>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="avatar avatar-xs bg-light-300 p-0 flex-shrink-0 rounded-circle text-dark me-2">
                                        <i class="ti ti-calendar-exclamation"></i>
                                    </span>
                                    <p>Created on 5 Jan 2024, 10:30 am</p>
                                </div>
                            </div>
                            <hr>
                            <h6 class="mb-3 fw-semibold">Other Information</h6>
                            <ul>
                                <li class="row mb-3"><span class="col-6">Language</span><span class="col-6">English</span></li>
                                <li class="row mb-3"><span class="col-6">Currency</span><span class="col-6">United States dollar</span></li>
                                <li class="row mb-3"><span class="col-6">Last Modified</span><span class="col-6">27 Sep 2023, 11:45 pm</span></li>
                                <li class="row mb-3"><span class="col-6">Source</span><span class="col-6">Paid Campaign</span></li>
                            </ul>	
                            <hr>							
                            <h6 class="mb-3 fw-semibold">Tags</h6>
                            <div class="mb-3">
                                <a href="javascript:void(0);" class="badge badge-soft-success fw-medium me-2">Collab</a>
                                <a href="javascript:void(0);" class="badge badge-soft-warning fw-medium mb-0">Rated</a>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <h6  class="mb-3 fw-semibold">Company</h6>
                                <a href="javascript:void(0);" class="link-purple mb-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-circle-plus me-1"></i>Add New</a>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg rounded me-2 border">
                                        <img src="{{URL::asset('/build/img/icons/google-icon.svg')}}" alt="" class="img-fluid w-auto h-auto">
                                    </span>
                                    <div>
                                        <h6 class="fw-medium mb-1">Google. Inc <i class="fa-solid fa-circle-check text-success"></i></h6>
                                        <p>www.google.com</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 class="mb-3 fw-semibold">Social Profile</h6>
                            <ul class="social-info">
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                            </ul>
                            <hr>
                            <h6 class="mb-3 fw-semibold">Settings</h6>
                            <div class="mb-0">
                                <a href="javascript:void(0);" class="d-block mb-3"><i class="ti ti-share-2 me-1"></i>Share Contact</a>
                                <a href="javascript:void(0);" class="d-block mb-3"><i class="ti ti-star me-1"></i>Add to Favourite</a>
                                <a href="javascript:void(0);" class="d-block mb-0" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash-x me-1"></i>Delete Contact</a>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- /Contact Sidebar -->

                <!-- Contact Details -->
                <div class="col-xl-9">
                    <div class="card mb-3">
                        <div class="card-body pb-0 pt-2">
                            <ul class="nav nav-tabs nav-tabs-bottom" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#activities" class="nav-link active"><i class="ti ti-alarm-minus me-1"></i>Activities</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#notes" class="nav-link"><i class="ti ti-notes me-1"></i>Notes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#calls" class="nav-link"><i class="ti ti-phone me-1"></i>Calls</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#files" class="nav-link"><i class="ti ti-file me-1"></i>Files</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#" data-bs-toggle="tab" data-bs-target="#email" class="nav-link"><i class="ti ti-mail-check me-1"></i>Email</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Activities -->
                        <div  class="tab-pane active show" id="activities">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h4 class="fw-semibold">Activities</h4>
                                    <div>
                                        <div class="form-sort mt-0">
                                            <i class="ti ti-sort-ascending-2"></i>
                                            <select class="select">
                                                <option>Sort By Date</option>
                                                <option>Ascending</option>
                                                <option>Descending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i class="ti ti-calendar-check me-1"></i>29 Aug 2023</div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-pending">
                                                    <i class="ti ti-mail-code"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1">You sent 1 Message to the contact.</h6>
                                                    <p>10:25 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-secondary-success">
                                                    <i class="ti ti-phone"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1">Denwar responded to your appointment schedule question by call at 09:30pm.</h6>
                                                    <p>09:25 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-orange">
                                                    <i class="ti ti-notes"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1">Notes added by Antony</h6>
                                                    <p class="mb-1">Please accept my apologies for the inconvenience caused. It would be much appreciated if it's possible to reschedule to 6:00 PM, or any other day that week.</p>
                                                    <p>10.00 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i class="ti ti-calendar-check me-1"></i>28 Feb 2024</div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-info">
                                                    <i class="ti ti-user-pin"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1 d-inline-flex align-items-center flex-wrap">Meeting With <span class="avatar avatar-xs mx-2"><img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt="img"></span> Abraham</h6>
                                                    <p>Schedueled  on 05:00 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-secondary-success">
                                                    <i class="ti ti-notes"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1">Drain responded to your appointment schedule question.</h6>
                                                    <p>09:25 pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	
                                    <div class="badge badge-soft-purple fs-14 fw-normal shadow-none mb-3"><i class="ti ti-calendar-check me-1"></i>Upcoming Activity</div>
                                    <div class="card border shadow-none mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <span class="avatar avatar-md flex-shrink-0 rounded me-2 bg-info">
                                                    <i class="ti ti-user-pin"></i>
                                                </span>
                                                <div>
                                                    <h6 class="fw-medium mb-1">Product Meeting</h6>
                                                    <p class="mb-1">A product team meeting is a gathering of the cross-functional product team — ideally including team members from product, engineering, marketing, and customer support.</p>
                                                    <p>25 Jul 2023, 05:00 pm</p>
                                                    <div class="upcoming-info">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p>Reminder</p>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-clock-edit me-1"></i>Reminder<i class="ti ti-chevron-down ms-1"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0);">Remainder</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);">1 hr</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);">10 hr</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p>Task Priority</p>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High<i class="ti ti-chevron-down ms-1"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                                            <i class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                                            <i class="ti ti-square-rounded-filled me-1 text-success circle"></i>Low
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p>Assigned to</p>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt="img" class="avatar-xs">John<i class="ti ti-chevron-down ms-1"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                                            <img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt="img" class="avatar-xs">John
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                                            <img src="{{URL::asset('/build/img/profiles/avatar-15.jpg')}}" alt="img" class="avatar-xs">Peter
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Activities -->

                        <!-- Notes -->
                        <div  class="tab-pane fade" id="notes">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h4 class="fw-semibold">Notes</h4>
                                    <div class="d-inline-flex align-items-center">
                                        <div class="form-sort me-3 mt-0">
                                            <i class="ti ti-sort-ascending-2"></i>
                                            <select class="select">
                                                <option>Sort By Date</option>
                                                <option>Ascending</option>
                                                <option>Descending</option>
                                            </select>
                                        </div>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#add_notes" class="link-purple fw-medium"><i class="ti ti-circle-plus me-1"></i>Add New</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="notes-activity">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between pb-2">
                                                    <div class="d-inline-flex align-items-center mb-2">
                                                        <span class="avatar avatar-md me-2 flex-shrink-0">
                                                            <img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                        </span>
                                                        <div>
                                                            <h6 class="fw-medium mb-1">Darlee Robertson</h6>
                                                            <p class="mb-0">15 Sep 2023, 12:10 pm</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-edit text-blue me-1"></i>Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash text-danger me-1"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		
                                                <h5 class="fw-medium mb-1">Notes added by Antony</h5>							
                                                <p>A project review evaluates the success of an initiative and identifies areas for improvement. It can also evaluate a current project to determine whether it's on the right track. Or, it can determine the success of a completed project. </p>
                                                <div class="d-inline-flex align-items-center flex-wrap">
                                                    <div class="note-download me-3">
                                                        <div class="note-info">
                                                            <span class="note-icon bg-secondary-success">
                                                                <i class="ti ti-file-spreadsheet"></i>
                                                            </span>
                                                            <div>
                                                                <h6 class="fw-medium mb-1">Project Specs.xls</h6>
                                                                <p>365 KB</p>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="ti ti-arrow-down"></i></a>
                                                    </div>
                                                    <div class="note-download">
                                                        <div class="note-info">
                                                            <span class="note-icon">
                                                                <img src="{{URL::asset('/build/img/media/media-35.jpg')}}" alt="img">
                                                            </span>
                                                            <div>
                                                                <h6 class="fw-medium mb-1">090224.jpg</h6>
                                                                <p>365 KB</p>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="ti ti-arrow-down"></i></a>
                                                    </div>	
                                                </div>
                                                <div class="notes-editor">
                                                    <div class="note-edit-wrap">
                                                        <div class="summernote">Write a new comment, send your team notification by typing @ followed by their name</div>
                                                        <div class="text-end note-btns">
                                                            <a href="javascript:void(0);" class="btn btn-light add-cancel">Cancel</a>
                                                            <a href="javascript:void(0);" class="btn btn-primary">Save</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <a href="javascript:void(0);" class="add-comment link-purple fw-medium"><i class="ti ti-square-plus me-1"></i>Add Comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between pb-2">
                                                    <div class="d-inline-flex align-items-center mb-2">
                                                        <span class="avatar avatar-md me-2 flex-shrink-0">
                                                            <img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" alt="img">
                                                        </span>
                                                        <div>
                                                            <h6 class="fw-medium mb-1">Sharon Roy</h6>
                                                            <p class="mb-0">18 Sep 2023, 09:52 am</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-edit text-blue me-1"></i>Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash text-danger me-1"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                                <h5 class="fw-medium mb-1">Notes added by Antony</h5>								
                                                <p>A project plan typically contains a list of the essential elements of a project, such as stakeholders, scope, timelines, estimated cost and communication methods. The project manager typically lists the information based on the assignment.</p>
                                                <div class="d-inline-flex align-items-center flex-wrap">
                                                    <div class="note-download me-3">
                                                        <div class="note-info">
                                                            <span class="note-icon bg-secondary-success">
                                                                <i class="ti ti-file-text"></i>
                                                            </span>
                                                            <div>
                                                                <h6 class="fw-medium mb-1">Andrewpass.txt</h6>
                                                                <p>365 KB</p>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0);"><i class="ti ti-arrow-down"></i></a>
                                                    </div>
                                                </div>
                                                <div class="reply-box">
                                                    <p>The best way to get a project done faster is to start sooner. A goal without a timeline is just a dream.The goal you set must be challenging. At the same time, it should be realistic and attainable, not impossible to reach.</p>
                                                    <p>Commented by <span class="text-purple">Aeron</span> on 15 Sep 2023, 11:15 pm</p>
                                                    <a href="#" class="btn"><i class="ti ti-arrow-back-up-double"></i>Reply</a>
                                                </div>
                                                <div class="notes-editor">
                                                    <div class="note-edit-wrap">
                                                        <div class="summernote">Write a new comment, send your team notification by typing @ followed by their name</div>
                                                        <div class="text-end note-btns">
                                                            <a href="javascript:void(0);" class="btn btn-light add-cancel">Cancel</a>
                                                            <a href="javascript:void(0);" class="btn btn-primary">Save</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <a href="javascript:void(0);" class="add-comment link-purple fw-medium"><i class="ti ti-square-plus me-1"></i>Add Comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between pb-2">
                                                    <div class="d-inline-flex align-items-center mb-2">
                                                        <span class="avatar avatar-md me-2 flex-shrink-0">
                                                            <img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="img">
                                                        </span>
                                                        <div>
                                                            <h6 class="fw-medium mb-1">Vaughan</h6>
                                                            <p class="mb-0">20 Sep 2023, 10:26 pm</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-edit text-blue me-1"></i>Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash text-danger me-1"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>									
                                                <p>Projects play a crucial role in the success of organizations, and their importance cannot be overstated. Whether it's launching a new product, improving an existing</p>
                                                <div class="notes-editor">
                                                    <div class="note-edit-wrap">
                                                        <div class="summernote">Write a new comment, send your team notification by typing @ followed by their name</div>
                                                        <div class="text-end note-btns">
                                                            <a href="javascript:void(0);" class="btn btn-light add-cancel">Cancel</a>
                                                            <a href="javascript:void(0);" class="btn btn-primary">Save</a>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <a href="javascript:void(0);" class="add-comment link-purple fw-medium"><i class="ti ti-square-plus me-1"></i>Add Comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Notes -->

                        <!-- Calls -->
                        <div  class="tab-pane fade" id="calls">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h4 class="fw-semibold">Calls</h4>
                                    <div class="d-inline-flex align-items-center">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create_call" class="link-purple fw-medium"><i class="ti ti-circle-plus me-1"></i>Add New</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="avatar avatar-md me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt="img">
                                                    </span>
                                                    <p><span class="text-dark fw-medium">Darlee Robertson</span> logged a call on 23 Jul 2023, 10:00 pm</p>
                                                </div>
                                                <div class="d-inline-flex align-items-center mb-2">
                                                    <div class="dropdown me-2">
                                                        <a href="#" class="bg-danger py-1" data-bs-toggle="dropdown" aria-expanded="false">Busy<i class="ti ti-chevron-down ms-2"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Busy</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">No Answer</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Unavailable</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Wrong Number</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Left Voice Message</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Moving Forward</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-edit text-blue me-1"></i>Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash text-danger me-1"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>										
                                            <p>A project review evaluates the success of an initiative and identifies areas for improvement. It can also evaluate a current project to determine whether it's on the right track. Or, it can determine the success of a completed project. </p>
                                        </div>
                                    </div>	
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="avatar avatar-md me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" alt="img">
                                                    </span>
                                                    <p><span class="text-dark fw-medium">Sharon Roy</span> logged a call on 28 Jul 2023, 09:00 pm</p>
                                                </div>
                                                <div class="d-inline-flex align-items-center mb-2">
                                                    <div class="dropdown me-2">
                                                        <a href="#" class="bg-pending py-1" data-bs-toggle="dropdown" aria-expanded="false">No Answer<i class="ti ti-chevron-down ms-2"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Busy</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">No Answer</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Unavailable</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Wrong Number</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Left Voice Message</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Moving Forward</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="ti ti-edit text-blue me-1"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="ti ti-trash text-danger me-1"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>										
                                            <p>A project plan typically contains a list of the essential elements of a project, such as stakeholders, scope, timelines, estimated cost and communication methods. The project manager typically lists the information based on the assignment.</p>
                                        </div>	
                                    </div>
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="d-sm-flex align-items-center justify-content-between pb-2">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="avatar avatar-md me-2 flex-shrink-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="img">
                                                    </span>
                                                    <p><span class="text-dark fw-medium">Vaughan</span> logged a call on 30 Jul 2023, 08:00 pm</p>
                                                </div>
                                                <div class="d-inline-flex align-items-center mb-2">
                                                    <div class="dropdown me-2">
                                                        <a href="#" class="bg-pending py-1" data-bs-toggle="dropdown" aria-expanded="false">No Answer<i class="ti ti-chevron-down ms-2"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">Busy</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">No Answer</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Unavailable</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Wrong Number</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Left Voice Message</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Moving Forward</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="ti ti-edit text-blue me-1"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="ti ti-trash text-danger me-1"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>										
                                            <p>Projects play a crucial role in the success of organizations, and their importance cannot be overstated. Whether it's launching a new product, improving an existing</p>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Calls -->

                        <!-- Files -->
                        <div  class="tab-pane fade" id="files">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="fw-semibold">Files</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card border mb-3">
                                        <div class="card-body pb-0">	
                                            <div class="row align-items-center">										
                                                <div class="col-md-8">											
                                                    <div class="mb-3">												
                                                        <h4 class="fw-medium mb-1">Manage Documents</h4>
                                                        <p>Send customizable quotes, proposals and contracts to close deals faster.</p>
                                                    </div>
                                                </div>										
                                                <div class="col-md-4 text-md-end">	
                                                    <div class="mb-3">		
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_file">Create Document</a>
                                                    </div>
                                                </div>		
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body pb-0">	
                                            <div class="row align-items-center">										
                                                <div class="col-md-8">											
                                                    <div class="mb-3">												
                                                        <h4 class="fw-medium mb-1">Collier-Turner Proposal</h4>
                                                        <p>Send customizable quotes, proposals and contracts to close deals faster.</p>
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-md me-2 flex-shrink-0">
                                                                <img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="img" class="rounded-circle">
                                                            </span>
                                                            <div>
                                                                <span class="fs-12">Owner</span>
                                                                <p>Vaughan</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>										
                                                <div class="col-md-4 text-md-end">	
                                                    <div class="mb-3 d-inline-flex align-items-center">		
                                                        <span class="badge badge-danger-light me-1">Proposal</span>
                                                        <span class="badge bg-pending priority-badge me-1">Draft</span>
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-edit text-blue me-1"></i>Edit
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-trash text-danger me-1"></i>Delete
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-download text-info me-1"></i>Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border shadow-none mb-3">
                                        <div class="card-body pb-0">	
                                            <div class="row align-items-center">										
                                                <div class="col-md-8">											
                                                    <div class="mb-3">												
                                                        <h4 class="fw-medium mb-1">Collier-Turner Proposal</h4>
                                                        <p>Send customizable quotes, proposals and contracts to close deals faster.</p>
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-md me-2 flex-shrink-0">
                                                                <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" alt="img" class="rounded-circle">
                                                            </span>
                                                            <div>
                                                                <span class="fs-12">Owner</span>
                                                                <p>Jessica</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>										
                                                <div class="col-md-4 text-md-end">	
                                                    <div class="mb-3 d-inline-flex align-items-center">		
                                                        <span class="badge badge-purple-light me-1">Quote</span>
                                                        <span class="badge bg-success me-1">Sent</span>
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-edit text-blue me-1"></i>Edit
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-trash text-danger me-1"></i>Delete
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-download text-info me-1"></i>Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border shadow-none mb-0">
                                        <div class="card-body pb-0">	
                                            <div class="row align-items-center">										
                                                <div class="col-md-8">											
                                                    <div class="mb-3">												
                                                        <h4 class="fw-medium mb-1">Collier-Turner Proposal</h4>
                                                        <p>Send customizable quotes, proposals and contracts to close deals faster.</p>
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar avatar-md me-2 flex-shrink-0">
                                                                <img src="{{URL::asset('/build/img/profiles/avatar-22.jpg')}}" alt="img" class="rounded-circle">
                                                            </span>
                                                            <div>
                                                                <span class="fs-12">Owner</span>
                                                                <p>Dawn Merhca</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>										
                                                <div class="col-md-4 text-md-end">	
                                                    <div class="mb-3 d-inline-flex align-items-center">		
                                                        <span class="badge badge-danger-light me-1">Proposal</span>
                                                        <span class="badge bg-pending priority-badge me-1">Draft</span>
                                                        <div class="dropdown">
                                                            <a href="#" class="p-0 btn btn-icon btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-edit text-blue me-1"></i>Edit
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-trash text-danger me-1"></i>Delete
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-download text-info me-1"></i>Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Files -->

                        <!-- Email -->
                        <div  class="tab-pane fade" id="email">
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h4 class="fw-semibold">Email</h4>
                                    <div class="d-inline-flex align-items-center">
                                        <a href="javascript:void(0);" class="link-purple fw-medium" data-bs-toggle="tooltip"  data-bs-placement="left" data-bs-custom-class="tooltip-dark" data-bs-original-title="There are no email accounts configured, Please configured your email account in order to Send/ Create EMails"><i class="ti ti-circle-plus me-1"></i>Create Email</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card border mb-0">
                                        <div class="card-body pb-0">	
                                            <div class="row align-items-center">										
                                                <div class="col-md-8">											
                                                    <div class="mb-3">												
                                                        <h4 class="fw-medium mb-1">Manage Emails</h4>
                                                        <p>You can send and reply to emails directly via this section.</p>
                                                    </div>
                                                </div>										
                                                <div class="col-md-4 text-md-end">	
                                                    <div class="mb-3">		
                                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_email" >Connect Account</a>
                                                    </div>
                                                </div>		
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Email -->

                    </div>
                    <!-- /Tab Content -->
			    </div>
                <!-- /Contact Details -->

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    @component('components.model-popup')
    @endcomponent
@endsection
