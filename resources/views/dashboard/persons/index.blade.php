@extends('dashboard.layouts.app')

@section('buttons')
    <a href="@route('dashboard.persons.create')" data-ajax-form="true" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50 mr-1"></i>
        @lang('Add')
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Filter')</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <form method="GET">
                        <div class="form-row">
                            <div class="form-group mb-0 col-sm-3">
                                <input type="text" name="name" class="form-control" placeholder="@lang('Name')" value="{{ request('name') }}">
                            </div>
                            <div class="form-group mb-0 col d-flex align-items-center justify-content-end">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-success">@lang('Apply')</button>
                                    <a href="@route(Route::current()->getName())" class="btn btn-sm btn-secondary">@lang('Clear')</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@lang('Presets')</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 1rem; text-align: center;">#</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 500px;">@lang('Title')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 200px;">@lang('Created At')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px; text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persons as $person)
                                    <tr>
                                        <td>
                                            {{ $person->id }}
                                        </td>
                                        <td>
                                            {{ $person->name }}
                                        </td>
                                        <td>
                                            {{ $person->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="btn-group-sm">
                                                    <a href="@route('dashboard.persons.edit', $person)" data-ajax-form="true" class="btn btn-primary">
                                                        <i class="fal fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="$('form#destroy_{{ $person->id }}').submit();">
                                                        <i class="fal fa-fw fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="@route('dashboard.persons.destroy', $person)" method="POST" id="destroy_{{ $person->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-end">
                        {{ $persons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection