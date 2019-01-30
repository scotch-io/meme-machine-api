@extends('layouts.app')

@section('content')
<div class="hero is-fullheight is-info">
<div class="hero-body">
<div class="container">
<div class="columns is-centered">
<div class="column is-6">

    @component('components.card')
        @slot('title')
            {{ __('Login') }}
        @endslot

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help is-error" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="password" class="label">{{ __('Password') }}</label>

                <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="help is-error" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="field has-text-right">
                <button type="submit" class="button is-link">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <div>
                    <a href="{{ route('password.request') }}" style="font-size: 11px; margin-top: 10px; opacity: 0.5;">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
                @endif
            </div>
        </form>
    @endcomponent

</div>
</div>
</div>
</div>
</div>
@endsection

