<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }

    public function showLoginForm()
    {
        return view('login'); // Sesuaikan view login kamu
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate(); // Penting untuk keamanan session
        //     //  dd('Berhasil Login!'); // Hapus atau komen ini
            return view('dashboard');
            // return redirect()->route('dashboard');
            // return redirect()->intended('/dashboard');
        // }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting
            return redirect()->route('dashboard'); // harus redirect
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }


}
