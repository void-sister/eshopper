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
