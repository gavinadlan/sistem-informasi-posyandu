<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');  // pastikan ada file login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect jika login sukses
            return redirect()->intended('/');
        }

        // Redirect kembali dengan error jika gagal
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}
