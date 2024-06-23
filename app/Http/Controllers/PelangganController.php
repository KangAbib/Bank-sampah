<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;


class PelangganController extends Controller
{
        public function login(Request $request)
        {
            // Validate the request inputs
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:8'
            ]);

            // Find the pelanggan by username
            $pelanggan = Pelanggan::where('username', $request->username)->first();

            // Check if the pelanggan exists and if the password is correct
            if (!$pelanggan || !Hash::check($request->password, $pelanggan->password)) {
                throw ValidationException::withMessages([
                    'username' => ['The provided credentials are incorrect'],
                ]);
            }

            // Return a successful response
            return response()->json([
                'message' => 'Login success',
                'success' => true,
                'pelanggan' => $pelanggan

            ]);
        }
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pages.pelanggan.index', compact('pelanggan'));
    }

    public function register(Request $request)
    {
        // Validate the request inputs
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:pelanggan',
            'password' => 'required|min:8',
            'fullname' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'kota' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new pelanggan
        $pelanggan = Pelanggan::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kota' => $request->kota,
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Registration successful',
            'success' => true,
            'data' => [
                'pelanggan' => $pelanggan
            ]
        ], 201);
    }
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        return response()->json([
            'message' => 'Success',
            'success' => true,
            'pelanggan' => $pelanggan
        ]);
    }

    public function tampilpelanggan()
    {
        $pelanggan = Pelanggan::all();
        return response()->json([
            'message' => 'Success',
            'success' => true,
            'pelanggan' => $pelanggan
        ]);
    }

    // buatkan function untuk edit validate nya juga
    public function edit(Request $request, $id)
{
    try {
        // Validate the request inputs
        $request->validate([
            'fullname' => 'required|string',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'kota' => 'required|string',
        ]);

        // Find the pelanggan by ID
        $pelanggan = Pelanggan::find($id);

        // Check if pelanggan exists
        if (!$pelanggan) {
            return response()->json([
                'message' => 'Pelanggan not found',
                'success' => false,
            ], 404); // Not Found
        }

        // Update the pelanggan's fields
        $pelanggan->fullname = $request->fullname;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->kota = $request->kota;
        $pelanggan->save();

        // Return a success response
        return response()->json([
            'message' => 'Update successful',
            'success' => true,
            'pelanggan' => $pelanggan
        ]);
    } catch (\Exception $e) {
        // Return an error response
        return response()->json([
            'message' => 'Failed to update pelanggan',
            'error' => $e->getMessage(),
            'success' => false,
        ], 500); // Internal Server Error
    }
}


}
