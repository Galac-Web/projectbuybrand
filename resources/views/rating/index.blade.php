@extends('layouts.app')

@section('title', 'Рейтинг франшиз')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="overhead overhead--mb">
            <div class="title">@yield('title')</div>
            <div class="overhead__wrapper">
                <div class="overhead__box">
                    <a href="#" class="overhead__btn">
                        <img src="/assets/images/icons/i.svg" alt="i" class="overhead__icon">
                    </a>
                    <a href="#" class="overhead__btn">
                        <img src="/assets/images/icons/triangle.svg" alt="triangle" class="overhead__icon">
                    </a>
                    <a href="#" class="overhead__btn">
                        <img src="/assets/images/icons/bookmark.svg" alt="bookmark" class="overhead__icon">
                    </a>
                </div>
                <p class="overhead__text">Как это работает?</p>
            </div>

        </div>
        <div class="layout rating">
            <div class="content">
                <div class="ages rating__ages">
                    <div class="ages__title">Возраст франшизы в годах:</div>
                    <div class="ages__inner">
                        <div class="ages__grid">
                            <div class="ages__item ages__item--dark-blue">5+</div>
                            <div class="ages__item ages__item--green">3-5</div>
                            <div class="ages__item ages__item--blue">1-3</div>
                            <div class="ages__item ages__item--olive">0-1</div>
                        </div>
                        <div class="ages__box">
                            <div class="ages__row">
                                <span>BBR</span>
                                <div class="ages__separator"></div>
                                <p>Сокращенное название франшизы</p>
                            </div>
                            <div class="ages__row">
                                <span>1034</span>
                                <div class="ages__separator"></div>
                                <p>Суммарный коэффициент</p>
                                <div class="icon ages__icon">
                                    <img src="/assets/images/icons/i.svg" alt="i">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="all-parameters ">
                    Все параметры
                    <div class="all-parameters__arrow"></div>
                </button>
                <div class="filters rating__filters filters--hidden">
                    <div class="filters__grid">
                        <div class="select">
                            <select class="select__item">
                                <option>Выбрать пресет</option>
                                <option>Выбрать пресет 2</option>
                                <option>Выбрать пресет 3</option>
                            </select>
                        </div>
                        <div class="select">
                            <select class="select__item">
                                <option>Все сферы</option>
                                <option>Все сферы 2</option>
                                <option>Все сферы 3</option>
                            </select>
                        </div>
                        <div class="select">
                            <select class="select__item">
                                <option>По снижению рейтинга %</option>
                                <option>По снижению рейтинга % 2</option>
                                <option>По снижению рейтинга % 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="filters__wrapper filters__wrapper--col">
                        <div class="filters__block">
                            <div class="select filters__item">
                                <select class="select__item">
                                    <option>От 5 лет и старше</option>
                                    <option>От 5 лет и старше1</option>
                                    <option>От 5 лет и старше2</option>
                                </select>
                            </div>
                            <div class="select filters__item">
                                <select class="select__item">
                                    <option>За все время</option>
                                    <option>За все время</option>
                                    <option>За все время</option>
                                </select>
                            </div>
                            <div class="select filters__item">
                                <select class="select__item">
                                    <option>Период</option>
                                </select>
                            </div>
                        </div>
                        <div class="filters__range-wrapper">
                            <div class="filters__range-label">Вложения:</div>
                            <input class="filters__range"></input>
                        </div>
                    </div>
                    <div class="filters__wrapper filters__wrapper--no-m">
                        <div class="checkbox filters__checkbox">
                            <input type="checkbox" name="online" class="checkbox__input">
                            <div class="checkbox__square"></div>
                            <div class="checkbox__label">Онлайн</div>
                        </div>
                        <div class="checkbox filters__checkbox">
                            <input type="checkbox" name="favorites" class="checkbox__input">
                            <div class="checkbox__square"></div>
                            <div class="checkbox__label">Избранное</div>
                        </div>
                        <div class="checkbox filters__checkbox">
                            <input type="checkbox" name="reviews" class="checkbox__input">
                            <div class="checkbox__square"></div>
                            <div class="checkbox__label">По отзывам франчайзи</div>
                        </div>
                    </div>
                    <button class="filters__reset">
                        Сбросить фильтры
                        <img src="" alt="" class="filters__reset-icon">
                    </button>
                </div>
                <div class="graph-settings">
                    <div class="graph-settings__label">Дата обновления: 20.07.2021</div>
                    <div class="graph-settings__block">
                        <div class="graph-settings__types">
                            <div class="graph-settings__type active">
                                <svg class="graph-settings__type-icon" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <title>1D946280-4341-4E82-867F-24B448470935</title>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Index_Rating" transform="translate(-996.000000, -656.000000)"
                                           fill="currentColor" fill-rule="nonzero">
                                            <g id="Icons/24x24/grid" transform="translate(996.000000, 656.000000)">
                                                <g id="Group" transform="translate(0.541667, 0.541667)">
                                                    <path d="M8.83246528,0 L1.67100694,0 C0.749565972,0 0,0.749565972 0,1.67100694 L0,5.96788194 C0,6.88932292 0.749565972,7.63888889 1.67100694,7.63888889 L8.83246528,7.63888889 C9.75390625,7.63888889 10.5034722,6.88932292 10.5034722,5.96788194 L10.5034722,1.67100694 C10.5034722,0.749565972 9.75390625,0 8.83246528,0 Z"
                                                          id="Path" fill-opacity="0.64"></path>
                                                    <path d="M8.83246528,9.54861111 L1.67100694,9.54861111 C0.749565972,9.54861111 0,10.2981771 0,11.2196181 L0,21.2456597 C0,22.1671007 0.749565972,22.9166667 1.67100694,22.9166667 L8.83246528,22.9166667 C9.75390625,22.9166667 10.5034722,22.1671007 10.5034722,21.2456597 L10.5034722,11.2196181 C10.5034722,10.2981771 9.75390625,9.54861111 8.83246528,9.54861111 Z"
                                                          id="Path"></path>
                                                    <path d="M21.2456597,15.2777778 L14.0842014,15.2777778 C13.1627604,15.2777778 12.4131944,16.0273438 12.4131944,16.9487847 L12.4131944,21.2456597 C12.4131944,22.1671007 13.1627604,22.9166667 14.0842014,22.9166667 L21.2456597,22.9166667 C22.1671007,22.9166667 22.9166667,22.1671007 22.9166667,21.2456597 L22.9166667,16.9487847 C22.9166667,16.0273438 22.1671007,15.2777778 21.2456597,15.2777778 Z"
                                                          id="Path"></path>
                                                    <path d="M21.2456597,0 L14.0842014,0 C13.1627604,0 12.4131944,0.749565972 12.4131944,1.67100694 L12.4131944,11.6970486 C12.4131944,12.6184896 13.1627604,13.3680556 14.0842014,13.3680556 L21.2456597,13.3680556 C22.1671007,13.3680556 22.9166667,12.6184896 22.9166667,11.6970486 L22.9166667,1.67100694 C22.9166667,0.749565972 22.1671007,0 21.2456597,0 Z"
                                                          id="Path" opacity="0.399996"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Грид
                            </div>
                            <div class="graph-settings__type">
                                <svg class="graph-settings__type-icon" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <title>757FBB12-0344-4AEF-9FE7-CBFBC88A2807</title>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Index_Rating" transform="translate(-1092.000000, -656.000000)">
                                            <g id="Icons/24x24/graphic-" transform="translate(1091.993943, 655.981785)">
                                                <polyline id="Path-10" stroke="currentColor"
                                                          points="0.508884048 0 0.508884048 23.5307685 24.0124914 23.5307685"></polyline>
                                                <path d="M0.645828219,5.69362774 C7.77467356,4.77744979 2.84720989,15.2551831 9.02316623,14.4186789 C15.1991226,13.5821747 14.8601877,18.8529337 18.4171908,18.8688195 C20.7885261,18.8794101 22.656752,18.130598 24.0218685,16.6223833 L24.0233459,24.0424316 L0.0848559279,24.0191242 C-0.127780706,11.877517 0.0592100574,5.76901816 0.645828219,5.69362774 Z"
                                                      id="Path-11" fill-opacity="0.353077" fill="currentColor"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                График
                            </div>
                            <div class="graph-settings__type ac">
                                <svg class="graph-settings__type-icon" viewBox="0 0 24 24" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <title>9193693F-1023-43E7-9EB6-A949A6AB7459</title>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Index_Rating" transform="translate(-1196.000000, -656.000000)"
                                           fill-rule="nonzero">
                                            <g id="Icons/24x24/table" transform="translate(1196.000000, 656.000000)">
                                                <path d="M10.5,0.786743998 L10.5,2.286744 L24,2.286744 L24,0.786743998 L10.5,0.786743998 Z M10.5,3.786744 L10.5,5.286744 L21,5.286744 L21,3.786744 L10.5,3.786744 Z M10.5,9.786744 L10.5,11.286744 L24,11.286744 L24,9.786744 L10.5,9.786744 Z M10.5,12.786744 L10.5,14.286744 L21,14.286744 L21,12.786744 L10.5,12.786744 Z M10.5,18.786744 L10.5,20.286744 L24,20.286744 L24,18.786744 L10.5,18.786744 Z M10.5,21.786744 L10.5,23.286744 L21,23.286744 L21,21.786744 L10.5,21.786744 Z"
                                                      id="Shape" fill="currentColor" opacity="0.8"></path>
                                                <polygon id="Path" fill="currentColor" opacity="0.4"
                                                         points="0 0.786743998 0 5.286744 7.5 5.286744 7.5 0.786743998"></polygon>
                                                <polygon id="Path" fill="currentColor" opacity="0.4"
                                                         points="0 9.786744 0 14.286744 7.5 14.286744 7.5 9.786744"></polygon>
                                                <polygon id="Path" fill="currentColor" opacity="0.4"
                                                         points="0 18.786744 0 23.286744 7.5 23.286744 7.5 18.786744"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                Список
                            </div>
                        </div>
                        <div class="graph-settings__scale">
                            <button class="graph-settings__btn">
                            <span>
                                -
                            </span>
                            </button>
                            <div class="graph-settings__range-wrap">
                                <input type="text" class="graph-settings__range" name="my_range" value="" />
                            </div>
                            <button class="graph-settings__btn">
                            <span>
                                +
                            </span>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="graph-blocks"></div>


                <div class="activity activity--indent">
                    <div class="activity__grid">
                        <div class="activity-item">
                            <img src="/assets/images/icons-80-x-80-rating.svg" alt="rating" class="activity-item__img">
                            <a href="#" class="button button--blue activity-item__btn">Участие в рейтинге</a>
                        </div>
                        <div class="activity-item">
                            <img src="/assets/images/icons-80-x-80-specialist.svg" alt="rating"
                                 class="activity-item__img">
                            <a href="#" class="button button--grey activity-item__btn">Помощь специалиста</a>
                        </div>
                    </div>
                </div>

                <div class="franchises">
                    <div class="title franchises__overhead">Таблица участников</div>
                    <div class="search search--grey franchises__search">
                        <input class="search__input" type="text" placeholder="Поиск франшиз">
                        <button class="search__button">
                            <img src="/assets/images/icons/loupe.svg" alt="loupe" class="search__icon">
                        </button>
                    </div>
                    <div class="franchises__wrapper">


                        <table class="franchises__table">

                            <thead>
                            <tr>
                                <th class="franchises__table-row franchises__table-row-1">Позиция</th>
                                <th class="franchises__table-row franchises__table-row-2">Франшиза</th>
                                <th class="franchises__table-row franchises__table-row-3"></th>
                                <th class="franchises__table-row franchises__table-row-4">Открыт в регионе</th>
                                <th class="franchises__table-row franchises__table-row-5">Состояние</th>
                                <th class="franchises__table-row franchises__table-row-6"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number">1</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/helix@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">Лабораторная служба Хеликс</a>
                                    <div class="franchises__desc">Ювелирные изделия</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Москва</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">

                                            <span class="franchises__item-notification"></span>
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--green">2</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/sushiwok@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">Суши Wok</a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Санкт-Петербург</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--olive">3</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Лабораторная служба
                                        <div class="franchises__badges">
                                            УВ
                                        </div>
                                    </a>
                                    <div class="franchises__desc">Ювелирные изделия</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Москва</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--blue">4</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--green">5</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number">6</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--olive">7</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--blue">8</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number">9</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--green">10</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--olive">11</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--blue">12</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number">13</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--green">14</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="franchises__table-row-1 franchises__table-box">
                                    <div class="franchises__table-number franchises__table-number--olive">15</div>
                                </td>
                                <td class="franchises__table-row-2 franchises__table-box">
                                    <img src="/assets/images/logos/lab@2x.png" alt="logo" class="franchises__logo">
                                </td>
                                <td class="franchises__table-row-3 franchises__table-box">
                                    <a href="#" class="franchises__title">
                                        Суши Wok
                                    </a>
                                    <div class="franchises__desc">Кафе и рестораны</div>
                                </td>
                                <td class="franchises__table-row-4 franchises__table-box">
                                    <div class="franchises__text">Томск</div>
                                </td>
                                <td class="franchises__table-row-5 franchises__table-box">
                                    <div class="franchises__row">
                                        <span class="franchises__text">160.70</span>
                                        <span class="franchises__text franchises__text--green">+60.01</span>
                                    </div>
                                </td>
                                <td class="franchises__table-row-6 franchises__table-box">
                                    <div class="franchises__icons">
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-chat.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-comparison-black.svg" alt="">
                                        </a>
                                        <a href="#" class="franchises__item">
                                            <img src="/assets/images/icons/icons-24-x-24-favorites-black.svg" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <button class="btn-bottom btn-bottom--b">
                            <img src="/assets/images/icons/icons-arrow-down.svg" alt="arrow">
                        </button>
                    </div>
                </div>

            </div>
            <aside class="aside">



                <div class="aside__overhead">
                    <div class="title title--medium aside__title">Лидеры</div>
                    <div class="select aside__select-leaders">
                        <select class="select__item">
                            <option>За все время</option>
                            <option>За все время 2</option>
                            <option>За все время 3</option>
                        </select>
                    </div>
                </div>
                <div class="rates">
                    <div class="tabs-wrapper">
                        <div class="rates__tabs">
                            <div class="rates__tab active" data-tab-target="#growth">
                                <svg width="24" height="24" class="rates__icon rates__icon--green" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.574h.018c.028 0 .056.002.084.005L12 1.574a1.06 1.06 0 0 1 .63.21 1.228 1.228 0 0 1 .078.064l.012.012c.02.02.04.039.058.06l.018.02 5.96 6.922a1.05 1.05 0 0 1-1.507 1.459l-.085-.088-4.114-4.78v15.923a1.05 1.05 0 0 1-2.094.114l-.006-.114V5.452l-4.114 4.78a1.05 1.05 0 0 1-1.383.186l-.098-.075A1.05 1.05 0 0 1 5.17 8.96l.074-.098 5.96-6.923.008-.009A1.056 1.056 0 0 1 12 1.574z" fill-rule="nonzero"/>
                                </svg>
                                Рост
                            </div>
                            <div class="rates__tab" data-tab-target="#fall">
                                <svg width="24" height="24" class="rates__icon rates__icon--red" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22.426h.018c.028 0 .056-.002.084-.005l-.102.005a1.06 1.06 0 0 0 .63-.21 1.228 1.228 0 0 0 .078-.064l.012-.012c.02-.02.04-.039.058-.06l.018-.02 5.96-6.922a1.05 1.05 0 0 0-1.507-1.459l-.085.088-4.114 4.78V2.624a1.05 1.05 0 0 0-2.094-.114l-.006.114v15.924l-4.114-4.78a1.05 1.05 0 0 0-1.383-.186l-.098.075a1.05 1.05 0 0 0-.185 1.383l.074.098 5.96 6.923.008.009a1.056 1.056 0 0 0 .788.356z" fill-rule="nonzero"/>
                                </svg>

                                Падение
                            </div>
                        </div>


                        <div class="tab-content active" id="growth" data-tab-content>
                            <div class="rates__inner">
                                <div class="rates__filters">
                                    <button class="rates__filter rates__filter--active">Рейтинг</button>
                                    <button class="rates__filter">Кол-во точек</button>
                                    <button class="rates__filter">Антикризисный <br>
                                        коэффициент
                                    </button>
                                </div>
                                <div class="rates__wrapper">
                                    <div class="rates__items">
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">1</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Суши Wok</div>
                                                    <div class="rates__item-desc">Сеть магазинов японской и паназиатской кухни
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+300.01</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">2</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Шоколадница</div>
                                                    <div class="rates__item-desc">Ресторанный бизнес, сеть кофеен</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+289.74</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">3</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Fix Price</div>
                                                    <div class="rates__item-desc">Магазины низких фиксированных цен</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+197.32</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">4</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Адамас</div>
                                                    <div class="rates__item-desc">Ювелирные изделия</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+154.89</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">5</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Cofix</div>
                                                    <div class="rates__item-desc">Сеть кафе</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+94.36</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">6</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Cofix</div>
                                                    <div class="rates__item-desc">Сеть кафе</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">+94.36</div>
                                        </div>
                                    </div>
                                    <button class="btn-bottom">
                                        <img src="/assets/images/icons/icons-arrow-down.svg" alt="arrow">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="fall" data-tab-content>
                            <div class="rates__inner">
                                <div class="rates__filters">
                                    <button class="rates__filter rates__filter--active">Рейтинг</button>
                                    <button class="rates__filter">Кол-во точек</button>
                                    <button class="rates__filter">Антикризисный <br>
                                        коэффициент
                                    </button>
                                </div>
                                <div class="rates__wrapper">
                                    <div class="rates__items">
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">1</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Суши Wok</div>
                                                    <div class="rates__item-desc">Сеть магазинов японской и паназиатской кухни
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-300.01</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">2</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Шоколадница</div>
                                                    <div class="rates__item-desc">Ресторанный бизнес, сеть кофеен</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-289.74</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">3</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Fix Price</div>
                                                    <div class="rates__item-desc">Магазины низких фиксированных цен</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-197.32</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">4</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Адамас</div>
                                                    <div class="rates__item-desc">Ювелирные изделия</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-154.89</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">5</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Cofix</div>
                                                    <div class="rates__item-desc">Сеть кафе</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-94.36</div>
                                        </div>
                                        <div class="rates__item">
                                            <div class="rates__item-inner">
                                                <div class="rates__number">6</div>
                                                <div class="rates__block">
                                                    <div class="rates__item-title">Cofix</div>
                                                    <div class="rates__item-desc">Сеть кафе</div>
                                                </div>
                                            </div>
                                            <div class="rates__coefficient">-94.36</div>
                                        </div>
                                    </div>
                                    <button class="btn-bottom">
                                        <img src="/assets/images/icons/icons-arrow-down.svg" alt="arrow">
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="posters">
                    <div style="background: url('./assets/images/poster.png')" class="poster aside__poster">
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

                    <a href="#" class="poster-news">
                        <div style="background: url('./assets/images/poster2.png')" class="poster poster--news">
                            <div class="poster__play">
                                <img src="/assets/images/icons/play.svg" alt="play" class="poster__play-icon">
                            </div>
                        </div>
                        <div class="poster-news__inner">
                            <div class="poster-news__date">17.12.2020</div>
                            <div class="poster-news__text">Как выбрать франшизу, ч.4. Вопросы, которые надо задать
                                франчайзеру
                            </div>
                        </div>
                    </a>

                    <div style="background: url('./assets/images/ninja-poster.png')"
                         class="poster poster--medium aside__poster">
                        <div class="poster__title poster__title--big poster__title--mb">Найми</div>
                        <div class="poster__subtitle">
                            супер-ниндзю
                        </div>

                        <div class="poster__text poster__text--medium poster__text--green">Во франчайзинге</div>
                        <a href="#" class="poster__btn poster__btn--mt">Подробнее</a>
                    </div>


                </div>
            </aside>
        </div>
    </div>
