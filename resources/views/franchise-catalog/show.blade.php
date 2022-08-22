@extends('layouts.app')

@section('title', $franchise->name)

@section('content')
    <div class="wrapper franchise-card-page">
        <div class="container">

            <div class="breadcrumbs franchise-card-page__breadcrumbs">
                <a href="@route('index')" class="breadcrumbs__link">@lang('Home')</a>
                <a href="@route('franchise-catalog.index')" class="breadcrumbs__link">@lang('Catalog')</a>
                <a href="@route('franchise.show', $franchise)" class="breadcrumbs__link active">{{ $franchise->name }}</a>
            </div>


            <div class="franchise-overhead">
                <div class="title franchise-overhead__title">
                    {{ $franchise->name }}
                </div>
                @foreach ($franchise->badges as $badge)
                <div class="checked-out">
                    <img src="{{ $badge->icon }}" alt="{{ $badge->name }}" class="checked-out__icon">
                    <div class="checked-out__text">{{ $badge->name }}</div>
                </div>
                @endforeach
            </div>


            <div class="content-grid content-grid--pb-md content-grid--gap-sm franchise-view">
                <div class="content-info">

                    <div class="gallery-slider franchise-view__gallery-slider">

                        <div class="gallery-slider__logo">
                            <img src="{{ $franchise->getFirstMediaUrl('logo') }}" alt="{{ $franchise->name }}">
                        </div>

                        <div class="swiper gallery-slider-main">
                            <div class="swiper-wrapper">
                                @if ($franchise->video->isNotEmpty())
                                <div class="swiper-slide">
                                    <iframe class="gallery-slider__video" src="{{ $franchise->getVideo()->getEmbed() }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                                @endif
                                <div class="swiper-slide">
                                    <img class="gallery-slider__video" src="{{ $franchise->getFirstMediaUrl('cover', 'lg') }}" alt="{{ $franchise->name }}" />
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <div class="swiper gallery-slider-thumbs">
                            <div class="swiper-wrapper">
                                @if ($franchise->video->isNotEmpty())
                                <div class="swiper-slide">
                                    <img src="//img.youtube.com/vi/{{ $franchise->getVideo()->getId() }}/mqdefault.jpg" alt="img" class="gallery-slider__mini-img">
                                </div>
                                @endif
                                <div class="swiper-slide">
                                    <img src="{{ $franchise->getFirstMediaUrl('cover', 'sm') }}" alt="img" class="gallery-slider__mini-img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="franchise-statuses franchise-view__franchise-statuses">
                        <div class="franchise-statuses__inner">
                            @foreach ($franchise->advantages->where('pivot.is_main', true) as $advantage)
                            <div class="franchise-statuses__item">
                                <div class="franchise-statuses__text franchise-statuses__text--mr">
                                    {{ $advantage->name }}
                                </div>
                                <div @class(['franchise-statuses__info', 'green' => (int) $advantage->pivot->type === 1])>
                                    <div class="franchise-statuses__text">
                                        {{ $advantage->pivot->label ?? ((int) $advantage->pivot->type === 1 ? 'Да' : 'Нет') }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="place-ranking">
                        <div class="place-ranking__title place-ranking__title--mb-md">Место в рейтинге</div>
                        <div class="place-ranking__inner">
                            <div class="place-ranking__box">
                                <div class="place-ranking__number">1</div>
                                <div class="place-ranking__wrapper place-ranking__wrapper--mr">
                                    <div class="place-ranking__title place-ranking__title--mb-sm place-ranking__title--uppercase">
                                        Lhc
                                    </div>
                                    <div class="place-ranking__subtitle">
                                        Москва
                                    </div>
                                </div>
                            </div>
                            <div class="place-ranking__wrapper place-ranking__wrapper--mr-md">
                                <div class="place-ranking__title">
                                    160.70
                                </div>
                                <div class="place-ranking__graph"></div>
                            </div>
                            <div class="place-ranking__wrapper">
                                <div class="place-ranking__title place-ranking__title--lh-md place-ranking__title--end green">
                                    +60.01
                                </div>
                                <div class="place-ranking__title place-ranking__title--lh-md place-ranking__title--end green">
                                    <img src="/assets/images/icons/triangle-green.svg" alt="icon"
                                        class="place-ranking__icon">
                                    30%
                                </div>
                            </div>
                            <button class="place-ranking__button jsButtonDetails">
                                Рейтинг в деталях
                                <img src="/assets/images/icons/arrow-bottom-grey.svg" alt="icon"
                                    class="place-ranking__button-icon">
                            </button>
                        </div>
                        <div class="place-ranking__bottom">
                            <div class="place-ranking__item">
                                <img src="/assets/images/icons/Icons24x24top.svg" alt="icon"
                                    class="place-ranking__item-icon">
                                <div class="place-ranking__text">3 месяца в топ-10 рейтинга</div>
                            </div>
                            <div class="place-ranking__item">
                                <img src="/assets/images/icons/Icons24x24top2.svg" alt="icon"
                                    class="place-ranking__item-icon">
                                <div class="place-ranking__text">1 год в топ-3 категории</div>
                            </div>
                            <div class="place-ranking__item">
                                <img src="/assets/images/icons/Icons24x24open.svg" alt="icon"
                                    class="place-ranking__item-icon">
                                <div class="place-ranking__text">Открыто 10 новых точек</div>
                            </div>
                        </div>

                        <div class="tabs-wrapper place-ranking__details">
                            <div class="tabs-bordered tabs-bordered--dark tabs-bordered--rounded place-ranking__tabs">
                                <div class="tabs-bordered__tab active" data-tab-target="#summ">Суммарный коэфф.</div>
                                <div class="tabs-bordered__tab" data-tab-target="#franchise">Франчайзинговые точки</div>
                                <div class="tabs-bordered__tab" data-tab-target="#anticrisis">Антикризисный коэфф.</div>
                                <div class="tabs-bordered__tab" data-tab-target="#general">Общие данные</div>
                            </div>
                            <div class="tab-content active" id="summ" data-tab-content>
                                <figure class="highcharts-figure place-ranking__graphic">
                                    <div id="graph-place"></div>
                                </figure>
                                <div class="place-ranking__row">
                                    <div class="place-ranking__item place-ranking__item--col">
                                        <div class="place-ranking__text place-ranking__text--small">Дата обновления:
                                            20.07.2021
                                        </div>
                                        <div class="place-ranking__grow">
                                            <div class="place-ranking__text place-ranking__text--medium">25</div>
                                            <img src="/assets/images/icons/icons-arrow-up-green.svg" alt="icon"
                                                class="place-ranking__grow-icon">
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>1</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в рейтинге
                                            Buybrand
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>3</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в группе
                                            «Медицина и здоровье»
                                        </div>
                                    </div>
                                </div>
                                <div class="place-ranking__stat">
                                    <div class="place-ranking__stat-info">
                                        <div class="place-ranking__text place-ranking__text--normal place-ranking__stat-text">
                                            Результаты опроса действующих франчайзи: <span>28.8</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal place-ranking__stat-text">
                                            Открытость в предоставлении информации: <span>Да</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal place-ranking__stat-text">
                                            В рейтинге с <span>01.06.2020 г.</span>
                                        </div>
                                    </div>
                                    <a href="#" class="button button--blue place-ranking__stat-button">К общему рейтингу
                                        франшиз</a>
                                </div>

                            </div>
                            <div class="tab-content" id="franchise" data-tab-content>
                                <figure class="highcharts-figure place-ranking__graphic">
                                    <div id="graph-franchise"></div>
                                </figure>
                                <div class="place-ranking__row">
                                    <div class="place-ranking__item place-ranking__item--col">
                                        <div class="place-ranking__text place-ranking__text--small">Дата обновления:
                                            20.07.2021
                                        </div>
                                        <div class="place-ranking__grow">
                                            <div class="place-ranking__text place-ranking__text--medium">300</div>
                                            <img src="/assets/images/icons/icons-arrow-up-green.svg" alt="icon"
                                                class="place-ranking__grow-icon">
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>1</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в рейтинге
                                            Buybrand
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>3</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в группе
                                            «Медицина и здоровье»
                                        </div>
                                    </div>
                                </div>
                                <div class="place-ranking__stat">
                                    <div class="place-ranking__stat-info">
                                        <div class="place-ranking__text place-ranking__text--normal place-ranking__stat-text">
                                            Страны присутствия, кроме: <span>Казахстан, Беларусь</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal place-ranking__stat-text">
                                            Регионы присутствия РФ, кол-во: <span>30</span>
                                        </div>
                                    </div>
                                    <a href="#" class="button button--blue place-ranking__stat-button">К общему рейтингу
                                        франшиз</a>
                                </div>

                            </div>
                            <div class="tab-content" id="anticrisis" data-tab-content>
                                <figure class="highcharts-figure place-ranking__graphic">
                                    <div id="anticrise-place"></div>
                                </figure>
                                <div class="place-ranking__row">
                                    <div class="place-ranking__item place-ranking__item--col">
                                        <div class="place-ranking__text place-ranking__text--small">Дата обновления:
                                            20.07.2021
                                        </div>
                                        <div class="place-ranking__grow">
                                            <div class="place-ranking__text place-ranking__text--medium">0</div>
                                            <img src="/assets/images/icons/icons-arrow-down-red.svg" alt="icon"
                                                class="place-ranking__grow-icon">
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>1</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в рейтинге
                                            Buybrand
                                        </div>
                                    </div>
                                    <div class="place-ranking__item">
                                        <div class="place-ranking__position">
                                            <span>3</span>
                                        </div>
                                        <div class="place-ranking__text place-ranking__text--normal">Позиция в группе
                                            «Медицина и здоровье»
                                        </div>
                                    </div>
                                </div>
                                <a href="#"
                                class="button button--blue place-ranking__stat-button place-ranking__stat-button--center">К
                                    общему рейтингу франшиз</a>

                            </div>
                            <div class="tab-content" id="general" data-tab-content>
                                <!--<figure class="highcharts-figure place-ranking__graphic">
                                    <div id="graph-place"></div>
                                </figure>-->

                                <div class="table-wrapper place-ranking__table">
                                    <table class="table">
                                        <tr>
                                            <td>Арбитраж. истец (выиграны)</td>
                                            <td>0</td>
                                            <td>Контур</td>
                                        </tr>
                                        <tr>
                                            <td>Арбитраж. ответчик (проиграны)</td>
                                            <td>3</td>
                                            <td>Контур</td>
                                        </tr>
                                        <tr>
                                            <td>Проверок в текущем году</td>
                                            <td>0</td>
                                            <td>Контур</td>
                                        </tr>
                                        <tr>
                                            <td>Проверок всего</td>
                                            <td>0</td>
                                            <td>Контур</td>
                                        </tr>
                                        <tr>
                                            <td>Товарный знак зарегистрирован</td>
                                            <td>Да</td>
                                            <td>Контур</td>
                                        </tr>
                                        <tr>
                                            <td>Договор концессии/лицензирования</td>
                                            <td>Нет</td>
                                            <td>Франчайзер</td>
                                        </tr>
                                    </table>
                                </div>

                                <a href="#"
                                class="button button--blue place-ranking__stat-button place-ranking__stat-button--center">К
                                    общему рейтингу франшиз</a>

                            </div>


                            <button class="expand-button place-ranking__expand-button jsButtonDetailsClose">
                                <span class="expand-button__text">Свернуть</span>
                                <img src="/assets/images/icons/arrow-bottom-white.svg" alt="icon"
                                    class="expand-button__icon expand-button__icon--rotate">
                            </button>
                        </div>

                    </div>
                </div>
                <aside class="content-aside content-aside--last">

                    <div class="franchise-proceeds franchise-view__franchise-proceeds">
                        <div class="franchise-proceeds__content">
                            <div class="franchise-proceeds__title">
                                {{ optional($franchise->category)->name }}
                            </div>
                            <div class="franchise-proceeds__list">
                                <div class="franchise-proceeds__item">
                                    <div class="franchise-proceeds__name">
                                        @lang('Investments')
                                    </div>
                                    <div class="franchise-proceeds__value">
                                        {{ sprintf('%s — %s ₽', number_shorten($franchise->terms->investments_min), number_shorten($franchise->terms->investments_max)) }}
                                    </div>
                                </div>
                                <div class="franchise-proceeds__item">
                                    <div class="franchise-proceeds__name">
                                        @lang('Lumpsum')
                                    </div>
                                    <div class="franchise-proceeds__value">
                                        {{ sprintf('%s — %s ₽', number_shorten($franchise->terms->lumpsum_min), number_shorten($franchise->terms->lumpsum_max)) }}
                                    </div>
                                </div>
                                <div class="franchise-proceeds__item">
                                    <div class="franchise-proceeds__name">
                                        @lang('Payback')
                                    </div>
                                    <div class="franchise-proceeds__value">
                                        {{ $franchise->terms->payback_min }} месяцев
                                    </div>
                                </div>
                                <div class="franchise-proceeds__item">
                                    <div class="franchise-proceeds__name">
                                        @lang('Payback')
                                    </div>
                                    <div class="franchise-proceeds__value">
                                        {{ $franchise->terms->payback_max }} месяцев
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="franchise-proceeds__content franchise-proceeds__content--grey">
                            <div class="franchise-proceeds__item">
                                <div class="franchise-proceeds__name">
                                    @lang('Avg monthly revenue')
                                </div>
                                <div class="franchise-proceeds__value">
                                    @if ($franchise->terms->avg_monthly_revenue >= 1000000)
                                    {{ number_shorten($franchise->terms->avg_monthly_revenue) }} ₽
                                    @else
                                    {{ money($franchise->terms->avg_monthly_revenue) }} ₽
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="exhibition-participant franchise-view__exhibition-participant">
                        <img src="/assets/images/icons-80-x-80-rating.svg" alt="img" class="exhibition-participant__img">
                        <div class="exhibition-participant__box">
                            <div class="exhibition-participant__text">
                                Участник <span>выставки BUYBRAND</span>, 22-24 сентября 2021 г.
                            </div>
                            <div class="exhibition-participant__position">
                                Стенд №10
                            </div>
                        </div>
                    </div>

                    <div class="experts franchise-view__experts">
                        <div class="swiper experts__slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="experts__item">
                                        <div class="experts__photo-wrapper">
                                            <img src="/assets/images/woman.png" alt="img" class="experts__photo">
                                        </div>
                                        <div class="experts__box">
                                            <div class="experts__name">
                                                Екатерина <br> Светлова
                                            </div>
                                            <div class="experts__position">
                                                Маркетолог
                                            </div>
                                            <a href="#" class="button experts__button">
                                                <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                                    class="button__icon button__icon--mr-sm">
                                                Онлайн чат
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="experts__item">
                                        <div class="experts__photo-wrapper">
                                            <img src="/assets/images/woman.png" alt="img" class="experts__photo">
                                        </div>
                                        <div class="experts__box">
                                            <div class="experts__name">
                                                Екатерина <br> Светлова
                                            </div>
                                            <div class="experts__position">
                                                Маркетолог
                                            </div>
                                            <a href="#" class="button experts__button">
                                                <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                                    class="button__icon button__icon--mr-sm">
                                                Онлайн чат
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="experts__item">
                                        <div class="experts__photo-wrapper">
                                            <img src="/assets/images/woman.png" alt="img" class="experts__photo">
                                        </div>
                                        <div class="experts__box">
                                            <div class="experts__name">
                                                Екатерина <br> Светлова
                                            </div>
                                            <div class="experts__position">
                                                Маркетолог
                                            </div>
                                            <a href="#" class="button experts__button">
                                                <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                                    class="button__icon button__icon--mr-sm">
                                                Онлайн чат
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arrows-slider arrows-slider--end experts__arrows">
                                <button class="arrows-slider__button arrows-slider__button--small arrows-slider__button--prev experts-slider-prev">
                                    <div class="arrows-slider__icon arrows-slider__icon--small"></div>
                                </button>
                                <button class="arrows-slider__button arrows-slider__button--small experts-slider-next">
                                    <div class="arrows-slider__icon arrows-slider__icon--small"></div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="download-app franchise-view__download-app">
                        <div class="download-app__title">Скачайте приложение</div>
                        <div class="download-app__apps">
                            <a href="@setting('buybrand_google_play')" target="_blank" class="download-app__link">
                                <img src="/assets/images/google-play-badge-us2.svg" alt="badge" class="download-app__img">
                            </a>
                            <a href="@setting('buybrand_app_store')" target="_blank" class="download-app__link">
                                <img src="/assets/images/app-store-badge-us.svg" alt="badge" class="download-app__img">
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

        <div class="company-info">
            <div class="container">
                <div class="company-info__grid">
                    <div class="company-info__content">
                        <div class="title company-info__title">
                            @lang('About Franchise')
                        </div>
                        <div class="company-info__actions">
                            @if ($franchise->getMedia('presentation')->isNotEmpty())
                            <a href="{{ $franchise->getFirstMediaUrl('presentation') }}" target="_blank" class="company-info__action-button">
                                <img src="/assets/images/icons/pdf.svg" alt="icon" class="company-info__action-icon">
                                @lang('Download Presentation')
                            </a>
                            @endif
                            <button class="company-info__action-button">
                                <img src="/assets/images/icons/docs.svg" alt="icon" class="company-info__action-icon">
                                @lang('Company Details')
                            </button>
                        </div>

                        <div class="franchise-started company-info__franchise-started">
                            <div class="franchise-started__grid">
                                <div class="franchise-started__item franchise-started__item--pr">
                                    <div class="franchise-started__label">@lang('Founding year')</div>
                                    <div class="franchise-started__text">{{ $franchise->foundation_year }}</div>
                                </div>
                                <div class="franchise-started__item franchise-started__item--px">
                                    <div class="franchise-started__label">Фр. предприятие</div>
                                    <div class="franchise-started__text">
                                        @if ($franchise->points->isNotEmpty())
                                        {{ $franchise->points->sum('franchise_points') }}
                                        @else
                                        Неизвестно
                                        @endif
                                    </div>
                                </div>
                                <div class="franchise-started__item franchise-started__item--pl">
                                    <div class="franchise-started__label">Повтор. открытий</div>
                                    <div class="franchise-started__text">
                                        @if ($franchise->points->isNotEmpty())
                                        {{ $franchise->points->sum('repeat_points') }}
                                        @else
                                        Неизвестно
                                        @endif
                                    </div>
                                </div>
                                <div class="franchise-started__item franchise-started__item--pr">
                                    <div class="franchise-started__label">@lang('Franchise launch year')</div>
                                    <div class="franchise-started__text">{{ $franchise->start_year }}</div>
                                </div>
                                <div class="franchise-started__item franchise-started__item--px">
                                    <div class="franchise-started__label">Собств. предприятие</div>
                                    <div class="franchise-started__text">
                                        @if ($franchise->points->isNotEmpty())
                                        {{ $franchise->points->sum('own_points') }}
                                        @else
                                        Неизвестно
                                        @endif
                                    </div>
                                </div>
                                <div class="franchise-started__item franchise-started__item--pl">
                                    <div class="franchise-started__label">Регион старта развития</div>
                                    <div class="franchise-started__text">{{ $franchise->region_start ?? 'Неизвестно' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="text company-info__text">
                            {!! $franchise->information->content !!}
                        </div>

                        <button class="company-info__show-all">
                            {{-- <span>Показать еще</span>
                            <img src="/assets/images/icons/circle-bottom-arrow.svg" alt="icon"> --}}
                        </button>

                        @if ($franchise->dynamics->isNotEmpty())
                        <div class="title title--md company-info__title company-info__title--mb-md">
                            @lang('Opening schedule by year')
                        </div>

                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>

                        @php
                            $highcharts_data = $dynamics->getHighchartsData(
                                $franchise->dynamics->min('year'),
                                $franchise->dynamics->max('year'),
                                fn ($year) => $franchise->dynamics->where('year', $year)->pluck('count')->first() ?? 0
                            );
                        @endphp

                        @push('scripts')
                            <script>
                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'area'
                                    },
                                    accessibility: {
                                        description: ''
                                    },
                                    title: {
                                        text: ''
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    xAxis: {
                                        allowDecimals: false,
                                        labels: {
                                            formatter: function () {
                                                return this.value; // clean, unformatted number for year
                                            }
                                        },
                                        accessibility: {
                                            rangeDescription: ''
                                        }
                                    },
                                    yAxis: {
                                        title: {
                                            text: false
                                        },
                                        labels: {
                                            formatter: function () {
                                                return this.value;
                                            }
                                        }
                                    },
                                    tooltip: {
                                        pointFormat: '<b>{point.y:,.0f}</b> точек'
                                    },
                                    plotOptions: {
                                        area: {
                                            pointStart: {{ $franchise->dynamics->min('year') }},
                                            marker: {
                                                enabled: false,
                                                symbol: 'circle',
                                                radius: 2,
                                                states: {
                                                    hover: {
                                                        enabled: true
                                                    }
                                                }
                                            }
                                        }
                                    },
                                    series: [
                                        {
                                            name: 'Точек всего',
                                            data: @json($highcharts_data)
                                        },
                                        // {
                                        //     name: 'Франчайзинговых точек',
                                        //     data: [null, null, null, null, null, null, null, null, null, null,
                                        //         5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
                                        //         1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                                        //         11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
                                        //         30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
                                        //         37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                                        //         21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
                                        //         12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
                                        //     ]
                                        // },
                                        // {
                                        //     name: 'Собственных точек',
                                        //     data: [null, null, null, null, null, null, null, null, null, null,
                                        //         10, 30, 60, 190, 150, 200, 426, 660, 869, 1060,
                                        //         1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
                                        //         11643, 18000, 17000, 16000, 15537, 14162, 12787,
                                        //         12600, 11400, 5500, 4512, 4502, 4502, 4500, 30
                                        //     ]
                                        // }
                                    ]
                                });
                            </script>
                        @endpush
                        @endif

                    </div>


                    <div class="company-info__aside">
                        <div class="expert-opinion company-info__expert-opinion">
                            <div class="title title--md expert-opinion__title">
                                Экспертное мнение
                            </div>
                            <div class="expert-opinion__author">
                                <img src="/assets/images/user-img/2.png" alt="avatar" class="expert-opinion__avatar">
                                <div class="expert-opinion__box">
                                    <div class="expert-opinion__row">
                                        <div class="text expert-opinion__name">
                                            Владимир Колесничекно
                                        </div>
                                        <div class="expert-opinion__hint">
                                            <img src="/assets/images/icons/info.svg" alt="icon"
                                                class="expert-opinion__hint-icon">
                                        </div>
                                    </div>
                                    <div class="expert-opinion__position">Эксперт</div>
                                    <div class="expert-opinion__categories">
                                        Медицина, здоровье
                                    </div>
                                </div>
                            </div>
                            <div class="expert-opinion__quote">
                                <div class="expert-opinion__text">
                                    «Бизнес-модель многофункционального медицинского центра: лабораторная диагностика,
                                    функциональная диагностика…»
                                </div>
                                <a href="#" class="expert-opinion__button">
                                    Читать на форуме
                                </a>
                            </div>

                            <div class="expert-opinion__bottom">
                                <div class="expert-opinion__wrapper">
                                    <div class="stats">
                                        <div class="stats__item">
                                            <img class="stats__icon" src="/assets/images/icons/icons-24-x-24-views-2.svg"
                                                alt="icon">
                                            <div class="stats__text">1457</div>
                                        </div>
                                        <div class="stats__item">
                                            <img class="stats__icon" src="/assets/images/icons/icons-24-x-24-comments.svg"
                                                alt="icon">
                                            <div class="stats__text stats__text--bb">68</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="arrows-slider arrows-slider--end expert-opinion__arrows">
                                    <button class="arrows-slider__button arrows-slider__button--small arrows-slider__button--prev">
                                        <div class="arrows-slider__icon arrows-slider__icon--small"></div>
                                    </button>
                                    <button class="arrows-slider__button arrows-slider__button--small">
                                        <div class="arrows-slider__icon arrows-slider__icon--small"></div>
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if ($franchise->advantages->where('pivot.is_main', false)->isNotEmpty())
                        <div class="company-advantages company-info__company-advantages">
                            <div class="title title--md company-advantages__title">
                                Преимущества компании
                            </div>
                            <div class="company-advantages__inner">
                                @foreach ($franchise->advantages->where('pivot.is_main', false) as $advantage)
                                <div class="company-advantages__item">
                                    <img src="/assets/images/icons/green-checked.svg" alt="icon"
                                        class="company-advantages__icon">
                                    <div class="company-advantages__text">{{ $advantage->name }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="happy-birthday">
                            <div class="happy-birthday__inner">
                                <div class="title title--md happy-birthday__title">День рождения компании!</div>
                                <div class="happy-birthday__text">В честь дня рождения компании "Хеликс" скидка на покупку
                                    франшизы 10%.
                                </div>
                                <a href="#" class="happy-birthday__button">
                                    Подробнее
                                    <img src="/assets/images/icons/iconsarrownext.svg" alt="arrow"
                                        class="happy-birthday__icon">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Форматы, инвестиции, финансы франшизы --}}
        @if ($franchise->formats->isNotEmpty())
        <div class="franchise-stat">
            <div class="container">
                <div class="title franchise-stat__title">
                    @lang('Formats, investments, finances of the franchise')
                </div>

                <div class="tabs-wrapper">
                    <div class="tabs-bordered tabs-bordered--blue tabs-bordered--rounded franchise-stat__tabs">
                        @foreach ($franchise->formats as $format)
                        <div @class(['tabs-bordered__tab', 'active' => $loop->first]) data-tab-target="#tab_format_{{ $format->id }}">
                            {{ $format->name }}
                        </div>
                        @endforeach
                    </div>

                    @foreach ($franchise->formats as $format)
                    <div @class(['tab-content', 'active' => $loop->first]) id="tab_format_{{ $format->id }}" data-tab-content>
                        <div class="franchise-stat__grid">
                            <img src="{{ $format->getFirstMediaUrl('preview', 'md') }}" alt="{{ $format->name }}" class="franchise-stat__img">
                            <div class="franchise-stat__content" style="width: 100%;">
                                <div class="title title--md franchise-stat__content-title">
                                    {{ $format->name }}
                                </div>
                                <div class="franchise-stat__inner">
                                    <div class="franchise-stat__col">
                                        <div class="franchise-stat__item">
                                            <div class="franchise-stat__label">Объем инвестиций</div>
                                            <div class="franchise-stat__text">
                                                @empty($format->investments_max)
                                                @price($format->investments_min)
                                                {{-- {{ sprintf('%s ₽', number_shorten($format->investments_min)) }} --}}
                                                @else
                                                {{-- @price($format->investments_min) — <br>@price($format->investments_max) --}}
                                                {{ sprintf('%s — %s ₽', number_shorten($format->investments_min), number_shorten($format->investments_max)) }}
                                                @endempty
                                            </div>
                                        </div>
                                        <div class="franchise-stat__item">
                                            <div class="franchise-stat__label">Срок окупаемости</div>
                                            <div class="franchise-stat__text">{{ $format->payback_period->name }}</div>
                                        </div>
                                    </div>
                                    <div class="franchise-stat__col">
                                        <div class="franchise-stat__item">
                                            <div class="franchise-stat__label">Площадь помещений</div>
                                            <div class="franchise-stat__text">
                                                @if ($format->floor_space)
                                                {{ $format->floor_space }} кв м.
                                                @else
                                                Не указано
                                                @endif
                                            </div>
                                        </div>
                                        <div class="franchise-stat__item">
                                            <div class="franchise-stat__label">Персонал</div>
                                            <div class="franchise-stat__text">
                                                @if ($format->staff)
                                                {{ $format->staff }} {{ trans_choice('человек|человека', $format->staff) }}
                                                @else
                                                Не указано
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text franchise-stat__desc">
                                    {!! $format->description !!}
                                </div>
                                <a href="#" class="button franchise-stat__button">
                                    <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                        class="button__icon button__icon--mr">
                                    Связаться с франчайзером
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        @endif

        <div @class(['wrapper', 'wrapper--pt-none' => $franchise->formats->isNotEmpty()])>
            <div class="container">
                @if ($franchise->getMedia('presentation')->isNotEmpty())
                <div class="fin-model franchise-card-page__fin-model">
                    <div class="fin-model__inner">
                        <div class="fin-model__box">
                            <div class="title title--large fin-model__title">
                                @lang('Financial Model')
                            </div>
                            <div class="fin-model__buttons">
                                <a href="javascript:void(0)" class="button button--blue fin-model__button">
                                    @lang('Request a Franchise Development Financial Model')
                                </a>
                                @if ($franchise->getMedia('presentation')->isNotEmpty())
                                <a href="{{ $franchise->getFirstMediaUrl('presentation') }}" target="_blank" class="button button--selago fin-model__button">
                                    <img src="/assets/images/icons/pdf.svg" alt="icon" class="button__img">
                                    @lang('Download Franchise Presentation')
                                </a>
                                @endif
                            </div>
                            {{-- <div class="share-socials">
                                <div class="share-socials__label">Поделиться:</div>
                                <div class="share-socials__box">
                                    <a href="#" class="share-socials__link">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.003 0L11.997 0C5.3805 0 0 5.382 0 12C0 14.625 0.846 17.058 2.2845 19.0335L0.789 23.4915L5.4015 22.017C7.299 23.274 9.5625 24 12.003 24C18.6195 24 24 18.6165 24 12C24 5.3835 18.6195 0 12.003 0ZM18.9855 16.9455C18.696 17.763 17.547 18.441 16.6305 18.639C16.0035 18.7725 15.1845 18.879 12.4275 17.736C8.901 16.275 6.63 12.6915 6.453 12.459C6.2835 12.2265 5.028 10.5615 5.028 8.8395C5.028 7.1175 5.9025 6.279 6.255 5.919C6.5445 5.6235 7.023 5.4885 7.482 5.4885C7.6305 5.4885 7.764 5.496 7.884 5.502C8.2365 5.517 8.4135 5.538 8.646 6.0945C8.9355 6.792 9.6405 8.514 9.7245 8.691C9.81 8.868 9.8955 9.108 9.7755 9.3405C9.663 9.5805 9.564 9.687 9.387 9.891C9.21 10.095 9.042 10.251 8.865 10.47C8.703 10.6605 8.52 10.8645 8.724 11.217C8.928 11.562 9.633 12.7125 10.671 13.6365C12.0105 14.829 13.0965 15.21 13.485 15.372C13.7745 15.492 14.1195 15.4635 14.331 15.2385C14.5995 14.949 14.931 14.469 15.2685 13.9965C15.5085 13.6575 15.8115 13.6155 16.1295 13.7355C16.4535 13.848 18.168 14.6955 18.5205 14.871C18.873 15.048 19.1055 15.132 19.191 15.2805C19.275 15.429 19.275 16.1265 18.9855 16.9455Z"
                                                id="whatsapp" fill="" stroke="none"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="share-socials__link">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="telegram">
                                                <path d="M12 24C18.629 24 24 18.629 24 12C24 5.371 18.629 0 12 0C5.371 0 0 5.371 0 12C0 18.629 5.371 24 12 24ZM5.491 11.74L17.061 7.279C17.598 7.085 18.067 7.41 17.893 8.222L17.894 8.221L15.924 17.502C15.778 18.16 15.387 18.32 14.84 18.01L11.84 15.799L10.393 17.193C10.233 17.353 10.098 17.488 9.788 17.488L10.001 14.435L15.561 9.412C15.803 9.199 15.507 9.079 15.188 9.291L8.317 13.617L5.355 12.693C4.712 12.489 4.698 12.05 5.491 11.74Z"
                                                    id="Shape" fill="" stroke="none"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="#" class="share-socials__link">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM19.0421 16.3847L16.9721 16.4131C16.9721 16.4131 16.5269 16.5015 15.9427 16.0973C15.1674 15.5652 14.4379 14.1837 13.8695 14.3605C13.3011 14.5373 13.3106 15.7815 13.3106 15.7815C13.3124 15.9275 13.2676 16.0702 13.1827 16.1889C13.0632 16.2913 12.9158 16.3556 12.7596 16.3737L11.8422 16.3737C11.8422 16.3737 9.78956 16.4953 7.99744 14.6226C6.02691 12.5889 4.29164 8.52628 4.29164 8.52628C4.29164 8.52628 4.18945 8.29064 4.30111 8.13155C4.39762 7.99402 4.63566 7.97925 4.75584 7.97367C5.27395 7.94944 6.83058 7.95947 6.83058 7.95947C6.9608 7.95623 7.04831 7.96308 7.20952 8.03367C7.34808 8.10216 7.45317 8.20416 7.52058 8.36841C7.76006 8.96475 8.03803 9.54492 8.3527 10.1053C9.27797 11.7047 9.70903 12.0537 10.0232 11.8831C10.4796 11.6337 10.339 9.62367 10.339 9.62367C10.339 9.62367 10.339 8.89261 10.1085 8.56894C9.93497 8.3662 9.69023 8.23791 9.42483 8.21053C9.30009 8.19314 9.50536 7.9042 9.77062 7.77473C10.1685 7.57894 10.8727 7.57894 11.7032 7.57894C12.0687 7.56516 12.4343 7.60238 12.7896 7.68947C13.5538 7.8742 13.2948 8.58473 13.2948 10.2931C13.2948 10.8395 13.1954 11.61 13.5901 11.8721C13.7606 11.981 14.1743 11.8879 15.2132 10.1257C15.5447 9.54263 15.8323 8.93573 16.0738 8.30995C16.1203 8.21048 16.1908 8.12423 16.279 8.05889C16.3723 8.01244 16.4772 7.99434 16.5806 8.00677L18.9112 7.99097C18.9112 7.99097 19.6106 7.9073 19.7243 8.22464C19.838 8.54203 19.4622 9.32991 18.5101 10.593C16.947 12.6772 16.7732 12.4878 18.0712 13.6862C19.3106 14.8372 19.568 15.3978 19.6106 15.4673C20.1253 16.3169 19.0421 16.3847 19.0421 16.3847L19.0421 16.3847Z"
                                                id="vkontakte" fill="" stroke="none"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="share-socials__link">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="facebook">
                                                <path d="M12 0C5.38323 0 0 5.38323 0 12C0 18.6163 5.38323 24 12 24C18.6163 24 24 18.6163 24 12C24 5.38323 18.6173 0 12 0ZM14.9843 12.4225L13.032 12.4225L13.032 19.381L10.139 19.381C10.139 19.381 10.139 15.5788 10.139 12.4225L8.76388 12.4225L8.76388 9.9631L10.139 9.9631L10.139 8.37235C10.139 7.23306 10.6804 5.45283 13.0586 5.45283L15.2023 5.46105L15.2023 7.84838C15.2023 7.84838 13.8996 7.84838 13.6463 7.84838C13.3931 7.84838 13.0329 7.97503 13.0329 8.51833L13.0329 9.96359L15.2371 9.96359L14.9843 12.4225Z"
                                                    id="Shape" fill="" stroke="none"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="#" class="share-socials__link">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="instagram">
                                                <path d="M0 12C0 5.3736 5.3736 0 12 0C18.6264 0 24 5.3736 24 12C24 18.6264 18.6264 24 12 24C5.3736 24 0 18.6264 0 12ZM18.5288 16.5135C18.6991 16.0752 18.8157 15.5744 18.8491 14.8409C18.8828 14.1061 18.8906 13.8713 18.8906 12C18.8906 10.1287 18.8828 9.89392 18.8492 9.15912C18.8157 8.4256 18.6993 7.9248 18.5288 7.48645C18.356 7.02667 18.0846 6.61029 17.7341 6.26605C17.3899 5.91541 16.9733 5.64404 16.5135 5.47101C16.0752 5.3009 15.5744 5.18445 14.8409 5.15112C14.1061 5.11743 13.8713 5.10938 12 5.10938C10.1287 5.10938 9.89392 5.11743 9.15912 5.15094C8.4256 5.18445 7.9248 5.3009 7.48645 5.47119C7.02667 5.64423 6.61011 5.91541 6.26605 6.26605C5.91541 6.61011 5.64404 7.02667 5.47101 7.48645C5.30072 7.9248 5.18427 8.4256 5.15094 9.15912C5.11725 9.89392 5.10938 10.1287 5.10938 12C5.10938 13.8713 5.11725 14.1061 5.15112 14.8411C5.18445 15.5744 5.30109 16.0754 5.47137 16.5135C5.64441 16.9733 5.91559 17.3899 6.26605 17.7339C6.61029 18.0846 7.02667 18.3558 7.48663 18.5288C7.9248 18.6991 8.42578 18.8156 9.15912 18.8491C9.8941 18.8826 10.1287 18.8906 12.0002 18.8906C13.8715 18.8906 14.1063 18.8826 14.8411 18.8491C15.5744 18.8156 16.0754 18.6991 16.5135 18.5288C17.4391 18.1708 18.1708 17.4391 18.5288 16.5135ZM17.3716 7.93616C17.2612 7.63696 17.085 7.36615 16.8561 7.14386C16.6339 6.91498 16.3632 6.73883 16.0638 6.62842C15.821 6.53412 15.4563 6.42188 14.7845 6.3913C14.0577 6.35815 13.8398 6.35101 12 6.35101C10.16 6.35101 9.94208 6.35797 9.21552 6.39111C8.5437 6.42188 8.17877 6.53412 7.93616 6.62842C7.63678 6.73883 7.36597 6.91498 7.14386 7.14386C6.91498 7.36615 6.73883 7.63678 6.62823 7.93616C6.53394 8.17896 6.42169 8.54388 6.39111 9.2157C6.35797 9.94226 6.35083 10.1602 6.35083 12.0002C6.35083 13.84 6.35797 14.0579 6.39111 14.7847C6.42169 15.4565 6.53394 15.8212 6.62823 16.064C6.73883 16.3634 6.91479 16.634 7.14368 16.8563C7.36597 17.0852 7.6366 17.2614 7.93597 17.3718C8.17877 17.4662 8.5437 17.5785 9.21552 17.6091C9.94208 17.6422 10.1598 17.6492 11.9998 17.6492C13.84 17.6492 14.0579 17.6422 14.7843 17.6091C15.4561 17.5785 15.821 17.4662 16.0638 17.3718C16.6648 17.14 17.1398 16.665 17.3716 16.064C17.4659 15.8212 17.5781 15.4565 17.6089 14.7847C17.642 14.0579 17.649 13.84 17.649 12.0002C17.649 10.1602 17.642 9.94226 17.6089 9.2157C17.5783 8.54388 17.4661 8.17896 17.3716 7.93616ZM15.6782 9.14868C15.2216 9.14868 14.8513 8.77844 14.8513 8.32178C14.8513 7.86511 15.2216 7.49487 15.6782 7.49487C16.1349 7.49487 16.5051 7.86511 16.5051 8.32178C16.5049 8.77844 16.1349 9.14868 15.6782 9.14868ZM12 15.5383C10.0457 15.5383 8.46149 13.9543 8.46149 12C8.46149 10.0457 10.0457 8.46167 12 8.46167C13.9541 8.46167 15.5383 10.0457 15.5383 12C15.5383 13.9543 13.9541 15.5383 12 15.5383ZM14.2969 12C14.2969 13.2686 13.2686 14.2969 12 14.2969C10.7314 14.2969 9.70313 13.2686 9.70313 12C9.70313 10.7314 10.7314 9.70313 12 9.70313C13.2686 9.70313 14.2969 10.7314 14.2969 12Z"
                                                    id="Combined-Shape" fill="" fill-rule="evenodd" stroke="none"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="#" class="share-socials__link">
                                        <svg width="25px" height="24px" viewBox="0 0 25 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="youtube">
                                                <path d="M16.311 14.4383C16.2154 14.4379 16.1229 14.4728 16.0514 14.5362C15.9801 14.5915 15.9445 14.8004 15.9445 15.1629L15.9445 15.344L15.9674 15.3665L16.6318 15.3665L16.6547 15.344L16.6547 14.8987C16.6547 14.5915 16.5401 14.438 16.311 14.4382L16.311 14.4383ZM13.4167 14.423C13.2755 14.4249 13.1431 14.4917 13.0577 14.6041L13.0577 17.2236C13.1748 17.3494 13.2945 17.4123 13.4167 17.4123L13.4854 17.4123C13.6433 17.4123 13.7222 17.2915 13.7221 17.0498L13.7221 14.8233C13.7018 14.5564 13.6 14.423 13.4167 14.423ZM9.22402 13.8116L10.0106 13.8116L10.0106 17.0425C10.0106 17.2286 10.0691 17.3216 10.1862 17.3216L10.2397 17.3216C10.3619 17.3216 10.5147 17.216 10.6979 17.0048L10.6979 13.8116L11.4922 13.8116L11.4922 18.0237L10.6979 18.0237L10.6979 17.5709L10.6903 17.5709C10.3746 17.9128 10.0691 18.0839 9.77388 18.084L9.75861 18.084C9.60163 18.0896 9.45238 18.0158 9.36148 17.8877C9.26983 17.7923 9.22401 17.5131 9.22402 17.0498L9.22402 13.8116ZM16.2881 13.7136L16.3721 13.7136C17.1053 13.7136 17.4719 14.1539 17.4719 15.0345L17.4719 16.0084L15.9674 16.0084L15.9445 16.0309L15.9445 16.7556C15.9445 17.1882 16.0489 17.4046 16.2576 17.4047L16.3263 17.4047C16.3991 17.4028 16.4702 17.382 16.5325 17.3445C16.614 17.2839 16.6547 17.1178 16.6547 16.8463L16.6547 16.5215L17.4719 16.5215L17.4719 16.7026C17.4719 17.0349 17.4413 17.2841 17.3802 17.4501C17.2122 17.9079 16.8482 18.1369 16.2882 18.137C16.1234 18.1386 15.9599 18.1078 15.807 18.0463C15.3641 17.845 15.1426 17.4576 15.1426 16.884L15.1426 14.9136C15.1434 14.7434 15.1744 14.5747 15.2342 14.4154C15.4633 13.9477 15.8146 13.7137 16.2882 13.7136L16.2881 13.7136ZM12.2712 12.317L13.0577 12.317L13.0577 14.144L13.073 14.144C13.3021 13.8871 13.5337 13.7587 13.7679 13.759C14.2822 13.759 14.5393 14.1212 14.5393 14.8458L14.5393 17.1558C14.5381 17.2928 14.5227 17.4294 14.4935 17.5633C14.3764 17.9003 14.1702 18.0689 13.8749 18.0691L13.7679 18.0691C13.5185 18.0691 13.2868 17.9534 13.073 17.7218L13.0577 17.7218L13.0577 18.0238L12.2712 18.0238L12.2712 12.317ZM6.49762 12.317L9.23163 12.317L9.23163 13.1323L8.3305 13.1323L8.30762 13.1548L8.30762 18.0237L7.42172 18.0237L7.42172 13.1548L7.39879 13.1323L6.49762 13.1323L6.49762 12.317ZM11.3624 10.8375C10.2473 10.8375 9.30037 10.8527 8.52143 10.8829C7.51333 10.9031 6.96858 10.9408 6.88718 10.9961C6.40348 11.1623 6.05217 11.4265 5.83323 11.7886C5.68054 12.0806 5.59654 12.2844 5.58123 12.4C5.50484 13.2204 5.46666 14.0759 5.46669 14.9666L5.46669 15.3969C5.46669 16.1467 5.4896 16.7934 5.53542 17.3368C5.53542 18.0615 5.73397 18.5924 6.13106 18.9295C6.45693 19.2165 6.78786 19.3825 7.12385 19.4277C8.35594 19.4982 9.7764 19.5334 11.3852 19.5333L12.6148 19.5333C13.9436 19.5333 15.1146 19.5107 16.1277 19.4654C16.7234 19.4654 17.1435 19.4 17.3878 19.2691C17.8715 19.0225 18.1973 18.6577 18.3653 18.1747C18.4468 18.0386 18.5028 17.1403 18.5333 15.4797L18.5333 14.8911C18.5333 14.1562 18.5104 13.5448 18.4646 13.0569C18.4646 12.3322 18.2813 11.8063 17.9148 11.4791C17.6958 11.2226 17.3496 11.0414 16.8761 10.9356C15.6542 10.8703 14.2363 10.8377 12.6224 10.8376L11.3624 10.8375ZM11.9027 6.59527L12.0478 6.61811C12.1853 6.6734 12.2541 6.78407 12.254 6.95014L12.254 9.13169C12.254 9.4134 12.1395 9.55432 11.9104 9.55446L11.9027 9.55446C11.694 9.55446 11.5896 9.44124 11.5896 9.21481L11.5896 6.88991C11.5896 6.71876 11.694 6.62055 11.9027 6.59528L11.9027 6.59527ZM13.7585 5.96134L13.7356 5.98385L13.7356 9.41838C13.7336 9.57058 13.749 9.72252 13.7814 9.87124C13.8629 10.1281 14.0334 10.2565 14.2931 10.2562C14.5833 10.2562 14.8862 10.0852 15.2019 9.74311L15.2019 10.1659L15.2248 10.1884L15.9885 10.1884L16.0114 10.1659L16.0114 5.98385L15.9885 5.96134L15.2248 5.96134L15.2019 5.98385L15.2019 9.16944C15.0186 9.37071 14.8684 9.47135 14.7513 9.47135L14.7208 9.47135C14.5986 9.47135 14.5375 9.35813 14.5375 9.1317L14.5375 5.98385L14.5146 5.96134L13.7585 5.96134ZM11.9027 5.86303C11.5871 5.86303 11.33 5.94612 11.1314 6.11231C10.8819 6.26824 10.7572 6.60038 10.7572 7.10873L10.7572 8.92018C10.7549 9.09438 10.7651 9.26852 10.7878 9.44125C10.9507 10.0149 11.3249 10.3017 11.9104 10.3016L12.2922 10.2563C12.8115 10.0904 13.0712 9.72815 13.0712 9.16947L13.0712 6.91243C13.073 6.78584 13.0496 6.66015 13.0024 6.54266C12.809 6.08947 12.4654 5.86293 11.9715 5.86304L11.9027 5.86303ZM7.82464 4.46671L7.80937 4.48194L7.93922 4.91957C8.55524 6.8823 8.86325 7.89881 8.86327 7.9691L8.86327 10.1659L8.88619 10.1884L9.74915 10.1884L9.77207 10.1659L9.77207 7.86349C9.77207 7.81814 10.1183 6.69096 10.8107 4.48193L10.8031 4.48193L10.7878 4.4667L9.89425 4.4667L9.34439 6.74624L9.29093 6.74624C9.12289 6.04179 8.97269 5.45552 8.84035 4.98743C8.76396 4.64017 8.7156 4.46659 8.69527 4.4667L7.82464 4.46671ZM12 0C18.6274 0 24.0001 5.37276 24.0001 12.0002C24.0001 18.6276 18.6274 24 12 24C5.37264 24 0 18.6276 0 12.0002C0 5.37277 5.3726 0 12 0Z"
                                                    id="Shape" fill="" fill-rule="evenodd" stroke="none"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                        <img src="/assets/images/notebook.png" alt="img" class="fin-model__img">
                    </div>
                </div>
                @endif

                <div class="group-meeting franchise-card-page__group-meeting"
                    style="background-image: url('/assets/images/bb-meeting.png')">
                    <div class="group-meeting__wrapper">
                        <div class="group-meeting__box">
                            <div class="title title--md group-meeting__title">
                                Участник выставки <span>BUYBRAND осень 2021</span>
                            </div>
                            <a href="#" class="button group-meeting__button">
                                <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="icon"
                                    class="button__icon button__icon--mr-sm">
                                Назначить встречу
                            </a>
                        </div>
                        <div class="group-meeting__position">
                            Стенд №10
                        </div>
                    </div>

                </div>

                <div class="partner-support">
                    <div class="title title--large partner-support__title">
                        @lang('Partner support')
                    </div>

                    <div class="partner-support__label">
                        {{ $supports->keys()->first() }}
                    </div>

                    <div class="partner-support__grid">
                        @foreach ($supports->first()->chunk(round($supports->first()->count() / 3)) as $items)
                        <div class="partner-support__col">
                            <ul class="partner-support__list">
                                @foreach ($items as $support)
                                    <li @class(['false' => is_null($franchise->supports->firstWhere('id', $support->id))])>{{ $support->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>

                    <div class="partner-support__container">
                        @foreach ($supports->skip(1) as $group => $supportsItems)
                            <div class="partner-support__label">{{ $group }}</div>
                            <div class="partner-support__grid">
                                @foreach ($supportsItems->chunk($supportsItems->count() < 3 ? $supportsItems->count() : round($supportsItems->count() / 3)) as $items)
                                    <div class="partner-support__col">
                                        <ul class="partner-support__list">
                                            @foreach ($items as $support)
                                            <li @class(['false' => is_null($franchise->supports->firstWhere('id', $support->id))])>{{ $support->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <button class="expand-button jsExpandButtonPartner">
                        <span class="expand-button__text">Все меры поддержки и обучения</span>
                        <img src="/assets/images/icons/arrow-bottom-white.svg" alt="icon" class="expand-button__icon">
                    </button>


                </div>
            </div>
        </div>

        @include('franchise-catalog.partials.map')

        @if ($franchise->requirements->isNotEmpty())
        <div class="requirements">
            <div class="container">
                <div class="title requirements__title">
                    @lang('Requirements')
                </div>

                <div class="tabs-wrapper">
                    <div class="tabs-bordered tabs-bordered--blue tabs-bordered--rounded requirements__tabs">
                        @foreach ($franchise->requirements as $requirement)
                        <div @class(['tabs-bordered__tab', 'active' => $loop->first]) data-tab-target="#tab_requirement_{{ $requirement->id }}">{{ $requirement->name }}</div>
                        @endforeach
                    </div>

                    @foreach ($franchise->requirements as $requirement)
                    <div @class(['tab-content', 'active' => $loop->first]) id="tab_requirement_{{ $requirement->id }}" data-tab-content>
                        <div class="requirements__content">
                            @if ($requirement->items)
                            <div class="requirements__grid">
                                @foreach ($requirement->items->chunk(round($requirement->items->count() / 2)) as $requirementColumn)
                                    <ul class="requirements__list">
                                        @foreach ($requirementColumn as $requirementItem)
                                        <li>{{ $requirementItem }}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                            @endif

                            @if ($requirement->hasMedia('requirement_file'))
                            <a href="{{ $requirement->getFirstMediaUrl('requirement_file') }}" target="_blank" class="company-info__action-button" style="width: max-content;">
                                <img src="/assets/images/icons/docs.svg" alt="icon" class="company-info__action-icon">
                                {{ $requirement->button_caption ?? trans('Download') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="request-form">
                    <div class="title title--medium request-form__title">
                        Оставить заявку или связаться в чате
                    </div>
                    <div class="request-form__grid">
                        <div class="request-form__content">
                            <div class="request-form__row">
                                <input type="text" class="input request-form__input" placeholder="Имя">
                                <input type="text" class="input request-form__input" placeholder="Телефон">
                                <input type="text" class="input request-form__input" placeholder="E-mail">
                            </div>
                            <div class="request-form__desc">
                                Нажимая кнопку «Подписаться» вы соглашаетесь с <a href="#">условиями использования
                                сервиса</a>
                                и обработки персональных данных.
                            </div>
                            <a href="#" class="button button--blue request-form__button">
                                Оставить заявку
                            </a>
                        </div>
                        <div class="communication request-form__communication">
                            <div class="arrows-slider arrows-slider--white communication__arrows-slider">
                                <button class="arrows-slider__button arrows-slider__button--small arrows-slider__button--prev communication-slider-prev">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                                <button class="arrows-slider__button arrows-slider__button--small communication-slider-next">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                            </div>

                            <div class="swiper communication-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="communication__overhead">
                                            <img src="/assets/images/user-img/3.png" alt="avatar"
                                                class="communication__avatar">
                                            <div class="communication__info">
                                                <div class="communication__position">Франчайзер</div>
                                                <div class="communication__name">Михаил Дружко</div>
                                                <div class="communication__status">
                                                    <span></span>
                                                    Online
                                                </div>
                                            </div>

                                        </div>
                                        <div class="communication__desc">
                                            Обучение в вашем городе происходит
                                            на базе нашего медицинского офиса, длительность до 1 до 2-х недель.
                                        </div>
                                        <a href="#" class="button communication__button">
                                            <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                                class="button__icon button__icon--mr">
                                            Онлайн чат
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="communication__overhead">
                                            <img src="/assets/images/user-img/3.png" alt="avatar"
                                                class="communication__avatar">
                                            <div class="communication__info">
                                                <div class="communication__position">Франчайзер</div>
                                                <div class="communication__name">Михаил Дружко</div>
                                                <div class="communication__status">
                                                    <span></span>
                                                    Online
                                                </div>
                                            </div>

                                        </div>
                                        <div class="communication__desc">
                                            Обучение в вашем городе происходит
                                            на базе нашего медицинского офиса, длительность до 1 до 2-х недель.
                                        </div>
                                        <a href="#" class="button communication__button">
                                            <img src="/assets/images/icons/chat-black.svg" alt="icon"
                                                class="button__icon button__icon--mr">
                                            Онлайн чат
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        @if ($franchise->faq->isNotEmpty())
        <div class="faq">
            <div class="container">
                <div class="faq__grid">
                    <div class="faq__content">
                        <div class="title faq__title">
                            @lang('FAQ')
                        </div>
                        @foreach ($franchise->faq as $faq)
                        <div class="accordion accordion--white faq__accordion">
                            <div class="accordion__item">
                                <div class="accordion__name">
                                    {{ $faq->question }}
                                </div>
                                <div class="accordion__circle">
                                    <img src="/assets/images" alt="" class="accordion__arrow">
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__desc">
                                    {!! nl2br($faq->answer) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <aside class="faq__aside">
                        <div style="background: url('/assets/images/bg.png')"
                            class="poster poster--width poster--hidden poster--small">
                            <div class="poster__title poster__title--medium">Сомневаетесь в выборе франшизы?</div>
                            <div class="poster__text poster__text--small">
                                Консультация экспертов <b>BUYBRAND</b>
                            </div>
                            <a href="#" class="poster__btn poster__btn--mb-sm">Оставить заявку</a>
                            <div class="poster__year">
                                <div class="poster__year-number poster__year-number--small">18</div>
                                <div class="poster__year-desc poster__year-desc--small"><span>лет опыта</span> <br> работы
                                    на рынке франчайзинга
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        @endif

        @if ($franchise->materials->isNotEmpty())
        <div class="new-franchises new-franchises--pt new-franchises--bb">
            <div class="container">
                <div class="title mb-md">@lang('Media')</div>

                <div class="tabs-wrapper">
                    <div class="tabs-bordered tabs-bordered--blue tabs-bordered--rounded new-franchises__tabs">
                        @foreach ($franchise->materials->pluck('type')->sortBy('id')->unique() as $materialsTypes)
                            <div @class(['tabs-bordered__tab', 'active' => $loop->first]) data-tab-target="#tab_materials_{{ $materialsTypes->id }}">{{ $materialsTypes->humanName() }}</div>
                        @endforeach
                    </div>
                    @foreach ($franchise->materials->groupBy('type_id')->sortKeys() as $id => $franchiseMaterials)
                    <div @class(['tab-content', 'active' => $loop->first]) id="tab_materials_{{ $id }}" data-tab-content>
                        <div class="swiper slider-new-franchises">
                            <div class="swiper-wrapper">
                                @foreach ($franchiseMaterials as $material)
                                <div class="swiper-slide">
                                    <div class="franchise-card">
                                        <div class="franchise-card__box">
                                            <img src="{{ $material->preview }}" alt="img" class="franchise-card__img">
                                        </div>
                                        <div class="franchise-card__inner">
                                            <div class="franchise-card__date">
                                                {{ $material->created_at->format('d.m.Y') }}
                                            </div>
                                            <a href="@route('media.show', $material)" class="franchise-card__title">
                                                {{ $material->title }}
                                            </a>
        
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="arrows-slider arrows-slider--mt arrows-slider--end">
                                <button class="arrows-slider__button arrows-slider__button--prev slider-new-franchises-prev">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                                <button class="arrows-slider__button slider-new-franchises-next">
                                    <div class="arrows-slider__icon"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="javascript:void(0)" class="button franchise-card__button">@lang('Subscribe to Franchise Newsletter')</a>
            </div>
        </div>
        @endif

        @if (false)
        <div class="new-franchises new-franchises--pt">
            <div class="container">
                <div class="title mb-md">
                    @lang('Useful Materials')
                </div>
                <div class="tabs-bordered tabs-bordered--blue tabs-bordered--rounded new-franchises__tabs">
                    <div class="tabs-bordered__tab active">Поставщики</div>
                    <div class="tabs-bordered__tab">Похожие франшизы</div>
                    <div class="tabs-bordered__tab">Недавно просмотренные</div>
                </div>
                <div class="swiper slider-new-franchises">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="franchise-card">
                                <div class="franchise-card__box">
                                    <img src="/assets/images/img-1@2x.png" alt="img" class="franchise-card__img">
                                    <div class="franchise-card__panel">
                                        <button class="franchise-card__panel-button">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--star"></div>
                                        </button>
                                        <button class="franchise-card__panel-button">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--comparison"></div>
                                        </button>
                                    </div>
                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                </div>
                                <div class="franchise-card__inner">
                                    <a href="#" class="franchise-card__title">AMM DIGITAL-Франшиза международного
                                        digital-агентства
                                        Agency Media Marketing
                                    </a>
                                    <div class="franchise-card__price">
                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                            class="franchise-card__price-icon">
                                        Менее 500 000 руб.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="franchise-card">
                                <div class="franchise-card__box">
                                    <img src="/assets/images/img-2@2x.png" alt="img" class="franchise-card__img">
                                    <div class="franchise-card__panel">
                                        <button class="franchise-card__panel-button">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--star"></div>
                                        </button>
                                        <button class="franchise-card__panel-button active">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--comparison"></div>
                                        </button>
                                    </div>
                                    <div class="franchise-card__tag">Инвестиции</div>

                                </div>
                                <div class="franchise-card__inner">
                                    <a href="#" class="franchise-card__title">IziWay Shop – франшиза Онлайн-магазина
                                        брендовой одежды и
                                        обуви в Instagram.
                                    </a>
                                    <div class="franchise-card__price">
                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                            class="franchise-card__price-icon">
                                        Менее 500 000 руб.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="franchise-card">
                                <div class="franchise-card__box">
                                    <img src="/assets/images/img-3@2x.png" alt="img" class="franchise-card__img">
                                    <div class="franchise-card__panel">
                                        <button class="franchise-card__panel-button active">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--star"></div>
                                        </button>
                                        <button class="franchise-card__panel-button ">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--comparison"></div>
                                        </button>
                                    </div>
                                    <div class="franchise-card__tag">Для бизнеса В2В</div>

                                </div>
                                <div class="franchise-card__inner">
                                    <a href="#" class="franchise-card__title">AMM DIGITAL-Франшиза международного
                                        digital-агентства
                                        Agency Media Marketing
                                    </a>
                                    <div class="franchise-card__price">
                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                            class="franchise-card__price-icon">
                                        Менее 500 000 руб.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="franchise-card">
                                <div class="franchise-card__box">
                                    <img src="/assets/images/img-4@2x.png" alt="img" class="franchise-card__img">
                                    <div class="franchise-card__panel">
                                        <button class="franchise-card__panel-button">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--star"></div>
                                        </button>
                                        <button class="franchise-card__panel-button">
                                            <div class="franchise-card__panel-icon franchise-card__panel-icon--comparison"></div>
                                        </button>
                                    </div>
                                    <div class="franchise-card__tag">Инвестиции</div>

                                </div>
                                <div class="franchise-card__inner">
                                    <a href="#" class="franchise-card__title">Супермен – это доступные барбершопы,
                                        оснащенные
                                        автоматической системой…
                                    </a>
                                    <div class="franchise-card__price">
                                        <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon"
                                            class="franchise-card__price-icon">
                                        Менее 500 000 руб.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="arrows-slider arrows-slider--mt arrows-slider--end">
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
        @endif
    </div>
@endsection

@push('plugins')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endpush