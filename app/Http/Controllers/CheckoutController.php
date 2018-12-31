<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
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
        if (auth()->user() && request()->is('guestCheckout')) {
          return redirect()->route('checkout.index');
        }

        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CheckoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
      $contents = \Cart::getContent()->map(function ($item) {
        return $item->id.','.$item->quantity;
      })->values()->toJson();

      try {
        \Stripe\Stripe::setApiKey("sk_test_iP3Vaiq9q4d5ORVbnnMR43o4");

        $charge = \Stripe\Charge::create([
          "amount" => (\Cart::getTotal()+\Cart::getTotalQuantity()*2)*100,
          "currency" => "usd",
          "source" => $request->stripeToken,
          "receipt_email" => $request->email,
          "description" => "Charge for ". $request->email,
          "metadata" => [
            'contents' => $contents,
            'quantity' => \Cart::getTotalQuantity(),
            ],
        ]);

        $this->addToOrdersTables($request, null);

        \Cart::clear();

        return redirect()->route('confirmation.index')->with('success_message', 'Thank you! ');
      } catch (\Stripe\Error\Card $e) {
        return back()->withErrors('Error!', $e->getMessage());
      } catch (Exception $e) {
        $this->addToOrdersTables($request, $e->getMessage());
        return view('errors.500');
      }
    }

    protected function addToOrdersTables($request, $error)
    {
      //insert into orders table
      $order = Order::create([
        'user_id' => auth()->user() ? auth()->user()->id : null,
        'billing_email' => $request->email,
        'billing_name' => $request->name,
        'billing_address' => $request->address,
        'billing_city' => $request->city,
        'billing_province' => $request->province,
        'billing_phone' => $request->phone,
        'billing_name_on_card' => $request->name_on_card,
        'billing_total' => $charge->amount,
        'error' => $error,
      ]);



      //insert into order_product table
      foreach (\Cart::getContent() as $item) {
        OrderProduct::create([
          'order_id' => $order->id,
          'product_id' => $item->id,
          'quantity' => $item->quantity,
        ]);
      }
    }
}
