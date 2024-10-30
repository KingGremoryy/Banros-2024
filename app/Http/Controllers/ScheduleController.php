<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Simpan data ke database
        $schedule = new Schedule();
        $schedule->date = $validatedData['date'];
        $schedule->time = $validatedData['time'];
        $schedule->save();

        // Kembalikan respons JSON untuk AJAX
        return response()->json(['success' => true, 'message' => 'Jadwal berhasil disimpan!']);
    }
}
