@if ($franchise->points->isNotEmpty())
@php
    $russia = $franchise->points->where('country_id', 1);
    $rest = $franchise->points->groupBy('country.group.name');

    $points = (object) [
        'regions' => $russia->groupBy('region')->map(fn ($item) => (object) [
            'own_points' => $item->sum('own_points'),
            'franchise_points' => $item->sum('franchise_points'),
        ]),
        'sum' => (object) [
            'own_points' => $russia->sum('own_points'),
            'franchise_points' => $russia->sum('franchise_points'),
            'total' => $russia->sum('own_points') + $russia->sum('franchise_points'),
        ],
    ];

    $percents = $points->regions
        ->map(fn ($item, $region) => (int) round(($item->own_points + $item->franchise_points) * 100 / $points->sum->total))
        ->sortDesc();
@endphp

<div class="franchisee-map">
    <div class="container">
        <div class="title franchisee-map__title">
            @lang('The geography of presence of existing franchisees')
        </div>
        <div class="franchisee-map__text">
            @lang('Contact the franchisee and ask him about the franchise')
        </div>
        <div class="franchisee-map__inner">
            <div class="franchisee-map__content">
                @if ($franchise->points->where('country_id', '!=', 1)->count() > 0)
                <div class="filters-slider-wrapper franchisee-map__filters-slider">
                    <div class="swiper filters-slider">
                        <div class="swiper-wrapper">
                            @foreach ($countries->groups as $group)
                            <div class="swiper-slide">
                                <div
                                    @class(['filters-slider__item', 'active' => $group->name === $rest->keys()->first()])
                                    @unless ($rest->get($group->name)) style="opacity: 0.25" @endunless
                                >
                                    {{ $group->name }} @if ($rest->get($group->name)) ({{ $rest->get($group->name)->count() }}) @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="arrows-slider filters-slider__arrows">
                        <button class="arrows-slider__button arrows-slider__button--small arrows-slider__button--prev filters-slider-prev">
                            <div class="arrows-slider__icon"></div>
                        </button>
                        <button class="arrows-slider__button arrows-slider__button--small filters-slider-next">
                            <div class="arrows-slider__icon"></div>
                        </button>
                    </div>
                </div>
                @endif

                <div id="map" class="franchisee-map__map"></div>

                <div class="franchisee-map__cities">
                    @foreach ($percents as $region => $percent)
                    @php
                        $geo = $franchise->points->where('region', $region)->first();
                        $geo = sprintf('%s,%s', $geo->geo_lat, $geo->geo_lon);
                    @endphp
                    <div class="franchisee-map__city" data-geo="{{ $geo }}" style="cursor: pointer;">{{ $region }} <span>{{ $percent }}%</span></div>
                    @endforeach
                </div>
            </div>
            <div class="geoanalytics franchisee-map__geoanalytics">
                <div class="title title--md geoanalytics__title">
                    Сервис геоаналитики BUYBRAND
                </div>
                <div class="geoanalytics__text">
                    Доступный профессиональный инструмент оценки размещения бизнеса.
                </div>
                <a href="#" class="button button--bordered-blue geoanalytics__button">
                    Получить пример отчета
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts-head')
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAP_API_KEY') }}&lang=ru_RU" type="text/javascript"></script>
@endpush
@push('scripts')
    <script type="text/javascript">
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [55.751574, 37.573856],
                    zoom: 10,
                    controls: [],
                }, {
                    searchControlProvider: 'yandex#search'
            });

            var coords = @json($russia->map(fn ($item) => [$item->geo_lat, $item->geo_lon]));

            var myGeoObjects = [];

            for (var i = 0; i<coords.length; i++) {
            myGeoObjects[i] = new ymaps.GeoObject({
                geometry: {
                type: "Point",
                coordinates: coords[i]
                }
            });
            }

            var myClusterer = new ymaps.Clusterer();
            myClusterer.add(myGeoObjects);
            myMap.geoObjects.add(myClusterer);

            $('.franchisee-map__city').on('click', function () {
                let geo = $(this).data('geo').split(',');

                myMap.setCenter(geo);
            });
        });
    </script>
@endpush

@endif