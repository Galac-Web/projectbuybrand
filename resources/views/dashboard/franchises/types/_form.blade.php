<form action="@route('dashboard.franchises.types.save')" method="POST" id="form">
    @csrf
    @isset($type)
        @method('PUT')
        <input type="hidden" name="type_id" value="{{ $type->id }}">
    @endisset
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" value="{{ optional($type)->name }}" class="form-control" placeholder="@lang('Name')">
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>