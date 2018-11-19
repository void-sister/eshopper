<?php

namespace App\Http\Controllers;

use Validator;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $cart = \Cart::getContent();
      // dd($cart);
      return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Cart::add(array(
          'id' => $request->id,
          'name' => $request->name,
          'price' => $request->price,
          'quantity' => 1,
          // 'attributes' => array(
          //   'slug' => $request->slug,
          // )
        ));

        return redirect()->route('cart.index');
    }

    /**
     * Clear the cart.
     */
    public function empty()
    {
        \Cart::clear();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = $request->validate([
        'quantity' => 'required|numeric|between:1,5'
      ]);

        \Cart::update($id, [
          'quantity' => [
            'relative' => false,
            'value' => $request->quantity
          ],
        ]);

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

        return back();
    }
}
