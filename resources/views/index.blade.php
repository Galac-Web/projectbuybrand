@extends('layouts.app')

@section('content')
<div class="ticker">
    <div class="container">
        <div class="ticker__inner">
            <div class="ticker__info">
                <div class="ticker__row">
                    <div class="ticker__text">@lang('Franchises Rating')</div>
                    <div class="ticker__circle">
                        <svg class="ticker__icon" viewBox="0 0 4 19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 4.184c.496 0 .912-.172 1.248-.516.336-.344.504-.764.504-1.26 0-.48-.168-.892-.504-1.236A1.675 1.675 0 0 0 2 .656c-.48 0-.896.172-1.248.516a1.667 1.667 0 0 0-.528 1.236c0 .496.176.916.528 1.26.352.344.768.516 1.248.516zM3.32 18.8v-12H.68v12h2.64z"
                                  fill="currentColor" fill-rule="nonzero"/>
                        </svg>

                    </div>
                </div>
                <div class="ticker__row">
                    <div class="ticker__text">@lang('Community Members'): <span>15 000</span></div>
                </div>
            </div>

            <div class="swiper ticker-slider ticker__wrapper">
                <div class="swiper-wrapper ticker__wrapper-inner">
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">
                                        <div class="ticker__stat-icon"></div>
                                        -0,20
                                    </div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text ticker__stat-text--green">
                                        <div class="ticker__stat-icon ticker__stat-icon--green"></div>
                                        -0,20
                                    </div>
                                    <div class="ticker__stat-text ticker__stat-text--green">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text ticker__stat-text--green">
                                        <div class="ticker__stat-icon ticker__stat-icon--green"></div>
                                        -0,20
                                    </div>
                                    <div class="ticker__stat-text ticker__stat-text--green">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">Москва</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ticker__item">
                            <div class="ticker__box">
                                <div class="ticker__text">FXP</div>
                                <div class="ticker__text">end</div>
                            </div>
                            <div class="ticker__container">
                                <div class="ticker__text">207.8</div>
                                <div class="ticker__stat">
                                    <div class="ticker__stat-text">-0,20</div>
                                    <div class="ticker__stat-text">-0.1%</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<div class="analytics">
    <div class="container">
        <div class="swiper analytics-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="analytics__inner">
                        <div class="analytics__box">
                            <div class="title title--white analytics__title"><span>Геоаналитика –</span> GEOWOW</div>
                            <div class="analytics__text">
                                Оцените локацию под свой бизнес с доступным профессиональным инструментом.
                            </div>

                            <div class="analytics__place">
                                <img src="/assets/images/place.svg" class="analytics__place-img">
                                <div class="analytics__place-box">
                                    <div class="analytics__place-text">Правильно выбранная локация (место размещения) – гарантирует
                                        60% успеха бизнеса.
                                    </div>
                                    <a href="#" class="button button--bordered-white analytics__place-button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="analytics__grade">
                            <div class="title title--white title--large analytics__grade-title">Что включает оценка локации:</div>
                            <ul class="analytics__grade-list">
                                <li>Данные по трафику в локации</li>
                                <li>Расположение относительно конкурентов</li>
                                <li>Зоны охвата при открытии точки</li>
                                <li>Отчет о распределении ретейла и услуг в конкретном районе</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="analytics__inner">
                        <div class="analytics__box">
                            <div class="title title--white analytics__title"><span>Франчайзинг</span> и бизнес</div>
                            <div class="analytics__text">
                                Компания EMTG – это команда профессионалов, специализирующаяся на мероприятиях формата B2B с 2002 года.
                            </div>

                            <div class="analytics__place">
                                <img src="/assets/images/place2.svg" class="analytics__place-img analytics__place-img--md">
                                <div class="analytics__place-box">
                                    <div class="analytics__place-text">Eдинственный в России профессиональный информационный ресурс, полностью посвященный франчайзингу
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="analytics__grade">
                            <div class="analytics__grade-list">
                                <div class="analytics__block">
                                    <div class="analytics__row">
                                        <div class="analytics__num">2 820</div>
                                        <div class="analytics__name"> БРЕНДОВ</div>
                                    </div>
                                    <div class="analytics__desc analytics__desc--md">
                                        50+ СТРАН ПРИНЯЛИ УЧАСТИЕ В НАШИХ ПРОЕКТАХ
                                    </div>
                                </div>
                                <div class="analytics__block">
                                    <div class="analytics__row">
                                        <div class="analytics__num">46</div>
                                    </div>
                                    <div class="analytics__desc analytics__desc--md">
                                        международных выставок
                                    </div>
                                </div>
                                <div class="analytics__block">
                                    <div class="analytics__row">
                                        <div class="analytics__num">> 161 400</div>
                                    </div>
                                    <div class="analytics__desc analytics__desc--md">
                                        ЧЕЛОВЕК СО ВСЕГО МИРА ПОСЕТИЛИ НАШИ ОФЛАЙН И ОНЛАЙН МЕРОПРИЯТИЯ
                                    </div>
                                </div>
                                <div class="analytics__block">
                                    <div class="analytics__row">
                                        <div class="analytics__num">18 000+</div>
                                    </div>
                                    <div class="analytics__desc analytics__desc--md">
                                        ФРАНЧАЙЗИНГОВЫХ ПРЕДПРИЯТИЙ ОТКРЫЛИСЬ БЛАГОДАРЯ НАШИМ МЕРОПРИЯТИЯМ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="analytics__inner">
                        <div class="analytics__box">
                            <div class="title title--white analytics__title"><span>Геоаналитика –</span> GEOWOW3</div>
                            <div class="analytics__text">
                                Оцените локацию под свой бизнес с <br> доступным профессиональным <br> инструментом.
                            </div>

                            <div class="analytics__place">
                                <img src="/assets/images/place.svg" class="analytics__place-img">
                                <div class="analytics__place-box">
                                    <div class="analytics__place-text">Правильно выбранная локация (место размещения) – гарантирует
                                        60% успеха бизнеса.
                                    </div>
                                    <a href="#" class="button button--bordered-white analytics__place-button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="analytics__grade">
                            <div class="title title--white title--large analytics__grade-title">Что включает оценка локации:</div>
                            <ul class="analytics__grade-list">
                                <li>Данные по трафику в локации</li>
                                <li>Расположение относительно конкурентов</li>
                                <li>Зоны охвата при открытии точки</li>
                                <li>Отчет о распределении ретейла и услуг в конкретном районе</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="analytics__inner">
                        <div class="analytics__box">
                            <div class="title title--white analytics__title"><span>Геоаналитика –</span> GEOWOW4</div>
                            <div class="analytics__text">
                                Оцените локацию под свой бизнес с <br> доступным профессиональным <br> инструментом.
                            </div>

                            <div class="analytics__place">
                                <img src="/assets/images/place.svg" class="analytics__place-img">
                                <div class="analytics__place-box">
                                    <div class="analytics__place-text">Правильно выбранная локация (место размещения) – гарантирует
                                        60% успеха бизнеса.
                                    </div>
                                    <a href="#" class="button button--bordered-white analytics__place-button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                        <div class="analytics__grade">
                            <div class="title title--white title--large analytics__grade-title">Что включает оценка локации:</div>
                            <ul class="analytics__grade-list">
                                <li>Данные по трафику в локации</li>
                                <li>Расположение относительно конкурентов</li>
                                <li>Зоны охвата при открытии точки</li>
                                <li>Отчет о распределении ретейла и услуг в конкретном районе</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="analytics__grid">
            <div class="analytics__item slider-1 active">
                <div class="analytics__circle">
                    <img src="/assets/images/icons/place.svg" alt="icon" class="analytics__icon">
                </div>
                <div class="analytics__wrapper">
                    <div class="analytics__name">Геолокация</div>
                    <div class="analytics__desc">
                        Подбор места открытия бизнес-точки
                    </div>
                </div>
            </div>
            <div class="analytics__item slider-2">
                <div class="analytics__circle">
                    <img src="/assets/images/icons/exhibition.svg" alt="icon" class="analytics__icon">
                </div>
                <div class="analytics__wrapper">
                    <div class="analytics__name">Выставки</div>
                    <div class="analytics__desc">
                        Все выставки франшиз: 23
                    </div>
                </div>
            </div>
            <div class="analytics__item slider-3">
                <div class="analytics__circle">
                    <img src="/assets/images/icons/case.svg" alt="icon" class="analytics__icon">
                </div>
                <div class="analytics__wrapper">
                    <div class="analytics__name">Вакансии</div>
                    <div class="analytics__desc">
                        300+ вакансий и 1000 соискателей
                    </div>
                </div>
            </div>
            <div class="analytics__item slider-4">
                <div class="analytics__circle">
                    <img src="/assets/images/icons/shout.svg" alt="icon" class="analytics__icon">
                </div>
                <div class="analytics__wrapper">
                    <div class="analytics__name">Реклама на сайте</div>
                    <div class="analytics__desc">
                        100 000+ уникальных посетителей
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="franchise-catalog">
    <div class="container">

        <div class="title title--center mb-md">@lang('Franchises Catalog')</div>

        <div class="tabs-wrapper">

            <div class="wrap-tabs">
                <div class="tabs franchise-catalog__tabs">
                    @foreach ($franchises->presets as $preset)
                    <div @class(['tabs__item', 'active' => $loop->first]) data-tab-target="#{{ $preset->slug }}">
                        {{ $preset->name }}
                    </div>
                    @endforeach
                </div>
            </div>

            @foreach ($franchises->presets as $preset)
            <div @class(['tabs__info', 'active' => $loop->first]) id="{{ $preset->slug }}" data-tab-content>
                @if ($loop->first)
                <div class="swiper slider-catalog swiper-catalog">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-children-s.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Детские франшизы</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-fast-food.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Фастфуд</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-clothing.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Одежда и обувь</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-production.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Производство</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-children-s.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Детские франшизы</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-fast-food.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Фастфуд</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-clothing.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Одежда и обувь</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-72-x-72-franchise-production.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Производство</div>
                            </a>
                        </div>
                    </div>
                    <div class="slider-bottom-panel">
                        <a href="@route('franchise-catalog.index')" class="button button--bordered-blue">
                            В каталог франшиз
                            <img src="/assets/images/icons/icons-arrow-next.svg" alt="arrow" class="button__icon">
                        </a>

                        <div class="arrows-slider">
                            <button class="arrows-slider__button arrows-slider__button--prev swiper-catalog-prev">
                                <div class="arrows-slider__icon"></div>
                            </button>
                            <button class="arrows-slider__button swiper-catalog-next">
                                <div class="arrows-slider__icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
                @else
                <p>{{ $preset->name }}</p>
                @endif
            </div>
            @endforeach
        </div>

    </div>
