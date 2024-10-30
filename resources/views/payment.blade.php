<!-- resources/views/payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
        <style>
            body {
                background-color: #343a40; /* Warna latar belakang gelap */
                font-family: 'Roboto', sans-serif;
                color: white; /* Warna teks putih */
                display: flex;
                align-items: center; /* Mengatur teks ke tengah vertikal */
                justify-content: center; /* Mengatur teks ke tengah horizontal */
                padding: 50px; /* Jarak dari tepi */
            }
            .card {
                background-color: #ffffff; /* Warna latar belakang card */
                border-radius: 10px; /* Sudut melengkung */
                padding: 20px; /* Padding di dalam card */
                width: 100%; /* Lebar card dikurangi */
                max-width: 500px; /* Maksimal lebar card */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan card */
            }
           
            .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #17153B;
        }
        .invoice-header p {
            font-size: 1rem;
            color: #6c757d;
        }

        .invoice-details h5 {
            color: #495057;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .invoice-details p, .invoice-details li {
            font-size: 1rem;
            color: #212529;
            margin-bottom: 8px;
        }
        .invoice-details ul {
            padding-left: 0;
        }
        .invoice-details li {
            list-style: none;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 8px;
            margin-bottom: 8px;
        }
            .divider {
            border-top: 2px solid #dee2e6;
            margin: 20px 0;
            }
            .total-price {
        font-size: 1.8rem;
        font-weight: bold;
        text-align: center;
        color: black; /* Change total price color to black */
        margin-bottom: 30px;
    }
    
    .total-price span {
        color: #212529; /* Keep span color as green */
        font-size: 1.2rem;
        display: block;
    }
    
    .total-price p {
        color: green; /* Change the total amount color to green */
        margin: 0; /* Optional: remove default margin */
        font-size: 30px;
    }
            .btn-pay {
                background-color: #17153B; /* Warna tombol */
                color: white; /* Warna teks tombol */
                width: 100%; /* Tombol mengisi lebar penuh */
            }
            .btn-pay:hover {
                background-color: #282472;; /* Warna tombol saat hover */
            }
        </style>
    </head>
    <body>
    
    <div class="card">
        <div class="invoice-details">
            <div class="invoice-header">
                <h1>Pembayaran</h1>
                <p>Order ID: {{ $order->id }}</p>
            </div>

            <p><strong>Nama :</strong> {{ $order->customer_name }}</p>
            <p><strong>Telepon :</strong> {{ $order->customer_phone }}</p>
            <p><strong>Tanggal :</strong> {{ $order->date }}</p>
            <p><strong>Lapangan :</strong> {{ $order->field->name }}</p>
            <p><strong>Status :</strong>
            @if($order->payment_status == 'Dalam Proses')
                <span class="badge bg-warning">{{ $order->payment_status }}</span> <!-- Kuning -->
            @elseif($order->payment_status == 'Sukses')
                <span class="badge bg-success">{{ $order->payment_status }}</span> <!-- Hijau -->
            @elseif($order->payment_status == 'Dibatalkan')
                <span class="badge bg-danger">{{ $order->payment_status }}</span> <!-- Merah -->
            @else
                <span class="badge bg-secondary">{{ $order->payment_status }}</span> <!-- Warna default untuk status lain -->
            @endif</p>

                <div class="divider"></div>

            <h5>Sesi Waktu</h5>
            <ul class="list-unstyled">
                @foreach($order->tarifSession as $session)
                    <li style="color: rgb(0, 0, 0);">{{ $session->session_time }} - <strong>Rp {{ number_format($session->price, 0, ',', '.') }}</strong></li>
                @endforeach
            </ul>

            <div class="divider"></div>

        <div class="total-price">
            <span>Total Harga :</span>
            <p>Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        </div>
    
            <div class="text-center">
                <button class="btn btn-pay" id="pay-button">Pay Now</button>
            </div>
        </div>
    </div>

<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log('Payment Success:', result);
                // Handle payment success, e.g., redirect or show success message
                window.location.href = "{{ route('invoice', ['id' => $order->id]) }}";
            },
            onPending: function(result) {
                console.log('Payment Pending:', result);
                // Handle payment pending
                window.location.href = '/fields'; // Redirect to fields page or any pending page
            },
            onError: function(result) {
                console.log('Payment Error:', result);
                // Handle payment error
                alert('Payment error, please try again.');
            },
            onClose: function() {
                console.log('Payment Popup Closed');
                // Handle popup closed
            }
        });
    });
</script>

</body>
</html>
 