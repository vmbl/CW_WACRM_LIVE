<?php $page = 'leads-kanban'; ?>
@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-md-12">

               	
                @component('components.breadcrumb')
                @slot('title')
                Leads
                @endslot
                @slot('item1')
                123
                @endslot
                @slot('item2')
                leads-kanban
                @endslot
               @endcomponent				

           
			<!-- Filter -->
            <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 mb-4">
                <div class="d-flex align-items-center flex-wrap row-gap-2">
                    <div class="form-sorts dropdown me-2">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown"  data-bs-auto-close="outside"><i class="ti ti-filter-share"></i>Filter</a>
                        <div class="filter-dropdown-menu dropdown-menu dropdown-menu-start">
                            <div class="filter-set-view">
                                <div class="filter-set-head">
                                    <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="filter-set-content">
                                        <div class="filter-set-content-head">
                                            <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Lead Name</a>
                                        </div>
                                        <div class="filter-set-contents accordion-collapse collapse show" id="collapseTwo" data-bs-parent="#accordionExample">
                                            <div class="filter-content-list">
                                                <ul>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" checked>
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Collins</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Konopelski</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Adams</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Schumm</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Wisozk</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Heller</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Gutkowski</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Walter</h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-set-content">
                                        <div class="filter-set-content-head">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#company" aria-expanded="false" aria-controls="company">Company Name</a>
                                        </div>
                                        <div class="filter-set-contents accordion-collapse collapse" id="company" data-bs-parent="#accordionExample">
                                            <div class="filter-content-list">
                                                <div class="mb-2 icon-form">
                                                    <span class="form-icon"><i class="ti ti-search"></i></span>
                                                    <input type="text" class="form-control" placeholder="Search Company">
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" checked>
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>NovaWave LLC</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>BlueSky Industries</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Silver Hawk</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Summit Peak</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>RiverStone Ventur</h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-set-content">
                                        <div class="filter-set-content-head">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#Status" aria-expanded="false" aria-controls="Status">Lead Status</a>
                                        </div>
                                        <div class="filter-set-contents accordion-collapse collapse" id="Status" data-bs-parent="#accordionExample">
                                            <div class="filter-content-list">
                                                <ul>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" checked>
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Closed</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Not Contacted</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Contacted</h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-set-content">
                                        <div class="filter-set-content-head">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#date" aria-expanded="false" aria-controls="date">Created Date</a>
                                        </div>
                                        <div class="filter-set-contents accordion-collapse collapse" id="date" data-bs-parent="#accordionExample">
                                            <div class="filter-content-list">
                                                <ul>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" checked>
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>25 Sep 2023, 01:22 pm</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>29 Sep 2023, 04:15 pm</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>04 Oct 2023, 10:18 am</h5>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-set-content">
                                        <div class="filter-set-content-head">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#owner" aria-expanded="false" aria-controls="owner">Lead Owner</a>
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
                                                                <input type="checkbox" checked>
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Hendry</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Guillory</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Jami</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Theresa</h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filter-checks">
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </div>
                                                        <div class="collapse-inside-text">
                                                            <h5>Espinosa</h5>
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
                                            <a href="{{url('leads')}}" class="btn btn-primary">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon-form">
                        <span class="form-icon"><i class="ti ti-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search Leads">
                    </div>	
                </div>
                <div>
                    <ul class="d-flex align-items-center">
                        <li>
                            <div class="view-icons me-2">
                                <a href="{{url('leads')}}"><i class="ti ti-list-tree"></i></a>
                                <a href="{{url('leads-kanban')}}" class="active"><i class="ti ti-grid-dots"></i></a>
                            </div>
                        </li>																	
                        <li>
                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus me-2"></i>Add Leads</a>
                        </li>
                    </ul>
                </div>
			</div>
			<!-- /Filter -->

                <!-- Leads Kanban -->
                <div class="d-flex overflow-x-auto align-items-start mb-4">
                    <div class="kanban-list-items">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-warning me-2"></i>Contacted</h4>
                                        <span class="fw-medium text-default">45 Leads - $15,44,540</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"  href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_lead"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kanban-drag-wrap pt-4">
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-warning border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">SM</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Schumm</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $03,50,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                darleeo@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 12445-47878
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Newyork, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-09.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-success border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">CS</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Collins</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,10,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                robertson@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 13987-90231
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Austin, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-01.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-danger border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">KI</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Konopelski</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,18,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                sharon@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 17932-04278
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Atlanta, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-02.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kanban-list-items">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-purple me-2"></i>Not Contacted</h4>
                                        <span class="fw-medium text-default">45 Leads - $15,44,540</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_lead"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kanban-drag-wrap pt-4">
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-purple border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">AS</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Adams</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,45,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                vaughan12@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 17392-27846
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                London, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-03.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-warning border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">WK</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Wizosk</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $01,17,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                caroltho3@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 78982-09163
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Bristol, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-04.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-success border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">HR</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Heller</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,12,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                dawnmercha@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 27691-89246
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                San Francisco, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-05.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kanban-list-items">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-success me-2"></i>Closed</h4>
                                        <span class="fw-medium text-default">45 Leads - $15,44,540</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_lead"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kanban-drag-wrap pt-4">
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-success border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">GI</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Gutkowsi</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $01,84,043
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                rachel@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 17839-93617
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Dallas, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-06.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-danger border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">WR</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Walter</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $09,35,189
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                jonelle@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 16739-47193
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Leicester, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-07.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-purple border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">HN</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Hansen</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $04,27,940
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                jonathan@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 18390-37153
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Norwich, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-08.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kanban-list-items">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-danger me-2"></i>Lost</h4>
                                        <span class="fw-medium text-default">15 Leads - $14,89,543</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_lead"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kanban-drag-wrap pt-4">
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-danger border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">SE</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Steve</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $04,17,593
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                sidney@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 11739-38135
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Manchester, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-09.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-success border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">LE</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Leuschke</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $08,81,389
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                brook@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 19302-91043
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Chicago, United States
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-10.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card kanban-card border">
                                    <div class="card-body">
                                        <div class="d-block">
                                            <div class="bg-warning border border-2 mb-3"></div>
                                            <div class="d-flex align-items-center mb-3">
                                                <a href="{{url('leads-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">AY</span></a>
                                                <h6 class="fw-medium"><a href="{{url('leads-details')}}">Anthony</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $09,27,193
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                mickey@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 17280-92016
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Derby, United Kingdom
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span class="avatar avatar-sm border rounded d-flex align-items-center justify-content-center"><img src="{{URL::asset('/build/img/icons/company-icon-01.svg')}}" class="w-auto h-auto" alt=""></span>
                                            <div class="icons-social d-flex align-items-center">
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-phone-check"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center me-1"><i class="ti ti-message-circle-2"></i></a>
                                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="ti ti-color-swatch"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Leads Kanban -->

            </div>
        </div>
    </div>
</div>
<!-- /Page Wrapper -->
@component('components.model-popup')
@endcomponent
@endsection