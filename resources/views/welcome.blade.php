<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <img src="{{ asset('img/favicon.png') }}" alt="Logo">



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
  <!--/ Form Search End /-->

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
            <a class="nav-link active" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kontak">Kontak</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Property Single</a>
              <a class="dropdown-item" href="blog-single.html">Blog Single</a>
              <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.html">Agent Single</a>
            </div>
          </li> --}}
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/futsal-1.jpeg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">
                      <span class="color-b">Welcome </span> To
                      <br> Borneo Futsal</h1>
                      <p class="intro-subtitle intro-price">
                        <a href="#lapangan" class="scroll-to-properties"><span class="price-a">Pesan Sekarang</span></a>
                      </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/futsal-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">
                      Mau <span class="color-b">Booking </span> 
                      <br> Lapangan? Disini Aja!</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#lapangan" class="scroll-to-properties"><span class="price-a">Pesan Sekarang</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(img/futsal-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">
                      Selamat <span class="color-b">Berolahraga</span> 
                      <br> Di Borneo Futsal</h1>
                    <p class="intro-subtitle intro-price">
                      <a href="#lapangan" class="scroll-to-properties"><span class="price-a">Pesan Sekarang</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Futsal</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Borneo Indoor Futsal Merupakan salah satu fasilitas futsal populer di Banjarmasin, yang menjadi pilihan utama bagi masyarakat untuk berolahraga, terutama pada sore hari sepulang kerja atau sekolah, serta di akhir pekan. Dengan lapangan indoor berkualitas, Borneo Futsal menawarkan tempat yang nyaman dan aman bagi para pecinta futsal untuk bermain bersama teman-teman atau mengikuti turnamen.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Payment</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Kami telah mengintegrasikan sistem pembayaran berbasis online untuk memudahkan para pelanggannya dalam melakukan reservasi lapangan secara cepat dan efisien. Pembayaran online ini memungkinkan pelanggan melakukan pembayaran kapan saja dan di mana saja tanpa harus datang langsung ke lokasi, membuat proses pemesanan lebih praktis dan modern.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Fasilitas</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Kami menyediakan fasilitas modern untuk kenyamanan pemain dan pengunjung, termasuk lapangan indoor berkualitas dengan pencahayaan optimal dan pendingin ruangan. Ruang ganti dan kamar mandi bersih, area parkir luas, serta kantin dan area istirahat yang nyaman. Tersedia juga layanan sewa perlengkapan futsal, akses Wi-Fi gratis, dan ruang tunggu yang nyaman dengan pandangan lapangan yang jelas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

<!--/ Property Star /-->
<section id="lapangan" class="section-property section-t8">
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between">
        <div class="title-box" style="margin-bottom: 0;"> <!-- Menghapus margin bawah -->
          <h2 class="title-a" style="margin-top: -80px;">Latest Properties</h2> <!-- Mengangkat judul ke atas -->
        </div>
      </div>
    </div>
  </div>
