<!DOCTYPE html>
<html lang="en">
  <head>
    @include('links.head_links')
    <title>500</title>
  </head>
  <body>

  <div class="container text-center">
		<div class="logo-404">
			<a href="/"><img src="{{ URL::asset('images/home/logo.png') }}" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="{{ URL::asset('images/404/500.png') }}" class="img-responsive" alt="" />
			<h2><a href="/">Bring me back Home</a></h2>
      <br>
		</div>
	</div>


  @include('links.js_links')
  <script src="js/price-range.js"></script>
  </body>
</html>
