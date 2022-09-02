@extends('dashboard.layouts.app')

@section('title', $franchise ? sprintf('Редактирование франшизы — %s', $franchise->name) : 'Новая франшиза')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises._form')
                </div>
            </div>
        </div>
    </div>
@endsection