<?php $page = 'coming-soon'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="d-flex flex-wrap w-100 vh-100 overflow-hidden">
        <div class="d-flex align-items-center justify-content-center flex-fill flex-column vh-100 overflow-auto">
            <div class="comming-shapes">
                <div class="comming-right-shape">
                    <img src="{{ URL::asset('/build/img/authentication/shape-03.png')}}" alt="Shape">
                </div>
                <div class="comming-left-shape">
                    <img src="{{ URL::asset('/build/img/authentication/shape-04.png')}}" alt="Shape"> 
                </div> 
            </div>
            <div class="row justify-content-center text-center w-100">
                <div class="col-md-6">
                    <div class="coming-soon-box">
                        <div class="text-center mb-3">
                            <img src="{{ URL::asset('/build/img/icons/coming-icon.svg')}}" alt="Coming Icon">
                        </div>
                        <span class="fs-24 fw-bold mb-3 d-block">Our Website is</span>
                        <h1 class="fs-60 mb-2"><span class="text-primary"> COMING </span> SOON </h1>
                        <p class="fs-15">Please check back later, We are working hard to get <br> everything  just  right.</p>
                        <ul class="d-flex align-items-center justify-content-center my-4">
                            <li class="d-flex flex-column justify-content-center border rounded wh-85 fs-16 fw-medium me-2 me-sm-3"><span class="days fs-28 text-dark fw-bold lh-1">54</span>days</li>
                            <li class="seperate-dot me-2 me-sm-3">:</li>
                            <li class="d-flex flex-column justify-content-center border rounded wh-85 fs-16 fw-medium me-2 me-sm-3"><span class="hours fs-28 text-dark fw-bold lh-1">10</span>Hrs</li>
                            <li class="seperate-dot me-2 me-sm-3">:</li>
                            <li class="d-flex flex-column justify-content-center border rounded wh-85 fs-16 fw-medium me-2 me-sm-3"><span class="minutes fs-28 text-dark fw-bold lh-1">47</span>Min</li>
                            <li class="seperate-dot me-2 me-sm-3">:</li>
                            <li class="d-flex flex-column justify-content-center border rounded wh-85 fs-16 fw-medium"><span class="seconds fs-28 text-dark fw-bold lh-1">00</span>Sec</li>
                        </ul>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-center">Subscribe to get notified!</label>
                            <div class="bg-white border border-2 p-1 d-flex align-items-center rounded ps-0">
                                <input type="email" class="form-control border-0 shadow-none" placeholder="Enter Your Email">
                                <a href="javascript:void(0);" class="btn btn-primary">Subscribe</a>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center align-items-center">
                            <a href="#" class="btn btn-dark btn-icon btn-sm me-2"><i class="ti ti-brand-facebook fs-16"></i></a>
                            <a href="#" class="btn btn-dark btn-icon btn-sm me-2"><i class="ti ti-brand-instagram fs-16"></i></a>
                            <a href="#" class="btn btn-dark btn-icon btn-sm me-2"><i class="ti ti-brand-twitter fs-16"></i></a>
                            <a href="#" class="btn btn-dark btn-icon btn-sm me-2"><i class="ti ti-brand-pinterest fs-16"></i></a>
                            <a href="#" class="btn btn-dark btn-icon btn-sm"><i class="ti ti-brand-linkedin fs-16"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
