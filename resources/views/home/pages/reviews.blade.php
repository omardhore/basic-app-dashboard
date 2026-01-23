@extends('home.home_master')
@section('home')
    <div class="lonyo-section-padding2">
        <div class="container">
            <div class="lonyo-section-title center">
                <h1>Customer Stories</h1>
                <p>See how Tapeli is helping users achieve their financial goals.</p>
            </div>
            <div class="row mt-50">
                @foreach($reviews as $review)
                    <div class="col-lg-4 mb-4">
                        <div class="lonyo-t-wrap wrap2 light-bg h-100 mb-0">
                            <div class="lonyo-t-ratting">
                                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
                            </div>
                            <div class="lonyo-t-text">
                                <p>"{{ $review->message }}"</p>
                            </div>
                            <div class="lonyo-t-author">
                                <div class="lonyo-t-author-thumb">
                                    <img src="{{ asset($review->image) }}" alt="">
                                </div>
                                <div class="lonyo-t-author-data">
                                    <p>{{ $review->name }}</p>
                                    <span>{{ $review->position }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($reviews->isEmpty())
                    <div class="col-12 text-center">
                        <h3>No reviews available yet.</h3>
                        <p>Check back later to see what our customers are saying!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection