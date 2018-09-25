<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::inRandomOrder()->take(12)->get();

      return view('shop')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $recommended = Product::where('slug', '!=', $slug)->recommended()->get();

        return view('product-details')->with([
          'recommended' => $recommended,
          'product'=> $product,
        ]);
    }
}
