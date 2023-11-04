<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB - {{$title ?? ''}}</title>

    <link rel="icon" type="image/png" href="{{asset('admin/img/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/fontawesome-free/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets')}}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom.css">
</head>
<body class="hold-transition">
@yield('content')
{{-- <script src="{{asset('assets/plugins')}}/jquery/jquery.min.js"></script> --}}
<script src="{{asset('assets/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{asset('assets')}}/js/adminlte.min.js"></script> --}}
</body>
</html>