</div>

<div class="new-franchises">
    <div class="container">
        <div class="title title--center mb-md">@lang('New Franchises')</div>
        <div class="swiper slider-new-franchises">
            <div class="swiper-wrapper">
                @foreach ($franchises->items as $franchise)
                <div class="swiper-slide">
                    @include('franchise-catalog.partials.items.small')
                </div>
                @endforeach
            </div>
            <div class="slider-bottom-panel">
                <a href="@route('franchise-catalog.index', ['sort' => 'latest'])" class="button button--bordered-blue">
                    @lang('See All')
                    <img src="/assets/images/icons/icons-arrow-next.svg" alt="arrow" class="button__icon">
                </a>

                <div class="arrows-slider">
                    <button class="arrows-slider__button arrows-slider__button--prev slider-new-franchises-prev">
                        <div class="arrows-slider__icon"></div>
                    </button>
                    <button class="arrows-slider__button slider-new-franchises-next">
                        <div class="arrows-slider__icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="franchise-community">
    <div class="container">
        <div class="title title--center mb-md">Франчайзинговое сообщество</div>

        <div class="franchise-community__inner">
            <div class="tabs-wrapper franchise-community__box">
                <div class="tabs-bordered franchise-community__tabs">
                    <div class="tabs-bordered__tab active" data-tab-target="#favorites">
                        <img src="/assets/images/icons/icons-24-x-24-favorites-2.svg" alt="icon"
                             class="tabs-bordered__icon">
                        Избранное
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#popular">
                        <img src="/assets/images/icons/icons-24-x-24-popular.svg" alt="icon"
                             class="tabs-bordered__icon">
                        Популярное
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#expert-opinion">
                        <img src="/assets/images/icons/icons-24-x-24-expert.svg" alt="icon"
                             class="tabs-bordered__icon">
                        Экспертное мнение
                    </div>
                </div>

                <div class="tab-content active" id="favorites" data-tab-content>
                    <div class="franchise-community__elements">
                        <div class="swiper community-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avator@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Актуальная подборка франшиз на лето
                                                2021</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/icons/icons-32-x-32-user.svg" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avatar-man@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avator@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Актуальная подборка франшиз на лето
                                                2021</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/icons/icons-32-x-32-user.svg" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avatar-man@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avator@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Актуальная подборка франшиз на лето
                                                2021</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/icons/icons-32-x-32-user.svg" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avatar-man@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avator@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Актуальная подборка франшиз на лето
                                                2021</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/icons/icons-32-x-32-user.svg" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avatar-man@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avator@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Актуальная подборка франшиз на лето
                                                2021</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/icons/icons-32-x-32-user.svg" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="community-post">
                                        <div class="community-post__date">23.08.2021</div>
                                        <div class="community-post__box">
                                            <img src="/assets/images/avatar-man@2x.png" alt="avatar"
                                                 class="community-post__img">
                                            <a href="#" class="community-post__title">Подкаст с экспертом. Франчайзинг - все
                                                за и против</a>
                                        </div>
                                        <div class="community-post__wrapper">
                                            <div class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-views-2.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text">1457</div>
                                            </div>
                                            <a href="#" class="community-post__info">
                                                <img src="/assets/images/icons/icons-24-x-24-comments.svg" alt=""
                                                     class="community-post__info-icon">
                                                <div class="community-post__info-text community-post__info-text--underline">
                                                    68
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arrows-slider community-slider__arrows">
                                <button class="arrows-slider__button arrows-slider__button--prev arrows-slider__button--small community-slider-prev">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                                <button class="arrows-slider__button arrows-slider__button--small community-slider-next">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                            </div>
                        </div>
                        <div class="help-center-list franchise-community__help-center">
                            <div class="title title--md help-center-list__title">Комментарии пользователей</div>
                            <div class="help-center-list__inner">
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Екатерина</div>
                                            <div class="help-user__status">Франчайзер</div>
                                        </div>
                                        <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                        <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша
                                            глобальная
                                            цель- строить узнаваемый бренд, готовить и доставлять...
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Михаил</div>
                                            <div class="help-user__status help-user__status--green">Пользователь</div>
                                        </div>
                                        <div class="help-user__title">Планирую открыть магазин одежды…</div>
                                        <div class="help-user__text">Детская одежда всегда будет пользоваться спросом и на
                                            юге, и на
                                            севере. Дети растут быстро и постоянно…
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Владимир</div>
                                            <div class="help-user__status help-user__status--purple">Эксперт</div>
                                        </div>
                                        <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                        <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша
                                            глобальная
                                            цель- строить узнаваемый бренд, готовить и доставлять...
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Екатерина</div>
                                            <div class="help-user__status">Франчайзер</div>
                                        </div>
                                        <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                        <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша
                                            глобальная
                                            цель- строить узнаваемый бренд, готовить и доставлять...
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Екатерина</div>
                                            <div class="help-user__status">Франчайзер</div>
                                        </div>
                                        <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                        <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша
                                            глобальная
                                            цель- строить узнаваемый бренд, готовить и доставлять...
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                                <div class="help-user">
                                    <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                    <div class="help-user__box">
                                        <div class="help-user__overhead">
                                            <div class="help-user__name">Екатерина</div>
                                            <div class="help-user__status">Франчайзер</div>
                                        </div>
                                        <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                        <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша
                                            глобальная
                                            цель- строить узнаваемый бренд, готовить и доставлять...
                                        </div>
                                        <a href="#" class="help-user__btn">Ответить</a>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-bottom help-center__btn-bottom">
                                <img src="/assets/images/icons/icons-arrow-down.svg" alt="arrow">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="popular" data-tab-content>2</div>
                <div class="tab-content" id="expert-opinion" data-tab-content>3</div>


            </div>
        </div>
    </div>
