<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index(Request $request)
    {
        $lapanganQuery = Lapangan::query();
        
        if ($request->get('search')) {
            $lapanganQuery->where('lapangan', 'LIKE', '%' . $request->get('search') . '%');
        }

        $lapangan = $lapanganQuery->paginate(4);

        return view('lapangan.index', compact('lapangan', 'request'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lapangan' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imagePath = $image->store('lapangan', 'public');

        Lapangan::create([
            'lapangan' => $validatedData['lapangan'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.lapangan.index')
                         ->with('success', 'Lapangan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $validatedData = $request->validate([
            'lapangan' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $lapangan->image)) {
                Storage::delete('public/' . $lapangan->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('lapangan', 'public');
        } else {
            $imagePath = $lapangan->image;
        }

        $lapangan->update([
            'lapangan' => $validatedData['lapangan'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.lapangan.index')
                         ->with('success', 'Lapangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lapangan = Lapangan::findOrFail($id);

        if (Storage::exists('public/' . $lapangan->image)) {
            Storage::delete('public/' . $lapangan->image);
        }

        $lapangan->delete();

        return redirect()->route('admin.lapangan.index')
                         ->with('success', 'Lapangan berhasil dihapus.');
    }
}
