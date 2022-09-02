@extends('dashboard.layouts.app')

@section('title', $support ? 'Редактировать' : 'Добавить')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.supports.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises.supports._form')
                </div>
            </div>
        </div>
    </div>
@endsection