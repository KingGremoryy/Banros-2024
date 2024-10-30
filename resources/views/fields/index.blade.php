@extends('layout.guest')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <title>Pesan Lapangan</title>
        <style>
             body, html {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #141414;
            color: white;
        }
            .container {
                max-width: 900px;
                margin: auto;
                padding: 20px; 
                border-radius: 8px; 
                background: #17153B;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.8); 
            }
    
            .h3 {
                color: white; /* Change text color to white */
                font-weight: bold; /* Make the font bolder */
            }
    
            .custom-card {
                width: 10%;
                background: #17153B;;
                height: 100%; 
                border-radius: 0.5rem; 
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8); 
                transition: transform 0.3s; 
            }
    
            .custom-card:hover {
                transform: scale(1.05); 
            }
    
            .card-img-top {
                height: 200px; 
                object-fit: cover; 
            }
    
            .card-body {
                flex-grow: 1; 
            }
    
            .book-now-btn {
                background-color: grey; 
                border: none; 
                color: white;
                border-radius: 25px; 
                padding: 0.5rem 1rem; 
                transition: background-color 0.3s; 
            }
    
            .book-now-btn:hover {
                background-color: rgb(88, 88, 88); 
            }
    
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .col-lg-6 {
                    flex: 0 0 100%; 
                    max-width: 100%;
                }
            }
            
            .modal-content {
                border-radius: 1rem;
                background-color: #f0f0f0;
            }
        
            .modal-header {
                border-bottom: none;
                background-color: #17153B;
                color: white; 
            }
        
            .modal-body {
                padding: 2rem;
                background-color: #fff; 
            }
        
            .btn {
                border-radius: 50px;
                padding: 0.5rem 1.5rem;
                font-weight: bold; 
            }
        
            .time-slot-btn {
                margin: 0.3rem;
                font-size: 0.9rem;
                border-radius: 25px; 
                transition: background-color 0.3s; 
            }
        
            .time-slot-btn:hover {
                background-color: #17153B;
                color: white; 
            }
        
            .btn.active {
                background-color: white; 
                color: white;
            }

        </style>
    </head>
    <body>
        <div class="container my-5">
            <h3 class="mb-4 text-center" style="color: #f0f0f0;">Lapangan</h3>
            <div class="row">
                @foreach($fields as $field)
                <div class="col-lg-6 col-md-6 mb-4"> 
                    <div class="room-card card">
                        <img src="{{ Storage::url($field->image_url) }}" alt="Image of {{ $field->name }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $field->name }}</h5>
                            <button type="button" class="btn book-now-btn" data-bs-toggle="modal" data-bs-target="#modal-book-{{ $field->id }}">Pesan</button>
                        </div>
                    </div>
                </div>
                    <!-- Modal Book -->
                    <div class="modal fade" id="modal-book-{{ $field->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $field->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel-{{ $field->id }}">Pesan {{ $field->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @php
                                        $bookedSessions = $bookedSessions ?? [];
                                    @endphp
                                    <form id="booking-form-{{ $field->id }}" action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="field_id" value="{{ $field->id }}">
                                        <div class="mb-4">
                                            <label for="date-{{ $field->id }}" class="form-label">Pilih Tanggal</label>
                                            <input type="text" class="form-control" id="date-{{ $field->id }}" name="date" required autocomplete="off">
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
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
</body>
</html>

@endsection



 {{-- <div class="click-closed"></div>
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Pesan Lapangan</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <!-- Modal Form -->
      <!-- Modals for each field -->
      @foreach($fields as $field)
      <div class="modal fade" id="modal-book-{{ $field->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $field->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel-{{ $field->id }}">Pesan {{ $field->name }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="booking-form-{{ $field->id }}" action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="field_id" value="{{ $field->id }}">
                <!-- Date Selection -->
                <div class="mb-4">
                  <label for="date-{{ $field->id }}" class="form-label">Pilih Tanggal</label>
                  <input type="text" class="form-control" id="date-{{ $field->id }}" name="date" required autocomplete="off">
                </div>
                <!-- Time Slot Selection -->
                <div class="mb-4">
                  <label class="form-label">Waktu Yang Tersedia</label>
                  <div id="time-slots-{{ $field->id }}" class="d-flex flex-wrap justify-content-start">
                  </div>
                </div>
                <input type="hidden" name="tarif_session_ids[]" id="tarif_session_ids-{{ $field->id }}">
                <!-- Customer Information Fields -->
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
                <button type="submit" class="btn btn-primary w-100 pay-button" data-field-id="{{ $field->id }}" style="background-color: #17153B;">Konfirmasi Pesanan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div> --}}

  
  <!--/ Property End /-->

  <!--/ Agents Star /-->
  {{-- <section class="section-agents section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Best Agents</h2>
            </div>
            <div class="title-link">
              <a href="agents-grid.html">All Agents
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/agent-4.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Margaret Sotillo
                      <br> Escala</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> agents@example.com</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/agent-1.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Stiven Spilver
                      <br> Darw</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> agents@example.com</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-d">
            <div class="card-img-d">
              <img src="img/agent-5.jpg" alt="" class="img-d img-fluid">
            </div>
            <div class="card-overlay card-overlay-hover">
              <div class="card-header-d">
                <div class="card-title-d align-self-center">
                  <h3 class="title-d">
                    <a href="agent-single.html" class="link-two">Emma Toledo
                      <br> Cascada</a>
                  </h3>
                </div>
              </div>
              <div class="card-body-d">
                <p class="content-d color-text-a">
                  Sed porttitor lectus nibh, Cras ultricies ligula sed magna dictum porta two.
                </p>
                <div class="info-agents color-a">
                  <p>
                    <strong>Phone: </strong> +54 356 945234</p>
                  <p>
                    <strong>Email: </strong> agents@example.com</p>
                </div>
              </div>
              <div class="card-footer-d">
                <div class="socials-footer d-flex justify-content-center">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#" class="link-one">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!--/ Agents End /-->


   <!--/ Testimonials Star /-->
  {{-- <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimonials</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="img/testimonial-1.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                    debitis hic ber quibusdam
                    voluptatibus officia expedita corpori.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Albert & Erika</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="img/testimonial-2.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                    debitis hic ber quibusdam
                    voluptatibus officia expedita corpori.
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Pablo & Emma</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!--/ Testimonials End /-->

