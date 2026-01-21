@extends('home.home_master')
@section('home')
    @include('home.homelayout.slider')
    <!-- end hero -->
    <div class="lonyo-content-shape1">
        <img src="{{ asset('frontend/assets/images/shape/shape1.svg') }}" alt="">
    </div>

    @include('home.homelayout.features')
    <!-- end features -->

    @include('home.homelayout.content')
    <!-- end content -->

    @include('home.homelayout.video')
    <!-- end video -->

    @include('home.homelayout.testimonials')
    <!-- end testimonials -->

    @include('home.homelayout.faq')
    <!-- end faq -->

    @include('home.homelayout.cta')
    <!-- end cta -->
@endsection