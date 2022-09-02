<footer class="footer">
    <div class="footer__main">
        <div class="container">
            <div class="footer__inner">
                <div class="footer__info">
                    <a href="@route('index')" class="footer__logo">
                        <img src="/assets/images/logo-main.svg" alt="">
                    </a>
                    <a href="{{ $setting->get('buybrand_phone')->tel() }}" class="footer__phone">
                        <img src="/assets/images/icons/icons-24-x-24-tel.svg" alt="icon" class="footer__phone-icon">
                        {{ $setting->get('buybrand_phone')->mask('+X XXX XXX-XX-XX')->get() }}
                    </a>
                    <div class="footer__socials">
                        @php
                            $socials = [
                                'twitter'   => 'icons-24-x-24-twitter',
                                'facebook'  => 'icons-24-x-24-f',
                                'vk'        => 'icons-24-x-24-vk',
                                'instagram' => 'icons-24-x-24-instagram',
                                'youtube'   => 'icons-24-x-24-y',
                            ];

                            $socials = collect($socials)->mapWithKeys(fn ($icon, $social) => [implode('_', [$setting->prefix(), $social]) => $icon])->all();
                        @endphp
                        @foreach ($socials as $social => $icon)
                            @if ($setting->has($social))
                                <a href="@setting($social)" target="_blank" class="footer__social-link">
                                    <img src="/assets/images/icons/{{ $icon }}.svg" alt="icon">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="footer__nav">
                    <div class="footer__col">
                        <div class="footer__name">Выставки</div>
                        <a href="#" class="footer__link">Retail</a>
                        <a href="#" class="footer__link">HoReCa</a>
                        <a href="#" class="footer__link">Услуги</a>
                        <a href="#" class="footer__link">Бренды</a>

                    </div>
                    <div class="footer__col">
                        <div class="footer__name">Медиаблок</div>
                        <a href="#" class="footer__link">Новости</a>
                        <a href="#" class="footer__link">Публикации</a>
                        <a href="#" class="footer__link">Видео</a>
                        <a href="#" class="footer__link">Эксперты</a>
                    </div>

                    <div class="footer__col">
                        <div class="footer__name">Сервисы</div>
                        <a href="#" class="footer__link">Консалтинг</a>
                        <a href="#" class="footer__link">Геолокация</a>
                        <a href="#" class="footer__link">Школа франчайзинга</a>
                        <a href="#" class="footer__link">Вакансии поставщики</a>
                    </div>
                    <div class="footer__col">
                        <div class="footer__name">Выставки</div>
                        <a href="#" class="footer__link">ByuBrand.ru 2021</a>
                        <a href="#" class="footer__link">Календарь мероприятий</a>
                        <a href="#" class="footer__link">On-line встречи</a>
                    </div>
                </div>
            </div>
            <div class="footer__wrapper">
                <div class="footer__app">
                    <div class="footer__label">@lang('Download App')</div>
                    <div class="footer__app-links">
                        <a href="@setting('buybrand_google_play')" target="_blank" class="footer__app-link">
                            <img src="/assets/images/google-play-badge-us.svg" alt="app">
                        </a>
                        <a href="@setting('buybrand_app_store')" target="_blank" class="footer__app-link">
                            <img src="/assets/images/app-store-badge-us-black.svg" alt="app">
                        </a>
                    </div>
                </div>
                <div class="footer__buttons">
                    <a href="#" class="button button--bordered-white footer__button">@lang('Website Advertising')</a>
                    <a href="#" class="button footer__button">@lang('Add Franchise')</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__container">
                <div class="footer__bottom-block">
                    <div class="footer__text">&copy; {{ config('app.name') }}, {{ date('Y') }}.</div>
                    <div class="footer__row footer__row--mt">
                        <img src="/assets/images/icons/icons-16-x-16-map.svg" alt="icon" class="footer__icon">
                        <div class="footer__text">@setting('buybrand_address')</div>
                    </div>
                </div>
                <div class="footer__bottom-block footer__bottom-block--md footer__bottom-block--hidden">
                    <div class="footer__row footer__row--start">
                        <img src="/assets/images/icons/12+.svg" alt="icon" class="footer__icon footer__icon--md">
                        <div class="footer__text">Сетевое издание Buybrand.ru зарегистрировано в Федеральной службе по
                            надзору в сфере связи, информационных технологий и массовых коммуникаций (Роскомнадзор) 15
                            августа 2019 года. Свидетельство о регистрации Эл № ФС77-76627. Полное или частичное
                            использование материалов сайта разрешено при условии указания гиперссылки на первоисточник.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>