{{-- Часто задаваемые вопросы --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('FAQ')</h5>
        <v-franchise-faq data="{{ isset($franchise) ? $franchise->faq->toJson() : json_encode([]) }}"></v-franchise-faq>
    </div>
</div>