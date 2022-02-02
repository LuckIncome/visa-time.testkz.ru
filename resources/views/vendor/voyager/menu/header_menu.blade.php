<ul class="menu">
  @php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
  @endphp
  @foreach ($items as $item)
  @php

      $originalItem = $item;
      if (Voyager::translatable($item)) {
          $item = $item->translate($options->locale);
      }

      $isActive = null;
      $styles = null;
      $icon = null;

      // Background Color or Color
      if (isset($options->color) && $options->color == true) {
          $styles = 'color:'.$item->color;
      }
      if (isset($options->background) && $options->background == true) {
          $styles = 'background-color:'.$item->color;
      }

      // Check if link is current
      if(url($item->link()) == url()->current() || \Str::contains(url()->current(),$item->link())){
          $isActive = 'active';
      }

  @endphp 
  @if(!$originalItem->children->isEmpty())  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="{{ url($item->link()) }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{ $item->title }}
    </a>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
      @foreach ($originalItem->children as $child)
      <li><a class="dropdown-item" href="{{ url($child->link()) }}">{{ $child->title }}</a></li>
      @endforeach
    </ul>
  </li>
  @else 
    <li><a href="{{ url($item->link()) }}">{{ $item->title }}</a></li>
  @endif
  @endforeach
</ul>