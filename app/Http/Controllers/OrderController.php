<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TarifSession;
use App\Models\Field;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as PDF; // Menggunakan alias PDF



class OrderController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key'); // Add your server key in config
        Config::$isProduction = false; // Set to true in production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

 // Show fields
public function showFields()
{
    // Gunakan simplePaginate langsung pada query builder
    $fields = Field::simplePaginate(4);
    $tarifSessions = TarifSession::with('field')->get();
    $bookedSessions = [];

    return view('welcome', compact('fields', 'tarifSessions',  'bookedSessions'));
}

    public function show($fieldId)
{
    $fields = Field::all(); 
    $tarifSessions = TarifSession::with('field')->get(); 
    $field = Field::findOrFail($fieldId); // Fetch the specific field

    return view('welcome', compact('fields', 'tarifSessions', 'field'));

}

public function indexWithoutFieldId()
{
     // Mengambil semua field dari database
     $fields = Field::all(); // Pastikan model Field sudah ada
    // Logika untuk menampilkan halaman tanpa parameter fieldId
    return view('welcome', compact('fields'));
}

    public function getBookedSessions(Request $request)
{
    $fieldId = $request->query('field_id');
    $date = $request->query('date');

    // Cek apakah ada sesi yang dibooking pada tanggal tertentu
    $bookedSessions = Order::where('field_id', $fieldId)
        ->whereDate('date', $date)
        ->pluck('tarif_session_id'); // ambil tarif_session_id yang dibooking

    return response()->json(['booked_sessions' => $bookedSessions]);
}


    // Create order form
    public function create()
    {
        $tarifSessions = TarifSession::with('field')->get();
        $fields = Field::all();
        return view('orders.create', compact('tarifSessions', 'fields'));
    }

    // Store order
    public function store(Request $request)
{

    // Validate the request
    $validated = $request->validate([
        'field_id' => 'required|exists:fields,id',
        'date' => 'required|date',
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:255', 
        'tarif_session_ids' => 'required|array',
        'total_price' => 'required|string',
    ]);

    // Create the order
    $order = Order::create([
        'field_id' => $validated['field_id'],
        'date' => $validated['date'],
        'customer_name' => $validated['customer_name'],
        'customer_phone' => $validated['customer_phone'], 
        'total_price' => str_replace('Rp ', '', $validated['total_price']),
        'status' => 'Dalam Proses',
        'payment_status' => 'Dalam Proses',
    ]);

    // Split the session IDs into an array
    $sessionIds = explode(',', $validated['tarif_session_ids'][0]); // Example: "2,3" -> ['2', '3']

    // Attach the tariff sessions to the order
    $order->tarifSession()->attach($sessionIds);

    // Generate Snap token using a unique order ID
    $snapToken = $this->generateSnapToken($order);

    // Return view for payment
    return view('payment', compact('snapToken', 'order'));
}

