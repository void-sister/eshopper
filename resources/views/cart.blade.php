@extends('layouts.app')

@section('title', 'Cart')

@section('content')
	<section id="cart_items">
		<div class="container">



			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>


			

			<div style="margin-bottom:10px;">
				<a class="btn btn-default update" href="{{ route('cart.clear') }}">Clear Cart</a>
			</div>



			@include('partials.cart')
	</section> <!--/#cart_items-->



	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ \Cart::getSubTotal() }}</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{ \Cart::getTotal() }}</span></li>
						</ul>
							<a class="btn btn-default update" href="{{ route('shop.index') }}">Back to Shop</a>
							<a class="btn btn-default check_out" href="{{ route('checkout.index') }}">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
