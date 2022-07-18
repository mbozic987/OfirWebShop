<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrdersController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'product_id'=>'required',
            'quantity' => 'required',
            'client' => 'required'
        ]);

        $order = new Order();
        $order->product_id = $data['product_id'];
        $order->quantity = $data['quantity'];
        $order->client = $data['client'];

        if($order->save()){
            return redirect()->route('notification.success');
        }else{
            return redirect()->route('notification.error');
        }
    }
}
