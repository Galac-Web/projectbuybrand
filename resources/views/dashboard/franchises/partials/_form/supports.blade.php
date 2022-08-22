{{-- Поддержка партнера --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Partner support')</h5>
        @foreach ($supports as $group => $supportsItems)
        <h6 class="text-dark font-weight-bold mb-4">{{ $group }}</h6>
        <div class="form-group row">
            @foreach ($supportsItems as $support)
            <div class="col-md-4">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="supports[]" value="{{ $support->id }}" class="custom-control-input" id="support_{{ $support->id }}" @isset ($franchise) @checked($franchise->supports->where('id', $support->id)->isNotEmpty()) @endisset>
                        <label class="custom-control-label" for="support_{{ $support->id }}">{{ $support->name }}</label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>