<!DOCTYPE html>
<html lang="en">
  <head>
    @include('links.head_links')
    <title>404</title>
  </head>
  <body>

  <div class="container text-center">
		<div class="logo-404">
			<a href="/"><img src="{{ URL::asset('images/home/logo.png') }}" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="{{ URL::asset('images/404/404.png') }}" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
			<p>Uh... So it looks like something is broken. The page you are looking for vanished.</p>
			<h2><a href="/">Bring me back Home</a></h2>
      <br>
		</div>
	</div>


  @include('links.js_links')
  <script src="js/price-range.js"></script>
  </body>
</html>
