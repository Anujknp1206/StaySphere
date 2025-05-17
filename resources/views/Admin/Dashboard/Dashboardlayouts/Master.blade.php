<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/AdminV3/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('/') }}/AdminV3/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('/') }}/AdminV3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/AdminV3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('admin.dashboard.dashboardlayouts.header')
        @include('admin.dashboard.dashboardlayouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')
        </div>
        @include('admin.dashboard.dashboardlayouts.footer')
        <!-- /.content-wrapper -->
        @include('sweetalert::alert')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ url('/') }}/AdminV3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('/') }}/AdminV3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('/') }}/AdminV3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/AdminV3/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ url('/') }}/AdminV3/dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ url('/') }}/AdminV3/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ url('/') }}/AdminV3/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('/') }}/AdminV3/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ url('/') }}/AdminV3/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ url('/') }}/AdminV3/plugins/chart.js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{ url('/') }}/AdminV3/dist/js/pages/dashboard2.js"></script>
    <script src="https://kit.fontawesome.com/1eab8d78bc.js" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="{{ url('/') }}/AdminV3/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('/') }}/AdminV3/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        let idleTime = 0;
        const idleLimit = 10; // in minutes

        // Increment idle time every minute
        let idleInterval = setInterval(timerIncrement, 60000); // 1 min

        // Reset idle time on mouse/keyboard activity
        $(this).on('mousemove keypress click', function () {
            idleTime = 0;
        });

        function timerIncrement() {
            idleTime++;
            if (idleTime >= idleLimit) {
                window.location.href = "{{ route('lockscreen') }}";
            }
        }

    </script>

    @stack('scripts')

</body>

</html>