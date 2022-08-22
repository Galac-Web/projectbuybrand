<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span><a href="https://xn----8sbabdbvtlu6btc5a9e.xn--p1ai/" class="mr-1">веб-разработчик.рф</a>&copy;</span>
        </div>
    </div>
</footer>

@push('modal')
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">@lang('Logout')?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">@lang('Cancel')</button>
                    <a class="btn btn-primary" href="@route('sign-out')">@lang('Sign Out')</a>
                </div>
            </div>
        </div>
    </div>
@endpush