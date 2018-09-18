<!DOCTYPE html>
<html lang="en">
    <head>
      @include('links.head_links')
      <title>@yield('title') | E-Shopper</title>
    </head>
    <body>
      @include('partials.header')

      <div class="container">
          @yield('content')
      </div>

      @include('partials.footer')

      @include('links.js_links')
    </body>
</html>
