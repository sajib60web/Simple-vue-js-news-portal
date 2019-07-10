<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/')}}front-end/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('/')}}front-end/css/modern-business.css" rel="stylesheet">
    </head>
    <body>
        @include('front-end.navbar')
        @yield('maiContent')
        @include('front-end.footer')
        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('/')}}front-end/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('/')}}front-end/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

