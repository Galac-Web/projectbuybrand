@extends('layouts.app')

@section('content')
<div class="container">
    <div class="subscribe" style="margin: 5rem 0;">
        <div class="subscribe__title">@lang('Sign In')</div>
        <form action="@route('login')" method="POST" class="subscribe__box">
            @csrf
            <input type="hidden" name="remember" value="yes">
            <input type="email" name="email" value="{{ old('email') }}" class="input subscribe__input" autocomplete="email" placeholder="@lang('E-Mail')" required autofocus>
            <input type="password" name="password" value="{{ old('email') }}" class="input subscribe__input" autocomplete="current-password" placeholder="@lang('Password')" required>
            <button class="button button--blue subscribe__button">@lang('Log In')</button>
        </form>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="margin-top: 1rem; color: #b5b5b5; display: inline-block;">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
</div>
@endsection
