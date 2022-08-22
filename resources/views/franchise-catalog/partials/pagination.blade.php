@if (has_pagination($franchises) && $franchises->hasPages())
<div class="pagination pagination--mt">
    <a href="{{ $franchises->previousPageUrl() ?? 'javascript:void(0)' }}" @class(['pagination__arrow', 'pagination__arrow--disabled' => is_null($franchises->previousPageUrl())])>
        <svg width="13" height="22" class="pagination__icon pagination__icon--prev" viewBox="0 0 13 22" xmlns="http://www.w3.org/2000/svg">
            <path d="m1.138 1.5 10.077 9.508L1 20.5" stroke="currentColor" stroke-width="2.5" fill="none" fill-rule="evenodd"/>
        </svg>
    </a>

    <div class="pagination__pages">
        <span>{{ $franchises->currentPage() }}</span>/{{ $franchises->lastPage() }}
    </div>

    <a href="{{ $franchises->nextPageUrl() ?? 'javascript:void(0)' }}" @class(['pagination__arrow', 'pagination__arrow--disabled' => is_null($franchises->nextPageUrl())])>
        <svg width="13" height="22" class="pagination__icon" viewBox="0 0 13 22" xmlns="http://www.w3.org/2000/svg">
            <path d="m1.138 1.5 10.077 9.508L1 20.5" stroke="currentColor" stroke-width="2.5" fill="none" fill-rule="evenodd"/>
        </svg>
    </a>
</div>
@endif