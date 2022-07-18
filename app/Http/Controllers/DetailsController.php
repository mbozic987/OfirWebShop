<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index()
    {
        $product = Product::first();

        return view('details.index', compact('product'));
    }

    public function show(Product $product)
    {
        return view('details.show', compact('product'));
    }
}
