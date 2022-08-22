@extends('dashboard.layouts.app')

@section('title', request('parent_id') ? $categories->name : trans('Categories'))

@section('buttons')
    <a href="@route('dashboard.franchises.categories.create')" data-ajax-form="true" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50 mr-1"></i>
        @lang('Add')
    </a>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if (request('parent_id'))
                @lang('Subcategories')
                @else
                @lang('Categories')
                @endif
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 500px;">@lang('Name')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10px;">@lang('Sort')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px; text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (request('parent_id') ? $categories->childrens : $categories as $category)
                                    <tr>
                                        <td>
                                            @if ($category->childrens->isNotEmpty())
                                            <a href="@route(route_current()->getName(), ['parent_id' => $category->id])">
                                                {{ $category->name }}
                                            </a>
                                            @else
                                            {{ $category->name }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $category->sort }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="btn-group-sm">
                                                    <a href="@route('dashboard.franchises.categories.edit', $category)" data-ajax-form="true" class="btn btn-primary">
                                                        <i class="fal fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="if (confirm('@lang('Confirm Delete')')) $('form#destroy_{{ $category->id }}').submit();">
                                                        <i class="fal fa-fw fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="@route('dashboard.franchises.categories.destroy', $category)" method="POST" id="destroy_{{ $category->id }}">
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
        </div>
    </div>
@endsection