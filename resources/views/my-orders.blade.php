@extends('layouts.app')

@section('title', 'My Orders')

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
						<h2 class="title text-center">My Orders</h2>

            <div class="shopper-info">

              @foreach ($orders as $order)

								<table class="table">
								  <thead class="thead-light">
								    <tr>
								      <th scope="col" rowspan="2">ORDER PLACED</th>
								      <th scope="col" rowspan="2">ORDER ID</th>
								      <th scope="col" rowspan="2">TOTAL</th>
								      <th scope="col" rowspan="2"><a href="{{ route('orders.show', $order->id) }}">Order Details</a></th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td>{{ $order->created_at }}</th>
								      <td>{{ $order->id }}</td>
								      <td>${{ $order->billing_total }}</td>
								    </tr>

										@foreach ($order->products as $product)
											<tr>
												<td><a href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a></td>
												<td><a href="{{ route('shop.show', $product->id) }}">
														<img src="{{ URL::asset('storage/'.$product->image) }}" height="80" width="58" alt="Product image">
												</a></td>
											</tr>
										@endforeach

										<br>
								  </tbody>

								</table>
								<br>

							@endforeach

            </div>


				</div>
			</div>
		</div>
	</section>
@endsection
