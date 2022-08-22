@extends('dashboard.layouts.app')

@section('title', $preset ? 'Редактировать пресет' : 'Новый пресет')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.presets.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.presets._form')
                </div>
            </div>
        </div>
    </div>
@endsection