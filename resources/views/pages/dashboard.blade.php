@extends('layouts.app')

@php
    $apiUrl = "https://memes.com/api/" . auth()->user()->id;
@endphp

@section('content')
<style>
    h2 {
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px !important;
        margin-bottom: 20px !important;
        margin-top: 70px !important;
    }
</style>

<section class="section">
<div class="container">
<div class="columns is-centered">
<div class="column is-8 content">

    <div class="notification is-info" style="margin-bottom: 50px;">
        <p>Welcome to the Meme Machine API! Use this User ID when connecting to the API:</p>

        <p>
            <strong>Your User ID:</strong> {{ auth()->user()->id }}<br>
            <strong>Your API URL:</strong> <code>{{ $apiUrl }}</code>
        </p>
    </div>

    <h1>Using the API</h1>

    <h2>Getting Started</h2>

    <p>Here are the main details about using the API. All your API requests will be made to:</p>

<pre><code>{{ $apiUrl }}</code></pre>

    <p>Once authenticated, you can hit any of the following endpoints.</p>

    <p>You will also need to pass an <code>Authorization</code> header with your JWT token. You'll get this token from hitting the <code>/api/login</code> endpoint with your email and password.

    <h2>Registering</h2>

    <pre><code>POST {{ $apiUrl }}/register</code></pre>

    <h3>Parameters</h3>

    <ul>
        <li><strong>email</strong></li>
        <li><strong>password</strong></li>
    </ul>

    <h3>Example Response (200 OK)</h3>

    <pre><code>{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU0ODcwMadf3iZXhwIjoxNTQ4NzA3MTU5LCJuYmYiOjE1NDg3MDM1NTksImp0aSI6Ijk4WkJWVEFVUnpOR0xSbGYiLCJzdWIiOjEs3234Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.81DfsukL0laqoXmA5Se_O5-Pg7FGSSb2mLhn0jql1rk",
    "token_type": "bearer",
    "expires_in": 3600
}</code></pre>

    <h2>Logging In</h2>

    <pre><code>POST {{ $apiUrl }}/login</code></pre>

    <h3>Parameters</h3>

    <ul>
        <li><strong>email</strong></li>
        <li><strong>password</strong></li>
    </ul>

    <h3>Example Response (200 OK)</h3>

<pre><code>{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU0ODcwMadf3iZXhwIjoxNTQ4NzA3MTU5LCJuYmYiOjE1NDg3MDM1NTksImp0aSI6Ijk4WkJWVEFVUnpOR0xSbGYiLCJzdWIiOjEs3234Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.81DfsukL0laqoXmA5Se_O5-Pg7FGSSb2mLhn0jql1rk",
    "token_type": "bearer",
    "expires_in": 3600
}</code></pre>

    <h2>Getting a Random Gif</h2>

    <p><strong>No authentication required.</strong> Get a random gif and use it to generate a new meme.</p>

    <pre><code>GET {{ $apiUrl }}/gifs/random</code></pre>

    <h3>Example Response (200 OK)</h3>

    <pre><code>{
    "id": "xULW8s8YUGAxkWGTxm",
    "images": {
        "original": "https://media2.giphy.com/media/xULW8s8YUGAxkWGTxm/giphy.gif",
        "fixed_height": "https://media2.giphy.com/media/xULW8s8YUGAxkWGTxm/200.gif",
        "fixed_width": "https://media2.giphy.com/media/xULW8s8YUGAxkWGTxm/200w.gif"
    },
    "author": {
        "username": "the_chosen_one",
        "avatar": "https://media.giphy.com/avatars/the_chosen_one/xjjgHCBsAGjG.gif"
    }
}</code></pre>

    <h2>Searching for Gifs</h2>

    <p><strong>No authentication required.</strong> Search for a gif that you will want to use. Pass in a search term and we'll grab anything that matches</p>

    <pre><code>GET {{ $apiUrl }}/gifs/search</code></pre>

    <h3>Parameters</h3>

    <ul>
        <li><strong>query</strong></li>
    </ul>

    <h3>Example Response (200 OK)</h3>

    <pre><code>[
    {
        "id": "ZnZrgIwPaDcnS",
        "images": {
            "original": "https://media0.giphy.com/media/ZnZrgIwPaDcnS/giphy.gif",
            "fixed_height": "https://media0.giphy.com/media/ZnZrgIwPaDcnS/200.gif",
            "fixed_width": "https://media0.giphy.com/media/ZnZrgIwPaDcnS/200w.gif"
        },
        "author": {
            "username": "guillellano",
            "avatar": "https://media3.giphy.com/avatars/default2.gif"
        }
    },
    {
        "id": "3ov9kacqGycKQRH6Vy",
        "images": {
            "original": "https://media1.giphy.com/media/3ov9kacqGycKQRH6Vy/giphy.gif",
            "fixed_height": "https://media1.giphy.com/media/3ov9kacqGycKQRH6Vy/200.gif",
            "fixed_width": "https://media1.giphy.com/media/3ov9kacqGycKQRH6Vy/200w.gif"
        },
        "author": {
            "username": "bentuber",
            "avatar": "https://media1.giphy.com/avatars/bentuber/EBzFUD0dVy8X.png"
        }
    }
]</code></pre>

    <h2>Getting All Memes</h2>

    <p><strong>No authentication required.</strong> Get all the memes that you have created. Good for displaying on your home page.</p>

    <pre><code>GET {{ $apiUrl }}/memes</code></pre>

    <h3>Parameters</h3>

    <ul>
        <li><strong>email</strong></li>
        <li><strong>password</strong></li>
    </ul>

    <h3>Example Response (200 OK)</h3>

    <p>This API call returns an <code>array</code> of <code>meme objects</code>.</p>

<pre><code>{
    "data": [
        {
            "id": 1,
            "gif_id": "xUNd9CS9KPooR9zNTi",
            "gif_original_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/giphy.gif",
            "gif_fixed_height_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200.gif",
            "gif_fixed_width_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200w.gif",
            "text": "meme title"
        }
    ]
}</code></pre>

    <h2>Creating a Meme</h2>

    <p><strong>Authentication required.</strong> Create a meme using a gif that you got from the the search or random gif endpoints.</p>

    <pre><code>POST {{ $apiUrl }}/memes</code></pre>

    <h3>Parameters</h3>

    <ul>
        <li><strong>gif_id</strong></li>
        <li><strong>text</strong></li>
    </ul>

    <h3>Example Response (200 OK)</h3>

    <p>This API call returns an <code>array</code> of <code>meme objects</code>.</p>

<pre><code>{
    "data": [
        {
            "id": 1,
            "gif_id": "xUNd9CS9KPooR9zNTi",
            "gif_original_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/giphy.gif",
            "gif_fixed_height_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200.gif",
            "gif_fixed_width_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200w.gif",
            "text": "meme title"
        }
    ]
}</code></pre>

    <h2>Deleting a Meme</h2>

</div>
</div>
</div>
</section>
@endsection
