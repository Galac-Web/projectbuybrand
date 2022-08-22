<form action="@route('dashboard.franchises.advantages.save')" method="POST" id="form">
    @csrf
    @isset($advantage)
        @method('PUT')
        <input type="hidden" name="advantage_id" value="{{ $advantage->id }}">
    @endisset
    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input type="text" name="name" id="name" value="{{ optional($advantage)->name }}" class="form-control" placeholder="@lang('Name')">
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>