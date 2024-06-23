<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);

        $pelanggan = Pelanggan::where('username', $request->username)->first();

        if (!$pelanggan || !Hash::check($request->password, $pelanggan->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect'],
            ]);
        }

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->intended(route('katalog.index'));
    }



    public function logout(Request $request)
    {

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');
    }

}
