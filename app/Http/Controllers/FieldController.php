<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field; 
use App\Models\TarifSession; 
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    public function show($id)
    {
        // Find a single field and load all fields for display
        $fields = Field::all();
        $field = Field::findOrFail($id);

        // Send data to the view
        return view('fields.show', compact('fields', 'field'));
    }

   // Menampilkan daftar field
   public function index(Request $request)
   {
      
       // Fetch all fields (optional, can be used for additional filtering in the view)
       $fields = Field::paginate(10);
   
       // Pass the search query along with the tarif sessions and fields to the view
       return view('lapangan.index', compact('fields'));
   }
   
   


   public function create()
    {
        return view('admin.lapangan.create');
    }   

   // Menambahkan field baru
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       // Menyimpan gambar dan field
       $imagePath = $request->file('image_url')->store('fields', 'public');

       Field::create([
           'name' => $request->name,
           'image_url' => $imagePath,
       ]);

       return redirect()->route('lapangan.index')->with('success', 'Field berhasil ditambahkan.');
   }

   // Menampilkan form edit
   public function edit(Field $field)
   {
        return view('admin.lapangan.edit', compact('field'));
   }

   // Memperbarui field
   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
    ]);

    $field = Field::findOrFail($id);
    $field->name = $request->name;

    if ($request->hasFile('image_url')) {
        $field->image_url = $request->file('image_url')->store('fields', 'public');
    }

    $field->save();

    return redirect()->route('admin.lapangan.index')->with('success', 'Field berhasil diperbarui.');
}
   // Menghapus field
   public function destroy($id)
    {
        $field = Field::findOrFail($id);

        if (Storage::exists('public/' . $field->image)) {
            Storage::delete('public/' . $field->image);
        }

        $field->delete();

        return redirect()->route('admin.lapangan.index')
                         ->with('success', 'Lapangan berhasil dihapus.');
    }
}
