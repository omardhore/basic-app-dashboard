@extends('home.home_master')
@section('home')
    <div class="lonyo-section-padding2">
        <div class="container">
            <div class="lonyo-section-title center">
                <h1>Contact Us</h1>
                <p>Have questions? Reach out to our support team.</p>
            </div>
            <div class="row mt-50 justify-content-center">
                <div class="col-lg-8">
                    <form action="#" class="light-bg p-50 rounded">
                        <div class="row">
                            <div class="col-lg-6 mb-20">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12 mb-20">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-lg-12 mb-20">
                                <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="lonyo-default-btn w-100">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection