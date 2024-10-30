<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
          background-color: #f8f9fa;
      }
      .card {
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
      }
      .card-title {
          font-weight: bold;
      }
      table {
          width: 100%;
      }
      table td:first-child {
          font-weight: bold;
          padding-right: 10px;
      }
     
      #pay-button {
          width: 100%;
          font-weight: bold;
          padding: 10px;
      }
  </style>
</head>
<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Detail Pesanan</h1>
    <div class="container">
        <h2>Pembayaran untuk Pesanan #{{ $order->id }}</h2>
        <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
    </div>
    </div>

    <div id="result-json" style="margin-top: 20px;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
          window.snap.pay('{{$snapToken}}', {
              onSuccess: function (result) {
                //   alert("payment success!"); 
                window.location.href = '/invoice/{{$order->id}}'
                  console.log(result);
                  // Add logic to handle successful payment, like redirecting or updating the order status
              },
              onPending: function (result) {
                  alert("waiting your payment!"); 
                  console.log(result);
                  // Add logic to handle pending payment, like showing a message or saving the status
              },
              onError: function (result) {
                  alert("payment failed!"); 
                  console.log(result);
                  // Add logic to handle failed payment, like showing an error message
              },
              onClose: function () {
                  alert('you closed the popup without finishing the payment');
                  // Add logic to handle when the user closes the payment popup
              }
          });
      });
  </script>
  
</body>
</html>
