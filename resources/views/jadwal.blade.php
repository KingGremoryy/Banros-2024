<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
<link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body onload="tampilkanTanggalDanWaktu()">

  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
    </div>
  </div>

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Ban<span class="color-b">Ros</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kontak">Kontak</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav>
  <!--/ Nav End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            padding-top: 100px;
            background-color: #f4f4f4;
        }

        .body-date {
            display: flex;
            justify-content: center;
            align-items: center;
          }

        .date-container input {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #007bff;
            border-radius: 5px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .date-container input:focus {
            border-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .date-container input:hover {
            background-color: #f0f8ff;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #007bff;
        }

        th {
            background-color: #83B4FF;
            color: white;
        }

        tr {
            background-color: white;
        }

        tr:hover {
            background-color: #ddd;
        }
  </style>

  <h3 style="padding-top: 20px; text-align: center;">JADWAL LAPANGAN FUTSAL BORNEO</h3>

  <div class="body-date">
    <div class="date-container">
      <label for="birthdate">Pilih Tanggal : </label>
        <input type="date" id="birthdate" name="birthdate" required>
    </div>
</div>

  <table>
    <thead>
      <tr>
        <th>WAKTU</th>
        <th>LAPANGAN 1</th>
        <th>LAPANGAN 2</th>
        <th>LAPANGAN 3</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>07:00 - 08:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>08:00 - 09:00</td>
        <td>TAMA</td>
        <td>RULY</td>
        <td>PANJI</td>
      </tr>
      <tr>
        <td>09:00 - 10:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>10:00 - 11:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>11:00 - 12:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>12:00 - 13:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>13:00 - 14:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>14:00 - 15:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>15:00 - 16:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>16:00 - 17:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>17:00 - 18:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>19:00 - 20:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>20:00 - 21:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>21:00 - 22:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <tr>
        <td>22:00 - 23:00</td>
        <td>MAJID</td>
        <td>UDIN</td>
        <td>AMAT</td>
      </tr>
      <!-- Tambahkan lebih banyak data sesuai kebutuhan -->
    </tbody>
  </table>


  
</body>
</html>
