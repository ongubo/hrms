<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="dark"
    data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light">


<head>

    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="HR Management system" name="description">
    <meta content="hrms" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css"
        integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href={{ asset("assets/css/bootstrap.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/font-awesome.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/icons.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/app.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/custom.min.css") }} rel="stylesheet" type="text/css">
    @livewireStyles
</head>

<body>
    <div id="layout-wrapper">
        @include('includes.sidebar')
        <div class="vertical-overlay"></div>
        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="#" class="logo logo-dark">
                                <span>
                                    <img src={{ asset("assets/images/logo.jpg") }} alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src={{ asset("assets/images/logo.jpg") }} alt="" height="22">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span>
                                    <img src={{ asset("assets/images/logo.jpg") }} alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src={{ asset("assets/images/logo.jpg") }} alt="" height="22">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">


                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bi bi-arrows-fullscreen fs-lg'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('assets/images/face.png') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{
                                            Auth::user()->first_name??'--' }}
                                            {{ Auth::user()->first_name??'--' }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">{{
                                            Auth::user()->role->name??'--' }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->first_name??'--' }}!</h6>
                                <a class="dropdown-item" href="#"><i
                                        class="fa fa-user text-muted fs-lg align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="#"> <i
                                        class="fa fa-cogs text-muted fs-lg align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="{{ route('signout') }}"><i
                                        class="fa fa-sign-out text-muted fs-lg align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © {{ config('app.name') }}.
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <script src={{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("assets/libs/simplebar/simplebar.min.js") }}></script>
    <script src={{ asset("assets/js/plugins.js") }}></script>

    <script src={{ asset("assets/js/app.js") }}></script>
    @livewireScripts
</body>

</html>