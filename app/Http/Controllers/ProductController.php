<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $dataproducts = Product::with('typeProduct')->paginate(10);
        $types = TypeProduct::all();
        return view('pages.Produk.index', compact('dataproducts', 'types'));
    }

    public function create()
    {
        $types = TypeProduct::all();
        return view('pages.produk.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarName = basename($gambarPath);
        } else {
            $gambarName = 'default.png';
        }

        $product = new Product([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'tipe' => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarName,
        ]);

        $product->save();

        return redirect()->route('products.index')->with('Success', 'Data Berhasil Ditambahkan!');
    }

    public function show($product)
    {
        $dataproduct = Product::findOrFail($product);
        if (!$dataproduct) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($dataproduct);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $types = TypeProduct::all(); // Misalnya, Anda mendapatkan data tipe produk untuk form

        return view('pages.Produk.update', compact('product', 'types'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
                'tipe' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'image|max:255', // Hilangkan required agar tidak wajib diunggah
            ]);

            // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete('gambar/' . $product->gambar);

            // Simpan gambar yang baru diunggah
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $gambarName = basename($gambarPath);
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar yang sudah ada sebelumnya
            $gambarName = $product->gambar;
        }

            $product->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'tipe' => $request->tipe,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarName,
            ]);

            return redirect()->route('products.index')->with(['success' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['Error' => $e->getMessage()]);
        }
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }

    public function showproduk()
    {
        $product = Product::all();
        return response()->json($product);
    }
}
