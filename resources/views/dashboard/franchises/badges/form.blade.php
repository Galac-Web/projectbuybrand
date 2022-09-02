@extends('dashboard.layouts.app')

@section('title', $badge ? 'Редактировать' : 'Создать')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.franchises.badges.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.franchises.badges._form')
                </div>
            </div>
        </div>
    </div>
@endsection