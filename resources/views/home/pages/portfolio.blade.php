@extends('home.home_master')
@section('home')
    <div class="lonyo-section-padding2">
        <div class="container">
            <div class="lonyo-section-title center">
                <h1>Our Portfolio</h1>
                <p>See how our tools have helped others manage their success.</p>
            </div>
            <div class="row mt-50">
                <!-- Example Portfolio Items -->
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('frontend/assets/images/v1/content-thumb.png') }}" class="img-fluid rounded"
                        alt="Portfolio 1">
                    <h4 class="mt-20">Project Alpha</h4>
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('frontend/assets/images/v1/content-thumb2.png') }}" class="img-fluid rounded"
                        alt="Portfolio 2">
                    <h4 class="mt-20">Project Beta</h4>
                </div>
                <div class="col-lg-4 mb-30">
                    <img src="{{ asset('frontend/assets/images/v1/video-thumb.png') }}" class="img-fluid rounded"
                        alt="Portfolio 3">
                    <h4 class="mt-20">Project Gamma</h4>
                </div>
            </div>
        </div>
    </div>
@endsection