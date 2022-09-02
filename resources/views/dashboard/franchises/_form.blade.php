<form action="@route('dashboard.franchises.save')" method="POST" id="form" enctype="multipart/form-data">
    @csrf

    @isset($franchise)
        @method('PUT')
        <input type="hidden" name="franchise_id" value="{{ $franchise->id }}">
    @endisset

    @php
        $tabs = [
            'general' => [
                'name' => 'Основные',
                'view' => 'dashboard.franchises.partials._form.general',
            ],
            'opening-dynamics' => [
                'name' => 'Динамика открытия',
                'view' => 'dashboard.franchises.partials._form.opening-dynamics',
            ],
            'terms' => [
                'name' => 'Условия',
                'view' => 'dashboard.franchises.partials._form.terms',
            ],
            'supports' => [
                'name' => 'Поддержка',
                'view' => 'dashboard.franchises.partials._form.supports',
            ],
            'advantages' => [
                'name' => 'Преимущества',
                'view' => 'dashboard.franchises.partials._form.advantages',
            ],
            'formats' => [
                'name' => 'Форматы',
                'view' => 'dashboard.franchises.partials._form.formats',
            ],
            'points' => [
                'name' => 'Точки',
                'view' => 'dashboard.franchises.partials._form.points',
            ],
            'requirements' => [
                'name' => trans('Requirements'),
                'view' => 'dashboard.franchises.partials._form.requirements',
            ],
            'faq' => [
                'name' => 'FAQ',
                'view' => 'dashboard.franchises.partials._form.faq',
            ],
            'seo' => [
                'name' => 'SEO',
                'view' => 'dashboard.franchises.partials._form.seo',
            ],
        ];

        $tabsHasActive = array_key_search('active', $tabs) === true;
    @endphp

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            @foreach ($tabs as $tabId => $tab)
            <a @class(['nav-link', 'active' => $tabsHasActive ? isset($tab['active']) : $loop->first]) id="nav-{{ str()->slug($tabId) }}-tab" data-toggle="tab" href="#nav-{{ str()->slug($tabId) }}" role="tab" aria-controls="nav-{{ str()->slug($tabId) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                {{ $tab['name'] }}
            </a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content py-4" id="nav-tabContent">
        @foreach ($tabs as $tabId => $tab)
        <div @class(['tab-pane', 'fade', 'show', 'active' => $tabsHasActive ? isset($tab['active']) : $loop->first]) id="nav-{{ str()->slug($tabId) }}" role="tabpanel" aria-labelledby="nav-{{ str()->slug($tabId) }}-tab">
            @include($tab['view'])
        </div>
        @endforeach
    </div>

    @include('dashboard.layouts.inc.form.submit')
</form>