</div>


<div class="padding-main poster-hidden">
    <div class="container">
        <img src="/assets/images/poster-horizontal.png" alt="poster" class="poster-info">
    </div>
</div>


<div class="services">
    <div class="container">
        <div class="title title--center mb-md">Сервисы BUYBRAND</div>

        <div class="tabs-wrapper">
            <div class="tabs-center">
                <div class="tabs-bordered tabs-bordered--blue">
                    <div class="tabs-bordered__tab active" data-tab-target="#geo">
                        Геолокация
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#placement-catalog">
                        Размещение в каталоге
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#franchise-selection">
                        Подбор франшизы
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#vacancies">
                        Вакансии
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#exhibition">
                        Выставка
                    </div>
                </div>
            </div>

            <div class="tab-content active" id="geo" data-tab-content>
                <div class="geolocation services__geo">
                    <div class="geolocation__box">
                        <div class="geolocation__title">Геолокация GEOWOW –</div>
                        <div class="geolocation__subtitle">профессиональный инструмент оценки размещения бизнеса.</div>
                        <div class="geolocation__desc">Правильно выбранная локация (место размещения) – гарантирует 60% успеха
                            бизнеса. Геоаналитику используют крупнейшие сетевые компании (Mcdonald’s, «Азбука Вкуса», Cofix,
                            Ozon, «Улыбка Радуги», DNS), чтобы заранее и точно определять, где точка получит наибольшую
                            проходимость и максимальную прибыль.
                        </div>
                    </div>
                </div>
                <div class="services__grid">
                    <div class="services__item">
                        <div class="services__item-title">Сколько стоит оценка моей локации?</div>
                        <div class="services__item-subtitle">Тарифный план (анализ одной точки):</div>
                        <ul class="checked-list services__list">
                            <li>9 900 – Москва и МО</li>
                            <li>7 900 – Санкт-Петербург и ЛО</li>
                            <li>5 900 – города миллионники</li>
                            <li>3 900 – население от 500 тыс. чел. до 1млн</li>
                            <li>2 490– население от 50 тыс. чел. до 500 тыс.</li>
                        </ul>

                        <div class="services__gift">
                            <img src="/assets/images/gift.svg" alt="img" class="services__gift-img">
                            <div class="services__gift-text">
                                Акция «1+1=3»
                                Дарим анализ третьего адреса бесплатно!
                            </div>
                        </div>
                    </div>
                    <div class="services__item">
                        <div class="services__item-title">Что я получу?</div>
                        <div class="services__item-subtitle">Оставьте заявку и мы пришлем отчет</div>
                        <a href="" class="button services__button">Оставить заявку</a>
                    </div>
                    <div class="services__item">
                        <div class="services__item-title">Услуга была заказана:</div>
                        <div class="services__item-subtitle">Тарифный план (анализ одной точки):</div>
                        <div class="services__row">
                            <div class="services__stat">
                                <div class="services__stat-name">За все время</div>
                                <div class="services__stat-item">110 раз</div>
                            </div>
                            <div class="services__stat">
                                <div class="services__stat-name">За месяц</div>
                                <div class="services__stat-item">20 раз</div>
                            </div>
                        </div>
                        <div class="services__item-title">Открыто точек:</div>
                        <div class="services__row">
                            <div class="services__stat">
                                <div class="services__stat-name">За все время</div>
                                <div class="services__stat-item">98 раз</div>
                            </div>
                            <div class="services__stat">
                                <div class="services__stat-name">За месяц</div>
                                <div class="services__stat-item">14 раз</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="placement-catalog" data-tab-content>
                2
            </div>
            <div class="tab-content" id="franchise-selection" data-tab-content>
                3
            </div>
            <div class="tab-content" id="vacancies" data-tab-content>
                4
            </div>
            <div class="tab-content" id="exhibition" data-tab-content>
                5
            </div>

        </div>

    </div>
