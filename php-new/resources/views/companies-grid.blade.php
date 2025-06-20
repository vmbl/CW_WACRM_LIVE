<?php $page = 'companies-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">


                    @component('components.breadcrumb')
                        @slot('title')
                            Companies
                        @endslot
                        @slot('item1')
                            123
                        @endslot
                        @slot('item2')
                            companies-grid
                        @endslot
                    @endcomponent

                    <div class="card">
                        <div class="card-header">
                            <!-- Search -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="icon-form mb-3 mb-sm-0">
                                        <span class="form-icon"><i class="ti ti-search"></i></span>
                                        <input type="text" class="form-control" placeholder="Search Contacts">
                                    </div>							
                                </div>		
                                <div class="col-sm-8">					
                                    <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                        <div class="dropdown me-2">
                                            <a href="javascript:void(0);" class="dropdown-toggle"  data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
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
                                        <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus me-2"></i>Add Company</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Search -->
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-4">
                                <div class="d-flex align-items-center flex-wrap row-gap-2">
                                    <div class="dropdown me-2">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-1"></i>Sort </a>
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
                                        <a href="javascript:void(0);" class="btn bg-soft-purple text-purple"  data-bs-toggle="dropdown"  data-bs-auto-close="outside"><i class="ti ti-columns-3 me-2"></i>Manage Columns</a>
                                        <div class="dropdown-menu  dropdown-menu-md-end dropdown-md p-3">
                                            <h4 class="mb-2 fw-semibold">Want to manage datatables?</h4>
                                            <p class="mb-3">Please drag and drop your column to reorder your table and enable see option as you want.</p>
                                            <div class="border-top pt-3">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Name</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-name" class="check">
                                                        <label for="col-name" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Phone</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-phone" class="check">
                                                        <label for="col-phone" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Email</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-email" class="check">
                                                        <label for="col-email" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Tags</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-tag" class="check">
                                                        <label for="col-tag" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Location</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-loc" class="check">
                                                        <label for="col-loc" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Rating</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-rate" class="check">
                                                        <label for="col-rate" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Owner</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-owner" class="check">
                                                        <label for="col-owner" class="checktoggle"></label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <p class="mb-0 d-flex align-items-center"><i class="ti ti-grip-vertical me-2"></i>Contact</p>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="col-contact" class="check" checked="">
                                                        <label for="col-contact" class="checktoggle"></label>
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
                                                            <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Country</a>
                                                        </div>
                                                        <div class="filter-set-contents accordion-collapse collapse show" id="collapseTwo" data-bs-parent="#accordionExample">
                                                            <div class="filter-content-list">
                                                                <div class="mb-2 icon-form">
                                                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                    <input type="text" class="form-control" placeholder="Search Country">
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                India
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                USA
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                France
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                United Kingdom
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                UAE
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Italy
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Japan
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Germany
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="filter-set-content">
                                                        <div class="filter-set-content-head">
                                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#owner" aria-expanded="false" aria-controls="owner">Owner</a>
                                                        </div>
                                                        <div class="filter-set-contents accordion-collapse collapse" id="owner" data-bs-parent="#accordionExample">
                                                            <div class="filter-content-list">
                                                                <div class="mb-2 icon-form">
                                                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                                                    <input type="text" class="form-control" placeholder="Search Owner">
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox" checked="">
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
                                                                                Guillory
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Jami
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Theresa
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Espinosa
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="filter-set-content">
                                                        <div class="filter-set-content-head">
                                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#Status" aria-expanded="false" aria-controls="Status">Status</a>
                                                        </div>
                                                        <div class="filter-set-contents accordion-collapse collapse" id="Status" data-bs-parent="#accordionExample">
                                                            <div class="filter-content-list">
                                                                <ul>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox" checked="">
                                                                                <span class="checkmarks"></span>
                                                                                Active
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                Inactive
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="filter-set-content">
                                                        <div class="filter-set-content-head">
                                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Rating</a>
                                                        </div>
                                                        <div class="filter-set-contents accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordionExample">
                                                            <div class="filter-content-list">
                                                                <ul>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox" checked="">
                                                                                <span class="checkmarks"></span>
                                                                                <span class="rating">
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <span>5.0</span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                        
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                <span class="rating">
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>4.0</span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                <span class="rating">
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>3.0</span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>																																				
                                                                                <span class="rating">
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>2.0</span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
                                                                                <span class="checkmarks"></span>
                                                                                <span class="rating">
                                                                                    <i class="fa fa-star filled"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <span>1.0</span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="filter-set-content">
                                                        <div class="filter-set-content-head">
                                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Tags</a>
                                                        </div>
                                                        <div class="filter-set-contents accordion-collapse collapse" id="collapseThree" data-bs-parent="#accordionExample">
                                                            <div class="filter-content-list">
                                                                <ul>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox" checked="">
                                                                                <span class="checkmarks"></span>
                                                                                Promotion
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
                                                                                Rejected
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="filter-checks">
                                                                            <label class="checkboxs">
                                                                                <input type="checkbox">
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
                                                                                Calls
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
                                                            <a href="{{url('companies-grid')}}" class="btn btn-primary">Filter</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-icons">
                                        <a href="{{url('companies')}}"><i class="ti ti-list-tree"></i></a>
                                        <a href="{{url('companies-grid')}}" class="active"><i class="ti ti-grid-dots"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Company Grid -->
                            <div class="row" >

                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-01.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">NovaWave LLC</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>4.2
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>robertson@example.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 875455453</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Germany</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-02.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">BlueSky Industries</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>5.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>sharon@example.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 989757485</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>USA</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-03.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">Summit  Peak</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>4.5
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Jessica13@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 89316-83167</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>India</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-04.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">Summit  Peak</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>4.5
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Jessica13@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 89316-83167</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>India</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-05.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">RiverStone Ventur</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>4.7
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>CarolTho3@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 84295-01629</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>China</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-06.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">Bright Bridge Grp</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>5.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Dawnmercha@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 79253-01692</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Japan</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-07.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">CoastalStar Co.</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>3.1
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Rachel@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 52804-89153</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Indonesia</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-08.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">HarborView</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>5.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Jonelle@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 60364-91683</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Cuba</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-09.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">Golden Gate Ltd</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>2.7
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>Jonathan@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 69023-95179</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Isreal</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-10.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">Redwood Inc</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>3.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>brook@gmail.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 49815-90142</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Colombia</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-03.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">SilverHawk</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>3.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>vaughan12@example.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 546555455</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>Canada</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-xxl-3 col-xl-4 col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{url('company-details')}}" class="avatar avatar-lg border rounded flex-shrink-0 me-2">
                                                        <img src="{{URL::asset('/build/img/icons/company-icon-04.svg')}}" class="w-auto h-auto" alt="img">
                                                    </a>
                                                    <div>
                                                        <h6><a href="{{url('company-details')}}" class="fw-medium">SummitPeak</a></h6>
                                                        <div class="set-star text-default">
                                                            <i class="fa fa-star filled me-1"></i>3.0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown table-action">
                                                    <a href="#" class="action-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_contact"><i class="ti ti-trash text-danger"></i> Delete</a>
                                                        <a class="dropdown-item" href="{{url('company-details')}}"><i class="ti ti-eye text-blue-light"></i> Preview</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div class="d-flex flex-column mb-3">
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-mail text-dark me-1"></i>jessica13@example.com</p>
                                                    <p class="text-default d-inline-flex align-items-center mb-2"><i class="ti ti-phone text-dark me-1"></i>+1 454478787</p>
                                                    <p class="text-default d-inline-flex align-items-center"><i class="ti ti-map-pin-pin text-dark me-1"></i>India</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="badge badge-tag badge-success-light me-2">Collab</span>
                                                    <span class="badge badge-tag badge-warning-light">Rated</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 border-top pt-3 mt-3">
                                                <div class="avatar-list-stacked avatar-group-xs">
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                    <span class="avatar border-0">
                                                        <img src="{{URL::asset('/build/img/profiles/avatar-04.jpg')}}" class="rounded-circle" alt="img">
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center grid-social-links">
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-mail fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-phone-check fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-message-circle-share fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle me-1"><i class="ti ti-brand-skype fs-14"></i></a>
                                                    <a href="#" class="avatar avatar-xs text-dark rounded-circle"><i class="ti ti-brand-facebook fs-14"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /Company Grid --> 							

                            <div class="load-btn text-center">
                                <a href="javascript:void(0);" class="btn btn-primary">Load More Companies<i class="ti ti-loader"></i></a>
                            </div>

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
