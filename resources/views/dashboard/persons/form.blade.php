@extends('dashboard.layouts.app')

@section('title', $person ? 'Редактировать персону' : 'Новая персона')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.persons.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.persons._form')
                </div>
            </div>
        </div>
    </div>
@endsection