<a href="@route('media.show', $material)" class="publications__article publications__article--mb">
    <div class="publications__box">
        <div class="publications__name">
            {{ $material->title }}
        </div>
        <div class="publications__desc">
            {{ str(strip_tags($material->content))->limit(400) }}
        </div>
        <div class="publications__type">
            {{ str()->upper(optional($material->first_tag)->human_name) }}
        </div>
    </div>
    <img src="{{ $material->preview }}" alt="img" class="publications__img">
</a>