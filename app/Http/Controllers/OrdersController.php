<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders; // n+1 issue
        $orders = auth()->user()->orders()->with('products')->get(); // fix n+1 issue

        return view('my-orders')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() != $order->user_id) {
          return back()->withErrors('You do not have access to this!');
        }


        $products = $order->products;

        return view('my-order')->with([
          'order' => $order,
          'products' => $products,
        ]);
    }
}
