@unless ($loop->first)
<div class="swiper-slide">
    <div class="material-item material-item--medium">
        <div class="material-item__box" style="background: url('{{ $material->preview }}')">
            <button class="material-item__play"></button>
        </div>
        <div class="material-item__info">
            <div class="material-item__title">
                {{ $material->title }}
            </div>
        </div>
    </div>
</div>
@endunless