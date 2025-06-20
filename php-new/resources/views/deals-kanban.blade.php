<?php $page = 'deals-kanban'; ?>
@extends('layout.mainlayout')
@section('content')

	<!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">

            
                    @component('components.breadcrumb')
                    @slot('title')
                    Deals 
                    @endslot
                    @slot('item1')
                    123 
                    @endslot
                    @slot('item2')
                    deals-kanban
                    @endslot
                    @endcomponent

                  
				<!-- Filter -->
                <div class="d-flex justify-content-between align-items-center flex-wrap row-gap-2 mb-4">
                    <div class="d-flex align-items-center flex-wrap row-gap-2">
                        <div class="form-sorts dropdown me-2">
                            <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"><i
                                    class="ti ti-filter-share"></i>Filter</a>
                            <div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-start p-3">
                                <div class="filter-set-view">
                                    <div class="filter-set-head">
                                        <h4><i class="ti ti-filter-share"></i>Filter</h4>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                        <div class="filter-set-content">
                                            <div class="filter-set-content-head">
                                                <a href="#" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="true"
                                                    aria-controls="collapseTwo">Deals Name</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse show"
                                                id="collapseTwo" data-bs-parent="#accordionExample">
                                                <div class="filter-content-list">
                                                    <div class="mb-2 icon-form">
                                                        <span class="form-icon"><i
                                                                class="ti ti-search"></i></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search Country">
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox" checked>
                                                                    <span class="checkmarks"></span>
                                                                    Collins
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Konopelski
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Adams
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Gutkowski
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Walter
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
                                                    data-bs-target="#owner" aria-expanded="false"
                                                    aria-controls="owner">Owner</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="owner" data-bs-parent="#accordionExample">
                                                <div class="filter-content-list">
                                                    <div class="mb-2 icon-form">
                                                        <span class="form-icon"><i
                                                                class="ti ti-search"></i></span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search Owner">
                                                    </div>
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
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#Status" aria-expanded="false"
                                                    aria-controls="Status">Status</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="Status" data-bs-parent="#accordionExample">
                                                <div class="filter-content-list">
                                                    <ul>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox" checked>
                                                                    <span class="checkmarks"></span>
                                                                    Won
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Open
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox">
                                                                    <span class="checkmarks"></span>
                                                                    Lost
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
                                                    data-bs-target="#collapseOne" aria-expanded="false"
                                                    aria-controls="collapseOne">Rating</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="collapseOne" data-bs-parent="#accordionExample">
                                                <div class="filter-content-list">
                                                    <ul>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox" checked>
                                                                    <span class="checkmarks"></span>
                                                                    <span class="rating">
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
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
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
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
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
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
                                                                        <i
                                                                            class="fa fa-star filled"></i>
                                                                        <i
                                                                            class="fa fa-star filled"></i>
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
                                                                        <i
                                                                            class="fa fa-star filled"></i>
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
                                                <a href="#" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree"
                                                    aria-expanded="false"
                                                    aria-controls="collapseThree">Tags</a>
                                            </div>
                                            <div class="filter-set-contents accordion-collapse collapse"
                                                id="collapseThree" data-bs-parent="#accordionExample">
                                                <div class="filter-content-list">
                                                    <ul>
                                                        <li>
                                                            <div class="filter-checks">
                                                                <label class="checkboxs">
                                                                    <input type="checkbox" checked>
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
                                                <a href="{{url('deals-kanban')}}" class="btn btn-primary">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="icon-form mb-3 mb-sm-0">
                            <span class="form-icon"><i class="ti ti-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search Deals">
                        </div>
                    </div>
                    <div>
                        <ul class="d-flex align-items-center">
                            <li>
                                <div class="view-icons me-2">
                                    <a href="{{url('deals')}}"><i class="ti ti-list-tree"></i></a>
                                    <a href="{{url('deals-kanban')}}" class="active"><i class="ti ti-grid-dots"></i></a>
                                </div>
                            </li>																	
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus me-2"></i>Add Deals</a>
                            </li>
                        </ul>
                    </div>
				</div>
				<!-- /Filter -->

                <!-- Deals Kanban -->
                <div class="d-flex overflow-x-auto align-items-start mb-4">
                    <div class="kanban-list-items">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-success me-2"></i>Qualify To Buy</h4>
                                        <span class="fw-medium text-default">45 Leads - $15,44,540</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_deal"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">HT</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Howell, Tremblay <br> and Rath</a></h6>
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
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-19.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Darlee Robertson</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>85%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 10 Jan 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">RJ</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Robert, John and <br> Carlos</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,10,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                sheron@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 12445-47878
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Exeter, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Sharon Roy</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti  me-1"></i>15%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 12 Jan 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">WS</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Wendy, Star and <br> David</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $04,22,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                vau@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 12445-47878
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Phoenix, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Vaughan</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>95%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 14 Jan 2024</span>
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
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-info me-2"></i>Contact Made</h4>
                                        <span class="fw-medium text-default">30 Leads - $19,94,938</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_deal"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">BR</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Byron, Roman and <br>  Bailey</a></h6>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-report-money text-dark me-1"></i>
                                                $02,45,000
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-mail text-dark me-1"></i>
                                                jessica13@example.com
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center mb-2">
                                                <i class="ti ti-phone text-dark me-1"></i>
                                                +1 89351-90346
                                            </p>
                                            <p class="text-default d-inline-flex align-items-center">
                                                <i class="ti ti-map-pin-pin text-dark me-1"></i>
                                                Chester, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-01.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Jessica</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>47%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 06 Feb 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">RJ</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Robert, John and <br> Carlos</a></h6>
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
                                                Charlotte, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-16.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Carol Thomas</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>98%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 15 Jan 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">IC</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Irene, Charles and  <br> Wilston</a></h6>
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
                                                Bristol, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-22.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Dawn Mercha</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>95%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 25 Jan 2024</span>
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
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-warning me-2"></i>Presentation</h4>
                                        <span class="fw-medium text-default">25 Leads - $10,36.390</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_deal"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">HT</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Jody, Powell and <br>  Cecil</a></h6>
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
                                                Baltimore, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-23.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Rachel Hampton</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>25%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 18 Mar 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">BL</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Bonnie, Linda and  <br> Mullin</a></h6>
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
                                                Coventry, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-24.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Jonelle Curtiss</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>70%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 15 Feb 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">CJ</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Carlos, Jones and <br> Jim</a></h6>
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
                                                Seattle
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-25.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Jonathan</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>45%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i>  30 Jan 2024</span>
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
                                        <h4 class="fw-semibold d-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-purple me-2"></i>Proposal Made</h4>
                                        <span class="fw-medium text-default">50 Leads - $18,83,013</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-purple"><i class="ti ti-plus"></i></a>
                                        <div class="dropdown table-action ms-2">
                                            <a href="#" class="action-icon dropdown-toggle bg-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item " href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_deal"><i class="fa-regular fa-trash-can text-danger"></i> Delete</a>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">FJ</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Freda,Jennfier and <br>  Thompson</a></h6>
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
                                                London, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-17.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Sidney Franks</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>59%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i> 11 Apr 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">BF</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Bruce, Faulkner and   <br> Lela</a></h6>
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
                                                Detroit, United State
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-26.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Brook</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>72%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i>  17 Apr 2024</span>
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
                                                <a href="{{url('deals-details')}}" class="avatar avatar-lg bg-gray flex-shrink-0 me-2"><span class="avatar-title text-dark">LP</span></a>
                                                <h6 class="fw-medium"><a href="{{url('deals-details')}}">Lawrence, Patrick and <br> Vandorn</a></h6>
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
                                                Manchester, United States
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-md flex-shrink-0 me-2"><img src="{{URL::asset('/build/img/profiles/avatar-15.jpg')}}" alt=""></a>
                                                <a href="javascript:void(0);" class="text-default">Mickey</a>
                                            </div>
                                            <span class="badge badge-sm text-white bg-blue"><i class="ti ti-progress me-1"></i>20%</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-3">
                                            <span><i class="ti ti-calendar-due"></i>   10 Feb 2024</span>
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
                <!-- /Deals Kanban -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@component('components.model-popup')
@endcomponent
@endsection