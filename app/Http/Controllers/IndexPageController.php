<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('is_available', true)->inRandomOrder()->take(6)->get();
        $recommended = Product::recommended()->get();

        return view('index')->with([
          'recommended' => $recommended,
          'products'=> $products,
        ]);
    }
}
