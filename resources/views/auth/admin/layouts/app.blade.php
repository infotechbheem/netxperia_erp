<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NetXperia | Admin Dashboard </title>
    <link rel="icon" href="{{ asset('custom-asset/image/netxperia-logo.png') }}" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-asset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Custom Asset -->
    <link rel="stylesheet" href="{{ asset('custom-asset/customStyle.css') }}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <script>
            @if(session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success'
                    , title: 'Welcome...'
                    , text: '{{ session('success') }}'
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });
            @endif
            @if(session('warning'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning'
                    , title: 'Opps...'
                    , text: '{{ session('warning') }}'
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });
            @endif
            @if(session('failed'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error'
                    , title: 'Sorry...'
                    , text: '{{ session('failed') }}'
                    , showConfirmButton: true
                    , confirmButtonText: 'OK',
                    // timer: 2000 // Close alert after 2 seconds
                });
            });
            @endif
        </script>

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('custom-asset/image/netxperia-logo.png') }}" alt="AdminLTELogo" height="120" width="120">
        </div>

        <!-- Navbar -->
        @include('auth.admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include("auth.admin.layouts.sidebar")
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        @yield('main-container')
        <!-- /.content-wrapper -->

        <!-- Footer Start -->
        @include('auth.admin.layouts.footer')
        <!-- /.Footer End -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin-asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Fontawesome Icon -->
    {{-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> --}}

    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin-asset/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin-asset/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin-asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin-asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin-asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin-asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin-asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin-asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-asset/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin-asset/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin-asset/dist/js/pages/dashboard.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin-asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('admin-asset/plugins/jquery-validation/jquery.validate.min.js') }} "></script>
    <script src="{{ asset('admin-asset/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    {{-- script query for sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>





    <!-- Custom Asset -->
    <script src="{{ asset('custom-asset/jquery.js') }}"></script>
    <script src="{{ asset('custom-asset/main.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true
                , "lengthChange": false
                , "searching": false
                , "ordering": true
                , "info": true
                , "autoWidth": false
                , "responsive": true
            , });
        });

    </script>
</body>
</html>
