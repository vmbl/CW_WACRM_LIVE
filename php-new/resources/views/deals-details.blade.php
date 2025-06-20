<?php $page = 'deals-details'; ?>
@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-md-12">

             
                @component('components.breadcrumb')
                @slot('title')
                Deals Overview
                @endslot

                @slot('item2')
                leads-details
                @endslot
                @endcomponent

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- Deals User -->
                <div class="contact-head">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <ul class="contact-breadcrumb">
                                <li><a href="{{url('deals')}}"><i class="ti ti-arrow-narrow-left"></i>Deals</a></li>
                                <li>Tremblay and Rath</li>
                                <li class="before-none">
                                    <div class="select-pipeline">
                                        <span class="pipe-icon"><i class="ti ti-timeline-event-text"></i></span>
                                        <select class="select">
                                            <option>Marketing Pipeline</option>
                                            <option>Sales Pipeline</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="before-none">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pipeline"><i class="ti ti-square-rounded-plus"></i>Add</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4 text-sm-end">
                            <div class="contact-pagination">
                                <p>1 of 40</p>
                                <ul>
                                    <li>
                                        <a href="{{url('deals-details')}}"><i class="ti ti-chevron-left"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{url('deals-details')}}"><i class="ti ti-chevron-right"></i></a>
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
                                <div class="avatar avatar-xxl me-3 flex-shrink-0 border p-2">		
                                    <h6 class="text-default fw-medium">HT</h6>
                                </div>
                                <div>
                                    <h5 class="mb-1">Tremblay and Rath <span class="star-icon"><i class="fa-solid fa-star"></i></span></h5>
                                    <p class="mb-1"><i class="ti ti-building"></i> Google Inc</p>
                                    <p class="mb-0"><i class="ti ti-map-pin-pin"></i> 22, Ave Street, Newyork, USA</p>
                                </div>
                            </div>
                            <div class="contacts-action">
                                <span class="badge badge-light"><i class="ti ti-lock"></i>Private</span>
                                <div class="dropdown mb-2">
                                    <a href="#" class="text-white bg-success py-1 px-2 d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-thumb-up me-2"></i>Won<i class="ti ti-chevron-down ms-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);"><span>Won</span></a>
                                        <a class="dropdown-item" href="javascript:void(0);"><span>Lost</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
                <!-- /Deals User -->

            </div>
            <!-- Deals Sidebar -->
            <div class="col-xl-3 theiaStickySidebar">
                <div class="card">
                    <div class="card-body p-3">
                        <h6 class="mb-3 fw-semibold">Deal Information</h6>
                        <ul>
                            <li class="row mb-3"><span class="col-6">Date Created</span><span class="col-6">10 Jan 2024, 10:00 am</span></li>
                            <li class="row mb-3"><span class="col-6">Value</span><span class="col-6">$25,11,145</span></li>
                            <li class="row mb-3"><span class="col-6">Due Date</span><span class="col-6">20 Jan 2024, 10:00 am</span></li>
                            <li class="row mb-3"><span class="col-6">Follow Up</span><span class="col-6">20 Jan 2024</span></li>
                            <li class="row mb-3"><span class="col-6">Source</span><span class="col-6">Google</span></li>
                        </ul>	
                        <hr>
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <h6 class="mb-3 fw-semibold">Owner</h6>
                            <a href="javascript:void(0);" class="link-purple fw-medium mb-3" data-bs-toggle="modal" data-bs-target="#owner"><i class="ti ti-circle-plus me-1"></i>Add New</a>
                        </div>	
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-md me-2">
                                <img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="Image">
                            </div>
                            <p>Vaughan</p>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <div class="avatar avatar-md me-2">
                                <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" alt="Image">
                            </div>
                            <p>Jessica</p>
                        </div>
                        <hr>							
                        <h6 class="mb-3 fw-semibold">Tags</h6>
                        <a href="javascript:void(0);" class="badge badge-soft-success fw-medium me-2">Collab</a>
                        <a href="javascript:void(0);" class="badge badge-soft-warning fw-medium">Rated</a>
                        <hr>					
                        <h6 class="mb-3 fw-semibold">Projects</h6>
                        <a href="javascript:void(0);" class="badge bg-light-300 text-default me-2 mb-2">Devops Design</a>
                        <a href="javascript:void(0);" class="badge bg-light-300 text-default mb-2">Margrate Design</a>
                        <hr>
                        <h6 class="mb-3 fw-semibold">Priority</h6>
                        <div class="priority-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High</span><i class="ti ti-chevron-down me-1"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <span><i class="ti ti-square-rounded-filled me-1 text-danger circle"></i>High</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <span><i class="ti ti-square-rounded-filled me-1 text-success circle"></i>Low</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <h6 class="mb-3 fw-semibold">Contacts</h6>
                            <a href="javascript:void(0);" class="link-purple mb-3 fw-medium" data-bs-toggle="modal" data-bs-target="#add_contact"><i class="ti ti-circle-plus me-1"></i>Add New</a>
                        </div>	
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-md me-2">
                                <img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="Image">
                            </div>
                            <p>Vaughan</p>
                        </div>
                        <div class="d-flex align-items-center mb-0">
                            <div class="avatar avatar-md me-2">
                                <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" alt="Image">
                            </div>
                            <p>Jessica</p>
                        </div>
                        <hr>						
                        <ul>
                            <li class="row mb-3"><span class="col-6">Last Modified</span><span class="col-6">10 Jan 2024, 10:00 am</span></li>
                            <li class="row mb-0"><span class="col-6">Modified By</span>
                                <span class="col-6">
                                    <span class="avatar avatar-xs me-1"><img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" class="avatar-xs" alt="img"></span>Darlee Robertson
                                </span>
                            </li>
                        </ul>	
                    </div>
                </div>
            </div>
            <!-- /Deals Sidebar -->

            <!-- Deals Details -->
            <div class="col-xl-9">
                <div class="card mb-3">
                    <div class="card-body pb-0">
                        <h4 class="fw-semibold mb-3">Deal Pipeline Status</h4>
                        <div class="pipeline-list">
                            <ul>
                                <li><a href="javascript:void(0);" class="bg-pending">Quality To Buy</a></li>
                                <li><a href="javascript:void(0);" class="bg-info">Contact Made</a></li>
                                <li><a href="javascript:void(0);" class="bg-warning">Presentation</a></li>
                                <li><a href="javascript:void(0);" class="bg-pink">Proposal Made</a></li>
                                <li><a href="javascript:void(0);">Appointment</a></li>
                            </ul>
                        </div>
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
                                    <div class="form-sort">
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
                                <div class="contact-activity">
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
                    </div>
                    <!-- /Activities -->

                    <!-- Notes -->
                    <div  class="tab-pane fade" id="notes">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                <h4 class="fw-semibold">Notes</h4>
                                <div class="d-inline-flex align-items-center">
                                    <div class="form-sort me-3">
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
            <!-- /Deals Details -->				
		</div>

    </div>
</div>
<!-- /Page Wrapper -->
@component('components.model-popup')
@endcomponent
@endsection