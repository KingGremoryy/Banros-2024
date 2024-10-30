<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Lapangan;
use App\Models\Booking;
use App\Models\Arena;

class AdminController extends Controller
{
    public function index()
    {
        $totalData1 = Arena::count();
        $totalData3 = Lapangan::count();

         // Hitung total status booked dan tersedia
        $totalBooked = Arena::where('arenaStatus', 'Booked')->count();
        $totalTersedia = Arena::where('arenaStatus', 'Tersedia')->count();
        $totalAktif = Arena::where('arenaStatus', 'Aktif')->count();

        return view('dashboard', compact('totalData1', 'totalData3', 'totalBooked', 'totalTersedia', 'totalAktif'));
   
    }

    function admin() {
        return view('dashboard');     
    }
}