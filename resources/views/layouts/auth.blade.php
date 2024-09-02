<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">


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

    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href={{ asset("assets/css/bootstrap.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/icons.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/app.min.css") }} rel="stylesheet" type="text/css">
    <link href={{ asset("assets/css/custom.min.css") }} rel="stylesheet" type="text/css">

</head>

<body style="background-image: url('{{ asset('assets/images/bg.jpg') }}'); background-size: cover;">
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <script src={{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("assets/libs/simplebar/simplebar.min.js") }}></script>
    <script src={{ asset("assets/js/plugins.js") }}></script>
    <script src={{ asset("assets/js/pages/password-addon.init.js") }}></script>
    <script src={{ asset("assets/libs/swiper/swiper-bundle.min.js") }}></script>
    <script src={{ asset("assets/js/pages/swiper.init.js") }}></script>

</body>

</html>