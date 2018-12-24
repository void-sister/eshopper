<div class="mainmenu pull-left">
  <ul class="nav navbar-nav collapse navbar-collapse">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a></li>
    @endforeach
  </ul>
</div>
