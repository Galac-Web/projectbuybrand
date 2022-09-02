<form action="@route('dashboard.franchises.supports.save')" method="POST" id="form">
    @csrf
    @isset($support)
        @method('PUT')
        <input type="hidden" name="support_id" value="{{ $support->id }}">
    @endisset
    <div class="form-group row">
        <div @class([col(4, 12)])>
            <label for="group">@lang('Group')</label>
            <select name="group_id" id="group" data-select data-placeholder="@lang('Group')">
                <option></option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}" @isset ($support) @selected($support->group_id === $group->id) @endisset>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div @class([col(6, 10), 'mt-3' => request()->ajax()])>
            <label for="name">@lang('Name')</label>
            <input type="text" name="name" id="name" value="{{ optional($support)->name }}" class="form-control" placeholder="@lang('Name')">
        </div>
        <div @class([col(2, 2), 'mt-3' => request()->ajax()])>
            <label for="sort">@lang('Sort')</label>
            <input type="text" name="sort" id="sort" value="{{ optional($support)->sort }}" class="form-control" placeholder="@lang('Sort')">
        </div>
    </div>
    @include('dashboard.layouts.inc.form.submit')
</form>