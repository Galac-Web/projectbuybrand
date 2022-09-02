@extends('layouts.app')

@section('title', trans('Media'))

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="content-grid">
                <div class="content-info">
                    <div class="publications publications--pb">
                        <div class="wrap-tabs publications__tags">
                            <div class="tabs publications__tabs">
                                @foreach ($media->presets as $preset)
                                @php
                                    $is_active = request()->input('preset') === $preset->slug && empty(request()->input('type'));
                                @endphp
                                <a @if ($is_active) href="@route('media.index')" @else href="@route('media.filter', ['filter' => $preset->slug])" @endif @class([
                                    'tabs__item',
                                    'active' => $is_active
                                ])>
                                    {{ $preset->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="title title--medium publications__title">@lang('Actual materials')</div>
                        @if ($media->materials->sortByDesc('created_at')->first())
                            @include('media.partials.first', ['material' => $media->materials->sortByDesc('created_at')->first()])
                        @endif

                        <div class="publications__grid">
                            @foreach ($media->materials->sortByDesc('created_at')->skip(1)->take(3) as $material)
                                @include('media.partials.small')
                            @endforeach
                        </div>
                    </div>
                </div>

                @if ($media->materials->where('type.name', 'news')->isNotEmpty())
                <aside class="content-aside news-aside">
                    <div class="title title--md news-aside__title">@lang('Latest news')</div>
                    <div class="news-aside__list">
                        @foreach ($media->materials->where('type.name', 'news')->take(4) as $material)
                            @include('media.partials.news')
                        @endforeach
                    </div>
                </aside>
                @endif

            </div>
        </div>

        @include('partials.subscribe', ['light' => true])

        @if ($media->materials->where('type.name', 'video')->isNotEmpty())
        <div class="block">
            <div class="container">
                <div class="content-grid">
                    <div class="content-info">
                        <div class="publications">
                            <div class="title title--medium publications__title publications__title--black">@lang('Video')</div>
                            @if ($media->materials->where('type.name', 'video')->sortByDesc('created_at')->first())
                            @include('media.partials.first', ['material' => $media->materials->where('type.name', 'video')->sortByDesc('created_at')->first()])
                            @endif
                        </div>
                    </div>
                    <aside class="content-aside podcasts">
                        <img src="/assets/images/podcasts.png" alt="">
                    </aside>
                </div>
                <div class="related-materials block__related-materials">
                    <div class="swiper related-materials-swiper related-materials-swiper--medium">
                        <div class="swiper-wrapper">
                            @foreach ($media->materials->where('type.name', 'video')->sortByDesc('created_at') as $material)
                                @include('media.partials.video')
                            @endforeach
                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        @if ($lifehacks->materials->isNotEmpty())
        <div class="life-hacks">
            <div class="container">
                <div class="title title--medium life-hacks__title">@lang('Lifehacks')</div>

                <div class="wrap-tabs life-hacks__tabs">
                    <div class="tabs">
                        @foreach ($lifehacks->presets as $preset)
                        @php
                            $is_active = request()->input('preset') === $preset->slug && request()->input('type') === 'lifehacks';
                        @endphp
                        <a @if ($is_active) href="@route('media.index')" @else href="@route('media.filter', ['filter' => 'lifehacks/' . $preset->slug])" @endif @class([
                            'tabs__item',
                            'active' => $is_active
                        ])>
                            {{ $preset->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="swiper videos-slider-grid">
                    <div class="swiper-wrapper">
                        @foreach ($lifehacks->materials as $material)
                            @include('media.partials.lifehack')
                        @endforeach
                    </div>


                    <div class="arrows-slider arrows-slider--end">
                        <button class="arrows-slider__button arrows-slider__button--prev videos-slider-grid-prev">
                            <div class="arrows-slider__icon"></div>
                        </button>
                        <button class="arrows-slider__button videos-slider-grid-next">
                            <div class="arrows-slider__icon"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection