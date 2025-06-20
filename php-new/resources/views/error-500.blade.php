<?php $page = 'error-500'; ?>
@extends('layout.mainlayout')
@section('content')

    <div class="d-flex flex-wrap w-100 vh-100 overflow-hidden">
        <div class="d-flex align-items-center justify-content-center flex-fill flex-column vh-100 overflow-auto">
            <div class="error-img mb-4">
                <img src="{{ URL::asset('/build/img/authentication/error-500.png')}}" class="img-fluid" alt="">
            </div>
            <div class="text-center">
                <h3 class="fs-28 mb-3">Oops, something went wrong</h3>
                <p class="fs-16">Error 500 Page not found. Sorry the page you looking for <br> doesn’t exist or has been moved</p>
                <a href="deals-dashboard" class="btn btn-primary">
                    <i class="ti ti-arrow-narrow-left me-1"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection