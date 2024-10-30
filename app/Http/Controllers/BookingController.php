<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Pastikan model Booking sudah dibuat
use App\Models\Field;
use App\Models\Order;
use App\Models\TarifSession;
class BookingController extends Controller
{
    public function showBookingPage()
    {
        $fields = Field::with('tarifSessions')->get();
        $bookedSessions = $this->getBookedSessions();

        return view('fields.index', compact('fields', 'bookedSessions'));
    }

    protected function getBookedSessions()
    {
        return Order::whereDate('date', now()->format('Y-m-d'))
                    ->pluck('tarif_session_id')
                    ->toArray();
    }
}
