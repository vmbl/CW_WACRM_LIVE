<?php $page = 'chat'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper chat-page-wrapper">
    <div class="content">

        <!-- sidebar group -->
        <div class="sidebar-group left-sidebar chat_sidebar">

            <!-- Chats sidebar -->
            <div id="chats" class="left-sidebar-wrap sidebar active slimscroll">

                <div class="slimscroll-active-sidebar">

                   <!-- Left Chat Title -->
                   <div class="left-chat-title all-chats d-flex justify-content-between align-items-center">
                        <div class="setting-title-head">
                            <h4> All Chats</h4>
                        </div>
                        <div class="add-section">
                            <ul>
                                <li><a href="javascript:void(0);" class="user-chat-search-btn"><i class="bx bx-search" ></i></a></li>
                                <li >
                                    <div class="chat-action-btns">
                                        <div class="chat-action-col">
                                            <a class="#" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded" ></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" >
                                                <a href="javascript:void(0);" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#new-chat"><span><i class="bx bx-message-rounded-add"></i></span>New Chat </a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#new-group"><span><i class="bx bx-user-circle"></i></span>Create Group</a>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#invite-other"><span><i class="bx bx-user-plus"></i></span>Invite Others</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Chat Search -->
                            <div class="user-chat-search">
                                <form>
                                    <span class="form-control-feedback"><i class="bx bx-search" ></i></span>
                                    <input type="text" name="chat-search" placeholder="Search" class="form-control">
                                    <div class="user-close-btn-chat"><i class="fa fa-close"></i></div>
                                </form>
                            </div>
                            <!-- /Chat Search -->
                        </div>
                   </div>
                   <!-- /Left Chat Title -->

                    <!-- Top Online Contacts -->
                    
                    <!-- /Top Online Contacts -->

                    <div class="sidebar-body chat-body" id="chatsidebar">
                       
                        <!-- Left Chat Title -->

                        <!-- Left Chat Title -->
                        <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                            <div class="fav-title pin-chat">
                                <h6>Recent Chat</h6>
                            </div>
                        </div>
                        <!-- /Left Chat Title -->
                        <ul class="user-list">
                            @foreach($leads as $leadData)
                                <li class="user-list-item leadchats" data-name='{{ $leadData->lead_name }}' data-lastmsg='{{ $leadData->last_message_text }}'  data-to='{{ $leadData->lead_id }}' data-from='{{ auth()->id() }}' data-tk="{{ csrf_token() }}">
                                    <a href="javascript:void(0);" >
                                        <div class="avatar avatar-online">
                                            <img src="{{URL::asset('/build/img/profiles/avatar-03.jpg')}}" class="rounded-circle" alt="image">
                                        </div>
                                        <div class="users-list-body">
                                            <div>
                                                <h5>{{ $leadData->lead_name }}</h5>
                                                <p>{{ $leadData->last_message_text }}</p>
                                            </div>
                                            <div class="last-chat-time">
                                                <small class="text-muted">{{ ($leadData->last_message_created_at) ? date("Y-m-d H:i A", strtotime($leadData->last_message_created_at)) : "" }}</small>
                                                <div style="display:none" class="new-message-count">11</div>
                                            </div>    
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
            <!-- / Chats sidebar -->
        </div>
        <!-- /Sidebar group -->

        <!-- Dynamic Chat Messages-->
        
        <!-- Dyamice Chat End -->
        <div class="chat chat-messages" id="middle">
        </div>
        <!-- Right sidebar -->
        <div class="right-sidebar right_sidebar_profile right-side-contact hide-right-sidebar" id="middle1">
            <div class="right-sidebar-wrap active">
            <div class="slimscroll">
                    <div class="left-chat-title d-flex justify-content-between align-items-center border-bottom-0">
                        <div class="fav-title mb-0">
                            <h6>Contact Info</h6>
                        </div>
                        <div class="contact-close_call text-end">
                            <a href="#" class="close_profile close-star">
                                <i class="bx bxs-star"></i>
                            </a>
                            <a href="#" class="close_profile close-trash">
                                <i class="bx bx-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-body">
                        <div class="mt-0 right_sidebar_logo">
                            <div class="text-center right-sidebar-profile">
                                <figure class="avatar avatar-xl mb-3">
                                    <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="image">
                                </figure>
                                <h5 class="profile-name">Mark Villiams</h5>
                                <div class="last-seen-profile">
                                    <span>last seen at 07:15 PM</span>
                                </div>
                                <div class="chat-options chat-option-profile">
                                    <ul class="list-inline">
                                        <li class="list-inline-item" >
                                            <a href="{{url('audio-call')}}" class="btn btn-outline-light " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voice Call">
                                                <i class="bx bx-phone" ></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item " >
                                            <a href="{{url('video-call')}}" class="btn btn-outline-light profile-open" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Video Call">
                                                <i class="bx bx-video" ></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" >
                                            <a href="javascript:void(0)" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat">
                                                <i class="bx bx-message-square-dots"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-member-details">
                                <div class="member-details">
                                    <ul>
                                        <li>
                                            <h5>Bio</h5>
                                        </li>
                                        <li>
                                            <h6>Phone</h6>
                                            <span>555-555-21541</span>
                                        </li>
                                        <li>
                                            <h6>Email Address</h6>
                                            <span>info@example.com</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="right-sidebar-head share-media">
                        <div class="share-media-blk">
                            <h5>Shared Media</h5>
                            <a href="javascript:void(0);">View All</a>
                        </div>
                         <div class="about-media-tabs">       
                            <nav>
                                <div class="nav nav-tabs " id="nav-tab">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#info">Photos</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab1" data-bs-toggle="tab" href="#Participants" >Videos</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab2" data-bs-toggle="tab" href="#media" >File</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab3" data-bs-toggle="tab" href="#link" >Link</a>
                                </div>
                            </nav>
                            <div class="tab-content pt-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="info">
                                    <ul class="nav share-media-img mb-0">
                                        <li>
                                            <a href="{{URL::asset('/build/img/media/media-01.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-01.jpg')}}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{URL::asset('/build/img/media/media-02.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-02.jpg')}}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{URL::asset('/build/img/media/media-03.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-03.jpg')}}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{URL::asset('/build/img/media/media-04.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-04.jpg')}}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{URL::asset('/build/img/media/media-05.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-05.jpg')}}" alt="">
                                            </a>
                                        </li>
                                        <li class="blur-media">
                                            <a href="{{URL::asset('/build/img/media/media-02.jpg')}}" data-fancybox="gallery" class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-02.jpg')}}" alt="">
                                            </a>
                                            <span>+10</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="Participants">
                                    <ul class="nav share-media-img mb-0">
                                        <li>
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-01.jpg')}}" alt="img">
                                                <span><i class="bx bx-play-circle"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-02.jpg')}}" alt="img">
                                                <span><i class="bx bx-play-circle"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-03.jpg')}}" alt="img">
                                                <span><i class="bx bx-play-circle"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-04.jpg')}}" alt="img">
                                                <span><i class="bx bx-play-circle"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-05.jpg')}}" alt="img">
                                                <span><i class="bx bx-play-circle"></i></span>
                                            </a>
                                        </li>
                                        <li class="blur-media">
                                            <a href="https://www.youtube.com/embed/Mj9WJJNp5wA" data-fancybox class="fancybox">
                                                <img src="{{URL::asset('/build/img/media/media-03.jpg')}}" alt="img">
                                            </a>
                                            <span>+10</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="media">
                                    <div class="media-file">
                                        <div class="media-doc-blk">
                                            <span><i class="bx bxs-file-doc"></i></span>
                                            <div class="document-detail">
                                                <h6>Landing_page_V1.doc</h6>
                                                <ul>
                                                    <li>12 Mar 2023</li>
                                                    <li>246.3 KB</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="media-download">
                                            <a href="javascript:void(0);"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                    <div class="media-file">
                                        <div class="media-doc-blk">
                                            <span><i class="bx bxs-file-pdf"></i></span>
                                            <div class="document-detail">
                                                <h6>Design Guideless.pdf</h6>
                                                <ul>
                                                    <li>12 Mar 2023</li>
                                                    <li>246.3 KB</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="media-download">
                                            <a href="javascript:void(0);"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                    <div class="media-file">
                                        <div class="media-doc-blk">
                                            <span><i class="bx bxs-file"></i></span>
                                            <div class="document-detail">
                                                <h6>sample site.txt</h6>
                                                <ul>
                                                    <li>12 Mar 2023</li>
                                                    <li>246.3 KB</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="media-download">
                                            <a href="javascript:void(0);"><i class="bx bx-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="link">
                                    <div class="media-link-grp">
                                        <div class="link-img">
                                            <a href="javascript:void(0);"><img src="{{URL::asset('/build/img/media/media-link-01.jpg')}}" alt="Img"></a>
                                        </div>
                                        <div class="media-link-detail">
                                            <h6><a href="javascript:void(0);">Digital Marketing Guide</a></h6>
                                            <span><a href="javascript:void(0);">https://elements.envato.com/all-items/blog</a></span>
                                        </div>
                                    </div>
                                    <div class="media-link-grp mb-0">
                                        <div class="link-img">
                                            <a href="javascript:void(0);"><img src="{{URL::asset('/build/img/media/media-link-02.jpg')}}" alt="Img"></a>
                                        </div>
                                        <div class="media-link-detail">
                                            <h6><a href="javascript:void(0);">Blog Post</a></h6>
                                            <span><a href="javascript:void(0);">https://elements.envato.com/blog-post-TXQ5FB8</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-message-grp">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="star-message-left" >
                                    <div class="stared-group">
                                        <span class="star-message"> <i class="bx bx-star"></i></span>
                                        <h6>Starred Messages</h6>
                                    </div>
                                    <div class="count-group">
                                        <span>10</span>
                                        <i class="bx bx-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#mute-notification">
                                    <div class="stared-group">
                                        <span class="mute-message"> <i class="bx bx-microphone-off"></i></span>
                                        <h6>Mute Notifications</h6>
                                    </div>
                                    <div class="count-group">
                                        <i class="bx bx-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#block-user">
                                    <div class="stared-group">
                                        <span class="block-message"> <i class="bx bx-x-circle"></i></span>
                                        <h6>Block User</h6>
                                    </div>
                                    <div class="count-group">
                                        <i class="bx bx-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#report-user">
                                    <div class="stared-group">
                                        <span class="report-message"> <i class="bx bx-user-x"></i></span>
                                        <h6>Report User</h6>
                                    </div>
                                    <div class="count-group">
                                        <i class="bx bx-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-user">
                                    <div class="stared-group">
                                        <span class="delete-message"> <i class="bx bx-trash-alt"></i></span>
                                        <h6>Delete Chat</h6>
                                    </div>
                                    <div class="count-group">
                                        <i class="bx bx-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right sidebar -->

    </div>
</div>
@component('components.model-popup')
@endcomponent

@endsection
