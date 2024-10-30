{{-- @extends('layout.guest')

@section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Lapangan</title>
    <link rel="shortcut icon" href="/images/2.png" type="image/png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <style>
        body {
            background: #17153B;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
            width: 50%;
            display: flex;
        }
        
        .calendar-header {
            display: flex;
            margin-bottom: 5px;
        }

        .day-label {
            flex: 1;
            text-align: center;
            font-weight: bold;
            color: #000000;
            border-style: outset;
            width: 50%;
        }

        .calendar-dates {
            display: flex;
            flex-wrap: wrap;
        }

        .calendar-dates li {
            flex: 0 0 12.28%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-dates button {
            width: 50%;
            height: 40px;
            border-radius: 30%;
            line-height: 40px;
            font-size: 0.875rem;
            border: 1px solid #dee2e6;
            transition: background-color 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-dates button.disabled {
            color: #6c757d;
            cursor: not-allowed;
        }

        .calendar-dates button.active {
            background-color: #007bff;
            color: white;
        }

        #location {
            width: 33%;
        }

        #schedules {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }

        .schedule-card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 10px;
            background: white;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            margin-bottom: 0;
        }

        .card-link {
            color: green;
            text-decoration: none;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        .calendar-container {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
        
        .calendar-dates {
            display: flex;
            flex-wrap: wrap;
        }
        
        .calendar-dates li {
            list-style-type: none;
            margin: 5px;
        }
        
        .calendar-dates button.active {
            background-color: #007bff;
            color: white;
        }
        
        .schedule-card {
            margin-bottom: 10px;
        }

        /* Mobile responsiveness */
@media (max-width: 576px) {
    .container {
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .vertical-button {
        width: 100%;
        margin-bottom: 20px;
    }
    .form {
        width: 100%;
    }
    .calendar-header .day-label {
        font-size: 0.75rem;
    }
    .calendar-dates li {
        flex: 0 0 13.9%;
    }
    .calendar-dates button {
        width: 80%;
        height: 30px;
    }
    #location {
        width: 100%;
    }
    #schedules {
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    }

    .day-label {
            flex: 1;
            text-align: center;
            font-weight: bold;
            color: #000000;
            border-style: outset;
            width: 10%;
        }

    .calendar-dates li {
            flex: 0 0 12.28%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-dates button {
            width: 50%;
            height: 40px;
            border-radius: 30%;
            line-height: 40px;
            font-size: 0.875rem;
            border: 1px solid #dee2e6;
            transition: background-color 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
}
        
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="p-3 border rounded bg-light">
            <input type="hidden" name="date" id="date" value="">

            <div class="calendar mb-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <button type="button" id="prev" class="btn btn-outline-primary">&lt;</button>
                    <h4 class="current-date"></h4>
                    <button type="button" id="next" class="btn btn-outline-primary">&gt;</button>
                </div>
            
                <div class="calendar-header">
                    <div class="day-label">Min</div>
                    <div class="day-label">Sen</div>
                    <div class="day-label">Sel</div>
                    <div class="day-label">Rab</div>
                    <div class="day-label">Kam</div>
                    <div class="day-label">Jum</div>
                    <div class="day-label">Sab</div>
                </div>
                
                <ul class="list-unstyled calendar-dates" style="margin-left: 0;">
                    <!-- Dates will be dynamically inserted here -->
                </ul>
            
                <div class="schedules" id="schedules">
                    <!-- Schedule cards will be dynamically inserted here -->
                </div>
                
                <div class="mb-4">
                    <span class="font-weight-bold">Lapangan:</span>
                    <a href="{{ route('lapangan.show', 1) }}" class="btn btn-outline-secondary btn-sm mx-1">1</a>
                    <a href="{{ route('lapangan.show', 2) }}" class="btn btn-outline-secondary btn-sm mx-1">2</a>
                    <a href="{{ route('lapangan.show', 3) }}" class="btn btn-outline-secondary btn-sm mx-1">3</a>
                    <a href="{{ route('lapangan.show', 4) }}" class="btn btn-outline-secondary btn-sm mx-1">4</a>
                </div>
            </div>
            
            <h6 id="selected-date" class="mb-1"></h6>
            <p>[Borneo Futsal - Lapangan {{ $field->id }}]</p>
        </form>                 
    </div>

    <!-- Time Slots Modal -->
    <div class="modal fade" id="timeSlotsModal" tabindex="-1" role="dialog" aria-labelledby="timeSlotsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-5" id="timeSlotsModalLabel">Jadwal</h5>
                    <div class="d-flex mb-3">
                        <span class="ml-3">
                            <span class="text-success">&#9679;</span> Kosong
                        </span>
                        <span class="ml-3">
                            <span class="text-danger">&#9679;</span> Booked
                        </span>
                        <span class="ml-3">
                            <span class="text-primary">&#9679;</span> Event
                        </span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="time-slots-container">
                    <!-- Time buttons will be dynamically inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Your Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Date :</strong> <span id="confirmDate"></span></p>
                <p><strong>Time :</strong> <span id="confirmTime"></span></p>
                <p><strong>Lapangan :</strong> <span>Borneo Futsal - Lapangan {{ $field->id }}</span></p>  
                <p>Please confirm your booking details. If you need to make changes, click 'Close' and select again.</p>
                <!-- Add hidden inputs to store booking details -->
                <input type="hidden" id="bookingFieldId" value="{{ $field->id }}">
                <input type="hidden" id="bookingDate" value="">
                <input type="hidden" id="bookingTime" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmBookingButton">Confirm Booking</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Instructions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <form action="/checkout" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="qty" class="form-label">Masukkan Pesanan</label>
                        <input type="number" name="qty" class="form-control" id="qty" placeholder="jumlah lapangan yang dipesan">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Telp</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="masukkan no hp anda">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Masukkan Alamat</label>
                        <textarea name="address" class="form-control" id="address" rows="3" placeholder="Masukkan alamat anda"></textarea>
                    </div>
                    <!-- Add hidden inputs to store booking details -->
                    <input type="hidden" name="field_id" id="paymentFieldId" value="">
                    <input type="hidden" name="date" id="paymentDate" value="">
                    <input type="hidden" name="time" id="paymentTime" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const daysContainer = document.querySelector('.calendar-dates');
    const currentDateElem = document.querySelector('.current-date');
    const selectedDateElem = document.querySelector('#selected-date');
    const schedulesContainer = document.querySelector('#schedules');
    const dateInput = document.querySelector('#date');
    const prevButton = document.querySelector('#prev');
    const nextButton = document.querySelector('#next');
    const timeSlotsContainer = document.querySelector('#time-slots-container');

    // Inisialisasi currentDate ke tanggal saat ini jika dateInput kosong
    let currentDate = dateInput.value ? new Date(dateInput.value + 'T00:00:00') : new Date();
    
    const today = new Date();

    function renderCalendar() {
        daysContainer.innerHTML = '';
        currentDate.setDate(1);

        const firstDayIndex = (currentDate.getDay() + 6) % 7; // Menyesuaikan agar Senin adalah hari pertama
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
        const previousMonthLastDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();

        // Hari dari bulan sebelumnya
        if (firstDayIndex > 0) {
            const prevMonthDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0);
            for (let i = firstDayIndex - 0; i >= 0; i--) {
                const prevMonthDay = prevMonthDate.getDate() - i;
                const dayElem = document.createElement('li');

                const button = document.createElement('button');
                button.type = 'button';
                button.classList.add('btn', 'btn-outline-secondary', 'disabled');
                button.style.color = '#6c757d';
                button.textContent = prevMonthDay;
                button.dataset.date = `${prevMonthDate.getFullYear()}-${String(prevMonthDate.getMonth() + 1).padStart(2, '0')}-${String(prevMonthDay).padStart(2, '0')}`;
                dayElem.appendChild(button);
                daysContainer.appendChild(dayElem);
            }
        }

        // Hari-hari bulan ini
        for (let day = 1; day <= lastDay; day++) {
            const dayElem = document.createElement('li');

            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('btn', 'btn-outline-secondary');
            button.textContent = day;
            button.dataset.date = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            button.addEventListener('click', function () {
                const selectedDate = new Date(button.dataset.date);
                dateInput.value = selectedDate.toISOString().split('T')[0];
                updateSchedules();
                selectedDateElem.textContent = `${selectedDate.toLocaleDateString('id-ID', { weekday: 'long' })}, ${day} ${selectedDate.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}`;
                document.querySelectorAll('.calendar-dates button').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                showTimeSlots(selectedDate); // Mengirim selectedDate ke showTimeSlots
            });

            // Sorot tanggal hari ini
            if (today.getFullYear() === currentDate.getFullYear() &&
                today.getMonth() === currentDate.getMonth() &&
                today.getDate() === day) {
                button.classList.add('btn-primary');
                button.style.color = 'white';
            }

            dayElem.appendChild(button);
            daysContainer.appendChild(dayElem);
        }

        // Hari dari bulan berikutnya
        const remainingDays = 42 - (daysContainer.children.length); // 42 untuk mengisi grid kalender
        for (let i = 1; i <= remainingDays; i++) {
            const dayElem = document.createElement('li');

            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('btn', 'btn-outline-secondary', 'disabled');
            button.style.color = '#6c757d';
            button.textContent = i;
            button.dataset.date = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 2).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            dayElem.appendChild(button);
            daysContainer.appendChild(dayElem);
        }

        currentDateElem.textContent = `${currentDate.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}`;
    }

    function updateSchedules() {
        schedulesContainer.innerHTML = '';
        const selectedDate = dateInput.value;
        
        const mockSchedules = [
            // Tambahkan data jadwal mock di sini
        ];

        mockSchedules.forEach(schedule => {
            const card = document.createElement('div');
            card.classList.add('schedule-card');

            const cardBody = document.createElement('div');
            cardBody.classList.add('card-body');
            card.appendChild(cardBody);

            const cardTitle = document.createElement('h5');
            cardTitle.classList.add('card-title');
            cardTitle.textContent = `${schedule.time}`;
            cardBody.appendChild(cardTitle);

            const status = document.createElement('span');
            status.classList.add('badge', `badge-${schedule.status}`);
            status.textContent = schedule.status.charAt(0).toUpperCase() + schedule.status.slice(1);
            cardBody.appendChild(status);

            schedulesContainer.appendChild(card);
        });
    }

    function showTimeSlots(date) {
        selectedDate = date; // Menyimpan tanggal yang dipilih
        timeSlotsContainer.innerHTML = '';
        const times = ["06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"];
        times.forEach(time => {
            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('btn', 'btn-outline-primary', 'm-1');
            button.textContent = time;
            button.addEventListener('click', () => {
                selectedTime = time; // Menyimpan waktu yang dipilih
                const confirmDateElem = document.getElementById('confirmDate');
                const confirmTimeElem = document.getElementById('confirmTime');
                confirmDateElem.textContent = selectedDate.toLocaleDateString('id-ID');
                confirmTimeElem.textContent = time;
                $('#confirmationModal').modal('show');
            });
            timeSlotsContainer.appendChild(button);
        });
        $('#timeSlotsModal').modal('show');
    }

    document.getElementById('confirmBookingButton').addEventListener('click', function() {
        // Set hidden inputs with booking details
        document.getElementById('bookingDate').value = dateInput.value;
        document.getElementById('bookingTime').value = selectedTime;
        document.getElementById('paymentFieldId').value = document.getElementById('bookingFieldId').value;
        document.getElementById('paymentDate').value = dateInput.value;
        document.getElementById('paymentTime').value = selectedTime;

        $('#confirmationModal').modal('hide'); // Menyembunyikan modal konfirmasi
        $('#paymentModal').modal('show'); // Menampilkan modal pembayaran
    });

    prevButton.addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextButton.addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
});

</script>
</body>
</html>

{{--    
</section>

@endsection --}}
