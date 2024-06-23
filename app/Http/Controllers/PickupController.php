<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PickupController extends Controller
{
    public function index()
    {
        $pickup = Pickup::with('typeProduct')->get();
        return view('pages.pickup.index', compact('pickup'));
    }

    public function pickup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'tanggal_penjemputan' => 'required',
            'alamat' => 'required',
            'catatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pickup = Pickup::create([
            'fullname' => $request->fullname,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'tanggal_penjemputan' => $request->tanggal_penjemputan,
            'alamat' => $request->alamat,
            'catatan' => $request->catatan,
        ]);

        return response()->json($pickup, 201);
    }

    // buatkan function untuk menampilkan semua data pickup yang return json
    public function show()
    {
        $pickup = Pickup::all();
        // benarkan json nya yg lebih bagus

        return response()->json([
            'status' => 'success',
            'message' => 'Data pickup berhasil ditampilkan',
            'data' => $pickup
        ]);
    }

    public function sumHarga()
    {
        $sumHargaPerPelanggan = Pickup::select(
            'fullname',
            'alamat',
            'tanggal_penjemputan',
            'tipe',
            'berat',
            DB::raw('sum(harga) as pendapatan')
        )
            ->groupBy('fullname', 'alamat', 'tanggal_penjemputan', 'tipe', 'berat')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Pendapatan dari setiap pelanggan',
            'data' => $sumHargaPerPelanggan
        ]);
    }
}
