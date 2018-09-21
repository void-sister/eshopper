<div class="recommended_items"><!--recommended_items-->
  <h2 class="title text-center">recommended items</h2>
  <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">

        @foreach ($recommended as $product)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
              <a href="{{ route('shop.show', $product->slug) }}" class="productinfo text-center">
                <img src="{{ URL::asset('images/products/' . $product->slug . '_xl.jpg') }}" alt="" weight="268" height="134" />
                <h2>${{ $product->price }}</h2>
                <p>{{ $product->name }}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div><!--/recommended_items-->
