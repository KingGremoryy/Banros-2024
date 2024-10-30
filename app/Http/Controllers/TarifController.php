<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\TarifSession;
use Illuminate\Http\Request;

class TarifController extends Controller
{

    public function index()
{
    $tarifs = Tarif::with('sessions')->paginate(10); // Menampilkan 10 tarif per halaman
    return view('tarif.index', compact('tarifs'));
}

    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'day' => 'required|string',
        'sessions' => 'required|array',
        'prices' => 'required|array',
        'sessions.*' => 'required|string',
        'prices.*' => 'required|integer',
    ]);

    // // Debugging
    // dd($validatedData);

    if (count($validatedData['sessions']) !== count($validatedData['prices'])) {
        return redirect()->back()->withErrors(['error' => 'Sessions and prices count must match.']);
    }

    $tarif = Tarif::create(['day' => $validatedData['day']]);

    foreach ($validatedData['sessions'] as $index => $sessionTime) {
        // Assuming 'sessions' relationship is defined on the Tarif model
        $tarif->sessions()->create([
            'session_time' => $sessionTime,
            'price' => $validatedData['prices'][$index],
        ]);
    }

    return redirect()->route('admin.tarif.index')->with('success', 'Data berhasil ditambahkan');
}

public function edit($id)
{
    $tarif = Tarif::with('sessions')->findOrFail($id);
    return response()->json($tarif);
}

public function update(Request $request, Tarif $tarif)
{
    $validatedData = $request->validate([
        'day' => 'required|string',
        'sessions' => 'required|array',
        'prices' => 'required|array',
        'sessions.*' => 'required|string',
        'prices.*' => 'required|numeric',
    ]);

    $tarif->update(['day' => $validatedData['day']]);

    // Hapus sesi lama
    $tarif->sessions()->delete();

    foreach ($validatedData['sessions'] as $index => $sessionTime) {
        $tarif->sessions()->create([
            'session_time' => $sessionTime,
            'price' => $validatedData['prices'][$index],
        ]);
    }

    return redirect()->route('admin.tarif.index')->with('success', 'Data berhasil diperbarui');
}

public function destroy($id)
{
    $tarif = Tarif::findOrFail($id);
    $tarif->sessions()->delete();
    $tarif->delete();

    return redirect()->route('admin.tarif.index')->with('success', 'Data berhasil dihapus');
}


}
