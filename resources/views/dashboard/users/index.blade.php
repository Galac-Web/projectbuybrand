@extends('dashboard.layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 1rem; text-align: center;">ID</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 50px;">@lang('Name')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 190px;">@lang('E-Mail')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 200px;">@lang('Register At')</th>
                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 150px; text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                            <br>
                                            <span class="badge badge-info mt-3">
                                                
                                            </span>
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td title="{{ $user->created_at->format('H:i') }}">
                                            {{ $user->created_at->format('d.m.Y') }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="btn-group-sm">
                                                    <a href="@route('dashboard.users.edit', $user)" class="btn btn-primary">
                                                        <i class="fal fa-fw fa-pen"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-danger" onclick="$('form#destroy_{{ $user->id }}').submit();">
                                                        <i class="fal fa-fw fa-trash"></i>
                                                    </a>
                                                </div>
                                                <form action="@route('dashboard.users.destroy', $user)" method="POST" id="destroy_{{ $user->id }}">
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