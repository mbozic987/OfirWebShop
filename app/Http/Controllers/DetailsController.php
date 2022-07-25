<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function show(Product $product)
    {
        if($product->id == null){
            $product = Product::first();
            return view('details.show', compact('product'));

        }else{
            return view('details.show', compact('product'));

        }
    }
}
