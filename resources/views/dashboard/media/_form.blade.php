<form action="@route('dashboard.media.save')" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    @isset($material)
        @method('PUT')
        <input type="hidden" name="material_id" value="{{ $material->id }}">
    @endisset
    <div class="form-row">
        <div class="col-md-12">
            <h5 class="text-dark font-weight-bold mb-4">Основная информация</h5>
            <div class="form-group row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">@lang('Title')</label>
                            <input type="text" name="title" id="title" value="{{ optional($material)->title }}" class="form-control" placeholder="@lang('Title')" required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="subtitle">@lang('Subtitle')</label>
                            <input type="text" name="subtitle" id="subtitle" value="{{ optional($material)->subtitle }}" class="form-control" placeholder="@lang('Subtitle')">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="type">@lang('Media Type')</label>
                    <select name="type_id" id="type" data-select data-placeholder="@lang('Media Type')">
                        <option></option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($type->id === optional($material)->type_id)>
                                {{ $type->human_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description">@lang('Description')</label>
                <textarea name="description" id="description" class="form-control" data-editor data-folder="media" data-type="description">{{ optional($material)->content }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="col-md-6">
            <h5 class="text-dark font-weight-bold mb-4">Дополнительно</h5>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="tags">@lang('Tags')</label>
                    <select name="tags[]" id="tags" data-select data-placeholder="@lang('Tags')" multiple="multiple">
                        <option></option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @isset ($material) @selected($material->tags->where('id', $tag->id)->isNotEmpty()) @endisset>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="franchises">@lang('Franchises')</label>
                    <select name="franchises[]" id="franchises" data-select data-placeholder="@lang('Franchises')" multiple="multiple">
                        <option></option>
                        @foreach ($franchises as $franchise)
                            <option value="{{ $franchise->id }}" @isset ($material) @selected($material->franchises->where('id', $franchise->id)->isNotEmpty()) @endisset>
                                {{ $franchise->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="persons">@lang('Persons')</label>
                    <select name="persons[]" id="persons" data-select data-placeholder="@lang('Persons')" multiple="multiple">
                        <option></option>
                        @foreach ($persons as $person)
                            <option value="{{ $person->id }}" @isset ($material) @selected($material->persons->where('id', $person->id)->isNotEmpty()) @endisset>
                                {{ $person->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="type">@lang('Status')</label>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" @checked(optional($material)->is_active ?? true)>
                    <label class="custom-control-label" for="is_active">
                        @lang('Is Active')
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="text-dark font-weight-bold mb-4">Файлы</h5>
            <div class="form-group">
                <label for="preview">@lang('Preview')</label>
                <div class="custom-file">
                    <input type="file" name="preview" class="custom-file-input" id="preview" accept="image/*">
                    <label class="custom-file-label" for="preview">@lang('Select Image')</label>
                </div>
                <div class="upload-preview mt-2">
                    @isset($material)
                        <img src="{{ $material->preview }}" class="img-preview img-preview-md">
                    @endisset
                </div>
            </div>
            @foreach ($video_drivers as $service => $driver)
            <div class="form-group">
                <label for="preview">{{ trans('_video.' . $service) }}</label>
                <input type="text" name="video[{{ $service }}]" class="form-control" placeholder="{{ trans('_video.' . $service) }}" value="{{ isset($material) ? optional($material->getVideo($service))->value : '' }}">
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="col-md-12">
            <h5 class="text-dark font-weight-bold mb-4">@lang('Relationships')</h5>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="related">@lang('Related Materials')</label>
                    <select name="related[]" id="related" data-select data-placeholder="@lang('Related Materials')" multiple="multiple">
                        <option></option>
                        @foreach ($materials as $related)
                            <option value="{{ $related->id }}" @isset ($material) @selected($material->related->where('id', $related->id)->isNotEmpty()) @endisset>
                                {{ $related->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mt-5">
        <div class="col-md-12">
            <h5 class="text-dark font-weight-bold mb-4">SEO</h5>
            <div class="form-group">
                <label for="slug">@lang('SEO URL')</label>
                <input type="text" name="slug" id="slug" value="{{ optional($material)->slug }}" class="form-control" placeholder="@lang('SEO URL')">
            </div>
        </div>
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>