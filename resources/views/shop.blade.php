@extends('layouts.app')

@section('title', 'Shop')

@section('content')
	<section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">

						<h2>Category</h2>
		        <div class="panel-group category-products" id="accordian"><!--category-products-->
		          @foreach ($categories as $category)
		            <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4 class="panel-title"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></h4>
		              </div>
		            </div>
		          @endforeach
		        </div><!--/category-products-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--featured_items-->
						<h2 class="title text-center">{{ $categoryName }}</h2>

						<div>
							<strong>Price: </strong>
							<a href="{{ route('shop.index', ['category'=> request()->category, 'sort'=> 'low_high']) }}">Low to High</a> |
							<a href="{{ route('shop.index', ['category'=> request()->category, 'sort'=> 'high_low']) }}">High to Low</a>
						</div>
						<br>


					  @forelse($products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{ route('shop.show', $product->slug) }}"><img src="images/products/{{ $product->slug }}_xl.jpg" alt="{{ $product->name }}" /></a>
										<h2>${{ $product->price }}</h2>
										<a href="{{ route('shop.show', $product->slug) }}"><p><b>{{ $product->name }}</b></p></a>
										@include('partials.cart-store')
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					@empty
						<div>No items found</div>
					@endforelse
					</div><!--features_items-->

					<div class="spacer"></div>
					{{ $products->appends(request()->input())->links() }}

				</div>


			</div>
		</div>
	</section>
@endsection
