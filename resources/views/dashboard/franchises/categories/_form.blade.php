<form action="@route('dashboard.franchises.categories.save')" method="POST" id="form">
    @csrf
    @isset($category)
        @method('PUT')
        <input type="hidden" name="category_id" value="{{ $category->id }}">
    @endisset
    @unless (isset($category) && is_null($category->parent_id))
    <div class="form-group">
        <label for="parent">@lang('Parent Category')</label>
        <select name="parent_id" id="parent" data-select data-placeholder="@lang('Parent Category')">
            <option value="0">Без категории</option>
            @foreach ($categories as $parent)
                <option value="{{ $parent->id }}" @isset ($category) @selected($category->parent_id === $parent->id) @endisset>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>
    @endunless
    <div class="form-row">
        <div class="col-md-10">
            <label for="name">@lang('Name')</label>
            <input type="text" name="name" id="name" value="{{ optional($category)->name }}" class="form-control" placeholder="@lang('Name')">
        </div>
        <div class="col-md-2">
            <label for="sort">@lang('Sort')</label>
            <input type="text" name="sort" id="sort" value="{{ optional($category)->sort ?? 1 }}" class="form-control" placeholder="@lang('Sort')">
        </div>
    </div>
    <div class="form-group mt-3">
        <label for="description">@lang('Description')</label>
        <textarea name="description" id="description" class="form-control" data-editor data-folder="media" data-type="description">{{ optional($category)->description }}</textarea>
    </div>
    <div class="form-row mt-5">
        <div class="col-md-12">
            <h5 class="text-dark font-weight-bold mb-4">SEO</h5>
            <div class="form-group">
                <label for="slug">@lang('SEO URL')</label>
                <input type="text" name="slug" id="slug" value="{{ optional($category)->slug }}" class="form-control" placeholder="@lang('SEO URL')">
            </div>
        </div>
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>