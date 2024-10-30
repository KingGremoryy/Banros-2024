<!-- resources/views/orders/payment.blade.php -->
@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Complete Your Payment</h3>
                        </div>
                        <div class="card-body">
                            <form id="payment-form" action="{{ route('orders.payment.complete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="snapToken" value="{{ $snapToken }}">
                                <button type="submit" class="btn btn-primary">Pay with Midtrans</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('payment-form').addEventListener('submit', function (e) {
        e.preventDefault();
        snap.pay(document.querySelector('input[name="snapToken"]').value, {
            onSuccess: function (result) {
                console.log(result);
                // Optionally, send result to your server
            },
            onPending: function (result) {
                console.log(result);
                // Optionally, send result to your server
            },
            onError: function (result) {
                console.log(result);
                // Optionally, send result to your server
            }
        });
    });
</script>
@endsection
