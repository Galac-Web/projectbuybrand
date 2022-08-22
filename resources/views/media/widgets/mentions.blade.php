@if ($material->franchises->isNotEmpty() || $material->persons->isNotEmpty() || $material->related->isNotEmpty())
<aside class="content-aside content-aside--pt">
    <div class="title title--medium">В материале упоминаются:</div>
    <div class="aside-materials aside-materials--mt">
        @if ($material->franchises->isNotEmpty())
        <div class="aside-materials__item">
            <div class="aside-materials__name">@lang('Franchises')</div>
            @foreach ($material->franchises as $franchise)
            <a href="@route('franchise.show', $franchise)" class="aside-materials__link">
                {{ $franchise->name }}
            </a>
            @endforeach
        </div>
        @endif
        @if ($material->persons->isNotEmpty())
        <div class="aside-materials__item">
            <div class="aside-materials__name">@lang('Persons')</div>
            @foreach ($material->persons as $person)
                <a href="javascript:void(0)" class="aside-materials__link">
                    {{ $person->name }}
                </a>
            @endforeach
        </div>
        @endif
        @if ($material->related->isNotEmpty())
        <div class="aside-materials__item">
            <div class="aside-materials__name">@lang('Materials')</div>
            @foreach ($material->related as $related)
            <a href="@route('media.show', $related)" class="aside-materials__link">
                {{ $related->title }}
            </a>
            @endforeach
        </div>
        @endif
    </div>


</aside>
@endif