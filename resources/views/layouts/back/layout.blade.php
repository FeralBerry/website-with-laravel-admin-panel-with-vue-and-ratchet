<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Easy-Script</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{ Auth::id() }}">
    @if(Auth::user()->role == '1')
        @include('layouts.back.admin.up_config')
    @else
        @include('layouts.back.user.up_config')
    @endif
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">
    <back-header-component :data='{!! json_encode($data) !!}'></back-header-component>
    <!-- Main Sidebar Container -->
    <left-bar-component :data='{!! json_encode($data) !!}'></left-bar-component>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <router-view :data='{!! json_encode($data) !!}'></router-view>
    </div>
    <!-- /.content-wrapper -->
    <footer-component :data='{!! json_encode($data) !!}'></footer-component>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@if(Auth::user()->role == '1')
    @include('layouts.back.admin.down_config')
@else
    @include('layouts.back.user.down_config')
@endif
@if(Auth::user()->role == '1')
    <script src="{{ asset('js/adminbackapp.js') }}"></script>
@else
    <script src="{{ asset('js/backapp.js') }}"></script>
@endif
</body>
</html>

