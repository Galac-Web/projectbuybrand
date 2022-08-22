<div {{ $attributes }}>
    @if (!empty($socials))
        @if ($horizontal)
        <p class="horizontal-caption">
            @lang('or')
        </p>
        @endif
        <ul class="auth-social-list list-inline">
            @foreach ($socials as $social)
            <li>
                <a href="@route($route, ['driver' => $social])" onclick="auth(this); return false;" title="@lang('Sign In with :social', ['social' => trans("socials.$social")])">
                    <span class="icon icon-{{ $social }}"></span>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
</div>