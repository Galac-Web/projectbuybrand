<a href="@route('media.show', $material)" class="publications__item">
    <img src="{{ $material->preview }}" alt="img" class="publications__preview">
    <div class="publications__desc publications__desc--mb">
        {{ $material->title }}
    </div>
    <div class="publications__type">
        {{ str()->upper(optional($material->first_tag)->human_name) }}
    </div>
</a>