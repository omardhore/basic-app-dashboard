<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Verify Email | Tapeli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="bg-white">

    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row align-items-center g-0">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                <div class="mb-4 p-0">
                                    <a href="{{ url('/') }}" class="auth-logo">
                                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark"
                                            class="mx-auto" height="28" />
                                    </a>
                                </div>

                                <div class="pt-0">
                                    <div class="mb-4 text-sm text-muted">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </div>

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="alert alert-success mb-4" role="alert">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4 d-flex align-items-center justify-content-between">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Resend Verification Email') }}
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link text-muted">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="account-page-bg p-md-5 p-4">
                        <div class="text-center">
                            <h3 class="text-dark mb-3 pera-title">Quick, Effective, and Productive With Tapeli Admin
                                Dashboard</h3>
                            <div class="auth-image">
                                <img src="{{ asset('backend/assets/images/authentication.svg') }}"
                                    class="mx-auto img-fluid" alt="images">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>