@extends('home.home_master')
@section('home')
    <div class="lonyo-section-padding2">
        <div class="container">
            <div class="lonyo-section-title center">
                <h1>Pricing Plans</h1>
                <p>Choose the plan that fits your needs.</p>
            </div>
            <div class="row mt-50">
                <div class="col-lg-4">
                    <div class="lonyo-service-wrap light-bg text-center">
                        <h3>Basic</h3>
                        <p class="price">$0 / month</p>
                        <ul class="list-unstyled">
                            <li>Expense Tracking</li>
                            <li>Basic Budgeting</li>
                        </ul>
                        <a href="{{ route('register') }}" class="lonyo-default-btn">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="lonyo-service-wrap light-bg text-center">
                        <h3>Pro</h3>
                        <p class="price">$19 / month</p>
                        <ul class="list-unstyled">
                            <li>All Basic Features</li>
                            <li>Investment Tracking</li>
                            <li>priority Support</li>
                        </ul>
                        <a href="{{ route('register') }}" class="lonyo-default-btn">Go Pro</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="lonyo-service-wrap light-bg text-center">
                        <h3>Enterprise</h3>
                        <p class="price">Contact Us</p>
                        <ul class="list-unstyled">
                            <li>Custom Solutions</li>
                            <li>Dedicated Manager</li>
                        </ul>
                        <a href="#" class="lonyo-default-btn">Contact Sales</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection