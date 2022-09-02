@extends('dashboard.layouts.app')

@section('buttons')
    <a href="@route('dashboard.media.create')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                <input type="text" name="title" class="form-control" placeholder="@lang('Title')" value="{{ request('title') }}">
                            </div>
                            <div class="form-group mb-0 col-sm-1">
                                <select name="type" data-select data-placeholder="@lang('Media Type')">
                                    <option></option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @selected($type->id == request('type'))>
                                            {{ $type->human_name }}
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
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 500px;">@lang('Title')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 100px;">@lang('Preview')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 25px;">@lang('Status')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 200px;">@lang('Created At')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px; text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materials as $material)
                                    <tr>
                                        <td>
                                            {{ $material->id }}
                                        </td>
                                        <td>
                                            {{ $material->title }}
                                            <br>
                                            <span class="badge badge-info mt-3">
                                                {{ $material->type->human_name }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ $material->preview }}" target="_blank">
                                                <img src="{{ $material->preview }}" alt="{{ $material->title }}" class="img-preview img-preview-md">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <i @class([
                                                    'fas',
                                                    'fa-fw',
                                                    'fa-check text-success' => $material->is_active,
                                                    'fa-times text-danger' => !$material->is_active
                                                ])></i>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $material->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="btn-group-sm">
                                                    <a href="@route('media.show', $material->slug)" class="btn btn-dark">
                                                        <i class="fal fa-fw fa-eye"></i>
                                                    </a>
                                                    <a href="@route('dashboard.media.edit', $material)" class="btn btn-primary">
                                                        <i class="fal fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="$('form#destroy_{{ $material->id }}').submit();">
                                                        <i class="fal fa-fw fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="@route('dashboard.media.destroy', $material)" method="POST" id="destroy_{{ $material->id }}">
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
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection