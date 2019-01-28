@extends('layouts.app')

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

    <div class="notification is-info">
        <p>Welcome to the Meme Machine API! Use this User ID when connecting to the API:</p>

        <p>
            <strong>Your User ID:</strong> {{ auth()->user()->id }}<br>
        </p>
    </div>

    <h1>Using the API</h1>

    <h2>Getting Started</h2>

    <p>Here are the main details about using the API. All your API requests will be made to:</p>

<pre><code>https://memes.com/api</code></pre>

    <p>Once authenticated, you can hit any of the following endpoints.</p>

    <p>You will also need to pass an <code>Authorization</code> header with your JWT token. You'll get this token from hitting the <code>/api/login</code> endpoint with your email and password.

    <h2>Authentication</h2>

    <pre><code>POST https://memes.com/api/login</code></pre>

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

    <pre><code>GET https://memes.com/api/gifs/random</code></pre>

    <h3>Example Response (200 OK)</h3>

    <pre><code>{
    "gif": {
        "id": "xUNd9CS9KPooR9zNTi",
        "gif_original_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/giphy.gif",
        "gif_fixed_height_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200.gif",
        "gif_fixed_width_url": "https://media2.giphy.com/media/xUNd9CS9KPooR9zNTi/200w.gif"
    }
}</code></pre>

    <h2>Getting All Memes</h2>

    <p><strong>No authentication required.</strong> Get all the memes that you have created. Good for displaying </p>

    <pre><code>GET https://memes.com/api/{user_id}/memes</code></pre>

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

    <h2>Deleting a Meme</h2>

</div>
</div>
</div>
</section>
@endsection
