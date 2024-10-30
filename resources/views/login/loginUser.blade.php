<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route ('login') }}" class="h1"><b>Ban</b>Ros</a>
    </div>
    <div class="card-body" style="background-color: rgb(46, 89, 189)">
      <p class="login-box-msg  text-white">Halaman Login</p>
      
      <form action="{{ route ('login-proses') }}" method="post">
        @csrf
        <div class="text-white">
        @error ('email')
            <small>{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group position-relative">
          <label for="email" class=" text-white">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <span class="position-absolute" style="right: 10px; top: 38px; cursor: pointer;">
            <i class="fas fa-envelope"></i>
          </span>
      </div>
        <div class="text-white">
        @error ('password')
        <small>{{ $message }}</small>
      @enderror
      </div>
       
      <div class="form-group position-relative">
        <label for="password" class="text-white">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <span id="togglePassword" class="position-absolute" style="right: 10px; top: 38px; cursor: pointer;">
            <i class="fas fa-eye"></i>
        </span>
    </div>
          <!-- /.col -->
          <div class="col-5" style="margin-left: 190px">
            <button type="submit" class="btn btn-transparent btn-block btn-outline-info text-white">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<script>
  document.getElementById('togglePassword').addEventListener('click', function() {
      var eyeIcon = this.querySelector('i');
      var passwordField = document.getElementById('password');
      if (passwordField.type === 'password') {
          passwordField.type = 'text';
          eyeIcon.classList.remove('fa-eye');
          eyeIcon.classList.add('fa-eye-slash');
          this.classList.remove('eyeinactive');
          this.classList.add('active');
      } else {
          passwordField.type = 'password';
          eyeIcon.classList.remove('fa-eye-slash');
          eyeIcon.classList.add('fa-eye');
          this.classList.remove('active');
          this.classList.add('eyeinactive');
      }
  });
  </script>  


      {{-- <p class="mb-0 text-white">
        Belum Punya Akun?
        <a href="{{ route('register') }}" class="text-center" style="color: rgb(127, 255, 187)">Daftar </a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($message = Session::get('success'))
    <script>
        Swal.fire(' {{ $message }} ');
    </script>
@endif

@if($message = Session::get('failed'))
    <script>
        Swal.fire(' {{ $message }} ');
    </script>
@endif
</body>
</html>