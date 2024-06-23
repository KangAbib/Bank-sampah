<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::paginate(4);

        return view('pages.landingPage.welcome', compact('products'));
    }
}
