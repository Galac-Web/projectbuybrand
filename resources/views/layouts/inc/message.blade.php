@if ( session('success') || session('error') )
<div class="modal fade" tabindex="-1" role="dialog" id="alert">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if ( session('success') )
                    @lang('messages.success')
                    @endif
                    @if ( session('error') )
                    @lang('messages.error')
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    @if ( session('success') )
                    {!! session('success') !!}
                    @endif
                    @if ( session('error') )
                    {!! session('error') !!}
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('#alert').modal();
</script>
@endpush

@endif