<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('Dashboard.layout.style')
</head>

<body class="hold-transiton sidebar-mini layout-fixed">
    <!-- Navbar -->
    @include('Dashboard.layout.app')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->



    <!-- ./wrapper -->

    @include('Dashboard.layout.script')

</body>

</html>
<!-- add payment -->