</div>



<div class="help-center">
    <div class="container">
        <div class="title help-center__title">Справочный центр</div>
        <div class="tabs-wrapper">
            <div class="tabs-bordered">
                <div class="tabs-bordered__tab active" data-tab-target="#map">Карта</div>
                <div class="tabs-bordered__tab" data-tab-target="#community">Сообщество</div>
                <div class="tabs-bordered__tab" data-tab-target="#media">Медиа</div>
                <div class="tabs-bordered__tab" data-tab-target="#experts">Эксперты</div>
                <div class="tabs-bordered__tab" data-tab-target="#help">Помощь</div>
            </div>

            <div class="tab-content active" id="map" data-tab-content>
                <div class="help-center__wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d288661.33438769414!2d37.10535818104165!3d55.581706560118015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1630879691453!5m2!1sru!2sru"
                            style="border:0;" allowfullscreen="" loading="lazy" class="help-center__map"></iframe>
                    <div class="help-center-list">
                        <div class="help-center-list__inner">
                            <div class="help-user">
                                <img src="/assets/images/avator@2x.png" alt="user" class="help-user__img">
                                <div class="help-user__box">
                                    <div class="help-user__overhead">
                                        <div class="help-user__name">Екатерина</div>
                                        <div class="help-user__status">Франчайзер</div>
                                    </div>
                                    <div class="help-user__title">Что посоветуете из ресторанов?</div>
                                    <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная
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
                                    <div class="help-user__text">Детская одежда всегда будет пользоваться спросом и на юге, и на
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
                                    <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная
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
                                    <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная
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
                                    <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная
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
                                    <div class="help-user__text">Бренд FARFOR- это сеть ресторанов доставки еды. Наша глобальная
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
            <div class="tab-content" id="community" data-tab-content>2</div>
            <div class="tab-content" id="media" data-tab-content>3</div>
            <div class="tab-content" id="experts" data-tab-content>4</div>
            <div class="tab-content" id="help" data-tab-content>5</div>
        </div>
    </div>
