<div class="lonyo-sidemenu-wrapper lonyo-mobile-menu">
    <div class="lonyo-sidemenu-content">
        <div class="lonyo-sidemenu-header">
            <div class="lonyo-sidemenu-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('frontend/assets/images/logo/logo-dark.svg') }}" alt="logo">
                </a>
            </div>
            <button class="lonyo-sidemenu-close">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="lonyo-mobile-menu-items">
            <nav class="lonyo-sidemenu-nav">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('home.about') }}">About Us</a></li>
                    <li><a href="{{ route('home.pricing') }}">Pricing</a></li>
                    <li><a href="{{ route('home.portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('home.blog') }}">Blog</a></li>
                    <li><a href="{{ route('home.contact') }}">Contact</a></li>
                    <li class="mt-4"><a href="{{ route('login') }}" class="lonyo-default-btn w-100 text-center">Log
                            in</a></li>
                    <li class="mt-2"><a href="{{ route('register') }}" class="lonyo-default-btn w-100 text-center">Sign
                            Up</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="lonyo-sidemenu-overlay"></div>
</div>