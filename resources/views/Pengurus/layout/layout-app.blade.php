<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') | Perpus SMKN 7 Samarinda</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="{{ asset('/front-assets/img/title.ico') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/_all-skins.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
@include('Pengurus.layout.header')
@yield('content')
@include('Pengurus.layout.footer')
@yield('javascript')
</body>
</html>