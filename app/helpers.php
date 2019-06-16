<?php

function get_gif($id)
{
    $giphyKey = config('services.giphy.key');
    $url = "https://api.giphy.com/v1/gifs/{$id}?api_key={$giphyKey}";

    $client = new \GuzzleHttp\Client();
    $response = $client->get($url);
    $data = json_decode($response->getBody());

    return $data->data;
}

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

function caption_gif($gifId, $text)
{
    $gif = get_gif($gifId);

    Cloudder::upload($gif->images->original->url);
    $uploadedUrl = Cloudder::getResult()['secure_url'];

    $text = urlencode($text);
    $captionedUrl = str_replace('upload/', "upload/l_text:Arial_45_bold_stroke:{$text},g_south,y_30,co_rgb:FFFFFF,bo_5px_solid_black/", $uploadedUrl);

    return $captionedUrl;
}
