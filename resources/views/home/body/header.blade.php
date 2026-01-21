<header class="site-header lonyo-header-section light-bg" id="sticky-menu">
  <div class="container">
    <div class="row gx-3 align-items-center justify-content-between">
      <div class="col-8 col-sm-auto ">
        <div class="header-logo1 ">
          <a href="{{ url('/') }}">
            <img src="{{ asset('frontend/assets/images/logo/logo-dark.svg') }}" alt="logo">
          </a>
        </div>
      </div>
      <div class="col">
        <div class="lonyo-main-menu-item">
          <nav class="main-menu menu-style1 d-none d-lg-block menu-left">
            <ul>
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('home.about') }}">About Us</a></li>
              <li><a href="{{ route('home.pricing') }}">Pricing</a></li>
              <li><a href="{{ route('home.portfolio') }}">Portfolio</a></li>
              <li><a href="{{ route('home.blog') }}">Blog</a></li>
              <li><a href="{{ route('home.contact') }}">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-auto d-flex align-items-center">
        <div class="lonyo-header-info-wraper2">
          <div class="lonyo-header-info-content">
            <ul>
              <li><a href="{{ route('login') }}">Log in</a></li>
            </ul>
          </div>
          <a class="lonyo-default-btn lonyo-header-btn" href="{{ route('register') }}">Free Account</a>
        </div>
        <div class="lonyo-header-menu">
          <nav class="navbar site-navbar justify-content-between">
            <!-- Brand Logo-->
            <!-- mobile menu trigger -->
            <button class="lonyo-menu-toggle d-inline-block d-lg-none">
              <span></span>
            </button>
            <!--/.Mobile Menu Hamburger Ends-->
          </nav>
        </div>
      </div>
    </div>
  </div>

</header>