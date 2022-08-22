{{-- Файлы --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">Файлы</h5>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="logo">@lang('Logo')</label>
                <div class="custom-file">
                    <input type="file" name="logo" class="custom-file-input" id="logo" accept="image/*">
                    <label class="custom-file-label" for="logo">@lang('Select Image')</label>
                </div>
                <div class="upload-preview mt-2">
                    @isset($franchise)
                    <a href="{{ $franchise->getFirstMediaUrl('logo') }}" target="_blank">
                        <img src="{{ $franchise->getFirstMediaUrl('logo', 'md') }}" class="img-preview img-preview-md">
                    </a>
                    @endisset
                </div>
            </div>
            <div class="col-md-4">
                <label for="cover">@lang('Cover')</label>
                <div class="custom-file">
                    <input type="file" name="cover" class="custom-file-input" id="cover" accept="image/*">
                    <label class="custom-file-label" for="cover">@lang('Select Image')</label>
                </div>
                <div class="upload-preview mt-2">
                    @isset($franchise)
                        <a href="{{ $franchise->getFirstMediaUrl('cover') }}" target="_blank">
                            <img src="{{ $franchise->getFirstMediaUrl('cover', 'sm') }}" class="img-preview img-preview-md">
                        </a>
                    @endisset
                </div>
            </div>
            <div class="col-md-4">
                <label for="presentation">@lang('Presentation')</label>
                <div class="custom-file">
                    <input type="file" name="presentation" class="custom-file-input" id="presentation" accept=".eps,.pptx,.pdf">
                    <label class="custom-file-label" for="presentation">@lang('Select File')</label>
                </div>
                <div class="custom-file__list">
                    @if ($franchise && $franchise->getFirstMedia('presentation'))
                    @php
                        $presentation = $franchise->getFirstMedia('presentation');
                    @endphp
                    <a href="{{ $presentation->getUrl() }}" target="_blank" class="custom-file__item">
                        <div class="custom-file__icon" data-extension="{{ $presentation->type }}">
                            <i class="fal fa-fw fa-file"></i>
                        </div>
                        <div class="custom-file__name">
                            {{ $presentation->name }}
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <h5 class="text-dark font-weight-bold mb-4">@lang('Video')</h5>
        @foreach ($video_drivers as $service => $driver)
        <div class="form-group">
            <label for="preview">{{ trans('_video.' . $service) }}</label>
            <input type="text" name="video[{{ $service }}]" class="form-control" placeholder="{{ trans('_video.' . $service) }}" value="{{ isset($franchise) ? optional($franchise->getVideo($service))->value : '' }}">
        </div>
        @endforeach
    </div>
</div>