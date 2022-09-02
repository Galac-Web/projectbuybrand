{{-- Форматы франшизы --}}
<div class="form-row">
    <div class="col-md-12">
        <h5 class="text-dark font-weight-bold mb-4">@lang('Formats, investments, finances of the franchise')</h5>
        <div data-template-container="form.franchises.formats">
            @isset($franchise)
                @foreach ($franchise->formats as $format)
                    @include('dashboard.templates.form.franchises.formats')
                @endforeach
            @endisset
        </div>
    </div>
    <div class="col-md-12">
        <a href="javascript:void(0)" onclick="template.load('form.franchises.formats')" class="btn btn-circle btn-outline-success">
            <i class="fal fa-plus"></i>
        </a>
    </div>
</div>