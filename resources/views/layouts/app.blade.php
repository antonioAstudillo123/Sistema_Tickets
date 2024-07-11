<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('librerias/fontawesome-free/css/all.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('librerias/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

        {{-- CDN SWEET ALERT --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    </head>
    <body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div> --}}

            @include('layouts.navbar')
            @include('layouts.aside')

            <div class="content-wrapper">
                @yield('content-main')
            </div>

            @include('layouts.footer')
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('librerias/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('librerias/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.js') }}"></script>

        @yield('scriptsPage')

    </body>
</html>
