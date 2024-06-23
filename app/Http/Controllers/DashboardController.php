<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pickup;
use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $typeProductsCount = TypeProduct::count();
        $pelangganCount = Pelanggan::count();
        $pickupCount = Pickup::count();
        $pemesananCount = Pemesanan::count();
        return view('pages.Dashboard.index', compact('productsCount', 'typeProductsCount', 'pelangganCount', 'pickupCount', 'pemesananCount'));
    }

}


