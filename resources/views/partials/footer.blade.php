<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <div class="footer__city">
        <div class="big-content content">
          <a class="footer__name">Шенген виза</a>
          {{menu('schengen_visa_menu', 'vendor.voyager.menu.footer_visa')}}
        </div>
        <div class="content">
          <div class="content-item">
            <a class="footer__name">Виза в америку</a>
            {{menu('america_visa_menu', 'vendor.voyager.menu.footer_visa')}}
          </div>
          <div class="content-item">
            <a class="footer__name">Виза в африку</a>
            {{menu('africa_visa_menu', 'vendor.voyager.menu.footer_visa')}}
          </div>
          <div class="content-item">
            <a class="footer__name">Виза в Океанию</a>
            {{menu('oceania_visa_menu', 'vendor.voyager.menu.footer_visa')}}
          </div>
        </div>
        <div class="content">
          <a class="footer__name">Виза в европу</a>
          {{menu('europe_visa_menu', 'vendor.voyager.menu.footer_visa')}}
        </div>
        <div class="content">
          <a class="footer__name">Виза в азию</a>
          {{menu('asia_visa_menu', 'vendor.voyager.menu.footer_visa')}}
        </div>
      </div>
      <div class="footer__city footer__city-mobile">
        <div class="accordion items" id="accordionFooter">

          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-1" aria-expanded="false">
                <div class="footer__name">
                  Шенген виза
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-1" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('schengen_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-2" aria-expanded="false">
                <div class="footer__name">
                  Виза в америку
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-2" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('america_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-3" aria-expanded="false">
                <div class="footer__name">
                  Виза в африку
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-3" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('africa_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-4" aria-expanded="false">
                <div class="footer__name">
                  Виза в Океанию
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-4" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('oceania_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-5" aria-expanded="false">
                <div class="footer__name">
                  Виза в европу
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-5" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('europe_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-6" aria-expanded="false">
                <div class="footer__name">
                  Виза в азию
                </div>
                <i class="bi bi-chevron-down"></i>
              </button>
            </div>
            <div id="collapseTwo-6" class="accordion-collapse collapse"  data-bs-parent="#accordionFooter">
              <div class="accordion-body">
                {{menu('asia_visa_menu', 'vendor.voyager.menu.footer_visa')}}
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="contact">
        <div class="footer__name">
          контактная информация
        </div>
        <div class="item">
          <div class="footer__description">
            Телефон:
          </div>
          <a href="tel:{{$phone->link}}" class="footer__text">
            {{$phone->value}}
          </a>
        </div>
        <div class="item">
          <div class="footer__description">
            Адрес:
          </div>
          <div class="footer__text">
            {{$adress->value}}
          </div>
        </div>
        <div class="item">
          <div class="footer__description">
            E-mail:
          </div>
          <a href="mailto:{{$email->value}}" class="footer__text">
            {{$email->value}}
          </a>
        </div>
        
          <div class="item net">
            <div class="footer__description">
              Соц.сети:
            </div>
            <div class="">
              @foreach($socials as $social)
              <a href="{{$social->link}}" class="footer__text">
                <img src="{{Voyager::image($social->icon)}}" alt="{{$social->value}}">
              </a>
              @endforeach
            </div>
          </div>
          
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer-text">
        © «VisaTime.kz». 2021, Все права защищены
      </div>
      <a href="/politic">Политика конфиденциальности</a>
      <a href="https://i-marketing.kz" class="logo">
        <img src="{{ asset('assets/images/logo-im.svg') }}" alt="IMARKETING">
      </a>
    </div>
  </div>
</footer>