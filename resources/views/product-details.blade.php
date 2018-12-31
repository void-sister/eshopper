@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section>
	<div class="container">
		<div class="row">

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img src="{{ URL::asset('storage/'.$product->image) }}" alt="{{ $product->name }}" height="380" width="198" />
						</div>

					</div>

					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<img src="{{ URL::asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
							<h2>{{ $product->name }}</h2>
							<p>Web ID: 1089772</p>
							<img src="{{ URL::asset('images/product-details/rating.png') }}" alt="" />
							<span>
								<span>US ${{ $product->price }}</span>
								@if ($product->quantity > 0)
									@include('partials.cart-store')
								@endif
							</span>
							<p><b>Availability:</b>
								{{ $stockLevel }}
							</p>
							<p><b>Condition:</b> New</p>
							<p><b>Brand:</b> E-SHOPPER</p>
							<a href=""><img src="{{ URL::asset('images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->



				@include('partials.recommended_items')

			</div>
		</div>
	</div>
</section>
@endsection
