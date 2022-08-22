@php
    $has_preset = route_current(fn ($route) => $route->getName() === 'franchise-catalog.preset');
@endphp

@extends('layouts.app')

@section('title', trans('Franchises Catalog'))

@section('content')
    <div class="wrapper franchise-page">
        <div class="container">
            <div class="overhead overhead--mb">
                <div class="title">@lang('Franchises Catalog')</div>
            </div>

            <div class="wrap-tabs">
                <div class="tabs franchise-page__tabs">
                    @foreach ($presets as $preset)
                    @php
                        $is_active = route_current(fn ($route) => $route->getName() === 'franchise-catalog.preset' && $route->parameter('preset')->id === $preset->id);
                    @endphp
                    <a @if ($is_active) href="@route('franchise-catalog.index')" @else href="@route('franchise-catalog.preset', $preset)" @endif @class([
                        'tabs__item',
                        'active' => $is_active
                    ])>
                        {{ $preset->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            @unless ($has_preset)
            @include('franchise-catalog.partials.filter')
            @endunless

            <div class="grid">
                <div class="grid__content">
                    <div class="franchise-list">
                        @foreach ($franchises as $franchise)
                            @if ($loop->first)
                                @include('franchise-catalog.partials.items.big')
                            @else
                                @include('franchise-catalog.partials.items.medium')
                            @endif
                        @endforeach
                    </div>

                    @include('franchise-catalog.partials.pagination')
                </div>
                <aside class="grid__aside">
                    <div class="title title--md mb-sm">
                        Обсуждения
                    </div>

                    <div class="help-center-list">
                        <div class="help-center-list__inner help-center-list__inner--height">
                            <div class="help-user">
                                <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                <div class="help-user__box">
                                    <div class="help-user__overhead">
                                        <div class="help-user__name">
                                            Екатерина
                                            <div class="help-user__online">
                                                <div class="help-user__circle"></div>
                                                Online
                                            </div>
                                        </div>
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

                    <div style="background: url('/assets/images/poster.png')" class="poster poster--width poster--mt-md franchise-page__poster">
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
                </aside>
            </div>

        </div>
    </div>
@endsection