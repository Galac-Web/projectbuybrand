<form action="@route('dashboard.presets.save')" method="POST" id="form">
    @csrf
    @isset($preset)
        @method('PUT')
        <input type="hidden" name="preset_id" value="{{ $preset->id }}">
    @endisset
    <div class="form-row">
        <div @class([col(6, 12)])>
            <h5 class="text-dark font-weight-bold mb-4">Основная информация</h5>
            <div class="form-group row">
                <div @class([col(10, 12)])>
                    <label for="name">Название</label>
                    <input type="text" name="name" id="name" value="{{ optional($preset)->name }}" class="form-control" placeholder="Название">
                </div>
                <div @class([col(2, 4)])>
                    <label for="type">@lang('Module')</label>
                    <select name="module" id="type" data-select data-placeholder="@lang('Module')">
                        <option></option>
                        @foreach ($modules as $module)
                            <option value="{{ $module }}" @selected($module === optional($preset)->module)>
                                @lang('presets.modules.' . $module)
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div @class([col(6, 12)])>
            <h5 class="text-dark font-weight-bold mb-4">Дополнительно</h5>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="tags">@lang('Tags')</label>
                    <select name="tags[]" id="tags" data-select data-placeholder="@lang('Tags')" multiple="multiple">
                        <option></option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @isset ($preset) @selected($preset->tags->where('id', $tag->id)->isNotEmpty()) @endisset>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>