<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Page | YourApp</title>
  <!-- Google Font: Quicksand -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <style>
    /* Global reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }

    /* Body styling */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #000;
    }

    /* Section styles */
    section {
      position: absolute;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2px;
      flex-wrap: wrap;
      overflow: hidden;
    }

    section::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(#000, rgb(95, 100, 192), #000);
      animation: animate 5s linear infinite;
    }

    @keyframes animate {
      0% {
        transform: translateY(-100%);
      }
      100% {
        transform: translateY(100%);
      }
    }

    /* Individual span styling */
    section span {
      position: relative;
      display: block;
      width: calc(6.25vw - 2px);
      height: calc(6.25vw - 2px);
      background: #181818;
      z-index: 2;
      transition: background 1.5s;
    }

    section span:hover {
      background: #17153B;
      transition: background 0s;
    }

    /* Payment form container */
    .payment {
      position: absolute;
      width: 400px;
      background: #17153B;
      z-index: 1000;
      padding: 40px;
      border-radius: 4px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9);
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .payment h2 {
      font-size: 2em;
      color: white;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .payment .method {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .payment .method label {
      color: #fff;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }

    .payment .method input[type="radio"] {
      display: none;
    }

    .payment .method img {
      width: 100px;
    }

    .payment .method input[type="radio"]:checked + img {
      border: 2px solid #f00;
    }

    .payment button {
      padding: 10px;
      background: #f00;
      color: #000;
      font-weight: 600;
      font-size: 1.35em;
      letter-spacing: 0.05em;
      cursor: pointer;
      border: none;
      border-radius: 4px;
    }

    .payment button:active {
      opacity: 0.6;
    }
  </style>
</head>
<body>
    <section>
        <div class="payment">
            <h2>Select Payment Method</h2>
            <form id="payment-form">
                <div class="method">
                    <label>
                        <input type="radio" name="payment-method" value="dana" required>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/DANA_Logo.svg/1200px-DANA_Logo.svg.png" alt="Dana">
                        Dana
                    </label>
                    <label>
                        <input type="radio" name="payment-method" value="gopay" required>
                        <img src="https://upload.wikimedia.org/wikipedia.org/wikipedia/commons/thumb/0/0c/GoPay_Logo.svg/1024px-GoPay_Logo.svg.png" alt="GoPay">
                        GoPay
                    </label>
                    <label>
                        <input type="radio" name="payment-method" value="indomaret" required>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Indomaret_logo.svg/1024px-Indomaret_logo.svg.png" alt="Indomaret">
                        Indomaret
                    </label>
                    <label>
                        <input type="radio" name="payment-method" value="bank" required>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Bank_Logo.svg/1280px-Bank_Logo.svg.png" alt="Bank">
                        Bank Transfer
                    </label>
                </div>
                <button type="button" id="proceed-button" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>

 <!-- Modal for Dana -->
 <div class="modal fade" id="dana-modal" tabindex="-1" role="dialog" aria-labelledby="dana-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dana-modal-label">Dana Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please proceed with Dana payment by following these instructions:</p>
                <ol>
                    <li>Open the Dana app on your mobile device.</li>
                    <li>Select the "Pay" option.</li>
                    <li>Scan the QR code below or enter the payment details manually.</li>
                    <li>Enter the amount to pay and confirm the payment.</li>
                    <li>Once the payment is completed, please confirm it on this page.</li>
                </ol>
                <!-- Example QR code for Dana -->
                <img src="https://via.placeholder.com/150" alt="Dana QR Code" class="img-fluid">
                <p>If you need any assistance, please contact our support team.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm Payment</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    document.getElementById('proceed-button').addEventListener('click', function() {
        const selectedMethod = document.querySelector('input[name="payment-method"]:checked');
        if (selectedMethod) {
            const methodValue = selectedMethod.value;
            if (methodValue === 'dana') {
                $('#dana-modal').modal('show');
            }
            // Add similar conditions for other payment methods
        } else {
            alert('Please select a payment method.');
        }
    });
</script>
</body>
</html>
