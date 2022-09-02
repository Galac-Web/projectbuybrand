{{-- Динамика открытия --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Opening Dynamics')</h5>
        <v-franchise-opening-dynamics data="{{ isset($franchise) ? $franchise->dynamics->toJson() : json_encode([]) }}"></v-franchise-opening-dynamics>
    </div>
</div>