</div>

<div class="services-center padding-main">
    <div class="container">
        <div class="title title--center mb-md">Справочный центр</div>

        <div class="search services-center__search">
            <input class="search__input search__input--black" type="text" placeholder="Найти ответ">
            <button class="search__button">
                <img src="/assets/images/icons/icons-24-x-24-loupe-black.svg" alt="loupe"
                     class="search__icon search__icon--md">
            </button>
        </div>

        <div class="tabs-wrapper">
            <div class="tabs-center">
                <div class="tabs-bordered">
                    <div class="tabs-bordered__tab active" data-tab-target="#franchisor">
                        Франчайзеру
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#future-franchisee">
                        Будущему франчайзи
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#expert">
                        Эксперту
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#service-provider">
                        Поставщику услуг
                    </div>
                </div>
            </div>

            <div class="tab-content active" id="franchisor" data-tab-content>
                <div class="swiper slider-catalog swiper-services-center">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-selling-franchises.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Продажа франшиз</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-find-a-franchise.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Как найти свою франшизу</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-courses.svg" alt="" class="slider-catalog__img">
                                <div class="slider-catalog__title">Курсы франчайзи</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-consultant.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Консультант для вашего проекта</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-earning-franchises.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">На чем зарабатывает франшиза</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-legislation.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Законодательство о франчайзинге</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-earning-franchises.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">На чем зарабатывает франшиза</div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="slider-catalog__item">
                                <img src="/assets/images/icons/icons-80-x-80-legislation.svg" alt=""
                                     class="slider-catalog__img">
                                <div class="slider-catalog__title">Законодательство о франчайзинге</div>
                            </a>
                        </div>
                    </div>
                    <div class="slider-bottom-panel">

                        <div class="arrows-slider slider-bottom-panel__arrows">
                            <button class="arrows-slider__button arrows-slider__button--prev swiper-services-center-prev">
                                <div class="arrows-slider__icon"></div>
                            </button>
                            <button class="arrows-slider__button swiper-services-center-next">
                                <div class="arrows-slider__icon"></div>
                            </button>
                        </div>


                    </div>
                </div>
            </div>

            <div class="tab-content" id="future-franchisee" data-tab-content>
                2
            </div>
            <div class="tab-content" id="expert" data-tab-content>
                3
            </div>
            <div class="tab-content" id="service-provider" data-tab-content>
                4
            </div>
        </div>
    </div>
