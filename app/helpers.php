<?php

function get_random_gif()
{
    $giphyKey = config('services.giphy.key');
    $url = "https://api.giphy.com/v1/gifs/random?api_key={$giphyKey}";

    $client = new \GuzzleHttp\Client();
    $response = $client->get($url);
    $data = json_decode($response->getBody());

    return $data->data;
}
