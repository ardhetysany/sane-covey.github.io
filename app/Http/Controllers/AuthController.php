<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = Session::get('registered_user');

        if ($user && $request->name === $user['name'] && $request->password === $user['password']) {
            Session::put('user', $user['name']);
            return redirect()->route('tasks.index');
        }

        return redirect()->route('login')->withErrors(['login' => 'Nama atau password salah']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:4'
        ]);

        $user = [
            'name' => $request->name,
            'password' => $request->password
        ];

        Session::put('registered_user', $user);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
