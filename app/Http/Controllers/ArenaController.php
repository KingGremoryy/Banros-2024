<?php

namespace App\Http\Controllers;

use App\Models\Arena; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class ArenaController extends Controller
{
    public function dashboard() {

        return view('dashboard');
    }

    public function index(Request $request){

        $arena = Arena::all();
        $arena = new Arena;

        if($request->get('search')) {
            $arena = $arena->where('lapangan', 'LIKE', '%'.$request->get('search').'%');
        }

        // $arena = $arena->get();
        $arena = $arena->simplePaginate(4);

        return view('arena.index', compact('arena', 'request'));
    }

    public function create(){
        return view('arena.create');
    }

    public function store(Request $request)
    {
        // Validasi request data
        $validatedData = $request->validate([
            'lapangan' => 'required|string|max:255',
            'status' => 'required|string', 
            'arenaStatus' => 'required|string', 
        ]);
    
        // Buat instance Arena berdasarkan data yang divalidasi
        $arena = new Arena([
            'lapangan' => $validatedData['lapangan'],
            'status' => $validatedData['status'],
            'arenaStatus' => $validatedData['arenaStatus'],
        ]);
    
        // Simpan data ke basis data
        $arena->save();
    
        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('admin.arena.index')->with('success', 'arena berhasil disimpan.');
    }
    
    public function edit(Request $request, $id){
        $arena = Arena::findOrFail($id);
        return view('arena.edit', compact('arena'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request data
        $validatedData = $request->validate([
            'lapangan' => 'required|string|max:255',
            'status' => 'required|string', 
            'arenaStatus' => 'required|string', 
        ]);
    
        // Ambil objek Arena dari basis data berdasarkan ID
        $arena = Arena::findOrFail($id);
    
        // Perbarui atribut Arena berdasarkan data yang divalidasi
        $arena->lapangan = $validatedData['lapangan'];
        $arena->status = $validatedData['status']; // Pastikan status sudah divalidasi
        $arena->arenaStatus = $validatedData['arenaStatus']; // Pastikan status sudah divalidasi
    
        // Simpan perubahan ke basis data
        $arena->save();
    
        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('admin.arena.index')->with('success', 'arena berhasil Diperbarui.');
    }
    public function delete(Request $request, $id){
        $arena = Arena::find($id);

        if($arena){
            $arena->delete();
        }

        return redirect()->route('admin.arena.index')->with('success', 'arena berhasil Dihapus.');
    }

}
