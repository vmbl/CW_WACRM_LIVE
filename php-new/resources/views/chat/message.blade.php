<div class="slimscroll">
    <div class="chat-header">
        <div class="user-details">
            <div class="d-lg-none">
                <ul class="list-inline mt-2 me-2">
                    <li class="list-inline-item">
                        <a class="text-muted px-0 left_sides" href="#" data-chat="open">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <figure class="avatar ms-1">
                <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle" alt="image">
            </figure>
            <div class="mt-1">
                <h5>{{ $custname }}</h5>
                <small class="last-seen">
                    Last Msg at {{ $lastmsg }}
                </small>
            </div>
        </div>
        <div class="chat-options ">
            <ul class="list-inline">
                <li class="list-inline-item" >
                    <a href="javascript:void(0)" class="btn btn-outline-light chat-search-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                        <i class="bx bx-search" ></i>
                    </a>
                </li>
                <li class="list-inline-item" >
                    <a href="{{url('video-call')}}" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Video Call">
                        <i class="bx bx-video" ></i>
                    </a>
                </li>
                <li class="list-inline-item" >
                    <a href="{{url('audio-call')}}" class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voice Call">
                        <i class="bx bx-phone" ></i>
                    </a>
                </li>
                <li class="list-inline-item dream_profile_menu" >
                    <a href="javascript:void(0)" class="btn btn-outline-light not-chat-user">
                        <i class="bx bx-info-circle" ></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn btn-outline-light no-bg" href="#" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded" ></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" >
                        <a href="#" class="dropdown-item "><span><i class="bx bx-x" ></i></span>Close Chat </a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mute-notification"><span><i class="bx bx-volume-mute"></i></span>Mute Notification</a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#disappearing-messages"><span><i class="bx bx-time-five"></i></span>Disappearing Message</a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#clear-chat"><span><i class="bx bx-brush-alt"></i></span>Clear Message</a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-chat"><span><i class="bx bx-trash-alt"></i></span>Delete Chat</a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#report-user"><span><i class="bx bx-dislike"></i></span>Report</a>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#block-user"><span><i class="bx bx-block"></i></span>Block</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Chat Search -->
        <div class="chat-search">
            <form>
                <span class="form-control-feedback"><i class="bx bx-search" ></i></span>
                <input type="text" name="chat-search" placeholder="Search Chats" class="form-control">
                <div class="close-btn-chat"><i class="fa fa-close"></i></div>
            </form>
        </div>
        <!-- /Chat Search -->
    </div>
    <div class="chat-body">
        <div class="messages">
            <!-- left chat -->
            @foreach($messages['messages'] as $usermsg)
                @if( $usermsg->msginitby == "system")
                <div class="chats chats-right">
                @else
                <div class="chats">
                @endif
                    <div class="chat-avatar">
                        <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle dreams_chat" alt="image">
                    </div>
                    <div class="chat-content">
                        <div class="chat-profile-name">
                            <h6>{{ $custname }}<span>{{ $usermsg->created_at }}</span></h6>
                        </div>
                        <div class="message-content">
                            {{ $usermsg->message }}
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="chat-line">
                <span class="chat-date">Today, July 24</span>
            </div>
        </div>
    </div>
</div>
<div class="chat-footer">
    <form>
        <div class="smile-foot">
            <div class="chat-action-btns">
                <div class="chat-action-col">
                    <a class="action-circle" href="#" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" >
                        <a href="#" class="dropdown-item "><span><i class="bx bx-file"></i></span>Document</a>
                        <a href="#" class="dropdown-item"><span><i class="bx bx-camera"></i></span>Camera</a>
                        <a href="#" class="dropdown-item"><span><i class="bx bx-image"></i></span>Gallery</a>
                        <a href="#" class="dropdown-item" ><span><i class="bx bx-volume-full"></i></span>Audio</a>
                        <a href="#" class="dropdown-item"><span><i class="bx bx-map"></i></span>Location</a>
                        <a href="#" class="dropdown-item" ><span><i class="bx bx-user-pin"></i></span>Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="smile-foot emoj-action-foot">
            <a href="#" class="action-circle"><i class="bx bx-smile"></i></a>
                <div class="emoj-group-list-foot down-emoji-circle">
                    <ul>
                        <li><a href="javascript:void(0);" ><img src="{{URL::asset('/build/img/icons/emoj-icon-01.svg')}}"  alt="Icon"></a></li>
                        <li><a href="javascript:void(0);" ><img src="{{URL::asset('/build/img/icons/emoj-icon-02.svg')}}"  alt="Icon"></a></li>
                        <li><a href="javascript:void(0);" ><img src="{{URL::asset('/build/img/icons/emoj-icon-03.svg')}}"  alt="Icon"></a></li>
                        <li><a href="javascript:void(0);" ><img src="{{URL::asset('/build/img/icons/emoj-icon-04.svg')}}"  alt="Icon"></a></li>
                        <li><a href="javascript:void(0);" ><img src="{{URL::asset('/build/img/icons/emoj-icon-05.svg')}}"  alt="Icon"></a></li>
                        <li class="add-emoj"><a href="javascript:void(0);" ><i class="bx bx-plus"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="smile-foot">
            <a href="#"  class="action-circle"><i class="bx bx-microphone-off"></i></a>
        </div>
        <input type="text" class="form-control chat_form" placeholder="Type your message here...">
        <div class="form-buttons">
            <button class="btn send-btn" type="submit">
                <i class="bx bx-paper-plane"></i>
            </button>
        </div>
        <input type="hidden" id="leadID" value="{{ $leadid }}" />
    </form>
</div>
<script>
window.Echo.private(`chat{{ $leadid }}`)
    .listen('PublicMessageEvent', (e) => {
    console.log("Message received:", e);
    $("div.messages").append(`
        <div class="chats">
            <div class="chat-avatar">
                <img src="{{URL::asset('/build/img/profiles/avatar-02.jpg')}}" class="rounded-circle dreams_chat" alt="image">
            </div>
            <div class="chat-content">
                <div class="chat-profile-name">
                    <h6>{{ $custname }}<span>{{ date('m/D H:i') }}</span></h6>
                </div>
                <div class="message-content">
                    `+e.message+`
                </div>
            </div>
        </div>`
    )
});
</script>