</div>


<div class="media">
    <div class="container">
        <div class="title title--center mb-medium">@lang('Media')</div>

        <div class="tabs-wrapper">
            @if (false)
            <div class="tabs-center">
                <div class="tabs-bordered tabs-bordered--blue">
                    <div class="tabs-bordered__tab active" data-tab-target="#news">
                        Новости
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#analytics">
                        Аналитика
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#market-reviews">
                        Обзоры рынка
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#podcasts">
                        Интервью и подкасты
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#online-exhibition">
                        Выставка online
                    </div>
                    <div class="tabs-bordered__tab" data-tab-target="#life-hacks">
                        Лайфхаки
                    </div>
                </div>
            </div>
            @endif

            <div class="tab-content active" id="news" data-tab-content>
                <div class="media__inner">
                    <div class="media__slider-wrap">
                        <div class="swiper media-slider media__slider">
                            <div class="swiper-wrapper">
                                @foreach ($media->materials->chunk(5) as $materials)
                                <div class="swiper-slide">
                                    <div class="media-grid">
                                        @foreach ($materials as $material)
                                        @if ($loop->index === 0)
                                        <a href="@route('media.show', $material)" class="media-post media-post--big media-post--start-big">
                                            <div style="background-image: url('{{ $material->preview }}')" class="media-post__box media-post__box--big">
                                                <div class="media-post__head">
                                                    <div class="media-post__date media-post__text media-post__text--white">
                                                        {{ $material->created_at->format('d.m.Y') }}
                                                    </div>
                                                    <div class="media-post__views">
                                                        <img src="/assets/images/icons/icons-24-x-24-views.svg" alt="icon" class="media-post__views-icon">
                                                        <div class="media-post__text media-post__text--white">{{ (int) optional($material->stats)->views }}</div>
                                                    </div>
                                                </div>
                                                <div class="media-post__title media-post__title--big media-post__title--white">
                                                    {{ $material->title }}
                                                </div>
                                                <div class="media-post__desc">
                                                    {{ str(strip_tags($material->content))->limit(100) }}
                                                </div>
                                                <div class="media-post__wrap">
                                                    <div class="media-post__tag">
                                                        {{ $material->tags->pluck('name')->implode(', ') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @elseif ($loop->index === 1)
                                        <a href="@route('media.show', $material)" class="media-post media-post--end-big">
                                            <div style="background-image: url('{{ $material->preview }}')" class="media-post__box media-post__box--medium">
                                                <div class="media-post__head">
                                                    <div class="media-post__views">
                                                        <img src="/assets/images/icons/icons-24-x-24-views.svg" alt="icon" class="media-post__views-icon">
                                                        <div class="media-post__text media-post__text--white">{{ (int) optional($material->stats)->views }}</div>
                                                    </div>
                                                </div>
                                                @if ($material->tags->isNotEmpty())
                                                <div class="media-post__wrap">
                                                    <div class="media-post__tag">
                                                        {{ $material->tags->pluck('name')->implode(', ') }}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="media-post__inner">
                                                <div class="media-post__date media-post__date--mb media-post__text">
                                                    {{ $material->created_at->format('d.m.Y') }}
                                                </div>
                                                <div class="media-post__title">
                                                    {{ $material->title }}
                                                </div>
                                            </div>
                                        </a>
                                        @else
                                        <a href="@route('media.show', $material)" class="media-post media-post--{{ $loop->index - 1 }}">
                                            <div style="background-image: url('{{ $material->preview }}')" class="media-post__box media-post__box--small">
                                                <div class="media-post__head">
                                                    <div class="media-post__views">
                                                        <img src="/assets/images/icons/icons-24-x-24-views.svg" alt="icon" class="media-post__views-icon">
                                                        <div class="media-post__text media-post__text--white">{{ (int) optional($material->stats)->views }}</div>
                                                    </div>
                                                </div>
                                                <div class="media-post__wrap">
                                                    @if ($material->tags->isNotEmpty())
                                                    <div class="media-post__tag">
                                                        {{ $material->tags->pluck('name')->implode(', ') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="media-post__inner">
                                                <div class="media-post__date media-post__date--mb media-post__text">
                                                    {{ $material->created_at->format('d.m.Y') }}
                                                </div>
                                                <div class="media-post__title">
                                                    {{ $material->title }}
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="slider-bottom-panel">
                                <a href="@route('media.index')" class="button button--bordered-blue">
                                    Все новости
                                    <img src="/assets/images/icons/icons-arrow-next.svg" alt="arrow" class="button__icon">
                                </a>

                                <div class="arrows-slider">
                                    <button class="arrows-slider__button arrows-slider__button--prev media-arrow-prev">
                                        <div class="arrows-slider__icon"></div>
                                    </button>
                                    <button class="arrows-slider__button media-arrow-next">
                                        <div class="arrows-slider__icon"></div>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div style="background: url('./assets/images/poster.png')" class="poster media__poster">
                        <div class="poster__title">Сомневаетесь в выборе франшизы?</div>
                        <div class="poster__text">
                            Консультация экспертов <b>BUYBRAND</b>
                        </div>
                        <a href="#" class="poster__btn">Оставить заявку</a>
                        <div class="poster__year">
                            <div class="poster__year-number">18</div>
                            <div class="poster__year-desc"><span>лет опыта</span> <br> работы на рынке франчайзинга
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper videos-slider">
                    <div class="swiper-wrapper">
                        @foreach ($media->lifehacks as $material)
                        @include('media.partials.lifehack')
                        @endforeach
                    </div>


                    <div class="slider-bottom-panel">
                        <a href="@route('media.index')" class="button button--bordered-blue">
                            Все видео
                            <img src="/assets/images/icons/icons-arrow-next.svg" alt="arrow" class="button__icon">
                        </a>

                        <div class="arrows-slider">
                            <button class="arrows-slider__button arrows-slider__button--prev videos-slider-prev">
                                <div class="arrows-slider__icon"></div>
                            </button>
                            <button class="arrows-slider__button videos-slider-next">
                                <div class="arrows-slider__icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="analytics" data-tab-content>
                2
            </div>

            <div class="tab-content" id="market-reviews" data-tab-content>
                3
            </div>
            <div class="tab-content" id="podcasts" data-tab-content>
                4
            </div>
            <div class="tab-content" id="online-exhibition" data-tab-content>
                5
            </div>
            <div class="tab-content" id="life-hacks" data-tab-content>
                6
            </div>

        </div>




    </div>
</div>

@include('partials.subscribe')

@include('partials.participants')

@endsection