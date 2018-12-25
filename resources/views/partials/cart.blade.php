<div class="table-responsive cart_info">
	<table class="table table-condensed">
		<thead>
			<tr class="cart_menu">
				<td class="image">Item</td>
				<td class="description"></td>
				<td class="price">Price</td>
				<td class="quantity">Quantity</td>
				<td class="total">Total</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			@foreach(\Cart::getContent() as $item)
			<tr>
				<td class="cart_product">
					<a href="{{ route('shop.show', $item->id) }}"><img src="" alt="item"></a>
				</td>
				<td class="cart_description">
					<h4><a href='{{ route('shop.show', $item->id) }}'>{{ $item->name }}</a></h4>
					<p>Web ID: 1089772</p>
				</td>
				<td class="cart_price">
					<p>${{ $item->price }}</p>
				</td>
				<td class="cart_quantity">

					<div class="cart_quantity_button">
						<input class="cart_quantity_input" data-id="{{ $item->id }}" id="cart_quantity_input" type="text" name="quantity" value="{{ $item->quantity }}" autocomplete="off" size="2">
					</div>
				</td>

				<td class="cart_total">
					<p class="cart_total_price">${{ \Cart::get($item->id)->getPriceSum() }}</p>
				</td>

				<td class="cart_delete">
					<form action="{{ route('cart.destroy', $item->id) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="cart_quantity_delete" type="submit"><i class="fa fa-times"></i></button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@section('extra-js')
	@parent
	<script src="{{ asset('js/app.js') }}"></script>
	<script>

	(function(){
		const classname = document.querySelectorAll('.cart_quantity_input')
		Array.from(classname).forEach(function(element) {
			element.addEventListener('change', function() {
				const id = element.getAttribute('data-id')
				axios.patch(`/cart/${id}`, {
			    quantity: this.value
			  })
			  .then(function (response) {
			    // console.log(response);
					window.location.href = '{{ route('cart.index') }}'
			  })
			  .catch(function (error) {
			    // console.log(error);
					window.location.href = '{{ route('cart.index') }}'
			  });
			})
		})
	})();
	</script>
@endsection
