<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #ffffff;
            color: #212529;
        }
        .invoice-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 0.75rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            font-size: 2rem;
            color: #0d6efd;
        }
        .invoice-details h5 {
            margin: 15px 0;
            color: #495057;
        }
        .total-price {
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
            color: #198754;
            margin-top: 20px;
        }
        .total-price span {
            color: #212529;
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
            <p><strong>Tanggal :</strong> {{ $order->date }}</p>
            <p><strong>Lapangan :</strong> {{ $order->field->name }}</p>
            <p><strong>Status :</strong> {{ $order->payment_status }}</p>

            <h5>Sesi Waktu</h5>
            <ul style="list-style-type:none; padding: 0;">
                @foreach($order->tarifSession as $session)
                    <li>{{ $session->session_time }} - <strong>Rp {{ number_format($session->price, 0, ',', '.') }}</strong></li>
                @endforeach
            </ul>
        </div>

        <div class="total-price">
            <span>Total Harga:</span> Rp {{ number_format($order->total_price, 0, ',', '.') }}
        </div>
    </div>
</body>
</html>
