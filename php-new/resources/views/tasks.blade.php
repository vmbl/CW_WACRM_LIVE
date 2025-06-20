<?php $page = 'tasks'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

                    @component('components.breadcrumb')
                    @slot('title')
                    Tasks
                    @endslot
                    @slot('item1')
                        123
                    @endslot
                    @slot('item2')
                    tasks
                    @endslot
                @endcomponent

                <div class="card ">
                    <div class="card-header">
                        <!-- Search -->
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <div class="icon-form mb-sm-0">
                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search Task">
                                </div>							
                            </div>		
                            <div class="col-sm-8">					
                                <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end mb-3 mb-sm-0">
                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus me-2"></i>Add New Tasks</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Search -->
                    </div>
                    <div class="card-body">					
                        <!-- Filter -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-4">
                            <div class="sort-dropdown drop-down task-drops">
                                <a href="javascript:void(0);" class="dropdown-toggle"  data-bs-toggle="dropdown">All Tasks </a>
                                <div class="dropdown-menu  dropdown-menu-start">
                                    <ul>
                                        <li>
                                            <a href="{{url('tasks')}}">
                                                <i class="ti ti-dots-vertical"></i>All Tasks
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('tasks-important')}}">
                                                <i class="ti ti-dots-vertical"></i>Important
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('tasks-completed')}}">
                                                <i class="ti ti-dots-vertical"></i>Completed
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap row-gap-2">
                                <div class="all-read me-2 ">
                                    <label class="checkboxs">
                                        <input type="checkbox" checked>
                                        <span class="checkmarks"></span>
                                        Mark all as read
                                    </label>
                                </div>
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle"  data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort </a>
                                    <div class="dropdown-menu  dropdown-menu-start">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    <i class="ti ti-circle-chevron-right me-1"></i>Ascending
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    <i class="ti ti-circle-chevron-right me-1"></i>Descending
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    <i class="ti ti-circle-chevron-right me-1"></i>Recently Viewed
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    <i class="ti ti-circle-chevron-right me-1"></i>Recently Added
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="icon-form me-2">
                                    <span class="form-icon"><i class="ti ti-calendar"></i></span>
                                    <input type="text" class="form-control bookingrange" placeholder="">
                                </div>
                                <div class="form-sorts dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"  data-bs-auto-close="outside"><i class="ti ti-filter-share"></i>Filter</a>
                                    <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-end p-3">
                                        <div class="filter-set-view">
                                            <div class="filter-set-head">
                                                <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Task Name</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse show" id="collapseTwo" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <div class="mb-2 icon-form">
                                                                <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                <input type="text" class="form-control" placeholder="Search Task">
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked>
                                                                            <span class="checkmarks"></span>
                                                                            Add a form to Update Task
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Add a form to Update Task
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Update orginal content
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Use only component colours
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#owner" aria-expanded="false" aria-controls="owner">Task Type</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="owner" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <div class="mb-2 icon-form">
                                                                <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                <input type="text" class="form-control" placeholder="Search Client">
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked>
                                                                            <span class="checkmarks"></span>
                                                                            Meeting
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Calls
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Task
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Email
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseone" aria-expanded="false"
                                                            aria-controls="collapseone">Tags</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse"
                                                        id="collapseone" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked>
                                                                            <span class="checkmarks"></span>
                                                                            Collab
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Rated
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Promotion
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Created By</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="collapseThree" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked>
                                                                            <span class="checkmarks"></span>
                                                                            Hendry
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Monty Beer
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Bradtke
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                            data-bs-target="#collapsethree" aria-expanded="false"
                                                            aria-controls="collapsethree">Created Date</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse"
                                                        id="collapsethree" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked>
                                                                            <span class="checkmarks"></span>
                                                                            23 Oct 2023
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            29 Sep 2023
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            24 Oct 2023
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            25 Oct 2023
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>													
                                            <div class="filter-reset-btns">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="#" class="btn btn-light">Reset</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="{{url('tasks')}}" class="btn btn-primary">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <!-- /Filter -->

                        <!-- Recent Task List -->
                        <div class="task-wrapper">
                            <a href="#" class="task-accordion" data-bs-toggle="collapse" data-bs-target="#recent">
                                <h4>Recent<span>24</span></h4>
                            </a>
                            <div class="tasks-activity tasks collapse show" id="recent">
                                <ul>
                                    <li class="task-wrap pending">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Add a form to Update Task</p>
                                            <span class="badge badge-pill badge-status bg-green"><i class="ti ti-phone"></i>Calls</span>
                                            <span class="badge badge-tag bg-pending">Pending</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-purple-light">Promotion</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>25 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="task-wrap pending">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Make all strokes thinner</p>
                                            <span class="badge activity-badge bg-warning"><i class="ti ti-mail"></i> Email</span>
                                            <span class="badge badge-tag bg-pending">Pending</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-danger-light">Rejected</span>
                                                    <span class="badge badge-tag badge-success-light">Collab</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>25 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="task-wrap  warning">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Update orginal content</p>
                                            <span class="badge badge-pill badge-status bg-green"><i class="ti ti-phone"></i>Calls</span>
                                            <span class="badge badge-tag bg-warning">Inprogress</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-purple-light">Promotion</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>25 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="task-wrap warning">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Use only component colours</p>
                                            <span class="badge activity-badge bg-blue"><i class="ti ti-subtask"></i> Task</span>
                                            <span class="badge badge-tag bg-warning">Inprogress</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-success-light">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>25 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>										
                                </ul>
                            </div>
                        </div>
                        <!-- /Recent Task List -->

                        <!-- Task List -->
                        <div class="task-wrapper">
                            <a href="#" class="task-accordion" data-bs-toggle="collapse" data-bs-target="#yesterday">
                                <h4>Yesterday</h4>
                            </a>
                            <div class="tasks-activity tasks collapse show" id="yesterday">
                                <ul>
                                    <li class="task-wrap  warning">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Add images to the cards section</p>
                                            <span class="badge badge-pill badge-status bg-green"><i class="ti ti-phone"></i>Calls</span>
                                            <span class="badge badge-tag bg-warning">Inprogress</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-success-light">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>24 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>								
                                </ul>
                            </div>
                        </div>
                        <!-- /Task List -->

                        <!-- Task List -->
                        <div class="task-wrapper">
                            <a href="#" class="task-accordion" data-bs-toggle="collapse" data-bs-target="#date-01">
                                <h4>23 Oct 2023</h4>
                            </a>
                            <div class="tasks-activity tasks collapse show" id="date-01">
                                <ul>
                                    <li class="task-wrap warning">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Design description banner & landing page</p>
                                            <span class="badge activity-badge bg-blue"><i class="ti ti-subtask"></i> Task</span>
                                            <span class="badge badge-tag bg-warning">Inprogress</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-success-light">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>23 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>	
                                    <li class="task-wrap  success">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p><del>Make sure all the padding should be 24px</del></p>
                                            <span class="badge badge-pill badge-status bg-green"><i class="ti ti-phone"></i>Calls</span>
                                            <span class="badge badge-tag bg-success">Completed</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-purple-light">Promotion</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>23 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>								
                                </ul>
                            </div>
                        </div>
                        <!-- /Task List -->

                        <!-- Task List -->
                        <div class="task-wrapper">
                            <a href="#" class="task-accordion" data-bs-toggle="collapse" data-bs-target="#date-02">
                                <h4>22 Oct 2023</h4>
                            </a>
                            <div class="tasks-activity tasks collapse show" id="date-02">
                                <ul>
                                    <li class="task-wrap  success">
                                        <div class="task-info">
                                            <span class="task-icon"><i class="ti ti-grip-vertical"></i></span>
                                            <div class="task-checkbox">
                                                <label class="checkboxs"><input type="checkbox"><span class="checkmarks"></span></label>
                                            </div>
                                            <div class="set-star rating-select">
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p><del>Use border radius as 5px or 10 px</del></p>
                                            <span class="badge badge-pill badge-status bg-purple"><i class="ti ti-user-share"></i>Meeting</span>
                                            <span class="badge badge-tag bg-success">Completed</span>
                                        </div>
                                        <div class="task-actions">
                                            <ul>
                                                <li class="task-time">
                                                    <span class="badge badge-tag badge-danger-light">Rejected</span>
                                                    <span class="badge badge-tag badge-success-light">Collab</span>
                                                </li>
                                                <li class="task-date">
                                                    <i class="ti ti-calendar-exclamation"></i>22 Oct 2023 
                                                </li>
                                                <li class="task-owner">
                                                    <div class="task-user">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-14.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="dropdown table-action">
                                                        <a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-bs-toggle="offcanvas" href="#" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_activity"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>								
                                </ul>
                            </div>
                        </div>
                        <!-- /Task List -->

                    </div>
				</div>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    @component('components.model-popup')
    @endcomponent
@endsection
