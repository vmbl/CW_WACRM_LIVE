<?php $page = 'project-details'; ?>
@extends('layout.mainlayout')
@section('content')
		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content">

				<div class="row">
					<div class="col-md-12">
						@component('components.breadcrumb')
						@slot('title')
						Project Overview
						@endslot
						@slot('item2')
						project-details
						@endslot
					   @endcomponent

					</div>
				</div>

				<div class="row">
					<div class="col-md-12">

						<!-- Project User -->
						<div class="contact-head">
							<div class="row align-items-center">
								<div class="col-sm-6">
									<ul class="contact-breadcrumb">
										<li><a href="{{url('projects')}}"><i class="ti ti-arrow-narrow-left"></i>Project</a></li>
										<li>Kofejob</li>
									</ul>
								</div>
								<div class="col-sm-6 text-sm-end">
									<div class="contact-pagination">
										<p>1 of 40</p>
										<ul>
											<li>
												<a href="{{url('project-details')}}"><i class="ti ti-chevron-left"></i></a>
											</li>
											<li>
												<a href="{{url('project-details')}}"><i class="ti ti-chevron-right"></i></a>
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
											<img src="{{URL::asset('/build/img/priority/project-03.svg')}}" alt="Image">
										</div>
										<div>
											<h5 class="mb-1">Kofejob</h5>
											<p class="mb-2">Project Id :154454887</p>
											<span class="priority badge badge-tag badge-danger-light"><i class="ti ti-square-rounded-filled"></i>High</span>
											<span class="badge badge-pill badge-status bg-success">Active</span>
										</div>
									</div>
									<div class="contacts-action">
										<span class="badge badge-light"><i class="ti ti-lock"></i>Private</span>
										<div class="dropdown action-drops">
											<a href="#" class="bg-success py-1 px-2" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="ti ti-thumb-up me-2"></i>Completed<i class="ti ti-chevron-down ms-2"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);"><span>Completed</span></a>
												<a class="dropdown-item" href="javascript:void(0);"><span>Develop</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Project User -->

					</div>

					<!-- Project Sidebar -->
					<div class="col-xl-3 theiaStickySidebar">
						<div class="card">
							<div class="card-body p-3">
								<h6 class="mb-3 fw-semibold">Project Information</h6>
								<ul>
									<li class="row mb-3"><span class="col-6">Start Date</span><span class="col-6">27 Sep 2023, 11:45 pm</span></li>
									<li class="row mb-3"><span class="col-6">Due Date</span><span class="col-6">27 Sep 2024,  11:45 pm</span></li>
									<li class="row mb-3"><span class="col-6">Value</span><span class="col-6">$25,11,145</span></li>
									<li class="row mb-3"><span class="col-6">Project Type</span><span class="col-6">Mobile Application</span></li>
									<li class="row mb-3"><span class="col-6">Project Timing</span><span class="col-6">Hourly</span></li>
								</ul>	
								<hr>	
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h6 class="mb-3 fw-semibold">Client</h6>
									<a href="javascript:void(0);" class="link-purple mb-3"><i class="ti ti-circle-plus me-1"></i>Add New</a>
								</div>
								<ul class="company-info com-info">
									<li>
										<span>
											<img src="{{URL::asset('/build/img/icons/company-icon-08.svg')}}" alt="Image">
										</span>
										<div>
											<p>Harbor View</p>
										</div>
									</li>
								</ul>	
								<hr>	
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h6 class="mb-3 fw-semibold">Responsible Persons</h6>
									<a href="javascript:void(0);" class="link-purple mb-3" data-bs-toggle="modal" data-bs-target="#access_view"><i class="ti ti-circle-plus me-1"></i>Add New</a>
								</div>
								<ul class="project-mem">
									<li>
										<a href="#">
											<img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" alt="img">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{URL::asset('/build/img/profiles/avatar-05.jpg')}}" alt="img">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{URL::asset('/build/img/profiles/avatar-06.jpg')}}" alt="img">
										</a>
									</li>
									<li class="more-set">
										<a href="#">+05</a>
									</li>
								</ul>
								<hr>	
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h6 class="mb-3 fw-semibold">Team Leader</h6>
									<a href="javascript:void(0);" class="link-purple mb-3" data-bs-toggle="modal" data-bs-target="#owner">Change</a>
								</div>
								<div class="d-flex align-items-center mb-3">
									<div class="avatar avatar-md me-2">
										<img src="{{URL::asset('/build/img/profiles/avatar-21.jpg')}}" alt="Image">
									</div>
									<p>Vaughan</p>
								</div>	
								<hr>	
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h6 class="mb-3 fw-semibold">Priority</h6>
									<span class="priority badge badge-tag badge-danger-light mb-3"><i class="ti ti-square-rounded-filled"></i>High</span>
								</div>
								<hr class="mt-0">
								<div class="d-flex align-items-center justify-content-between flex-wrap">
									<h6 class="mb-3 fw-semibold">Pipeline</h6>
									<h6 class="mb-3"><i class="ti ti-timeline-event-text me-1"></i>Marketing Pipeline</h6>
								</div>
								<hr class="mt-0">						
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
					<!-- /Project Sidebar -->

					<!-- Project Details -->
					<div class="col-xl-9">

						<div class="card mb-3">
							<div class="card-body pb-0">
								<div class="pipeline-list">
									<ul>
										<li><a href="javascript:void(0);" class="bg-pending">Plan</a></li>
										<li><a href="javascript:void(0);" class="bg-warning">Design</a></li>
										<li><a href="javascript:void(0);" class="bg-gray">Development</a></li>
										<li><a href="javascript:void(0);" class="bg-gray">Completed</a></li>
									</ul>
								</div>
								<ul class="nav nav-tabs nav-tabs-bottom" role="tablist">
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#tasks" class="nav-link active"><i class="ti ti-subtask me-1"></i>Tasks</a>
									</li>
									<li class="nav-item" role="presentation">
										<a href="#" data-bs-toggle="tab" data-bs-target="#activities" class="nav-link"><i class="ti ti-alarm-minus me-1"></i>Activities</a>
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

							<!-- Tasks -->
							<div  class="tab-pane active show" id="tasks">
								<div class="card">
									<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
										<h4 class="fw-semibold">All Tasks</h4>
										<div class="d-inline-flex align-items-center text-end">
											<div class="form-sort mt-0 me-2">
												<i class="ti ti-sort-ascending-2"></i>
												<select class="select">
													<option>Sort By Date</option>
													<option>Ascending</option>
													<option>Descending</option>
												</select>
											</div>
											<a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_add"><i class="ti ti-circle-plus me-1"></i>Add New Task</a>
										</div>
									</div>
									<div class="card-body">
										<div class="tasks-activity">
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Add a form to Update Task</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Make all strokes thinner</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Update orginal content</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Use only component colours</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Add images to the cards section</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>	
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-3">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Design description banner & landing page</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card border border-end-0 border-top-0 border-bottom-0 border-start border-3 border-danger mb-0">
												<div class="card-body pb-2">
													<div class="row align-items-center">
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap">
																<p class="mb-2 me-3 text-gray-9"><i class="ti ti-grip-vertical me-2"></i>Make sure all the padding should be 24px</p>
																<span class="badge badge-pill badge-status bg-green mb-2 me-2"><i class="ti ti-phone me-1"></i>Calls</span>
																<span class="priority badge badge-tag badge-danger-light mb-2"><i class="ti ti-square-rounded-filled me-1"></i>High</span>
															</div>
														</div>
														<div class="col-md-6">
															<div class="d-flex align-items-center flex-wrap float-md-end">
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-clock-record me-1"></i>25 Hrs
																</div>
																<div class="d-flex align-items-center text-gray-9 mb-2 me-3">
																	<i class="ti ti-calendar-exclamation me-1"></i>25 Oct 2023 
																</div>
																<div class="d-flex align-items-center mb-2">
																	<div class="avatar avatar-sm me-2">
																		<img src="{{URL::asset('/build/img/profiles/avatar-20.jpg')}}" class="rounded-circle" alt="img">
																	</div>
																	<div class="dropdown table-action">
																		<a href="#" class="action-icon " data-bs-toggle="dropdown" aria-expanded="false">
																			<i class="fa fa-ellipsis-v"></i>
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" href="#"><i class="ti ti-edit text-blue"></i> Edit</a>
																			<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_task"><i class="ti ti-trash text-danger"></i> Delete</a>
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
							<!-- /Tasks -->

							<!-- Activities -->
							<div  class="tab-pane fade" id="activities">
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
					<!-- /Project Details -->
					
				</div>

			</div>
		</div>
		<!-- /Page Wrapper -->
@component('components.model-popup')
@endcomponent
@endsection