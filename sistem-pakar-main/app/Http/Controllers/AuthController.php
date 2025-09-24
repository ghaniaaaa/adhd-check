<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;                   
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register'); // halaman register
    }

    public function register(Request $request)
    {
        // validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // simpan ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // redirect ke login setelah sukses daftar
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }
}
