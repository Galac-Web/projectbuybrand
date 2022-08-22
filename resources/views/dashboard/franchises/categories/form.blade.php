@extends('dashboard.layouts.app')

@section('title', $category ? 'Редактировать категорию' : 'Добавить категорию')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.categories.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises.categories._form')
                </div>
            </div>
        </div>
    </div>
@endsection