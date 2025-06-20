<?php $page = 'proposals-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    @component('components.breadcrumb')
                        @slot('title')
                            Proposals
                        @endslot
                        @slot('item1')
                            123
                        @endslot
                        @slot('item2')
                            proposals-grid
                        @endslot
                    @endcomponent


                    <!-- Card -->
                    <div class="card">
                    <div class="card-header">
                        <!-- Search -->
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <div class="icon-form mb-3 mb-sm-0">
                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search Proposals">
                                </div>							
                            </div>		
                            <div class="col-sm-8">					
                                <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
                                        <div class="dropdown-menu  dropdown-menu-end">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-file-type-pdf text-danger me-1"></i>Export as PDF</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-file-type-xls text-green me-1"></i>Export as Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>	
                                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus me-2"></i>Add New Proposals</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Search -->
                    </div>
                    <div class="card-body">

                        <!-- Filter -->
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-4">
                            <div class="d-flex align-items-center flex-wrap row-gap-2">
                                <div class="sort-dropdown drop-down task-drops me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown">All Proposals </a>
                                    <div class="dropdown-menu  dropdown-menu-start">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti ti-dots-vertical"></i>All Proposals
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti ti-dots-vertical"></i>Accepted
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti ti-dots-vertical"></i>Declined
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti ti-dots-vertical"></i>Draft
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti ti-dots-vertical"></i>Deleted
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort </a>
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
                                <div class="icon-form">
                                    <span class="form-icon"><i class="ti ti-calendar"></i></span>
                                    <input type="text" class="form-control bookingrange" placeholder="">
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap row-gap-2">
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="btn bg-soft-purple text-purple" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ti ti-columns-3 me-2"></i>Manage Columns</a>
                                    <div class="dropdown-menu  dropdown-menu-md-end dropdown-md p-3">
                                        <h4 class="mb-2 fw-semibold">Want to manage datatables?</h4>
                                        <p class="mb-3">Please drag and drop your column to reorder your table and enable see option as you want.</p>
                                        <div class="border-top pt-3">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Subject</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-name" class="check">
                                                    <label for="col-name" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Sent To</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-phone" class="check">
                                                    <label for="col-phone" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Total Value</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-email" class="check">
                                                    <label for="col-email" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Date</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-tag" class="check">
                                                    <label for="col-tag" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Open Till</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-loc" class="check">
                                                    <label for="col-loc" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Type</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-rate" class="check">
                                                    <label for="col-rate" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Project</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-owner" class="check">
                                                    <label for="col-owner" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Status</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-status" class="check">
                                                    <label for="col-status" class="checktoggle"></label>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Action</p>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="col-action" class="check">
                                                    <label for="col-action" class="checktoggle"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-sorts dropdown me-2">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ti ti-filter-share"></i>Filter</a>
                                    <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-end p-3">
                                        <div class="filter-set-view">
                                            <div class="filter-set-head">
                                                <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Subjects</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse show" id="collapseTwo" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <div class="mb-2 icon-form">
                                                                <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                <input type="text" class="form-control" placeholder="Search Name">
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            SEO Proposals
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Web Design
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Logo &amp; Branding
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Development
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Logo
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#owner" aria-expanded="false" aria-controls="owner">Sent to</a>
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
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            NovaWave LLC
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Redwood Inc
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            HarborVie w
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            CoastalStar Co.
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            RiverStone Ventur
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">Date of Proposals</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="collapseone" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            15 May 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            16 Jan 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            17 Sep 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            18 May 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            19 Aug 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">Open till</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="collapsetwo" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <div class="mb-2 icon-form">
                                                                <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                <input type="text" class="form-control" placeholder="Search Date">
                                                            </div>
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            15 Aug 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Sep 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Nov 2024	
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Jun 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Oct 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Project</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="collapseThree" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            Truelysell
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Dreamsports	
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Best@laundry	
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            Doccure
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-set-content">
                                                    <div class="filter-set-content-head">
                                                        <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">Created Date</a>
                                                    </div>
                                                    <div class="filter-set-contents accordion-collapse collapse" id="collapsethree" data-bs-parent="#accordionExample">
                                                        <div class="filter-content-list">
                                                            <ul>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox" checked="">
                                                                            <span class="checkmarks"></span>
                                                                            21 May 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Apr 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            12 Mar 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Feb 2024
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="filter-checks">
                                                                        <label class="checkboxs">
                                                                            <input type="checkbox">
                                                                            <span class="checkmarks"></span>
                                                                            15 Jan 2024
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
                                                        <a href="{{url('proposals-grid')}}" class="btn btn-primary">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="view-icons">
                                    <a href="{{url('proposals')}}"><i class="ti ti-list-tree"></i></a>
                                    <a href="{{url('proposals-grid')}}" class="active"><i class="ti ti-grid-dots"></i></a>
                                </div>
                            </div>	
                        </div>
                        <!-- /Filter -->

                        <!-- Proposal Grid -->
                        <div class="row">
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-success">Accepted</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-01.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">NovaWave LLC</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-danger">Deleted</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-02.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">Redwood Inc</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-pending">Draft</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-03.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">HarborView</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-warning">Declined</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-04.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">CoastalStar Co.</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-warning">Declined</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-05.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">Summit Peak</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-tertiary">Sent</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-07.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">Silver Hawk</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-danger">Deleted</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-06.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">BlueSky Industries</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                <div class="card border">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                            <div class="flex-shrink-0">
                                                <span class="badge badge-purple-light">#1493016</span>
                                            </div>
                                            <div class="dropdown table-action">
                                                <a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_proposals"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Proposal</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark As Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-subtask text-pink"></i> Convert to estimate</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file-invoice text-tertiary"></i> Convert to Invoice</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h4>SEO Proposal</h4>
                                                    <p>Project : Truelysell</p>
                                                </div>                                                    
                                                <div>
                                                    <span class="badge badge-pending">Draft</span>
                                                </div>
                                            </div>                                                
                                            <div class="mb-3">
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
                                                <p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Date : 25 May 2024</p>
                                                <p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Open till : 31 Jun 2024</p>
                                            </div>
                                        </div>
                                        <div class="bg-light-400 rounded p-2">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
                                                    <img src="{{URL::asset('/build/img/icons/company-icon-08.svg')}}" class="w-auto h-auto" alt="img">
                                                </a>  
                                                <div class="d-flex flex-column">
                                                    <span class="d-block">Sent to</span>
                                                    <a href="javascript:void(0);" class="text-default">NovaWave LLC</a>
                                                </div>                                                 
                                            </div>                                                
                                        </div>
                                    </div>							
                                </div>
                            </div>
                        </div>
                        <!-- /Proposal Grid --> 							

                        <div class="load-btn text-center">
                            <a href="javascript:void(0);" class="btn btn-primary">Load More Contacts<i class="ti ti-loader"></i></a>
                        </div>
                    </div>
                    </div>
                    <!-- /Card -->


                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    @component('components.model-popup')
    @endcomponent
@endsection
