<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $booking = Booking::all();
        $booking = Booking::with('arena')->get();

        return view('bookings.index', ['booking' => $booking]);
    }
}
