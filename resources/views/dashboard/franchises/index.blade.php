@extends('dashboard.layouts.app')

@section('buttons')
    <a href="@route('dashboard.franchises.create')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                <input type="text" name="name" class="form-control" placeholder="Название франшизы" value="{{ request('name') }}">
                            </div>
                            <div class="form-group mb-0 col-sm-1">
                                <select name="status" data-select data-placeholder="@lang('Status')">
                                    <option></option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ strtolower($status) }}" @selected(strtolower($status) === request('status'))>
                                            @lang($status)
                                        </option>
                                    @endforeach
                                </select>
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
            <h6 class="m-0 font-weight-bold text-primary">@lang('Materials')</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 1rem; text-align: center;">#</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 500px;">@lang('Name')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 100px;">@lang('Logo')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 25px;">@lang('Status')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 200px;">@lang('Created At')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px; text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($franchises as $franchise)
                                    <tr>
                                        <td>
                                            {{ $franchise->id }}
                                        </td>
                                        <td>
                                            {{ $franchise->name }}
                                            <br>
                                            @foreach ($franchise->badges as $badge)
                                            <div class="checked-out">
                                                <span class="badge badge-light badge mt-3 p-1">
                                                    <img src="{{ $badge->icon }}" alt="{{ $badge->name }}" class="mr-1" style="height: 1rem;">
                                                    <small>{{ $badge->name }}</small>
                                                </span>
                                            </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ $franchise->getFirstMediaUrl('logo') }}" target="_blank">
                                                    <img src="{{ $franchise->getFirstMediaUrl('logo', 'md') }}" alt="{{ $franchise->name }}" class="img-preview img-preview-sm">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <i @class([
                                                    'fas',
                                                    'fa-fw',
                                                    'fa-check text-success' => $franchise->is_active,
                                                    'fa-times text-danger' => !$franchise->is_active
                                                ])></i>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $franchise->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="btn-group-sm">
                                                    <a href="@route('franchise.show', $franchise->slug)" class="btn btn-dark">
                                                        <i class="fal fa-fw fa-eye"></i>
                                                    </a>
                                                    <a href="@route('dashboard.franchises.edit', $franchise)" class="btn btn-primary">
                                                        <i class="fal fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="$('form#destroy_{{ $franchise->id }}').submit();">
                                                        <i class="fal fa-fw fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="@route('dashboard.franchises.destroy', $franchise)" method="POST" id="destroy_{{ $franchise->id }}">
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
                        {{ $franchises->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection