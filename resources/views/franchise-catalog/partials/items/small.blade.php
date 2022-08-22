<div class="franchise-card">
    <div class="franchise-card__box">
        <img src="{{ $franchise->getFirstMediaUrl('cover', 'sm') }}" alt="img" class="franchise-card__img">
        <div class="franchise-card__panel">
            <button class="franchise-card__panel-button">
                <div class="franchise-card__panel-icon franchise-card__panel-icon--star"></div>
            </button>
            <button class="franchise-card__panel-button">
                <div class="franchise-card__panel-icon franchise-card__panel-icon--comparison"></div>
            </button>
        </div>
        @if (!empty($franchise->category))
        <div class="franchise-card__tag">
            {{ $franchise->category->name }}
        </div>
        @endif
    </div>
    <div class="franchise-card__inner">
        <a href="@route('franchise.show', $franchise)" class="franchise-card__title">
            {{ $franchise->name }}
        </a>
        <div class="franchise-card__price">
            <img src="/assets/images/icons/icons-24-x-24-money.svg" alt="icon" class="franchise-card__price-icon">
            @if ($franchise->terms->investments_min < 500000)
                Менее @price(500000, 'руб.')
            @else
                От @price($franchise->terms->investments_min, 'руб.')
            @endif
        </div>
    </div>
</div>