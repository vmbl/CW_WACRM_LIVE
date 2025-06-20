<?php $page = 'chat'; ?>
@extends('layout.mainlayout')
@section('content')

<div class="page-wrapper chat-page-wrapper">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($users as $user)
                            <li class="list-group-item">
                                <a href="{{ route('chat.show', $user) }}" class="text-decoration-none">
                                    {{ $user->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

