{{-- Условия --}}
<div class="form-group">
    <h5 class="text-dark font-weight-bold mb-4">@lang('Terms')</h5>

    <div class="form-row">
        <div class="col-md-2">
            <label for="royalty_type">@lang('Royalty Type')</label>
            <select name="terms[royalty_type]" id="royalty_type" data-select data-placeholder="@lang('Royalty Type')">
                @foreach ($royalty_types as $type)
                    <option value="{{ $type->id }}" @isset ($franchise) @selected($franchise->terms->royalty_type == $type->id) @endisset>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="royalty">@lang('Royalty')</label>
            <input type="text" name="terms[royalty]" id="royalty" value="{{ isset($franchise) ? $franchise->terms->royalty : null }}" class="form-control" placeholder="@lang('Royalty')">
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-2">
            <label for="staff">@lang('Staff')</label>
            <div class="d-flex">
                <input type="number" name="terms[staff][]" id="staff" value="{{ isset($franchise) ? $franchise->terms->staff_min : null }}" class="form-control">
                <span class="mt-1 mx-3">&mdash;</span>
                <input type="number" name="terms[staff][]" id="staff" value="{{ isset($franchise) ? $franchise->terms->staff_max : null }}" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <label for="payback">@lang('Payback')</label>
            <div class="d-flex">
                <input type="number" name="terms[payback][]" id="payback" value="{{ isset($franchise) ? $franchise->terms->payback_min : null }}" class="form-control">
                <span class="mt-1 mx-3">&mdash;</span>
                <input type="number" name="terms[payback][]" id="payback" value="{{ isset($franchise) ? $franchise->terms->payback_max : null }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-2">
            <label for="avg_monthly_revenue">@lang('Avg monthly revenue')</label>
            <input type="number" name="terms[avg_monthly_revenue]" id="avg_monthly_revenue" value="{{ isset($franchise) ? $franchise->terms->avg_monthly_revenue : null }}" class="form-control" placeholder="@lang('Avg monthly revenue')">
        </div>
        <div class="col-md-2">
            <label for="profit">@lang('Profit')</label>
            <input type="number" name="terms[profit]" id="profit" value="{{ isset($franchise) ? $franchise->terms->profit : null }}" class="form-control" placeholder="@lang('Profit')">
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-4">
            <label for="investments">@lang('Investments')</label>
            <div class="d-flex">
                <input type="number" name="terms[investments][]" id="investments" value="{{ isset($franchise) ? $franchise->terms->investments_min : null }}" class="form-control">
                <span class="mt-1 mx-3">&mdash;</span>
                <input type="number" name="terms[investments][]" id="investments" value="{{ isset($franchise) ? $franchise->terms->investments_max : null }}" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-4">
            <label for="lumpsum">@lang('Lumpsum')</label>
            <div class="d-flex">
                <input type="number" name="terms[lumpsum][]" id="lumpsum" value="{{ isset($franchise) ? $franchise->terms->lumpsum_min : null }}" class="form-control">
                <span class="mt-1 mx-3">&mdash;</span>
                <input type="number" name="terms[lumpsum][]" id="lumpsum" value="{{ isset($franchise) ? $franchise->terms->lumpsum_max : null }}" class="form-control">
            </div>
        </div>
    </div>
</div>