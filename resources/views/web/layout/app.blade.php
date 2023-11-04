<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? ''}}</title>
    
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/select2/css/select2.css">
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins')}}/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom.css">
    @stack('css')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    @yield('content')
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; {{@date('Y')}}</strong> All rights reserved.
    </footer>
</div>
<script src="{{asset('assets/plugins')}}/jquery/jquery.min.js"></script>
<script src="{{asset('assets/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('assets/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/adminlte.min.js"></script>
<script src="{{asset('assets/plugins')}}/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{asset('assets/plugins')}}/select2/js/select2.full.min.js"></script>
<script src="{{asset('assets/plugins')}}/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('assets/plugins')}}/toastr/toastr.min.js"></script>
@livewireScripts
@stack('script')
<script>
    $(function () {
        toastr.options = {
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
        }
        @if(session()->has('success'))
            toastr.success('{{session()->get('success')}}')
        @endif
        @if(session()->has('error'))
            toastr.error('{{session()->get('error')}}')
        @endif
    })
</script>
</body>
</html>
