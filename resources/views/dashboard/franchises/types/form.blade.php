@extends('dashboard.layouts.app')

@section('title', $type ? 'Редактировать тип' : 'Новый тип')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.types.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises.types._form')
                </div>
            </div>
        </div>
    </div>
@endsection