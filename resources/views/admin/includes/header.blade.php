<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
{{-- font --}}
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
{{--  toaster  --}}
<link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
{{-- datatables --}}
<link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('asset/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
@if(direction() == 'ltr')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/dist/css-rtl/style-rtl.alpha3.min') }}">
    <link rel="stylesheet" href="{{ asset('asset/dist/css-rtl/rtl.css') }}">
@endif
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/jstree/themes/default/style.css') }}">

<link rel="stylesheet" href="{{ asset('asset/select2/select2.css') }}">

<script src="{{ asset('asset/me/function.js') }}"></script>


<script src="{{ asset('asset/me/textarea.js') }}" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

