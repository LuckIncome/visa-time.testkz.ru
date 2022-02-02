<!-- Modal start -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
        <div class="feedback">
          <div class="description-big">
            <div>
              <div class="icon">
                <img src="{{ asset('assets/images/icons/call-msg.svg') }}" alt="icon">
              </div>
            </div>
            Остались вопросы?
          </div>
          <div class="text">
            Оставьте свой номер и наш менеджер перезвонит вам в течение часа и ответит на все волнующие вас вопросы.
          </div>
          <form id="subscribe" action="{{route('subscribe')}}" method="POST">
            <input type="text" placeholder="Номер телефона*" name="phone" required>
            <button type="submit" class="btn-orang">Перезвоните мне</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal end -->

<!-- Modal thanks start -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
        <div class="success">
          <i class="bi bi-check2-circle animate__animated animate__tada"></i>
          <div class="description-big">
            Спасибо! <br><br>
            Ваша заявка отправлена. <br>
            Мы свяжемся с вами в ближайшее время.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal thanks end -->