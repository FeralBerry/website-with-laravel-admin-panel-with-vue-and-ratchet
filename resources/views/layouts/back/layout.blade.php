<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MaterialAdminLTE 3 | Dashboard</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{ Auth::id() }}">
    @include('layouts.back.up_config')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">
    <!-- Navbar -->
    <back-header-component></back-header-component>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <left-bar-component></left-bar-component>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <router-view :data='{!! json_encode($data) !!}'></router-view>
    </div>
    <!-- /.content-wrapper -->
    <footer-component></footer-component>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@include('layouts.back.down_config')
<script src="{{ asset('js/backapp.js') }}"></script>
</body>
</html>

