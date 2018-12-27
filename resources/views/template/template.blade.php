<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/animate/animate.min.css')}}">
  </head>
  <body>

    @yield('content')


      <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/jquery/jquery-migrate.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/easing/easing.min.js')}}"></script>
      <script src="{{asset('assets/wow/wow.min.js')}}"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
      <script src="{{asset('assets/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('assets/counterup/counterup.min.js')}}"></script>
      <script src="{{asset('assets/superfish/hoverIntent.js')}}"></script>
      <script src="{{asset('assets/superfish/superfish.min.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
      <script src="{{asset('assets/contactform/contactform.js')}}" charset="utf-8"></script>
  </body>
</html>
