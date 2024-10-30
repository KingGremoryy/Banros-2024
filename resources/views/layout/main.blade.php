<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom CSS -->
  <style>
    .sidebar-dark-primary {
      background-color: #1f2544;
    }
    .nav-sidebar .nav-link {
      color: #c2c7d0;
    }
    .nav-sidebar .nav-link.active, .nav-sidebar .nav-link:hover {
      background-color: #495057;
      color: #ffffff;
    }
    .brand-link {
      background-color: #17153B;
      color: #ffffff;
    }
    .brand-link:hover {
      background-color: #17153B;
    }
    .nav-icon {
      color: #c2c7d0;
    }
     /* Custom Navbar Color */
     .navbar-info {
      background-color: #17153B !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader justify-content-center align-items-center">
    <i class="fas fa-spinner fa-pulse"></i>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info nav-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="bg-info">
      <a href="" class="brand-link text-center">
          <span class="brand-text font-weight-light">BANROS</span>
      </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('admin.lapangan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Lapangan</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('admin.tarif.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-ticket"></i>
              <p>Tarif rusak</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('admin.tarifsession.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-ticket"></i>
              <p>Tarif</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.lapangan.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-table"></i>
              <p>Lapangan</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ route('admin.tarifsession.index') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-dollar-sign"></i>
            <p>Tarif Sessions</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.orders.index') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-cart-shopping"></i>
            <p>Pesanan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.messages') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-envelope"></i>
              <p>Pesan User</p>
          </a>
      </li>      
          {{-- <li class="nav-item">
            <a href="{{ route('admin.arena.index') }}" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>Arena</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{ route('admin.booking.index') }}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Booking</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a type="button" class="nav-link" data-toggle="modal" data-target="#modal-default">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="padding: 2px;">
    <p class="text-center">&copy; 2024 Banros. All rights reserved.</p>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Logout</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Untuk Keluar?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <form action="{{ route('admin.logout') }}" method="POST">
          @csrf
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Keluar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline --> 
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

<script type="text/javascript">
  $(function () {
      $('#datetimepicker2').datetimepicker({
          format: 'YYYY-MM-DD HH:mm', 
          icons: { time: 'far fa-clock' }
      });
  });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
