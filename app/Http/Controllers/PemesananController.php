<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        try {
            $pemesanan = Pemesanan::with('pelanggan', 'produk')->get();

            return view('pages.pemesanan.index', compact('pemesanan'));
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }


    public function buatPemesanan(Request $request, $id)
    {
        // Cek apakah pengguna telah login menggunakan guard pelanggan
        if (!Auth::guard('pelanggan')->check()) {
            return redirect()->route('login.index')->with('error', 'Anda harus login terlebih dahulu untuk melakukan pemesanan.');
        }

        try {
            $product = Product::findOrFail($id);

            // Dapatkan data pelanggan yang sedang login
            $pelanggan = Auth::guard('pelanggan')->user();

            // Simpan data pesanan ke dalam database
            $pemesanan = Pemesanan::create([
                'id_pelanggan' => $pelanggan->id,
                'id_produk' => $product->id,
                'harga' => $product->harga,
                'tipe' => $product->typeProduct->name, // Asumsikan ada relasi ke tipe produk
                'deskripsi' => $product->deskripsi,
                'gambar' => $product->gambar,
                'telepon' => $pelanggan->telepon,
                'kota' => $pelanggan->kota,
                'alamat' => $pelanggan->alamat,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Pemesanan berhasil dibuat',
                'data' => $pemesanan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // buatkan function untuk menampilkan data pemesanan yang return json
    public function showPemesanan()
    {
        try {
            $pemesanan = Pemesanan::with('pelanggan', 'produk')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data pemesanan berhasil ditampilkan',
                'data' => $pemesanan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function viewHistory()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        $pemesanan = Pemesanan::where('id_pelanggan', $pelanggan->id)->get();

        return view('pages.pelanggan.history', compact('pemesanan'));
    }
    public function updateStatus($id, $status)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->status = $status;
            $pemesanan->save();

            return redirect()->route('pemesanan.index')->with('success', 'Status pemesanan berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('pemesanan.index')->with('error', 'Terjadi kesalahan saat mengupdate status pemesanan.');
        }
    }
}
