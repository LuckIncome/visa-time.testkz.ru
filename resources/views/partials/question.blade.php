<div class="feedback">
  <div class="description-big">
    <div class="icon">
      <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
    </div>
    Остались вопросы?
  </div>
  <div class="text">
    Оставьте свой номер и наш менеджер перезвонит вам в течение часа и ответит на все волнующие вас вопросы.
  </div>
  <form id="question" action="{{route('subscribe')}}" method="POST">
    <input type="text" placeholder="Номер телефона*" name="phone" required>
    <button type="submit" class="btn-orang">Перезвоните мне</button>
  </form>
</div>