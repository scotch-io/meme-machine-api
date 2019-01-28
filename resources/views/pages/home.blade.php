@extends('layouts.app')

@section('content')
<div class="hero is-fullheight is-info">
    <div class="hero-body has-text-centered">
        <div class="container">
            <h1 class="title">Meme Machine API</h1>
            <h2>The API for the Scotch.io Book: <a href="https://scotch.io/books/vue">Vue for the Real World</a></h2>

            <p style="margin-top: 30px; margin-bottom: 15px;">Bought the book? Register now to get your API access.</p>
            <a href="/register" class="button is-warning is-large">Get API Access</a>
        </div>
    </div>
</div>
@endsection
