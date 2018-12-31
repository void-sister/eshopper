@extends('layouts.app')

@section('title', 'Search results')

@section('content')
<section>
	<div class="container">
		<div class="row">

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->

					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<h1>Search Results</h1>
							<p>{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>

							<table class="table table-striped">
							  <thead>
							    <tr>
							      <th scope="col">Name</th>
							      <th scope="col">Price</th>
							      <th scope="col">Image</th>
							      <th scope="col">Actions</th>
							    </tr>
							  </thead>
							  <tbody>
									@foreach ($products as $product)
								    <tr>
								      <th scope="row"><a href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a></th>
								      <td>${{ $product->price }}</td>
								      <td>Image</td>
								      <td>@include('partials.cart-store')</td>
								    </tr>
							    @endforeach
							  </tbody>
							</table>

							{{ $products->appends(request()->input())->links() }}

						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->

			</div>
		</div>
	</div>
</section>
@endsection
