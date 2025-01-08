<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view `auth.login` ada
    }

    public function process(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,kader,ibu_balita',
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->input('role');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Validasi role pengguna
            if ($user->role === $role) {
                return redirect()->route("dashboard.$role");
            } else {
                Auth::logout();
                return back()->withErrors(['role' => 'Peran yang dipilih tidak sesuai.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}



