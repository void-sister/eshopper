<header id="header"><!--header-->
  <div class="header_top"><!--header_top-->
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contactinfo">
            <ul class="nav nav-pills">
              <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
              <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="social-icons pull-right">
            <ul class="nav navbar-nav">
              <li><a href=""><i class="fa fa-facebook"></i></a></li>
              <li><a href=""><i class="fa fa-twitter"></i></a></li>
              <li><a href=""><i class="fa fa-linkedin"></i></a></li>
              <li><a href=""><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!--/header_top-->

  <div class="header-middle"><!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="logo pull-left">
            <a href="/"><img src="{{ URL::asset('images/home/logo.png') }} " alt="" /></a>
          </div>
          <div class="btn-group pull-right">
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                USA
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="">Canada</a></li>
                <li><a href="">UK</a></li>
              </ul>
            </div>

            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                DOLLAR
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="">Canadian Dollar</a></li>
                <li><a href="">Pound</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="shop-menu pull-right">
            <ul class="nav navbar-nav">
              <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
              @guest
                <li><a href="{{ route('register') }}"><i class="fa fa-check"></i> Sign Up</a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
              @else
                <li><a href="{{ route('users.edit') }}"><i class="fa fa-user"></i> Account</a></li>
                <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="fa fa-times-circle"></i> Logout
                  </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                  {{ csrf_field() }}
                </form>
              @endguest




            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!--/header-middle-->

  <div class="header-bottom"><!--header-bottom-->
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          {{ menu('main', 'menus.main') }}
        </div>
        <div class="col-sm-3">
          <form action="{{ route('search') }}" method="GET" class="search_box pull-right">
            <input type="text" name="query" id="query" value="{{ request()->input('query') }}" placeholder="Search"/>
          </form>
        </div>
      </div>
    </div>
  </div><!--/header-bottom-->
</header><!--/header-->