private function generateSnapToken($order)
{
    // Prepare a unique transaction ID
    $uniqueOrderId = 'ORDER_' . $order->id; // You can add a timestamp or another unique identifier

    // Prepare transaction data
    $transactionDetails = [
        'order_id' => $uniqueOrderId,  // Use the order ID uniq
        'gross_amount' => $order->total_price,
    ];

    $itemDetails = [];
    foreach ($order->tarifSession as $session) {
        $itemDetails[] = [
            'id' => $session->id,
            'price' => $session->price,
            'quantity' => 1,
            'name' => 'Booking for ' . $session->session_time . ' on ' . $order->date,
        ];
    }

    $transactionData = [
        'transaction_details' => $transactionDetails,
        'item_details' => $itemDetails,
        'customer_details' => [
            'first_name' => $order->customer_name,
            'phone' => $order->customer_phone,
        ],
    ];

    // Get Snap token
    $snapToken = Snap::getSnapToken($transactionData);

    return $snapToken;
}

    

    // Checkout process
    public function checkout(Request $request)
    {
        // Validate input from the form
        $validated = $request->validate([
            'field_id' => 'required|integer|exists:fields,id',
            'date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'total_price' => 'required|integer',
        ]);

        // Save order data in the database with status 'Unpaid'
        $order = Order::create([
            'field_id' => $validated['field_id'],
            'date' => $validated['date'],
            'customer_name' => $validated['customer_name'],
            'total_price' => $validated['total_price'],
            'status' => 'Dalam Proses',
        ]);

        // Retrieve fields for the view
        $fields = Field::all();

        // Create Midtrans transaction and get Snap Token
        $snapToken = Snap::createTransaction([
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => 'customer@example.com', // Adjust as needed
                'phone' => $order->customer_phone, // Adjust as needed
            ],
            'enabled_payments' => ['credit_card', 'gopay', 'shopeepay', 'dana'],
        ])->token;

        // Return view with Snap token and order
        return view('welcome', compact('snapToken', 'order', 'fields'));
    }

    // Handle Midtrans callback
    public function callback(Request $request)
{
    // Ambil server key dari konfigurasi
    $serverKey = config('midtrans.server_key');
    
    // Buat hash berdasarkan data dari callback
    $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    
    // Bandingkan hash yang dibuat dengan signature key dari Midtrans
    if ($hashed === $request->signature_key) {
        // Order ID dari Midtrans adalah format ID database
        // Memastikan order_id dari notifikasi menggunakan format yang sama
        $orderId = str_replace('ORDER_', '', $request->order_id); // Mengambil ID dari ORDER_ID

        // Temukan order berdasarkan order_id dari database
        $order = Order::find($orderId);
        
        if ($order) {
            // Tangani berbagai status transaksi
            if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                $order->update([
                    'payment_status' => 'Sukses', // Ubah payment_status menjadi sukses
                ]);
                
                // Log kesuksesan
                Log::info('Pembayaran berhasil untuk order_id: ' . $order->id);

                // Redirect ke halaman invoice setelah pembayaran berhasil
                return redirect()->route('invoice', ['id' => $order->id]);

            } elseif ($request->transaction_status == 'pending') {
                $order->update(['payment_status' => 'Dalam Proses']);
                Log::info('Pembayaran dalam proses untuk order_id: ' . $order->id);

            } elseif (in_array($request->transaction_status, ['cancel', 'expire', 'deny'])) {
                $order->update(['payment_status' => 'Dibatalkan']);
                Log::warning('Pembayaran dibatalkan untuk order_id: ' . $order->id);
            }
        } else {
            Log::error('Order tidak ditemukan: ' . $orderId);
        }
    } else {
        Log::error('Signature key tidak valid untuk order_id: ' . $request->order_id);
    }
}


    // Show invoice
    public function showInvoice($order_id)
    {
        $order = Order::with('field', 'tarifSession')->findOrFail($order_id);
        return view('invoice', compact('order'));
    }

    public function assets(Request $request)
    {
        $order = Order::findOrFail($request->input('order_id')); // Ensure you fetch the order correctly

        if ($request->get('export') == 'pdf') {
            $pdf = PDF::loadView('pdf.assets', ['order' => $order]);
            return $pdf->download('Data_Assets.pdf');
        }

        return view('your_view_name', compact('order', 'request')); // Adjust this view as necessary
    }

    //Admin Manage
     // Menampilkan semua pesanan
   // Menampilkan semua pesanan dengan fitur pencarian
   public function index(Request $request)
   {
       $query = Order::query(); // Initialize the query builder
   
       // If there is a search term
       if ($request->filled('search')) {
           // Filter orders by customer name
           $query->where('customer_name', 'like', '%' . $request->input('search') . '%')
                 ->orWhereHas('field', function ($subQuery) use ($request) {
                     $subQuery->where('name', 'like', '%' . $request->input('search') . '%');
                 });
       }
   
       // If there is a filter for field
       if ($request->filled('field_id')) {
           $query->where('field_id', $request->input('field_id'));
       }
   
       // If there is a filter for date
       if ($request->filled('date')) {
           $query->where('date', $request->input('date'));
       }
   
       // Get paginated orders, 10 items per page
       $orders = $query->paginate(4);
   
       // Get all fields for dropdown (if needed)
       $fields = Field::all();
   
       // Get all lapangan (if needed)
       $lapangan = Lapangan::all();
   
       // Send data to the view
       return view('orders.index', compact('orders', 'fields', 'lapangan', 'request'));
   }   


    //  // Menampilkan form edit untuk order tertentu
    //  {]public function edit(Order $order){
    //      $fields = Field::all();
    //      return view('orders.edit', compact('order', 'fields'));
    //  }
 
     // Update order yang 
//      public function update(Request $request, $id){
//     $order = Order::findOrFail($id);
//     $order->field_id = $request->field_id;
//     $order->date = $request->date;
//     $order->customer_name = $request->customer_name;
//     $order->customer_phone = $request->customer_phone;
//     $order->payment_status = $request->payment_status;
//     // Update sessions
//     $sessions = $request->input('session_time');
//     $prices = $request->input('price');

//     // Update or save your sessions here, depending on your application logic
//     foreach ($sessions as $index => $session_time) {
//         $order->tarifSession[$index]->session_time = $session_time;
//         $order->tarifSession[$index]->price = $prices[$index];
//         $order->tarifSession[$index]->save();
//     }

//     $order->save();

//     return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diupdate.');
// }

// public function destroy($id)
// {
//     $order = Order::findOrFail($id);
//     $order->delete();

//     return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
// }
     
// }

}