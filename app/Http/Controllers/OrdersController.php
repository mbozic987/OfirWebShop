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
            'quantity' => 'required|regex:/^[1-9]\d*$/',
            'user_id' => 'required',
        ]);

        $order = new Order();
        $order->product_id = $data['product_id'];
        $order->quantity = $data['quantity'];
        $order->user_id = $data['client_id'];

        if($order->save()){
            return redirect()->route('notification.success');
        }else{
            return redirect()->route('notification.error');
        }
    }
}
