<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class TarifController extends Controller
{

        public function index(){
            $lapangans = Lapangan::all();
            $tarifs = Tarif::all();
    
            return view('lapangans.index', compact('lapangans', 'tarifs'));
        }
}

