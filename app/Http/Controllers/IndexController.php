<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Order $order)
    {
        $bestsellers = $order->with('product')
                                ->orderBy('quantity', 'desc')
                                ->limit(4)->get();


        return view('index', compact('bestsellers'));
    }
}
