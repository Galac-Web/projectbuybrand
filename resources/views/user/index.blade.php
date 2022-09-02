@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ media() }}" alt="User Avatar" width="150" height="150">
                <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">Загрузить аватар</button>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Добавление аватара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-container">
                            <img id="image" src="{{ media() }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="image_preview">
                            <img src="{{ auth()->user()->getAvatar(250) }}" alt="">
                        </div>
                        <input type="file" name="avatar" accept="image/*" data-crop="avatar" class="d-none">
                        <button class="btn btn-light btn-icon-right mt-4" onclick='$("[name=\"avatar\"]").trigger("click");'>Загрузить<i class="fal fa-fw fa-cloud-upload"></i></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success" id="image_save">Применить</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#staticBackdrop').modal('show')
    </script>
@endpush