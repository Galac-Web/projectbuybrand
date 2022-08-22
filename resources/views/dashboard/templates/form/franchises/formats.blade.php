@php
    $format = isset($format) ? $format : null;
    $index = isset($index) ? $index : $loop->index;
    $payback_periods = \App\Services\Models\PaybackPeriod::init()->get();
@endphp

@if ($index > 0)
    <hr>
@endif

<div data-template="{{ $template }}" class="my-5">
    @if ($format)
    <input type="hidden" name="formats[{{ $index }}][format_id]" value="{{ $format->id }}">
    @endif
    <div class="form-row">
        <div class="col-md-5">
            <label for="format_name_{{ $index }}">@lang('Name')</label>
            <input type="text" name="formats[{{ $index }}][name]" id="format_name_{{ $index }}" value="{{ optional($format)->name }}" class="form-control" placeholder="@lang('Name')">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-md-5">
            <label for="format_description_{{ $index }}">@lang('Description')</label>
            <textarea name="formats[{{ $index }}][description]" id="format_description_{{ $index }}" class="form-control" data-editor data-folder="format" data-type="description">{{ isset($format) ? $format->description : null }}</textarea>
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-md-5">
            <label for="format_investments_{{ $index }}">@lang('Investments')</label>
            <div class="d-flex">
                <input type="number" name="formats[{{ $index }}][investments][]" id="format_investments_{{ $index }}" value="{{ isset($format) ? $format->investments_min : null }}" class="form-control">
                <span class="mt-1 mx-3">&mdash;</span>
                <input type="number" name="formats[{{ $index }}][investments][]" id="format_investments_{{ $index }}" value="{{ isset($format) ? $format->investments_max : null }}" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-md-5">
            <div class="form-group">
                <label for="preview">@lang('Preview')</label>
                <div class="custom-file">
                    <input type="file" name="formats[{{ $index }}][preview]" class="custom-file-input" id="format_preview_{{ $index }}" accept="image/*">
                    <label class="custom-file-label" for="format_preview_{{ $index }}">@lang('Select Image')</label>
                </div>
                <div class="upload-preview mt-2">
                    @isset($format)
                        <img src="{{ $format->getFirstMediaUrl('preview', 'md') }}" class="img-preview img-preview-md">
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-md-3">
            <label for="format_payback_period_{{ $index }}">@lang('Payback')</label>
            <select name="formats[{{ $index }}][payback_period]" id="format_payback_period_{{ $index }}" data-select data-placeholder="@lang('Payback')">
                <option></option>
                @foreach ($payback_periods as $period)
                    <option value="{{ $period->id }}" @isset ($format) @selected($format->payback_period->id === $period->id) @endisset>
                        {{ $period->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="format_floor_{{ $index }}">@lang('Floor Space') (м²)</label>
            <input type="text" name="formats[{{ $index }}][floor_space]" id="format_floor_{{ $index }}" value="{{ optional($format)->floor_space }}" class="form-control" placeholder="@lang('Floor Space')">
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="col-md-2">
            <label for="format_staff_{{ $index }}">@lang('Staff')</label>
            <input type="number" name="formats[{{ $index }}][staff]" id="format_staff_{{ $index }}" value="{{ optional($format)->staff }}" class="form-control" placeholder="@lang('Staff')">
        </div>
    </div>
    <div class="form-group mt-3">
        <h6 class="text-dark font-weight-bold mb-2">@lang('Status')</h6>
        <div class="custom-control custom-switch">
            <input type="checkbox" name="formats[{{ $index }}][is_active]" class="custom-control-input" id="format_is_active_{{ $index }}" @checked(optional($format)->is_active ?? true)>
            <label class="custom-control-label" for="format_is_active_{{ $index }}">
                @lang('Is Active')
            </label>
        </div>
    </div>
</div>