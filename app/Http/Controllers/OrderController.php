<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function findAll()
    {
        return Order::get();
    }

    public function create(OrderRequest $request)
    {
        $order = new Order();
        $order->fill($request->all());
        $order->save();
        return $order;
    }

    public function update(OrderRequest $request, $id)
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
