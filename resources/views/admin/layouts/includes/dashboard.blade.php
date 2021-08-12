@include('admin.layouts.includes.header')

<body class="hold-transition sidebar-mini" onload="countdowntimes()">
<div class="wrapper">

    <!-- Navbar -->
   @include('admin.layouts.includes.navbar')

    <!-- Main Sidebar Container -->
    @include('admin.layouts.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2022 <a href="https://kingdom-vision.com/" target="_blank">{{ config('app.name', 'Laravel') }}</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->
</body>
@include('admin.layouts.includes.footer')
