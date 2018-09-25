@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					@include('partials.left_sidebar')
				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img src="{{ URL::asset('images/products/' . $product->slug . '_xl.jpg') }}" alt="" height="380" width="198" />
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">
							  <!-- Wrapper for slides -->
							    <div class="carousel-inner">
										<div class="item active">
											@for ($i = 1; $i <= 3; $i++)
													<a href="#"><img src="{{ URL::asset('images/products/' . $product->slug . '_xl_' . $i . '.jpg') }}" alt="" height="60" width="60" /></a>
											@endfor
										</div>
									</div>
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
								<label>Quantity:</label>
								<input type="text" value="1" />

								<form action="{{ route('cart.store') }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{ $product->id }}" />
									<input type="hidden" name="name" value="{{ $product->name }}" />
									<input type="hidden" name="price" value="{{ $product->price }}" />
									<input type="hidden" name="slug" value="{{ $product->slug }}" />

									<button type="sumbit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</form>

							</span>

							<p><b>Availability:</b>
								@if ($product->is_available === 1)
									In Stock
								@else
									No Items
								@endif
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
