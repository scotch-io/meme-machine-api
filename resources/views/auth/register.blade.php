@extends('layouts.app')

@section('content')
<div class="hero is-fullheight is-info">
<div class="hero-body">
<div class="container">
<div class="columns is-centered">
<div class="column is-6">

    @component('components.card')
        @slot('title')
            {{ __('Register') }}
        @endslot

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name" class="label">{{ __('Name') }}</label>

                <input id="name" type="text" class="input {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="password" class="label">{{ __('Password') }}</label>

                <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="field">
                <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="input " name="password_confirmation" required>
            </div>

            <div class="has-text-right">
                <button type="submit" class="button is-link">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    @endcomponent

</div>
</div>
</div>
</div>
</div>
@endsection
