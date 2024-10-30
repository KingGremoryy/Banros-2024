<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Invoice</title>
    <style>
        body {
            background-color: #343a40;
            color: #343a40;
        }
        .invoice-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 30px;
            border: 1px solid #dee2e6;
            border-radius: 0.75rem;
            background-color: #ffffff;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
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
            color: #198754;
            margin-bottom: 30px;
        }
        .total-price span {
            color: #212529;
            font-size: 1.2rem;
            display: block;
        }
        .back-to-home {
            margin-top: 30px;
            text-align: center;
        }
        .back-to-home a {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Nota</h1>
            <p>Order ID: {{ $order->id }}</p>
        </div>

        <div class="invoice-details">
            <h5>Details</h5>
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
                
            </td>
            <div class="divider"></div>
            
            <h5>Sesi Waktu</h5>
            <ul class="list-unstyled">
                @foreach($order->tarifSession as $session)
                    <li>{{ $session->session_time }} - <strong>Rp {{ number_format($session->price, 0, ',', '.') }}</strong></li>
                @endforeach
            </ul>
        </div>

        <div class="divider"></div>

        <div class="total-price">
            <span>Total Harga:</span>
            Rp {{ number_format($order->total_price, 0, ',', '.') }}
        </div>

        <div class="back-to-home">
            <a href="{{ route('welcome') }}" class="btn btn-primary btn-lg">Kembali</a>
            <a href="{{ route('pdf.assets', ['export' => 'pdf', 'order_id' => $order->id]) }}" class="btn btn-danger btn-lg">Download Bukti</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
