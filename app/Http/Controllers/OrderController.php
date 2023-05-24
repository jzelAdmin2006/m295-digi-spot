<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function findAll()
    {
        return OrderResource::collection(Order::get());
    }

    public function create(OrderRequest $request)
    {
        $order = new Order();
        $order->fill($request->all());
        $order->save();
        return OrderResource::make($order);
    }

    public function update(OrderRequest $request, $id)
    {
        $order = Order::find($id);
        $order->fill($request->all());
        $order->save();
        return OrderResource::make($order);
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return OrderResource::make($order);
    }
}
