@extends('dashboard.layouts.app')

@section('title', $advantage ? 'Редактировать' : 'Добавить')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.advantages.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises.advantages._form')
                </div>
            </div>
        </div>
    </div>
@endsection