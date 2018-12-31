@component('mail::message')

# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }} <br>
**Total:** ${{ round($order->billing_total / 100, 2) }}

**Items Ordered**

@foreach ($order->products as $product)
  Name: {{ $product->name }} <br>
  Price: ${{ round($product->price / 100, 2) }} <br>
  Quantity: {{ $product->pivot->quantity }} <br>
  <br>
@endforeach

You can get further details about your order by logging into our webside.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
  Go To Eshopper
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}

@endcomponent
