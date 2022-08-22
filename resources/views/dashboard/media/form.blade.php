@extends('dashboard.layouts.app')

@section('title', $material ? 'Редактировать материал' : 'Новый материал')

@include('dashboard.layouts.inc.form.actions', ['add' => 'dashboard.media.create'])

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @include('dashboard.media._form')
                </div>
            </div>
        </div>
    </div>
@endsection