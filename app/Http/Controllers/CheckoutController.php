<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
      $contents = \Cart::getContent()->map(function ($item) {
        return $item->id.','.$item->quantity;
      })->values()->toJson();

      try {
        \Stripe\Stripe::setApiKey("sk_test_iP3Vaiq9q4d5ORVbnnMR43o4");

        $charge = \Stripe\Charge::create(array(
          "amount" => \Cart::getTotal()*100,
          "currency" => "usd",
          "source" => $request->stripeToken,
          "receipt_email" => $request->email,
          "description" => "Charge for ". $request->email,
          "metadata" => [
            'contents' => $contents,
            'quantity' => \Cart::getTotalQuantity(),
            ],
        ));

        \Cart::clear();

        return redirect()->route('confirmation.index')->with('success_message', 'Thank you! ');
      } catch (\Stripe\Error\Base $e) {
        return back()->withErrors('Error!', $e->getMessage());
      } catch (Exception $e) {
        return view('errors.500');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
