<header class="header">
  <div class="header__menu">
    <div class="container">
      {{menu('header_menu','vendor.voyager.menu.header_menu')}}     
    </div>
  </div>
  <div class="header__content">
    <div class="container">

      <button class="menuToggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="bi bi-list"></i>
      </button>

      <div class="content">
        <a href="/" class="logo">
          <img src="{{Voyager::image(setting('site.header_logo'))}}" alt="visa time">
        </a>

        <div class="item">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/online.svg') }}" alt="icon">
          </div>
          <div class="info">
            <div class="header-text">{{setting('site.online')}}</div>
          </div>
        </div>
        <div class="item">
          <div class="icon">
            <img src="{{ asset('assets/images/icons/geo.svg') }}" alt="icon">
          </div>
          <div class="info">
            <div class="header-name">Мы находимся:</div>
            <div class="header-text">{{setting('site.city')}}</div>
            <a href="/contacts#maps" class="toggleModal">Схема проезда</a>
          </div>
        </div>

      </div>
      
      <div class="feedback">
        <a href="tel:{{setting('site.link_header_phone')}}" class="icon">
          <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
        </a>
        <div class="info">
          <div class="header-name">Наш номер:</div>
          <a href="tel:{{setting('site.link_header_phone')}}" class="header-text">{{setting('site.header_phone')}}</a>
          <div class="toggleModal" data-bs-toggle="modal" data-bs-target="#feedbackModal">Перезвоните мне</div>
        </div>
      </div>

      <a href="tel:{{setting('site.link_header_phone')}}" class="mobile-feedback">
        <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
      </a>

    </div>
  </div>
</header>
      
<header class="header-mobile offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <a href="/" class="logo">
      <img src="{{Voyager::image(setting('site.header_logo'))}}" alt="visa time">
    </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">   
    <div class="item">
      <div class="icon">
        <img src="{{ asset('assets/images/icons/online-white.svg') }}" class="online-white" alt="icon">
      </div>
      <div class="info">
        <div class="header-text">{{setting('site.online')}}</div>
      </div>
    </div>
    <div class="item">
      <div class="icon">
        <img src="{{ asset('assets/images/icons/geo-white.svg') }}" alt="icon">
      </div>
      <div class="info">
        <div class="header-name">Мы находимся:</div>
        <div class="header-text">{{setting('site.city')}}</div>
        <div class="toggleModal">Схема проезда</div>
      </div>
    </div>

    <div class="item">
      <div class="icon">
        <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
      </div>
      <div class="info">
        <div class="header-name">Наш номер:</div>
        <a class="header-text" href="tel:{{setting('site.link_header_phone')}}">{{setting('site.header_phone')}}</a>
        <div class="toggleModal">Перезвоните мне</div>
      </div>
    </div>

    {{menu('header_menu','vendor.voyager.menu.mobile_header_menu')}} 
   
    
  </div>
</header>