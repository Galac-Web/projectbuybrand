@section('buttons')
    <div class="btn-group">
        {{-- @if (isset($add) && $add !== $route->current()->getName())
        <a href="{{ route_relative($add) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i>
            @lang('Add')
        </a>
        @endif --}}
        <a href="javascript:void(0)" id="save" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-save fa-sm text-white-50 mr-1"></i>
            @lang('Save')
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('save').addEventListener('click', () => {
            document.getElementById('form').submit();
        });
    </script>
@endpush