<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Order $order)
    {
        $query = "select name, price, image, product_id, sum(quantity) as total
                   from orders,products
                   where orders.product_id=products.id
                   group by name, price, image, product_id
                   order by sum(quantity) desc
                   limit 4;";
        $bestsellers = DB::select(DB::raw($query));

        return view('index', compact('bestsellers'));
    }
}
