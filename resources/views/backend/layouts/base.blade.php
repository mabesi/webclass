<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="{{ app()->getLocale() }}">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Laravel Framework + CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Laravel,Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    <!-- Favicon -->
    <link rel="icon" href="favicon.png">

    <title>{{ config('app.name', 'Laravel - CoreUI') }}</title>

    <!-- COREUI - Icons-->
    <link href="{{ asset("coreui/vendors/@coreui/icons/css/coreui-icons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("coreui/vendors/flag-icon-css/css/flag-icon.min.css") }}" rel="stylesheet">
    <link href="{{ asset("coreui/vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("coreui/vendors/simple-line-icons/css/simple-line-icons.css") }}" rel="stylesheet">

    <!-- COREUI - Main styles for this application-->
    <link href="{{ asset("coreui/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("coreui/vendors/pace-progress/css/pace.min.css") }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- All Extra CSS -->
    @stack('all_css')

  </head>

@yield('body')


    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset("coreui/vendors/jquery/js/jquery.min.js") }}"></script>
    <script src="{{ asset("coreui/vendors/popper.js/js/popper.min.js") }}"></script>
    <script src="{{ asset("coreui/vendors/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("coreui/vendors/pace-progress/js/pace.min.js") }}"></script>
    <script src="{{ asset("coreui/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("coreui/vendors/@coreui/coreui/js/coreui.min.js") }}"></script>

    <!-- All Extra Scripts -->
    @stack('all_scripts')

    <!-- App Script -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>

  </body>
</html>
