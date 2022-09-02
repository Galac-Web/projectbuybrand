@extends('layouts.app')

@section('title', trans('Services'))

@section('content')
    <div class="wrapper">
        <div class="container">

            <div class="wrap-tabs wrap-tabs--mb">
                <div class="tabs ">
                    <div class="tabs__item">Геоаналитика</div>
                    <div class="tabs__item">Консалтинг</div>
                    <div class="tabs__item active">Рейтинг франшиз</div>
                    <div class="tabs__item">Каталог франшиз</div>
                    <div class="tabs__item">Реклама на сайте</div>
                    <div class="tabs__item">Каталог поставщиков
                    </div>
                    <div class="tabs__item">Выставка</div>
                    <div class="tabs__item">Вакансии и резюме</div>
                </div>
            </div>


            <div class="content-grid content-grid--gap-md">

                <div class="content-info">

                    <div class="service-info service-info--mb">
                        <div class="service-info__box" style="background-image: url('./assets/images/geoanalitycs.png')">
                            <div class="service-info__name title title--medium">Геоаналитика</div>
                            <div class="service-info__tags">
                                <div class="service-info__tag">Новое</div>
                                <div class="service-info__tag red">Хит</div>
                            </div>
                        </div>
                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                    </div>

                    <div class="service-info service-info--mb service-info--left">

                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button service-info__button--left">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                        <div class="service-info__box" style="background-image: url('./assets/images/consalt.png')">
                            <div class="service-info__name title title--medium">Консалтинг</div>

                        </div>
                    </div>

                    <div class="service-info service-info--mb">
                        <div class="service-info__box" style="background-image: url('./assets/images/geoanalitycs.png')">
                            <div class="service-info__name title title--medium">Рейтинг франшиз</div>
                            <div class="service-info__tags">
                                <div class="service-info__tag green">Бесплатно</div>
                                <div class="service-info__tag">Новое</div>
                                <div class="service-info__tag red">Хит</div>
                            </div>
                        </div>
                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                    </div>

                    <div class="service-info service-info--mb service-info--left">

                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button service-info__button--left">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                        <div class="service-info__box" style="background-image: url('./assets/images/groups.png')">
                            <div class="service-info__name title title--medium">Каталог франшиз</div>

                        </div>
                    </div>


                    <div class="service-info service-info--mb">
                        <div class="service-info__box" style="background-image: url('./assets/images/meeting.png')">
                            <div class="service-info__name title title--medium">Реклама на сайте</div>
                        </div>
                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                    </div>

                    <div class="service-info service-info--mb service-info--left">

                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button service-info__button--left">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                        <div class="service-info__box" style="background-image: url('./assets/images/meeting.png')">
                            <div class="service-info__name title title--medium">Каталог
                                поставщиков</div>

                        </div>
                    </div>


                    <div class="service-info service-info--mb">
                        <div class="service-info__box" style="background-image: url('./assets/images/meeting.png')">
                            <div class="service-info__name title title--medium">Выставка</div>
                        </div>
                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                    </div>

                    <div class="service-info service-info--mb service-info--left">

                        <div class="service-info__content">
    <pre class="service-info__description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

    Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
    </pre>
                            <a href="#" class="button service-info__button service-info__button--left">
                                <img src="./assets/images/icons/icons-24-x-24-chat.svg" alt="icon" class="button__icon button__icon--mr">
                                Чат с менеджером
                            </a>
                        </div>
                        <div class="service-info__box" style="background-image: url('./assets/images/consalt.png')">
                            <div class="service-info__name title title--medium">Вакансии
                                и резюме</div>

                        </div>
                    </div>




                </div>

                <aside class="content-aside content-aside--hidden">
                    <div style="background: url('./assets/images/poster.png')" class="poster poster--width content-aside__poster poster--hidden">
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