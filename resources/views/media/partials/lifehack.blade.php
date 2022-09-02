<div class="swiper-slide">
    <a href="@route('media.show', $material)" class="poster-news">
        <div style="background: url('{{ $material->preview }}')" class="poster poster--news ">
            <div class="poster__play">
                <img src="/assets/images/icons/play.svg" alt="play" class="poster__play-icon">
            </div>
            <div class="poster-news__tag">@lang('Lifehack')</div>
        </div>
        <div class="poster-news__inner poster-news__inner--start">
            <div class="poster-news__date poster-news__date--mb">{{ $material->created_at->format('d.m.Y') }}</div>
            <div class="poster-news__text poster-news__text--lh">{{ $material->title }}</div>
        </div>
    </a>
</div>