{{-- Требования --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Requirements')</h5>
        <v-franchise-requirements data="{{ isset($franchise) ? $franchise->requirements->load('media')->toJson() : json_encode([]) }}"></v-franchise-requirements>
    </div>
</div>