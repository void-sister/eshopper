<!DOCTYPE html>
<html lang="en">
  <head>
    @include('links.head_links')
    <title>Thank You</title>
  </head>
  <body>

  <div class="container text-center">
		<div class="logo-404">
			<a href="/"><img src="{{ URL::asset('images/home/logo.png') }}" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="{{ URL::asset('images/cart/thank_you.png') }}" class="img-responsive" alt="" />
			<h2><a href="{{ route('shop.index') }}">Continue shopping</a></h2>
      <br>
		</div>
	</div>


  @include('links.js_links')
  <script src="js/price-range.js"></script>
  </body>
</html>
