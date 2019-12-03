<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel 6 AJAX Login & Registration</title>

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
</head>
<body>
    <div id="app">

        @include('layouts.header')

        <main class="py-4">
        <h3 class="p-3 text-center">Laravel 6 AJAX Login & Registration System</h3>
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>
<script src="{{ asset("assets/js/jquery.min.js")}}"></script>
  <script src="{{ asset("assets/js/popper.min.js")}}"></script>
  <script src="{{ asset("assets/js/bootstrap.min.js")}}"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
    
</script>
@yield('scripts')
</html>
