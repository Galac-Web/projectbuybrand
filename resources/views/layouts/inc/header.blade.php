<header class="header">
    <div class="container">
        <div class="header__inner">

            <div class="header__box">
                <a href="@route('index')" class="logo logo--main header__logo"></a>
                <div class="header__position">
                    {{ session('city', 'Москва') }}
                    <img src="/assets/images/icons/gps.svg" alt="gps" class="header__position-icon">
                </div>
                @if (multilanguage()->enabled())
                <div class="header__item">
                    <img src="/assets/images/icons/language.svg" alt="language" class="header__icon">
                    <div class="header__select">
                        <form action="@route('switch-language')" method="POST" id="switch_language">
                            <select name="language" id="" class="header__language" onchange="document.getElementById('switch_language').submit()">
                                @foreach ($languages as $language)
                                <option value="{{ $language->slug }}" @selected($language->slug === session('language'))>{{ str()->upper($language->slug) }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                @endif
            </div>

            <div class="header__wrapper">
                <div class="header__info">
                    <img src="/assets/images/icons/museum.svg" alt="museum" class="header__info-icon">
                    <span>22-24 сентября</span>
                    <p>@lang('Franchises Exhibition')</p>
                </div>

                <div class="header__item-wrapper">
                    <a href="#" class="header__item">
                        <img src="/assets/images/icons/directory.svg" alt="directory" class="header__icon">
                        <p>@lang('Help Center')</p>
                    </a>
                    <a href="#" class="header__item">
                        <img src="/assets/images/icons/forum.svg" alt="forum" class="header__icon">
                        <p>@lang('Forum')</p>
                    </a>
                </div>


                <div class="header__buttons">
                    <a href="#" class="header__button">
                        <img src="/assets/images/icons/star-of-favorites-outline.svg" alt="star">
                        <span class="header__notification">1</span>
                    </a>
                    <a href="#" class="header__button">
                        <img src="/assets/images/icons/comparison.svg" alt="comparison">
                        <span class="header__notification">12</span>
                    </a>
                </div>
                <div class="header__container">

                    @auth
                    <a href="javascript:void(0)" class="header__user">
                        <div class="header__user-name">{{ auth()->user()->name }}</div>
                        <img src="{{ auth()->user()->getAvatar(50, '/assets/images/icons/user.svg') }}" alt="user" class="header__user-photo">
                        <div class="header__arrow"></div>
                    </a>
                    @else
                    <a href="@route('login')" class="header__button header__button--pl header__button-auth">@lang('Login | Registration')</a>
                    @endauth

                    <div class="menu header__menu">
                        <button class="menu__button"></button>
                        <div class="menu__list">
                            <a href="#" class="menu__link">@lang('Rating')</a>
                            <a href="#" class="menu__link">@lang('Catalog')</a>
                            <a href="#" class="menu__link">@lang('Social Network')</a>
                            <a href="#" class="menu__link">@lang('Media Block')</a>
                            <a href="#" class="menu__link">@lang('Services')</a>
                            <a href="#" class="menu__link">@lang('Exhibition')</a>
                            <a href="#" class="menu__link">@lang('Help Center')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mob-menu">
    <div class="mob-menu__inner">
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Рейтинг
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>
            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Каталог
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Соцсеть
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Медиаблок
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Сервисы
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Выставка
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
        <div class="mob-menu__box">
            <button href="#" class="mob-menu__section">
                <div class="mob-menu__arrow"></div>
                Справочный центр
            </button>
            <div class="mob-menu__list">
                <a href="#" class="mob-menu__link">Консалтинг</a>
                <a href="#" class="mob-menu__link">Геолокация</a>
                <a href="#" class="mob-menu__link">Школа франчайзинга</a>
                <a href="#" class="mob-menu__link">Вакансии</a>
                <a href="#" class="mob-menu__link">Поставщики</a>

            </div>
        </div>
    </div>

    <a href="@route('franchise.add')" class="button mob-menu__button">@lang('Add Franchise')</a>
</div>
<div class="info-panel">
    <div class="container">
        <div class="info-panel__inner">
            <a href="@route('index')" class="logo info-panel__logo"></a>
            <div class="info-panel__box">
                <div class="info-panel__wrapper">
                    <div class="search">
                        <form action="@route('search')" method="GET">
                            <input class="search__input" name="q" type="text" placeholder="@lang('Franchises Search')" autocomplete="off">
                            <button class="search__button">
                                <img src="/assets/images/icons/loupe.svg" alt="loupe" class="search__icon">
                            </button>
                        </form>
                    </div>
                    <!--                    <div class="info-panel__tags">-->
                    <!--                        <a href="#" class="info-panel__tag">Всего франшиз: <span>125</span></a>-->
                    <!--                        <a href="#" class="info-panel__tag">Horeca </a>-->
                    <!--                        <a href="#" class="info-panel__tag">Услуги </a>-->
                    <!--                        <a href="#" class="info-panel__tag">Продажи</a>-->
                    <!--                        <a href="#" class="info-panel__tag">Рестораны</a>-->
                    <!--                        <a href="#" class="info-panel__tag">Мастер-франшиза</a>-->
                    <!--                    </div>-->
                </div>
                <a href="@route('franchise.add')" class="button info-panel__btn">@lang('Add Franchise')</a>

                @role('admin')
                <a href="@route('dashboard.main')" target="_blank" class="button info-panel__btn" style="margin-left: 1rem;">@lang('Dashboard')</a>
                @endrole
            </div>
        </div>
    </div>
</div>
<nav class="nav">
    <div class="container">
        <div class="nav__inner">
            <div class="nav__wrapper">
                <a href="@route('rating.index')" @class(['nav__link', 'active' => has_controller('RatingController')])>@lang('Rating')</a>
                <div class="nav__menu tabs-wrapper">
                    <div class="nav__tabs">
                        <button class="nav__tab active" data-tab-target="#rating-services">
                            Услуги
                            <div class="nav__arrow"></div>
                        </button>
                        <button class="nav__tab" data-tab-target="#rating-horeca">
                            Horeca
                            <div class="nav__arrow"></div>
                        </button>
                        <button class="nav__tab" data-tab-target="#rating-retail">
                            Retail
                            <div class="nav__arrow"></div>
                        </button>
                    </div>
                    <div class="tab-content active" data-tab-content id="rating-services">
                        <div class="nav__content">
                            <div class="nav__info">
                                <table class="info-table">
                                    <tr>
                                        <td style="width: 5%;">
                                            <div class="info-table__number">1</div>
                                        </td>
                                        <td style="width: 8%;">
                                            <img src="/assets/images/logos/helix@2x.png" alt="logo"
                                                 class="info-table__logo">
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="info-table__name">Лабораторная служба Хеликс</div>
                                        </td>
                                        <td style="width: 18%;">
                                            <div class="info-table__row info-table__row--mr">
                                                <div class="sm-chart"></div>
                                                <div class="info-table__text">160.70</div>
                                            </div>
                                        </td>
                                        <td style="width: 12%;">
                                            <div class="info-table__text info-table__text--end info-table__text--mr info-table__text--green">
                                                +60.01
                                            </div>
                                        </td>
                                        <td style="width: 9%;">
                                            <div class="info-table__row  info-table__row--end">
                                                <img src="/assets/images/icons/triangle-green.svg" alt=""
                                                     class="info-table__icon">
                                                <div class="info-table__text info-table__text--green">30%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">
                                            <div class="info-table__number info-table__number--green">2</div>
                                        </td>
                                        <td style="width: 8%;">
                                            <img src="/assets/images/logos/sushiwok@2x.png" alt="logo"
                                                 class="info-table__logo">
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="info-table__name">Суши Wok</div>
                                        </td>
                                        <td style="width: 18%;">
                                            <div class="info-table__row info-table__row--mr">
                                                <div class="sm-chart"></div>
                                                <div class="info-table__text">110.42</div>
                                            </div>
                                        </td>
                                        <td style="width: 12%;">
                                            <div class="info-table__text info-table__text--end info-table__text--mr info-table__text--red">
                                                -30.0
                                            </div>
                                        </td>
                                        <td style="width: 9%;">
                                            <div class="info-table__row  info-table__row--end">
                                                <img src="/assets/images/icons/triangle-red.svg" alt=""
                                                     class="info-table__icon">
                                                <div class="info-table__text info-table__text--red">30%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">
                                            <div class="info-table__number info-table__number--olive">3</div>
                                        </td>
                                        <td style="width: 8%;">
                                            <img src="/assets/images/logos/lab@2x.png" alt="logo"
                                                 class="info-table__logo">
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="info-table__name">
                                                Лабораторная служба Хеликс
                                                <div class="info-table__badges">
                                                    УВ
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 18%;">
                                            <div class="info-table__row info-table__row--mr">
                                                <div class="sm-chart"></div>
                                                <div class="info-table__text">110.42</div>
                                            </div>
                                        </td>
                                        <td style="width: 12%;">
                                            <div class="info-table__text info-table__text--end info-table__text--mr info-table__text--green">
                                                +60.01
                                            </div>
                                        </td>
                                        <td style="width: 9%;">
                                            <div class="info-table__row  info-table__row--end">
                                                <img src="/assets/images/icons/triangle-green.svg" alt=""
                                                     class="info-table__icon">
                                                <div class="info-table__text info-table__text--green">30%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">
                                            <div class="info-table__number info-table__number--blue">4</div>
                                        </td>
                                        <td style="width: 8%;">
                                            <img src="/assets/images/logos/sushiwok@2x.png" alt="logo"
                                                 class="info-table__logo">
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="info-table__name">Суши Wok</div>
                                        </td>
                                        <td style="width: 18%;">
                                            <div class="info-table__row info-table__row--mr">
                                                <div class="sm-chart"></div>
                                                <div class="info-table__text">110.42</div>
                                            </div>
                                        </td>
                                        <td style="width: 12%;">
                                            <div class="info-table__text info-table__text--end info-table__text--mr info-table__text--red">
                                                -30.0
                                            </div>
                                        </td>
                                        <td style="width: 9%;">
                                            <div class="info-table__row  info-table__row--end">
                                                <img src="/assets/images/icons/triangle-red.svg" alt=""
                                                     class="info-table__icon">
                                                <div class="info-table__text info-table__text--red">30%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%;">
                                            <div class="info-table__number info-table__number--green">5</div>
                                        </td>
                                        <td style="width: 8%;">
                                            <img src="/assets/images/logos/helix@2x.png" alt="logo"
                                                 class="info-table__logo">
                                        </td>
                                        <td style="width: 45%;">
                                            <div class="info-table__name">Лабораторная служба Хеликс</div>
                                        </td>
                                        <td style="width: 18%;">
                                            <div class="info-table__row info-table__row--mr">
                                                <div class="sm-chart"></div>
                                                <div class="info-table__text">160.70</div>
                                            </div>
                                        </td>
                                        <td style="width: 12%;">
                                            <div class="info-table__text info-table__text--end info-table__text--mr info-table__text--green">
                                                +60.01
                                            </div>
                                        </td>
                                        <td style="width: 9%;">
                                            <div class="info-table__row  info-table__row--end">
                                                <img src="/assets/images/icons/triangle-green.svg" alt=""
                                                     class="info-table__icon">
                                                <div class="info-table__text info-table__text--green">30%</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <a href="#" class="button button--blue nav__button">Добавить компанию в рейтинг</a>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content id="rating-horeca">
                        2
                    </div>
                    <div class="tab-content" data-tab-content id="rating-retail">
                        3
                    </div>

                </div>
            </div>
            <div class="nav__wrapper">
                <a href="@route('franchise-catalog.index')" @class(['nav__link', 'active' => has_controller('FranchiseController') || has_controller('FranchiseCatalogController')])>@lang('Catalog')</a>
                <div class="nav__menu tabs-wrapper">
                    <div class="nav__tabs">
                        <button class="nav__tab active" data-tab-target="#services">
                            Услуги
                            <div class="nav__arrow"></div>
                        </button>
                        <button class="nav__tab" data-tab-target="#horeca">
                            Horeca
                            <div class="nav__arrow"></div>
                        </button>
                        <button class="nav__tab" data-tab-target="#retail">
                            Retail
                            <div class="nav__arrow"></div>
                        </button>
                    </div>
                    <div class="tab-content active" data-tab-content id="services">
                        <div class="nav__content" >
                            <div class="nav__info nav__info--bg">
                                <div class="swiper swiper-nav-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="franchise-card franchise-card--small">
                                                <div class="franchise-card__box">
                                                    <img src="/assets/images/img-1@2x.png" alt="img" class="franchise-card__img">
                                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                                </div>
                                                <div class="franchise-card__inner">
                                                    <div class="franchise-card__title">AMM DIGITAL-Франшиза международного digital-агентства
                                                        Agency Media Marketing
                                                    </div>
                                                    <div class="franchise-card__price">
                                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                                             class="franchise-card__price-icon">
                                                        Менее 500 000 руб.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="franchise-card franchise-card--small">
                                                <div class="franchise-card__box">
                                                    <img src="/assets/images/img-1@2x.png" alt="img" class="franchise-card__img">
                                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                                </div>
                                                <div class="franchise-card__inner">
                                                    <div class="franchise-card__title">AMM DIGITAL-Франшиза международного digital-агентства
                                                        Agency Media Marketing
                                                    </div>
                                                    <div class="franchise-card__price">
                                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                                             class="franchise-card__price-icon">
                                                        Менее 500 000 руб.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="franchise-card franchise-card--small">
                                                <div class="franchise-card__box">
                                                    <img src="/assets/images/img-1@2x.png" alt="img" class="franchise-card__img">
                                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                                </div>
                                                <div class="franchise-card__inner">
                                                    <div class="franchise-card__title">AMM DIGITAL-Франшиза международного digital-агентства
                                                        Agency Media Marketing
                                                    </div>
                                                    <div class="franchise-card__price">
                                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                                             class="franchise-card__price-icon">
                                                        Менее 500 000 руб.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="franchise-card franchise-card--small">
                                                <div class="franchise-card__box">
                                                    <img src="/assets/images/img-1@2x.png" alt="img" class="franchise-card__img">
                                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                                </div>
                                                <div class="franchise-card__inner">
                                                    <div class="franchise-card__title">AMM DIGITAL-Франшиза международного digital-агентства
                                                        Agency Media Marketing
                                                    </div>
                                                    <div class="franchise-card__price">
                                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                                             class="franchise-card__price-icon">
                                                        Менее 500 000 руб.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tabs">
                                    <div class="tabs__item tabs__item--white">Для городов-миллионнииков</div>
                                    <div class="tabs__item tabs__item--white">IT-услуги</div>
                                    <div class="tabs__item tabs__item--white">Окупаемость до 1 года</div>
                                    <div class="tabs__item tabs__item--white">Вложения до 1 млн. руб.</div>
                                </div>

                                <button class="button button--blue nav__select-btn">Выбрать франшизу</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content id="horeca">
                        <div class="nav__content">
                            horeca
                        </div>
                    </div>
                    <div class="tab-content" data-tab-content id="retail">
                        <div class="nav__content">
                            retail
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="nav__link">@lang('Social Network')</a>
            <a href="@route('media.index')" @class(['nav__link', 'active' => has_controller('MediaController')])>@lang('Media Block')</a>
            <a href="@route('services.index')" @class(['nav__link', 'active' => has_controller('ServiceController')])>@lang('Services')</a>
            <a href="#" class="nav__link">@lang('Exhibition')</a>
            <a href="@route('help.index')" @class(['nav__link', 'active' => has_controller('HelpController')])>@lang('Help Center')</a>
        </div>
    </div>
</nav>