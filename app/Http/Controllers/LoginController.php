<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function process(Request $request)
    {
        // Validasi form
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Logika login
        if (auth()->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}


