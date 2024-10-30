<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Configure Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction(Request $request)
{
    $request->validate([
        'total_price' => 'required|numeric',
        'field_id' => 'required|integer',
    ]);

    $totalPrice = $request->input('total_price');
    $fieldId = $request->input('field_id');

    // Midtrans Snap API configuration
    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $midtrans = new \Midtrans\Snap();
    $params = [
        'transaction_details' => [
            'order_id' => 'ORDER-' . uniqid(), // Make sure this is unique
            'gross_amount' => $totalPrice,
        ],
        'customer_details' => [
            'first_name' => 'Customer Name', // Adjust as necessary
        ],
    ];

    try {
        $snapToken = $midtrans->createTransaction($params)->token;
        return response()->json(['snapToken' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}
