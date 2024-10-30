<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //

    public function index(){
        return view ('login.login');
    }

    public function login_proses(Request $request) {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ], [
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib Diisi'
    ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

      
        if(Auth::attempt($data)) {
            if(Auth::user()-> role == 'manager') {
                return redirect('admin/manager');
            } elseif (Auth::user()-> role == 'admin'); {
                return redirect('admin');
            }
        }else {
            return redirect('login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register(){
        return view('login.register');
    }

    // public function register_proses(Request $request) {
    //     $request->validate ([
    //         'nama'  => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6'
    //     ], [
    //         'nama.required' => 'Nama Wajib diisi',
    //         'email.required' => 'Email Wajib diisi',
    //         'password.required' => 'Password Wajib Diisi'
    // ]);

   

    //     $data['name']       = $request->nama;
    //     $data['email']      = $request->email;
    //     $data['password']   = Hash::make($request->password);

    //     User::create($data);

    //     $login = [
    //         'email'     => $request->email,
    //         'password'  => $request->password
    //     ];

    //     if(Auth::attempt($login)) {
    //         return redirect()->route('login');
    //     }else {
    //         return redirect()->route('login')->with('failed', 'Email atau Password Salah');
    //     }
    // }

}
