<a href="@route('media.show', $material)" class="news-aside__item">
    <div class="news-aside__date">
        {{ $material->created_at->format('F d, Y') }}
    </div>
    <div class="news-aside__name">
        {{ $material->title }}
    </div>
    <div class="news-aside__type">
        {{ str()->upper(optional($material->first_tag)->human_name) }}
    </div>
</a>