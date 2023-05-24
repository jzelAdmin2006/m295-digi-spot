<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function findAll()
    {
        return Order::get();
    }

    public function create(Request $request)
    {
        $order = new Order();
        $order->fill($request->all());
        $order->save();
        return $order;
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->fill($request->all());
        $order->save();
        return $order;
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return $order;
    }
}