</section>


      <div class="container my-3">
        <div id="property-carousel" class="owl-carousel owl-theme">
            @foreach($fields as $field)
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="{{ Storage::url($field->image_url) }}" alt="Image of {{ $field->name }}" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="#">{{ $field->name }}</a>
                                    </h2>
                                </div>
                                <div class="card-body-a">
                                    <div class="price-box d-flex">
                                        <span class="price-a">BUKA | 07:00 - 00:00</span>
                                    </div>
                                </div>
                                <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                        <li>
                                            <button type="button" class="btn book-now-btn" data-bs-toggle="modal" data-bs-target="#modal-book-{{ $field->id }}">Pesan</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        
            <!-- Modal Book -->
            @foreach($fields as $field)
    <div class="modal fade" id="modal-book-{{ $field->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $field->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel-{{ $field->id }}">Pesan {{ $field->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="booking-form-{{ $field->id }}" action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="field_id" value="{{ $field->id }}">
                        <div class="mb-4">
                            <label for="date-{{ $field->id }}" class="form-label">Pilih Tanggal</label>
                            <input type="date" class="form-control" id="date-{{ $field->id }}" name="date" required autocomplete="off">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Waktu Yang Tersedia</label>
                            <div id="time-slots-{{ $field->id }}" class="d-flex flex-wrap justify-content-start">
                                @if($field->tarifSessions->isEmpty())
                                    <p class="text-muted">Tidak Ada Waktu Yang Tersedia.</p>
                                @else
                                    @foreach($field->tarifSessions as $session)
                                        <button type="button"
                                                class="btn btn-outline-primary time-slot-btn"
                                                data-price="{{ $session->price }}"
                                                data-session-id="{{ $session->id }}"
                                                @if(in_array($session->id, $bookedSessions)) disabled @endif>
                                            {{ $session->session_time }}
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="tarif_session_ids[]" id="tarif_session_ids-{{ $field->id }}">
                        <div class="mb-3">
                            <label for="customer_name-{{ $field->id }}" class="form-label">Nama Tim</label>
                            <input type="text" class="form-control" name="customer_name" placeholder="Masukkan Nama Tim" id="customer_name-{{ $field->id }}" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="customer_phone-{{ $field->id }}" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="customer_phone" placeholder="Masukkan Nomor Telepon" id="customer_phone-{{ $field->id }}" required maxlength="15" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="total_price-{{ $field->id }}" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total_price-{{ $field->id }}" name="total_price" readonly required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 pay-button" style="background-color: #17153B;" data-field-id="{{ $field->id }}">Konfirmasi Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

        </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          // Initialize date pickers for each field
          @foreach($fields as $field)
              (function(fieldId) {
                  new Pikaday({
                      field: document.getElementById(`date-${fieldId}`),
                      format: 'YYYY-MM-DD',
                      minDate: new Date(),
                      toString(date, format) {
                          return moment(date).format('YYYY-MM-DD');
                      },
                      onSelect: function(date) {
                          const selectedDate = moment(date).format('YYYY-MM-DD');
                          console.log(`Fetching booked sessions for field ${fieldId} on date ${selectedDate}`);
  
                          fetch(`/api/booked-sessions?field_id=${fieldId}&date=${selectedDate}`)
                              .then(response => {
                                  if (!response.ok) {
                                      throw new Error('Network response was not ok ' + response.statusText);
                                  }
                                  return response.json();
                              })
                              .then(data => {
                                  console.log('Fetched data:', data);
                                  const bookedSessions = data.booked_sessions || [];
  
                                  const timeSlots = document.querySelectorAll(`#time-slots-${fieldId} .time-slot-btn`);
                                  timeSlots.forEach(button => {
                                      const sessionId = button.getAttribute('data-session-id');
                                      if (bookedSessions.includes(sessionId)) {
                                          button.disabled = true;
                                          button.classList.add('disabled');
                                      } else {
                                          button.disabled = false;
                                          button.classList.remove('disabled');
                                      }
                                  });
                              })
                              .catch(error => console.error('Error fetching booked sessions:', error));
                      }
                  });
              })('{{ $field->id }}'); // Pass field ID to the IIFE
          @endforeach
  
          // Handle time slot button clicks and update total price
          document.querySelectorAll('.time-slot-btn').forEach(button => {
              button.addEventListener('click', function () {
                  this.classList.toggle('active');
                  const sessionIdInput = this.closest('.modal-body').querySelector('[id^="tarif_session_ids-"]');
                  const totalPriceInput = this.closest('.modal-body').querySelector('[id^="total_price-"]');
  
                  const activeButtons = this.closest('.modal-body').querySelectorAll('.btn.active');
                  let sessionIds = [];
                  let totalPrice = 0;
  
                  activeButtons.forEach(activeButton => {
                      const sessionId = activeButton.getAttribute('data-session-id');
                      const price = parseInt(activeButton.dataset.price, 10);
                      sessionIds.push(sessionId);
                      totalPrice += price;
                  });
  
                  sessionIdInput.value = sessionIds.join(',');
                  totalPriceInput.value = `Rp ${totalPrice}`;
              });
          });
  
          // Handle form submission
          document.addEventListener('click', function (event) {
              if (event.target.classList.contains('pay-button')) {
                  const fieldId = event.target.getAttribute('data-field-id');
                  const bookingForm = document.getElementById(`booking-form-${fieldId}`);
  
                  const tarifSessionIds = bookingForm.querySelector(`#tarif_session_ids-${fieldId}`).value;
  
                  if (!tarifSessionIds) {
                      alert('Please select at least one time slot.');
                      return;
                  }
  
                  bookingForm.submit();
              }
          });
      });
  </script>
  
    </div>

  
  
  {{-- <!--/ News Star /-->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest News</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">All News
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-2.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">House</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">House is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-5.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-7.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Park</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Park is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-3.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="#">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News End /--> --}}

  <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">EstateAgency</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com</li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Jadwal</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Pesan</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Pages</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Kontak</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Banros</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Loop over each field
        @foreach($fields as $field)
        (function(fieldId) {
            // Initialize Pikaday date picker for each field
            new Pikaday({
                field: document.getElementById(`date-${fieldId}`),
                format: 'YYYY-MM-DD',
                minDate: new Date(),
                toString(date, format) {
                    return moment(date).format('YYYY-MM-DD');
                },
                onSelect: function(date) {
                    const selectedDate = moment(date).format('YYYY-MM-DD');
                    console.log(`Fetching booked sessions for field ${fieldId} on date ${selectedDate}`);
                    
                    // Fetch booked sessions based on field and date
                    fetch(`/api/booked-sessions?field_id=${fieldId}&date=${selectedDate}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Fetched data:', data);
                        const bookedSessions = data.booked_sessions || [];
                        const timeSlots = document.querySelectorAll(`#time-slots-${fieldId} .time-slot-btn`);
                        
                        // Disable booked time slots
                        timeSlots.forEach(button => {
                            const sessionId = button.getAttribute('data-session-id');
                            if (bookedSessions.includes(sessionId)) {
                                button.disabled = true;
                                button.classList.add('disabled');
                            } else {
                                button.disabled = false;
                                button.classList.remove('disabled');
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching booked sessions:', error));
                }
            });
        })('{{ $field->id }}'); // IIFE to handle multiple fields
        @endforeach

        // Handle time slot button clicks and update total price
        document.querySelectorAll('.time-slot-btn').forEach(button => {
            button.addEventListener('click', function () {
                // Toggle active class for selected time slot
                this.classList.toggle('active');
                
                const sessionIdInput = this.closest('.modal-body').querySelector('[id^="tarif_session_ids-"]');
                const totalPriceInput = this.closest('.modal-body').querySelector('[id^="total_price-"]');
                const activeButtons = this.closest('.modal-body').querySelectorAll('.btn.active');
                
                let sessionIds = [];
                let totalPrice = 0;

                // Collect session ids and calculate total price for active buttons
                activeButtons.forEach(activeButton => {
                    const sessionId = activeButton.getAttribute('data-session-id');
                    const price = parseInt(activeButton.dataset.price, 10);
                    sessionIds.push(sessionId);
                    totalPrice += price;
                });

                // Update hidden input fields for session ids and total price
                sessionIdInput.value = sessionIds.join(',');
                totalPriceInput.value = `Rp ${totalPrice}`;
            });
        });

        // Handle form submission
        document.querySelectorAll('.pay-button').forEach(button => {
            button.addEventListener('click', function (event) {
                const fieldId = event.target.getAttribute('data-field-id');
                const bookingForm = document.getElementById(`booking-form-${fieldId}`);
                const tarifSessionIds = bookingForm.querySelector(`#tarif_session_ids-${fieldId}`).value;

                if (!tarifSessionIds) {
                    alert('Please select at least one time slot.');
                    event.preventDefault(); // Prevent form submission if no time slot is selected
                } else {
                    bookingForm.submit(); // Submit the form if everything is valid
                }
            });
        });
    });

    // Function to display date and time
    function tampilkanTanggalDanWaktu() {
        let sekarang = new Date();
        let hari = String(sekarang.getDate()).padStart(2, '0');
        let bulan = String(sekarang.getMonth() + 1).padStart(2, '0');
        let tahun = sekarang.getFullYear();
        let tanggal = `${hari}-${bulan}-${tahun}`;
        let waktu = sekarang.toTimeString().split(' ')[0];
        
        document.getElementById('tanggal').innerHTML = tanggal;
        document.getElementById('jam').innerHTML = waktu;
    }

    <script>
    // Smooth scroll for anchor links
    document.addEventListener("DOMContentLoaded", function() {
        const scrollLinks = document.querySelectorAll('a.scroll-to-properties');

        scrollLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default anchor click behavior
                const targetId = this.getAttribute('href'); // Get the target element ID
                const targetElement = document.querySelector(targetId); // Select the target element

                if (targetElement) { // Check if the target element exists
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset; // Calculate the position to scroll to
                    const startPosition = window.pageYOffset; // Get the current scroll position
                    const distance = targetPosition - startPosition; // Calculate the distance to scroll
                    const duration = 100; // Duration of the scroll in milliseconds
                    let startTime = null; // Variable to track the start time

                    // Animation function for smooth scrolling
                    function animation(currentTime) {
                        if (startTime === null) startTime = currentTime; // Set start time on first call
                        const timeElapsed = currentTime - startTime; // Calculate elapsed time
                        const progress = Math.min(timeElapsed / duration, 1); // Calculate the progress of the animation (0 to 1)

                        // Ease in/out function for smooth scrolling
                        const ease = easeInOutCubic(progress);
                        window.scrollTo(0, startPosition + distance * ease); // Scroll to the calculated position

                        if (progress < 1) requestAnimationFrame(animation); // Continue the animation if not done
                    }

                    // Easing function for smooth scrolling
                    function easeInOutCubic(t) {
                        return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2; // Cubic easing
                    }

                    requestAnimationFrame(animation); // Start the animation
                }
            });
        });
    });
</script>


</body>
</html>
