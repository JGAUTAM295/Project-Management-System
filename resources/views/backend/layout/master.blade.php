<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }} @yield('pagetitle')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('css/dist/css/adminlte.min.css') }}">

  @yield('head')
</head>
<body id="{{'pageid-'.request()->segment(count(request()->segments()))}}" class="pjmt hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed {{request()->segment(count(request()->segments())).'-pagecss'}}">
    
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ URL::asset('css/dist/img/AdminLTELogo.png') }}"" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        @include('backend.layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layout.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('backend.layout.right_aside')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="{{ url('/') }}">ProjectMgmtSytm</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ URL::asset('css/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('css/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('css/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ URL::asset('css/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ URL::asset('css/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ URL::asset('css/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('css/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('css/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('css/dist/js/pages/dashboard2.js') }}"></script>
<script>
    /*** add active class and stay opened when selected ***/
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    if (this.href) {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }
}).addClass('active');

// for the treeview
$('ul.nav-treeview a').filter(function() {
    if (this.href) {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
@yield('footerscript')
</body>
</html>
