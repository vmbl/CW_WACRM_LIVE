<?php $page = 'chat'; ?>

@extends('layout.mainlayout')
@section('content')


<div class="container py-4" style="float: right;width: 50%;">
    <h2>Chat with {{ $user->name }}</h2>

    <div id="chat-box">
        @foreach ($messages as $message)
             <div class="message @if($message->from == auth()->id()) sent @else received @endif">
                <div class="message-content">
                    {{ $message->message }}
                </div>
                <div class="message-time">
                    {{ $message->created_at->format('h:i A') }}
                </div>
            </div>
        @endforeach
    </div>

    <form id="chat-form">
        @csrf
        <input type="hidden" id="receiver_id" value="{{ $user->id }}">
        <textarea id="message" placeholder="Type your message..." rows="3" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

@endsection


