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


			{{-- <div>
				<form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
					{{ csrf_field() }}
					<h2>Billing Details</h2>

					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email" name="email" value="">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address" value="">
					</div>
					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" value="">
					</div>
					<div class="form-group">
						<label for="province">Province</label>
						<input type="text" class="form-control" id="province" name="province" value="">
					</div>
					<div class="form-group">
						<label for="zip">Postal Code</label>
						<input type="text" class="form-control" id="zip" name="zip" value="">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone" name="phone" value="">
					</div>

					<h2>Payment Details</h2>

					<div class="form-group">
						<label for="name_on_card">Name on Card</label>
						<input type="text" name="name_on_card" id="name_on_card" class="form-control" value="">
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
					<button>Submit Payment</button>
				</form>
			</div> --}}

			<div class="shopper-info">
				<div class="row">
				<form action="{{ route('checkout.store') }}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="test_public_key" id="payment-form" method="post">
	    		{{ csrf_field() }}
	    		<div class='form-row'>
	        	<div class='col-xs-12 form-group required'>
	            <label class='control-label'>Name on Card</label>
							<input class='form-control' size='4' type='text'>
	        	</div>
	    		</div>
	    		<div class='form-row'>
	        	<div class='col-xs-12 form-group card required'>
	            	<label class='control-label'>Card Number</label>
								<input autocomplete='off' class='form-control card-number' size='20' type='text'>
	        	</div>
	    		</div>
	    		<div class='form-row'>
	        	<div class='col-xs-4 form-group cvc required'>
	            	<label class='control-label'>CVC</label>
								<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
	        	</div>
	        	<div class='col-xs-4 form-group expiration required'>
	            <label class='control-label'>Expiration</label>
							<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
	        	</div>
	        	<div class='col-xs-4 form-group expiration required'>
	            <label class='control-label'> </label>
							<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
	        	</div>
	    		</div>
	    		<div class='form-row'>
	        	<div class='col-md-12 form-group'>
	            <button class='form-control btn btn-primary submit-button' type='submit' style="margin-top: 10px;">Pay »</button>
	        	</div>
	    		</div>
	    		<div class='form-row'>
	        	<div class='col-md-12 error form-group hide'>
	            <div class='alert-danger alert'>Please correct the errors and try again.</div>
	        	</div>
	    		</div>
				</form>
			</div>
			</div>


			<div class="review-payment">
				<h2>Review & Payment</h2>
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


			<div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection

@section('extra-js')
	<script>
		(function(){
			// Create a Stripe client.
			var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

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
