@isset ($light)
<div class="best-materials">
    <div class="container">
        <div class="best-materials__inner">
            <div class="title title--md best-materials__title">Лучшие материалы недели и дайджест 1 раз в месяц
                от экспертов франчайзинга BUYBRAND.RU
            </div>
            <form action="@route('mail.subscribe')" method="POST" class="best-materials__form" id="mail_subscribe_form">
                @csrf
                <input type="email" name="email" type="text" class="input input--white best-materials__input" placeholder="@lang('Enter your E-Mail')" autocomplete="off" required>
                <button class="button button--blue best-materials__button">@lang('Subscribe')</button>
            </form>
            <div class="best-materials__text">Мы против спама. Вы в любой момент можете отписаться от рассылки
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="subscribe">
        <div class="subscribe__title">Лучшие материалы недели и дайджест 1 раз в месяц от экспертов франчайзинга
            BUYBRAND.RU
        </div>
        <div class="subscribe__text">Нажимая кнопку «Подписаться» вы соглашаетесь с <a href="" class="subscribe__link">условиями
            использования сервиса</a>
            и обработки персональных данных.
        </div>
        <form action="@route('mail.subscribe')" method="POST" class="subscribe__box" id="mail_subscribe_form">
            @csrf
            <input type="email" name="email" class="input subscribe__input" autocomplete="off" placeholder="@lang('Enter your E-Mail')" required>
            <button class="button button--blue subscribe__button">@lang('Subscribe')</button>
        </form>
    </div>
</div>
@endisset

@push('scripts')
    <script>
        $('#mail_subscribe_form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                error: r => {
                    let errors = r.responseJSON.errors;

                    alert(errors.email[0]);
                },
                success: r => {
                    if (r.status === 'success') {
                        alert(r.message);
                    }
                }
            });
        });
    </script>
@endpush