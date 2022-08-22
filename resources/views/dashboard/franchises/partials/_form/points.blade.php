{{-- Точки франшизы --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Franchise Points')</h5>
        <v-franchise-points data="{{ isset($franchise) ? $franchise->points->load('country')->toJson() : json_encode([]) }}"></v-franchise-points>
    </div>
</div>