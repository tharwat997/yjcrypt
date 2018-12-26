<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADS</title>
    <!-- Bootstrap core CSS-->
    <link href="{{asset('dashboard-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard-assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{asset('dashboard-assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('dashboard-assets/css/sb-admin.css')}}" rel="stylesheet">
    <style type="text/css">
        .active-link{
            color: white !important;
        }
        .collapse.show{
            background: #212529;
        }
    </style>
    @yield('css')


</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div id="app">
    @include('includes.header')
    @yield('content')
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboard-assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('dashboard-assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{asset('dashboard-assets/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('dashboard-assets/js/sb-admin.min.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{asset('dashboard-assets/js/sb-admin-datatables.min.js')}}"></script>
<script src="{{asset('dashboard-assets/js/sb-admin-charts.min.js')}}"></script>
@yield('js')
</body>
</html>
