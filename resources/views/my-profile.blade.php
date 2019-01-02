@extends('layouts.app')

@section('title', 'My Account')

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
						<h2 class="title text-center">My Account</h2>

            <div class="shopper-info">
              <form action="{{ route('users.update') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <input type="text" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}" required>

                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>

                <input id="password" type="password" name="password" placeholder="Password">
                <label>Leave password blank to keep current password</label>
                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">


                <input type="text" id="address" name="address" placeholder="Address" value="{{ old('address', $user->address) }}">
                <input type="text" id="city" name="city" placeholder="City" value="{{ old('city', $user->city) }}">
                @include('partials.countries-list')
                <input type="text" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone) }}">

                <button type="submit" id="complete-order" class="btn btn-primary">Update Profile</button>
              </form>
            </div>

            <br>

				</div>
			</div>
		</div>
	</section>
@endsection
