@extends('layouts.app')

@section('title', '')

@section('content')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
		        <div class="panel-group category-products" id="accordian"><!--side-bar-->
		            <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4 class="panel-title"><a href="{{ route('users.edit') }}">My Account</a></h4>
                    <h4 class="panel-title"><a href="{{ route('orders.index') }}">My Orders</a></h4>
		              </div>
		            </div>
		        </div><!--/side-bar-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div>
						<h2 class="title text-center">Order ID: {{ $order->id }}</h2>

            <div class="shopper-info">

							<table class="table">
								<thead class="thead-light">
									<tr>
										<th scope="col">ORDER PLACED</th>
										<th scope="col">ORDER ID</th>
										<th scope="col">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>{{ $order->created_at }}</th>
										<td>{{ $order->id }}</td>
										<td>${{ $order->billing_total }}</td>
									</tr>
									<tr>
										<td>Name: {{ $order->billing_name }}</td>
									</tr>
									<tr>
										<td>Address: {{ $order->billing_address }}</td>
									</tr>
									<tr>
										<td>City: {{ $order->billing_city }}</td>
									</tr>
									<tr>
										<td>Phone: +{{ $order->billing_phone }}</td>
									</tr>
								</tbody>
							</table>
							<br>


							<table>
							  <col>
							  <col>
							  <colgroup span="3"></colgroup>
							  <thead>
							    <tr>
							      <th scope="col">ORDER ITEMS</th>
							    </tr>
							  </thead>
								@foreach ($order->products as $product)
								  <tbody>
								    <tr>
								      <td rowspan="3" scope="rowgroup"><a href="{{ route('shop.show', $product->id) }}">
													<img src="{{ URL::asset('storage/'.$product->image) }}" height="80" width="58" alt="Product image">
											</a></td>
								      <td scope="row"><a href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a></td>
								    </tr>
								    <tr>
								      <td scope="row">${{ $product->price }}</td>
								    </tr>
								    <tr>
								      <td scope="row">Quantity: {{ $product->pivot->quantity }}</td>
								    </tr>
								  </tbody>
								@endforeach




							</table>





							<br>
            </div>
						<br>
				</div>
			</div>
		</div>
	</section>
@endsection
