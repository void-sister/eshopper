<!DOCTYPE html>
<html lang="en">
    <head>
      @include('links.head_links')
      @yield('extra-css')
      <title>@yield('title') | E-Shopper</title>
    </head>
    <body>
      @include('partials.header')


      <div class="container">
          @include('partials.messages')
          @yield('content')
      </div>

      @include('partials.footer')

      @include('links.js_links')
      @yield('extra-js')
    </body>
</html>
