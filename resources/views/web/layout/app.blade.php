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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojionearea/dist/emojionearea.min.css">

    @stack('css')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    <div class="container">
        <nav class="d-flex justify-content-between py-3">
            <h4><a class="text-secondary" href="{{route('web.home')}}">Home</a></h4>
              <div>
                  <span class="">
                      <img style="max-height: 38px" src="{{ asset('assets/img/avatar-user.png') }}" class="img-circle">
                      <small>{{ auth('user')->user()->name }}</small>
                  </span>
                  <a href="{{route('web.logout')}}" class="btn btn-default btn-sm">Log Out</a>
              </div>
        </nav>
    </div>

    @yield('content')
    <footer class="main-footer border-0">
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
<script src="https://cdn.jsdelivr.net/npm/emojionearea/dist/emojionearea.min.js"></script>
@livewireScripts
@stack('script')
<script>
    $(function () {
        $('.editor').summernote({
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'hr']],
            ],
            callbacks: {
                onKeyup: function(e) {
                    var editor = $(this);
                    var text = editor.summernote('code');
                    if (text.includes('@')) {
                        // Implement logic to suggest users as they type "@" in the editor
                    }
                }
            }
        });
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
