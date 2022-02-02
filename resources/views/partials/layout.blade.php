<!DOCTYPE html>
<html lang="ru">
  @include('partials.head')
<body>
  <vue id="app" ref="infoBox">       
    @include('partials.header')
    <main> 
      @yield('content')
    </main>
    @include('partials.footer')
    @include('partials.modals')
  </vue>
  @include('partials.scripts')
  @yield('scripts')
</body>
</html>