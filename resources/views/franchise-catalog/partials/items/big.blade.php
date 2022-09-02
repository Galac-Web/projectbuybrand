<div class="media-post franchise-list--big">
    <div style="background-image: url('{{ $franchise->getFirstMediaUrl('cover', 'md') }}')" class="media-post__box media-post__box--big-h">
        <div class="media-post__head media-post__head--start">
            <div class="media-post__logo">
                <img src="{{ $franchise->getFirstMediaUrl('logo', 'lg') }}" alt="{{ $franchise->name }}" class="media-post__logo-img">
            </div>

            <div class="icons">
                <button class="icons__item icons__item--dark-square active">
                    <span class="icons__icon icons__icon--star"></span>
                </button>
                <button class="icons__item icons__item--dark-square active">
                    <span class="icons__icon icons__icon--comparison"></span>
                </button>
            </div>
        </div>
        @if (!empty($franchise->category))
        <div class="media-post__wrap">
            <div class="media-post__tag">
                {{ $franchise->category->name }}
            </div>
        </div>
        @endif
    </div>
    <div class="media-post__inner">
        <a href="@route('franchise.show', $franchise)" class="media-post__head media-post__head--mb media-post__head--justify">
            <div class="title title--md">
                {{ $franchise->name }}
            </div>
            <img class="media-post__arrow" src="/assets/images/icons/icons-arrow-next.svg">
        </a>

        @if ($franchise->information->description)
        <div class="media-post__text media-post__text--small media-post__text--mb">
            {!! str(strip_tags($franchise->information->description))->limit(400) !!}
        </div>
        @endif

        <div class="media-post__bottom">
            <div class="price-range">
                <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon" class="price-range__icon">
                <div class="price-range__text">
                    @price($franchise->terms->investments_min, 'руб.') — @price($franchise->terms->investments_max, 'руб.')
                </div>
            </div>

            <div class="icons media-post__icons">
                <a href="#" class="icons__item">
                    <img src="/assets/images/icons/graph.svg" alt="icon" class="icons__icon">
                </a>
                <a href="#" class="icons__item">
                    <img src="/assets/images/icons/rating.svg" alt="icon" class="icons__icon">
                </a>
                <a href="#" class="icons__item">
                    <img src="/assets/images/icons/chat.svg" alt="icon" class="icons__icon">
                </a>
            </div>
        </div>
    </div>
</div>