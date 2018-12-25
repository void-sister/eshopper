<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
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
      $pagination = 9;
      $categories = Category::all();

      if(request()->category) {
        $products = Product::with('categories')->whereHas('categories', function($query) {
          $query->where('slug', request()->category);
        });
        $categoryName = optional($categories->where('slug', request()->category)->first())->name;
      } else {
        $products = Product::where('is_available', true);
        $categoryName = 'Featured Items';
      }

      if (request()->sort == 'low_high') {
        $products = $products->orderBy('price')->paginate($pagination);
      }
      elseif (request()->sort == 'high_low') {
        $products = $products->orderBy('price', 'desc')->paginate($pagination);
      }
      else {
        $products = $products->paginate($pagination);
      }

      return view('shop')->with([
          'products'=> $products,
          'categories' => $categories,
          'categoryName' => $categoryName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $recommended = Product::where('id', '!=', $id)->recommended()->get();

        return view('product-details')->with([
          'recommended' => $recommended,
          'product'=> $product,
        ]);
    }

    public function update(Request $request, $id)
    {
      $validator = $request->validate([
        'quantity' => 'required|numeric|between:1,5'
      ]);

      $product = Product::where('id', $id)->firstOrFail();
      $product->quantity = $request->quantity;

      return response()->json(['success' => true]);

    }
}
