<?php $page = 'invoice-grid'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-md-12">
                    @component('components.breadcrumb')
                        @slot('title')
                            Invoices
                        @endslot
                        @slot('item1')
                            123
                        @endslot
                        @slot('item2')
                            invoice-grid
                        @endslot
                    @endcomponent


                        <!-- Search -->
						<div class="row align-items-center">
							<div class="col-sm-4">
								<div class="icon-form mb-3 mb-sm-0">
									<span class="form-icon"><i class="ti ti-search"></i></span>
									<input type="text" class="form-control" placeholder="Search Invoices">
								</div>							
							</div>		
							<div class="col-sm-8">					
								<div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
									<div class="dropdown me-2">
										<a href="javascript:void(0);" class="dropdown-toggle bg-white" data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
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
									<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add" ><i class="ti ti-square-rounded-plus me-2"></i>Add New Invoices</a>
								</div>
							</div>
						</div>
						<!-- /Search -->

						<!-- Filter -->
						<div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 border-top mt-4 pt-4 mb-4">
							<div class="d-flex align-items-center flex-wrap row-gap-2">
								<div class="sort-dropdown drop-down task-drops me-3">
									<a href="javascript:void(0);" class="dropdown-toggle bg-transparent" data-bs-toggle="dropdown">All Invoices </a>
									<div class="dropdown-menu  dropdown-menu-start">
										<ul>
											<li>
												<a href="#">
													<i class="ti ti-dots-vertical"></i>All Invoices
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti ti-dots-vertical"></i>Paid
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti ti-dots-vertical"></i>Partially Paid
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti ti-dots-vertical"></i>Overdue
												</a>
											</li>
											<li>
												<a href="#">
													<i class="ti ti-dots-vertical"></i>Unpaid
												</a>
											</li>
										</ul>
									</div>
								  </div>
								<div class="dropdown me-2">
									<a href="javascript:void(0);" class="dropdown-toggle bg-white" data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort </a>
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
								<div class="form-sorts dropdown me-2">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ti ti-filter-share"></i>Filter</a>
									<div class="filter-dropdown-menu dropdown-menu  dropdown-menu-md-end p-4">
										<div class="filter-set-view">
											<div class="filter-set-head">
												<h4><i class="ti ti-filter-share"></i>Filter</h4>
											</div>
											<div class="accordion" id="accordionExample">
												
												<div class="filter-set-content">
													<div class="filter-set-content-head">
														<a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#owner" aria-expanded="false" aria-controls="owner">Client</a>
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
														<a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">Amount</a>
													</div>
													<div class="filter-set-contents accordion-collapse collapse" id="collapsethree" data-bs-parent="#accordionExample">
														<div class="filter-content-list">
															<div class="mb-2 icon-form">
																<span class="form-icon"><i class="ti ti-search"></i></span>
																<input type="text" class="form-control" placeholder="Search Amount">
															</div>
															<ul>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox" checked="">
																			<span class="checkmarks"></span>
																			$2,15,000
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			$1,45,000
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			$2,15,000
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			$4,80,380
																		</label>
																	</div>
																</li>
																<li>
																	<div class="filter-checks">
																		<label class="checkboxs">
																			<input type="checkbox">
																			<span class="checkmarks"></span>
																			$2,12,000
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
														<a href="{{url('invoice-grid')}}" class="btn btn-primary">Filter</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="view-icons">
									<a href="{{url('invoices')}}"><i class="ti ti-list-tree"></i></a>
									<a href="{{url('invoice-grid')}}" class="active"><i class="ti ti-grid-dots"></i></a>
								</div>
							</div>	
						</div>
						<!-- /Filter -->

						<!-- Invoice Grid -->
						<div class="row">
							<div class="col-xxl-3 col-xl-4 col-md-6">
								<div class="card border">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-warning">Partially Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" ><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/truellysel.svg')}}" class="w-auto h-auto" alt="Truelysell"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Truelysell</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-01.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-success">Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/dreamchat.svg')}}" class="w-auto h-auto" alt="DreamsChat"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Dreamschat</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-02.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-warning">Partially Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/truellysell.svg')}}" class="w-auto h-auto" alt="Truelysell"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Truelysell</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-03.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-success">Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/servbook.svg')}}" class="w-auto h-auto" alt="Servbook"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Servbook</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-04.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
													<a href="javascript:void(0);" class="text-default">RiverStone Ventur</a>
												</div>                                                 
											</div>                                                
										</div>
									</div>								
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-md-6">
								<div class="card border">
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-danger">Unpaid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/dream-pos.svg')}}" class="w-auto h-auto" alt="DreamPOS"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">DreamPOS</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-05.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-warning">Partially Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/project-01.svg')}}" class="w-auto h-auto" alt="Project"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Kofejob</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-06.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-pending">Overdue</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/project-02.svg')}}" class="w-auto h-auto" alt="Project"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Doccure</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-07.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
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
										<div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
											<div class="users-profile">
												<span class="badge badge-success">Paid</span>
											</div>
											<div class="dropdown table-action">
												<a href="#" class="action-icon bg-white" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit"><i class="ti ti-edit text-blue"></i> Edit</a>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices"><i class="ti ti-trash text-danger"></i> Delete</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-clipboard-copy text-green"></i> View Invoices</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-checks text-success"></i> Mark as Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-file text-tertiary"></i> Mark as Partially Paid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-sticker text-blue"></i> Mark ad Unpaid</a>
													<a class="dropdown-item" href="javascript:void(0);"><i class="ti ti-printer text-info"></i> Print</a>
												</div>
											</div>
										</div>
										<div class="d-block">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-sm border flex-shrink-0 me-2"> 
														<img src="{{URL::asset('/build/img/priority/best.svg')}}" class="w-auto h-auto" alt="Project"> 
													</a>
													<div>
														<h6><a href="javascript:void(0);">Best@laundry</a></h6>
													</div>
												</div>                                                    
												<div>
													<span class="badge badge-purple-light">#1254058</span>
												</div>
											</div>                                                
											<div class="mb-3">
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-moneybag fs-12"></i></span>Total Value : $2,04,214</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-event fs-12"></i></span>Due Date : 15 May 2024</p>
												<p class="d-flex align-items-center mb-2"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Paid Amount : 2,15,000</p>
												<p class="d-flex align-items-center"><span class="avatar avatar-xs border me-2 text-dark"><i class="ti ti-calendar-stats fs-12"></i></span>Balance Amount : 2,15,000</p>
											</div>
										</div>
										<div class="bg-light-400 rounded p-2">
											<div class="d-flex align-items-center">
												<a href="javascript:void(0);" class="avatar avatar-sm bg-white border me-2">
													<img src="{{URL::asset('/build/img/icons/company-icon-08.svg')}}" class="w-auto h-auto" alt="img">
												</a>  
												<div class="d-flex flex-column">
													<span class="d-block">Client</span>
													<a href="javascript:void(0);" class="text-default">Best@laundry</a>
												</div>                                                 
											</div>                                                
										</div>
									</div>								
								</div>
							</div>
						</div>
						<!-- /Invoice Grid --> 			


                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    @component('components.model-popup')
    @endcomponent
@endsection
