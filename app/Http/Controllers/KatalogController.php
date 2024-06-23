<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\Customer; // Ubah sesuai dengan model Customer yang sesuai di aplikasi Anda

class KatalogController extends Controller
{
    // Fungsi untuk menampilkan halaman katalog dengan produk
    public function index()
    {
        $products = Product::with('typeProduct')->paginate(4);
        $types = TypeProduct::all();
        return view('pages.katalog.index', compact('products'));
    }

    // Fungsi untuk mendapatkan informasi produk berdasarkan ID
    public function show($id)
    {
        $dataproduct = Product::find($id);
        if(!$dataproduct){
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($dataproduct);
    }
    public function getPelangganInfo()
    {
        $pelanggan = Pelanggan::where('id', auth()->id())->first(); // Ubah sesuai dengan model dan relasi pelanggan di aplikasi Anda
        return response()->json($pelanggan);
    }
}
