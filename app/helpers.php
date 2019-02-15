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

function format_gif($gif)
{
    $data = [
        'id' => $gif->id,
        'images' => [
            'original' => $gif->images->original->url,
            'fixed_height' => $gif->images->fixed_height->url,
            'fixed_width' => $gif->images->fixed_width->url,
        ]
    ];

    if (isset($gif->user)) {
        $data['author'] = [
            'username' => $gif->username,
            'avatar' => $gif->user->avatar_url
        ];
    }

    return $data;
}
