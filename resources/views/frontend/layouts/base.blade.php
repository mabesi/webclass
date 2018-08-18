<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel - CoreUI') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("frontend/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- All Extra CSS -->
    @stack('all_css')

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">
    <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">

  </head>

  <body>

    @yield('body')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset("frontend/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("frontend/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- All Extra Scripts -->
    @stack('all_scripts')

    <!-- App Script -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript" ></script>

  </body>

</html>
