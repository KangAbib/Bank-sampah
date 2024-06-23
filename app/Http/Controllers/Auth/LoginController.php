<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pelanggan;
use App\Models\Resepsionis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi dan login pengguna
        $credentials = $request->only('username', 'password');

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $redirectTo = $request->session()->get('redirectTo', route('katalog.index'));
            return redirect()->intended($redirectTo);
        }

        return redirect()->back()->withErrors(['username' => 'Invalid credentials.']);
    }


    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Logged out successfully!');
    }

    public function showLoginForm()
    {
        return view('pages.auth.pelanggan.login');
    }

    public function index()
    {
        return view('pages.auth.pelanggan.login');
    }

    public function __construct()
    {
        $this->middleware('guest:pelanggan')->except('logout');
    }

}
