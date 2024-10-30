<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\TarifSession;
use App\Models\Order;
use Illuminate\Http\Request;

class TarifSessionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $dayOfWeek = $request->input('day_of_week'); // Ambil input hari
    
        // Tambahkan debug untuk melihat hasil pencarian
        $tarifSessions = TarifSession::with('field')
            ->when($search, function ($query) use ($search) {
                $query->where('session_time', 'like', '%' . $search . '%')
                      ->orWhereHas('field', function ($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%');
                      });
            })
            ->when($dayOfWeek, function ($query) use ($dayOfWeek) {
                // Filter berdasarkan day_of_week
                $query->where('day_of_week', $dayOfWeek);
            })
            ->paginate(3);
    
        $fields = Field::all();
        return view('tarif_sessions.index', compact('tarifSessions', 'fields', 'search', 'request', 'dayOfWeek'));
    }
    
    

    public function create()
    {
        $fields = Field::all();
        return view('tarif_sessions.create', compact('fields'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'field_id' => 'required|exists:fields,id',
        'day_of_week' => 'required|string',
        'session_time' => 'required|string',
        'price' => 'required|numeric'
    ]);

    TarifSession::create($validatedData);

    return redirect()->back()->with('success', 'Tarif Session created successfully.');
}

public function edit($id)
{
    $field = Field::find($id); // Coba menggunakan find() yang akan mengembalikan null jika tidak ada.

    // Periksa apakah field ditemukan
    if (!$field) {
        return redirect()->route('lapangan.index')->with('error', 'Lapangan tidak ditemukan.');
    }

    return view('lapangan.edit', compact('field'));
}

    public function update(Request $request, TarifSession $tarifSession)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'day_of_week' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat, Sabtu,Minggu',
            'session_time' => 'required|string',
            'price' => 'required|integer',
        ]);

        $tarifSession->update($request->all());

        return redirect()->route('tarif_sessions.index')->with('success', 'Tarif Session updated successfully.');
    }

    public function destroy(TarifSession $tarifSession)
    {
        $tarifSession->delete();
        return redirect()->route('tarif_sessions.index')->with('success', 'Tarif Session deleted successfully.');
    }

    public function getAvailableTimeSlots(Request $request)
{
    $date = $request->input('date');
    $fieldId = $request->input('field_id');

    $tarifSessions = TarifSession::where('field_id', $fieldId)
        ->where('day_of_week', date('l', strtotime($date)))
        ->get(['id', 'session_time', 'price']);

    $timeSlots = $tarifSessions->map(function ($session) {
        return [
            'id' => $session->id,
            'time_range' => $session->session_time,
            'price' => $session->price
        ];
    });

    return response()->json(['time_slots' => $timeSlots]);
}
}
