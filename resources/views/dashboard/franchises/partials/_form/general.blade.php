{{-- Категории | Тип франшизы --}}
<h5 class="text-dark font-weight-bold mb-4">@lang('General')</h5>
<div class="form-row">
    <div class="col-md-8">
        <label for="category">@lang('Category')</label>
        <select name="categories[]" id="category" data-select data-placeholder="@lang('Categories')" multiple>
            @foreach ($categories->whereNull('parent_id') as $category)
                <option value="{{ $category->id }}" @isset ($franchise) @selected($category->id === optional($franchise->category)->id) @endisset>
                    {{ $category->name }}
                </option>

                @if ($category->childrens->isNotEmpty())
                @foreach ($category->childrens as $children)
                <option value="{{ $children->id }}" @isset ($franchise) @selected($children->id === optional($franchise->category)->id) @endisset>
                    {{ sprintf('%s → %s', $category->name, $children->name) }}
                </option>
                @endforeach
                @endif

            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="type">@lang('Franchise Type')</label>
        <select name="type_id" id="type" data-select data-placeholder="@lang('Franchise Type')" required>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @isset ($franchise) @selected($franchise->type_id === $type->id) @endisset>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
{{-- Название | Шильдики --}}
<div class="form-row mt-3">
    <div class="col-md-8">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" value="{{ optional($franchise)->name }}" class="form-control" placeholder="@lang('Name')" required>
    </div>
    <div class="col-md-4">
        <label for="badge">@lang('Badges')</label>
        <select name="badges[]" id="badge" data-select data-placeholder="@lang('Badges')" multiple>
            @foreach ($badges as $badge)
                <option value="{{ $badge->id }}" @isset ($franchise) @selected($franchise->badges->where('id', $badge->id)->isNotEmpty()) @endisset>
                    {{ $badge->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
{{-- Год основания | Год запуска | Владелец--}}
<div class="form-row mt-3">
    <div class="col-md-1">
        <label for="foundation_year">@lang('Foundation Year')</label>
        <input type="number" max="{{ date('Y') }}" maxlength="4" name="foundation_year" id="foundation_year" value="{{ optional($franchise)->foundation_year }}" class="form-control" placeholder="@lang('Foundation Year')">
    </div>
    <div class="col-md-1">
        <label for="start_year">@lang('Start Year')</label>
        <input type="number" max="{{ date('Y') }}" maxlength="4" name="start_year" id="start_year" value="{{ optional($franchise)->start_year }}" class="form-control" placeholder="@lang('Start Year')">
    </div>
    <div class="col-md-2">
        <label for="region_of_start">Регион начала развития</label>
        <select name="region_start" id="region_of_start">
            @if (isset($franchise) && $franchise->region_start)
            <option value="{{ $franchise->region_start }}">{{ $franchise->region_start }}</option>
            @endif
        </select>
    </div>
    <div class="col-md-4">
        <label for="owner">@lang('Owner')</label>
        <select name="owner_id" id="owner" data-select data-search="true" data-placeholder="@lang('Owner')">
            <option></option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @isset ($franchise) @selected($franchise->owner_id === $user->id) @endisset>
                    {{ sprintf('ID: %s / %s', $user->id, $user->login) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="presets">@lang('Presets')</label>
        <select name="presets[]" id="presets" data-select data-placeholder="@lang('Presets')" multiple>
            @foreach ($presets as $preset)
                <option value="{{ $preset->id }}" @isset ($franchise) @selected($franchise->presetPivot && $franchise->presetPivot->where('id', $preset->id)->isNotEmpty()) @endisset>
                    {{ $preset->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
{{-- Текст анонса --}}
<div class="form-group mt-3">
    <label for="description">Текст анонса</label>
    <textarea name="information[description]" id="description" class="form-control" data-editor data-folder="franchise" data-type="description">{{ isset($franchise) ? $franchise->information->description : null }}</textarea>
</div>
{{-- Текст содержания --}}
<div class="form-group mt-3">
    <label for="content">Текст содержания</label>
    <textarea name="information[content]" id="content" class="form-control" data-editor data-folder="franchise" data-type="content">{{ isset($franchise) ? $franchise->information->content : null }}</textarea>
</div>

@include('dashboard.franchises.partials._form.files')

{{-- Статус --}}
<div class="form-row mt-3">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Status')</h5>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" @checked(optional($franchise)->is_active ?? false)>
            <label class="custom-control-label" for="is_active">
                @lang('Is Active')
            </label>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#region_of_start').select2({
            ajax: {
                url: '/api/v1/geo/getCity',
                data: (params) => {
                    return {
                        value: params.term
                    };
                },
                dataType: 'json',
                processResults: (data) => {
                    if (data.length > 0) {
                        // TODO Remove
                        console.info(data);

                        return {
                            results: data.map((item, i) => {
                                return {
                                    id: item.data.city,
                                    text: item.value,
                                };
                            }),
                        };
                    }
                },
                cache: true,
            }
        });
    </script>
@endpush