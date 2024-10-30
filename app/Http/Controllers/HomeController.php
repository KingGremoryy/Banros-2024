<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{

    public function dashboard() {
        return view('dashboard');    
    }

    public function index(Request $request){
        $data = new User;

        if($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%'.$request->get('search').'%')
            ->orWhere('email', 'LIKE', '%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('index', compact('data', 'request'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->nama;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request, $id){
        $data = User::find($id);

        return view('edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'photo'     => 'nullable|mimes:png,jpg,jpeg|max:2048', // Foto bersifat opsional saat update
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'nullable', // Password bersifat opsional saat update
        ]);
    
        // Jika validasi gagal, kembali ke halaman sebelumnya dengan input dan error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
    
        // Temukan pengguna yang akan diupdate
        $user = User::findOrFail($id);
    
        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('photo')) {
            $photo      = $request->file('photo');
            $filename   = date('Y-m-d').$photo->getClientOriginalName();
            $path       = 'photo-user/'.$filename;
    
            // Simpan foto baru
            Storage::disk('public')->put($path, file_get_contents($photo));
    
            // Hapus foto lama jika ada
            if ($user->image && Storage::disk('public')->exists('photo-user/' . $user->image)) {
                Storage::disk('public')->delete('photo-user/' . $user->image);
            }
    
            // Set nama file foto baru ke dalam array data yang akan diupdate
            $user->image = $filename;
        }
    
        // Update data pengguna
        $user->email = $request->email;
        $user->name = $request->nama;
    
        // Cek jika password diisi, maka update
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
    
        // Simpan perubahan
        $user->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'User berhasil diperbarui.');
    }

    public function delete(Request $request, $id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }

}