<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index(){
        $lapangans = Lapangan::all();
        $tarifs = Tarif::all();

        return view('lapangans.index', compact('lapangans', 'tarifs'));
    }
}

