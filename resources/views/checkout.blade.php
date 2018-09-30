@extends('layouts.app')

@section('title', 'Checkout')

@section('extra-css')
	<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-info">
				<p>Shipment Details</p>
				<form action="{{ route('checkout.store') }}" method="POST" id="payment-form" data-stripe-publishable-key="test_public_key">
					{{ csrf_field() }}

					<input type="email" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
					<input type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
					<input type="text" id="address" name="address" placeholder="Address" value="{{ old('address') }}">
					<input type="text" id="city" name="city" placeholder="City" value="{{ old('city') }}">
					@include('partials.countries-list')
					<input type="text" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">

					<p>Payment Details</p>

					<div class="form-group">
						<label for="name_on_card">Name on Card</label>
						<input type="text" name="name_on_card" id="name_on_card" class="form-control" value="{{ old('name_on_card') }}">
					</div>

					<div class="form-group">
						<label for="card-element">
					      Credit or debit card
					    </label>
					    <div id="card-element">
					      <!-- A Stripe Element will be inserted here. -->
					    </div>

					    <!-- Used to display form errors. -->
					    <div id="card-errors" role="alert"></div>
					</div>
					<button type="submit" id="complete-order" class="btn btn-primary">Submit Payment</button>
				</form>
			</div>

			<div class="review-payment">
				<h2>Review Cart</h2>
			</div>

			@include('partials.cart')
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>${{ \Cart::getSubTotal() }}</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{ \Cart::getTotal() }}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection

@section('extra-js')
	<script>
	(function(){
		// Create a Stripe client.
		var stripe = Stripe('pk_test_c0ZPRTbnMi3o24TDPTdz8TIz');

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
			base: {
				color: '#32325d',
				lineHeight: '18px',
				fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
				fontSmoothing: 'antialiased',
				fontSize: '16px',
				'::placeholder': {
					color: '#aab7c4'
				}
			},
			invalid: {
				color: '#fa755a',
				iconColor: '#fa755a'
			}
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.addEventListener('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
		});

		// Handle form submission.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
			event.preventDefault();

			//Disable the submit button to prevent repeated clicks
			document.getElementById('complete-order').disabled = true;

			var options = {
				name: document.getElementById('name_on_card').value,
				address_line1: document.getElementById('address').value,
				address_city: document.getElementById('city').value,
				address_state: document.getElementById('province').value,
				address_zip: document.getElementById('zip').value
			}

			stripe.createToken(card, options).then(function(result) {
				if (result.error) {
					// Inform the user if there was an error.
					var errorElement = document.getElementById('card-errors');
					errorElement.textContent = result.error.message;

					//Enable the submit button
					document.getElementById('complete-order').disabled = false;

				} else {
					// Send the token to your server.
					stripeTokenHandler(result.token);
				}
			});
		});

		function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var form = document.getElementById('payment-form');
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
		}
	})();
	</script>
@endsection
