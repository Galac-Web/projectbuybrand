<div class="form-group">
    <h5 class="text-dark font-weight-bold mb-4">@lang('surveyor')</h5>

    <div class="form-row">
        <div class="col-md-2">
            <label for="royalty_type">@lang('Reformulate informational')</label>
            <select name="surveyor[informational]" id="surveyor" data-select data-placeholder="@lang('Reformulate informational')">
                <option value="">@lang('selectdefault')</option>
                <option value="yes">Да</option>
                <option value="no">Нет</option>
            </select>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-2">
            <label for="staff">@lang('data returnmony')</label>
            <div class="d-flex">
                <input type="number" name="surveyor[returnmony]" id="data returnmony" value="" class="form-control">

            </div>
        </div>
        <div class="col-md-5">
            <div class="col-md-2">
                <label for="declared">@lang('declared investments')</label>
                <select name="surveyor[declared]" id="declared" data-select data-placeholder="@lang('declared investments')">
                    <option value="">@lang('selectdefault')</option>
                    <option value="yes">Да</option>
                    <option value="no">Нет</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-2">
            <label for="Possibilitykontact">@lang('Possibility kontact')</label>
            <select name="surveyor[kontactposibility]" id="Possibilitykontact" data-select data-placeholder="@lang('Possibility kontact')">
                <option value="">@lang('selectdefault')</option>
                <option value="yes">Да</option>
                <option value="no">Нет</option>
            </select>        </div>
        <div class="col-md-2">
            <label for="presencemutual">@lang('presence of mutual')</label>
            <select name="surveyor[presencemutual]" id="presencemutual" data-select data-placeholder="@lang('presence of mutual')">
                <option value="">@lang('selectdefault')</option>
                <option value="yes">Да</option>
                <option value="no">Нет</option>
            </select>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-4">
            <label for="Conformitysupport">@lang('Conformity of the support actually')</label>
            <select name="surveyor[conformitysupport]" id="Conformitysupport" data-select data-placeholder="@lang('Conformity of the support actually')">
                <option value="">@lang('selectdefault')</option>
                <option value="yes">Да</option>
                <option value="no">Нет</option>
            </select>
        </div>
    </div>

    <div class="form-row mt-5">
        <div class="col-md-4">
            <label for="Wouldreopen">@lang('Would reopen')</label>
            <select name="surveyor[wouldreopen]" id="Wouldreopen" data-select data-placeholder="@lang('Would reopen')">
                <option value="">@lang('selectdefault')</option>
                <option value="yes">Да</option>
                <option value="no">Нет</option>
            </select>
        </div>
    </div>
</div>
