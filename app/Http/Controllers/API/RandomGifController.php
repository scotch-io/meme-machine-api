<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class RandomGifController extends Controller
{
    /**
     * Get a random gif from the Giphy API
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/random?api_key={$giphyKey}";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody());
        $gif = $data->data;

        $randomGif = [
            'id' => $gif->id,
            'images' => [
                'original' => $gif->images->original->url,
                'fixed_height' => $gif->images->fixed_height->url,
                'fixed_width' => $gif->images->fixed_width->url,
            ]
        ];

        if (isset($gif->user)) {
            $randomGif['author'] = [
                'username' => $gif->username,
                'avatar' => $gif->user->avatar_url
            ];
        }

        return $randomGif;
    }
}
