<form method="GET">
    <div class="filters filters--rounded franchise-page__filters">
        <div class="filters__wrapper filters__wrapper--lg-col filters__wrapper--no-m">
            <div class="filters__row filters__row--grid">
                <div class="select filters__select filters__select-md filters__select-full">
                    <select name="filter[category]" class="select__item" id="filter_category">
                        <option value="0">Все сферы деятельности</option>
                        @foreach ($categories->whereNull('parent_id') as $category)
                            <option value="{{ $category->id }}" @selected(request('filter.category') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="select filters__select filters__select-big filters__select-full">
                    <select name="filter[subcategory]" class="select__item" id="filter_subcategory" disabled>
                        <option value="0">Все категории</option>
                    </select>
                </div>
                <div class="select filters__select filters__select-sm filters__select-full">
                    @php
                        $divisors = [1 => 'тыс.'];
                    @endphp
                    <select name="filter[investments]" class="select__item">
                        <option value="0">Размер инвестиций</option>
                        @foreach ($filter->investments as $investment)
                            @php
                                $value = implode('-', $investment);
                            @endphp
                            <option value="{{ $value }}" @selected(request('filter.investments') === $value)>
                                @if ($investment[0] === 0)
                                {{ sprintf('До %s ₽', number_shorten($investment[1], $divisors)) }}
                                @else
                                {{ sprintf('%s — %s ₽', number_shorten($investment[0], $divisors), number_shorten($investment[1], $divisors)) }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="select filters__select filters__select-sm filters__select-full">
                    <select name="filter[payback]" class="select__item">
                        <option value="0">Срок окупаемости</option>
                        @foreach ($filter->paybacks as $payback)
                            @php
                                $value = implode('-', $payback);
                            @endphp
                            <option value="{{ $value }}" @selected(request('filter.payback') === $value)>
                                @if ($payback[0] === 0)
                                {{ sprintf('До %s мес.', $payback[1]) }}
                                @else
                                {{ sprintf('От %s до %s мес.', $payback[0], $payback[1]) }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (request()->has('filter'))
            <a href="@route(route_current()->getName())" class="filters__reset filters__reset--order">
                Сбросить
                <div class="filters__reset-icon"></div>
            </a>
            @endif

            <button class="filters__reset filters__more--btn" data-text-show="Показать ещё" data-text-hide="Скрыть всё" style="margin-left: 1rem;">
                Показать ещё
            </button>
        </div>

        <div class="filters__more filters__more--hide">
            <div class="filters__wrapper filters__wrapper--lg-col filters__wrapper--start">
                <div class="filters__row filters__row--mr">
                    <div class="select filters__select filters__select-md filters__select-full filters__select-full--mb">
                        <select class="select__item">
                            <option>Все федеральные округа</option>
                            <option>Все федеральные округа 2</option>
                            <option>Все федеральные округа 3</option>
                        </select>
                    </div>
                    <div class="select filters__select filters__select-big filters__select-full">
                        <select class="select__item">
                            <option>Все регионы</option>
                            <option>Все регионы 2</option>
                            <option>Все регионы 3</option>
                        </select>
                    </div>
                </div>
                <div class="filters__checkboxes">
                    <div class="checkbox filters__checkbox">
                        <input type="checkbox" name="reviews" class="checkbox__input">
                        <div class="checkbox__square"></div>
                        <div class="checkbox__label">С инвестициями во франчайзинг</div>
                    </div>
        
                    <div class="checkbox filters__checkbox">
                        <input type="checkbox" name="reviews" class="checkbox__input">
                        <div class="checkbox__square"></div>
                        <div class="checkbox__label">С банковской поддрежкой</div>
                    </div>
        
                    <div class="checkbox filters__checkbox filters__checkbox--mr">
                        <input type="checkbox" name="reviews" class="checkbox__input">
                        <div class="checkbox__square"></div>
                        <div class="checkbox__label">Продают мастер-франшизу</div>
                    </div>
        
                    <div class="checkbox filters__checkbox filters__checkbox--shrink">
                        <input type="checkbox" name="reviews" class="checkbox__input">
                        <div class="checkbox__square"></div>
                        <div class="checkbox__label">По текущей акции</div>
                    </div>
                </div>
        
            </div>
    
            <div class="filters__wrapper filters__wrapper--no-m filters__wrapper--grid">
                <div class="checkbox filters__checkbox">
                    <input type="checkbox" name="isOnline" class="checkbox__input">
                    <div class="checkbox__square"></div>
                    <div class="checkbox__label">С отзывами клиентов</div>
                </div>
                <div class="checkbox filters__checkbox">
                    <input type="checkbox" name="isOnline" class="checkbox__input">
                    <div class="checkbox__square"></div>
                    <div class="checkbox__label">Франчайзер онлайн</div>
                </div>
                <div class="checkbox filters__checkbox">
                    <input type="checkbox" name="top-category" class="checkbox__input">
                    <div class="checkbox__square"></div>
                    <div class="checkbox__label">Топ-10 в своей категории</div>
                </div>
                <div class="checkbox filters__checkbox">
                    <input type="checkbox" name="bb2021" class="checkbox__input">
                    <div class="checkbox__square"></div>
                    <div class="checkbox__label">Участник выставки ВВ-2021</div>
                </div>
            </div>
        </div>

        <button class="button button--blue filters__button" type="submit">Подобрать франшизы</button>
    </div>
</form>

<style>
    .filters__more--hide {
        display: none;
    }

    .filters__more--show {
        display: block;
    }
</style>

@php
    $filter_categories = $categories->whereNotNull('parent_id')
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'parent_id' => $item->parent_id,
            ];
        })
        ->groupBy('parent_id')
        ->toArray()
@endphp

@push('scripts')
    <script>
        const filter_elements = {
            category: $('#filter_category'),
            subcategory: $('#filter_subcategory'),
        };

        const filter_categories = @json($filter_categories);

        filter_elements.category.on('select2:select', (e) => {
            let value = e.target.value;
            let condition = value == 0;

            filter_elements.subcategory.prop('disabled', condition);

            let data = typeof filter_categories[value] === 'undefined'
                ? null
                : filter_categories[value].map(item => {
                    return {
                        id: item.id,
                        text: item.name
                    };
                });

            filter_elements.subcategory.select2({
                data: data,
            });

            if (data === null) {
                filter_elements.subcategory.html('<option value="0">Все категории</option>');
            }
        });
    </script>
    <script>
        const filters = {
            more: {
                button: $('.filters__more--btn'),
                container: $('.filters__more'),
                hideClass: 'filters__more--hide',

                init(init = false) {
                    let data = this.container.hasClass(this.hideClass) ? 'text-hide' : 'text-show';

                    if (init && JSON.parse(localStorage.getItem('filters.more'))) {
                        this.container.removeClass(this.hideClass);
                        this.button.text(this.button.data('text-hide'));
                        localStorage.setItem('filters.more', !this.container.hasClass(this.hideClass));
                    }

                    if (!init) {
                        this.container.toggleClass(this.hideClass);
                        this.button.text(this.button.data(data));
                        localStorage.setItem('filters.more', !this.container.hasClass(this.hideClass));
                    }
                },
            },
        };

        $('.filters__more--btn').on('click', function (e) {
            e.preventDefault();

            filters.more.init();
        });

        filters.more.init(true);
    </script>
@endpush