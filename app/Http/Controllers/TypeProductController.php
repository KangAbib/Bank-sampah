<?php

namespace App\Http\Controllers;

use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    public function index()
    {
        $typeProducts = TypeProduct::all();
        return view('pages.typeProduk.index', compact('typeProducts'));
    }

    public function create()
    {
        return view('pages.typeProduk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeProduct::create($validatedData);

        return redirect()->route('typeproduct.index')->with('success', 'Type Product created successfully.');
    }

    public function edit(TypeProduct $typeproduct)
    {
        return view('pages.typeProduk.edit', compact('typeproduct'));
    }

    public function update(Request $request, TypeProduct $typeproduct)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeproduct->update($validatedData);

        return redirect()->route('typeproduct.index')->with('success', 'Type Product updated successfully.');
    }

    public function destroy(TypeProduct $typeproduct)
    {
        $typeproduct->delete();

        return redirect()->route('typeproduct.index')->with('success', 'Type Product deleted successfully.');
    }

    // buatkan function untuk menampilkan data tipeproduk return nya json
    public function showall()
    {
        $typeproduct = TypeProduct::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Tipe Produk',
            'data' => $typeproduct
        ]);
    }
}
