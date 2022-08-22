<form action="@route('dashboard.franchises.badges.save')" method="POST" id="form" enctype="multipart/form-data">
    @csrf
    @isset($badge)
        @method('PUT')
        <input type="hidden" name="badge_id" value="{{ $badge->id }}">
    @endisset
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" value="{{ optional($badge)->name }}" class="form-control" placeholder="@lang('Name')">
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-file-tab" data-toggle="tab" href="#nav-file" role="tab" aria-controls="nav-file" aria-selected="true">Файл</a>
            <a class="nav-link" id="nav-link-tab" data-toggle="tab" href="#nav-link" role="tab" aria-controls="nav-link" aria-selected="false">Ссылка</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-file" role="tabpanel" aria-labelledby="nav-home-file">
            <div class="form-group mt-3">
                <label for="logo">@lang('Icon')</label>
                <div class="custom-file">
                    <input type="file" name="icon[file]" class="custom-file-input" id="logo" accept="image/*">
                    <label class="custom-file-label" for="logo">@lang('Select Image')</label>
                </div>
                <div class="upload-preview mt-2">
                    @isset($badge)
                        <img src="{{ $badge->icon }}" class="img-preview img-preview-md">
                    @endisset
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-link" role="tabpanel" aria-labelledby="nav-link-tab">
            <div class="form-group mt-3">
                <label for="icon">@lang('Icon')</label>
                <input type="text" name="icon[link]" id="icon" value="{{ optional($badge)->icon }}" class="form-control" placeholder="@lang('Icon')">
            </div>
        </div>
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>