</div>




<div class="about-rating">
    <div class="container">
        <div class="title about-rating__title">О рейтинге франшиз BUYBRAND</div>
        <div class="about-rating__box">
            <div class="about-rating__desc">
                <div class="text about-rating__text">Рейтинг франшиз BUYBRAND - независимый и постоянно обновляемый
                    инструмент, который позволяет получить информацию о рынке франшиз в целом, оценить позицию отдельно
                    взятой франшизы в своем сегменте или в инвестиционном диапазоне и проследить ее динамику.
                </div>
                <div class="text about-rating__text"> Размещение франшиз в рейтинге является бесплатным. Расчет позиции
                    франшизы в рейтинге происходит на основе авторского алгоритма и не зависит от человеческого фактора.
                    Информация в рейтинге обновляется в режиме 24х7.
                </div>
                <div class="text about-rating__text"> Данные поступают в рейтинг из трех источников. Пересекающиеся
                    данные сопоставляются и проверяются.
                </div>
            </div>
            <div class="about-rating__video">
                <div class="about-rating__video-title">Видео инструкция</div>
                <button class="about-rating__video-play">
                    <img src="/assets/images/icons/triangle.svg" alt="play" class="about-rating__play-icon">
                    <span class="about-rating__play-text">Смотреть</span>
                </button>
            </div>
        </div>

        <div class="information">
            <div class="title title--white information__title">Источники информации</div>
            <div class="information__grid">
                <div class="information__block">
                    <div class="information__item">
                        <div class="information__number">01</div>
                        <div class="information__box">
                            <div class="information__item-title">Франчайзер</div>
                            <div class="information__text">Самостоятельно размещает информацию</div>
                        </div>
                    </div>
                    <div class="information__item">
                        <div class="information__number">02</div>
                        <div class="information__box">
                            <div class="information__item-title">Франчайзи</div>
                            <div class="information__text">В ходе телефонной беседы отвечают на вопросы BUYBBRAND.RU о
                                фактических результатах сотрудничества с франчайзером
                            </div>
                        </div>
                    </div>
                    <div class="information__item">
                        <div class="information__number">03</div>
                        <div class="information__box">
                            <div class="information__item-title">Контур.Фокус</div>
                            <div class="information__text">Собирает данные о франшизе и франчайзере из федеральных
                                реестров и иных федеральных информационных ресурсов. Актуальность и достоверность
                                указанных сведений проверяются соответствующими государственными органами,
                                осуществляющими ведение федеральных реестров.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="information__block">
                    <div class="information__item">
                        <div class="information__number">04</div>
                        <div class="information__box">
                            <div class="information__item-title">Суммарный коэффициент</div>
                            <div class="information__text">
                                Суммарный коэффициент определяет позицию франшизы в рейтинге.
                                Содержит в себе оценку франшизы по перечню наиболее важных характеристик самой франшизы,
                                франчайзера и его поведения в рынке в целом, а также с покупателями и действующими
                                франчайзи, в частности.
                                <div class="information__subtitle">Как он формируется:</div>

                                Данным, полученным из описанных выше источников, присваивается «вес» в соответствии с их
                                значимостью, а итоговые значения суммируются согласно авторскому алгоритму,
                                разработанному BUYBRAND на основе восемнадцатилетнего опыта работы на рынке франчайзинга
                                РФ.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="analyzed-data">
    <div class="container">
        <div class="title analyzed-data__title">Анализируемые данные</div>
        <div class="analyzed-data__wrapper">
            <div class="analyzed-data__col">
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-stopwatch.svg" class="analyzed-data__icon">
                        Временные
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Срок деятельности компании</li>
                        <li>Срок франчайзинговой деятельности</li>

                    </ul>
                </div>
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-quantity.svg" class="analyzed-data__icon">
                        Количественные
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Количество действующих франчайзинговых точек</li>
                        <li>Количество точек, открытых/закрытых за период</li>
                        <li>Мультифранчайзинг и повторные открытия</li>
                        <li>Наличие мастер-франшизы</li>
                    </ul>
                </div>
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-finance.svg" class="analyzed-data__icon">
                        Финансовые (Контур.Фокус)
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Автоматический финансовый анализ содержит статистическую оценку отчетности и экспертный
                            рейтинг
                        </li>
                        <li>Бухгалтерская отчетность, статистика платежей</li>
                    </ul>
                </div>
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-stability.svg" class="analyzed-data__icon">
                        Устойчивость в кризисных условиях
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Текущая готовность</li>
                        <li>Поведение в сложившихся обстоятельствах</li>
                    </ul>
                </div>
            </div>
            <div class="analyzed-data__col">
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-geography.svg" class="analyzed-data__icon">
                        Географические
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Сопоставление динамики развития в регионах старта развития с последующей экспансией</li>
                        <li>Количественные показатели по регионом развития</li>
                    </ul>
                </div>
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-review.svg" class="analyzed-data__icon">
                        Устойчивость в кризисных условиях
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Соответствие первоначальным данным, предоставленным до старта работы по франшизе</li>
                        <li>Удовлетворенность сотрудничеством</li>
                        <li>Объём фактической поддержки и партнерства</li>
                    </ul>
                </div>
                <div class="analyzed-data__item">
                    <div class="analyzed-data__name">
                        <img src="/assets/images/icons/icons-24-x-24-court.svg" class="analyzed-data__icon">
                        Устойчивость в кризисных условиях
                    </div>
                    <ul class="analyzed-data__list">
                        <li>Наличие текущих арбитражных дел, история выигранных и проигранных судебных разбирательств
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="participation-rating">
    <div class="container">
        <div class="title participation-rating__title">Какая компания может участвовать в рейтинге</div>
        <div class="participation-rating__box">
            <img src="/assets/images/participate.svg" alt="" class="participation-rating__img">
            <div class="participation-rating__text">
                <p class="participation-rating__paragraph">
                    Участвовать в Рейтинге франшиз BUYBRAND может любой франчайзер, продающий франшизу на территории
                    России. Участие для всех всегда бесплатно. Обязательное условия для размещения в рейтинге: наличие
                    как минимум одной корпоративной и/или одной франчайзинговой точки.
                </p>
                <p class="participation-rating__paragraph">
                    Компания EMTG оставляет за собой право не допустить франшизу к размещению в рейтинге или исключить
                    из
                    него.
                </p>
                <p class="participation-rating__paragraph">
                    Франчайзер может повлиять на свой рейтинг BUYBRAND, регулярно, честно и исчерпывающе предоставляя
                    запрашиваемую у него информации.
                </p>
            </div>
        </div>

        <div class="doubt">
            <img src="/assets/images/doubt.svg" alt="img" class="doubt__img">
            <div class="doubt__box">
                <div class="doubt__title">Сомневаетесь в выборе франшизы?</div>
                <div class="doubt__subtitle">Консультация экспертов BUYBRAND</div>
                <div class="doubt__text"><span>18 лет</span> опыта работы на рынке франчайзинга</div>
                <form action="" class="doubt__form">
                    <input type="text" class="doubt__input" data-type="phone" placeholder="Введите ваш номер">
                    <input type="text" class="doubt__input" data-type="time" placeholder="Время звонка">
                    {{-- <div class="doubt__select-wrapper">
                        <select class="doubt__select">
                            <option value="">Время звонка</option>
                            <option value="">11:00</option>
                            <option value="">Время звонка 3</option>
                            <option value="">Время звонка 4</option>
                        </select>
                    </div> --}}
                    <button class="button button--blue doubt__button">Оставить заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection