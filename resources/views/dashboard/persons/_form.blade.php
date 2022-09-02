<form action="@route('dashboard.persons.save')" method="POST" id="form">
    @csrf
    @isset($preset)
        @method('PUT')
        <input type="hidden" name="preset_id" value="{{ $person->id }}">
    @endisset
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" value="{{ optional($person)->name }}" class="form-control" placeholder="@lang('Name')">
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>