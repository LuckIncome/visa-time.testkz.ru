<section class="help @if($page->type == 'agency') mb-0 @endif">
  <img class="bg" src="{{ asset('assets/images/help-bg.jpg') }}" alt="bg">
  <div class="container">
    <div class="title-middle">
      <div class="icon">
        <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
      </div>
      @if($page->type == 'agency')
        Оставьте заявку на сотрудничество с Visa Time
      @else
        Нужна помощь в оформлении визы?
      @endif
    </div>
    <div class="description">
      Оставьте заявку и получите бесплатную консультацию нашего специалиста
    </div>
    <form id="feedback" action="{{route('feedback')}}" method="POST">
      <input type="text" placeholder="Ваше имя*" name="name" required>
      <input type="text" placeholder="Номер телефона*" name="phone" required>
      <input type="hidden" name="url" value="{{url()->current()}}">
      <button type="submit" class="btn-orang">Перезвоните мне</button>
    </form>
  </div>
</section>