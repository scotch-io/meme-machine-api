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

        return [
            'gif' => [
                'id' => $data->data->id,
                'gif_original_url' => $data->data->images->original->url,
                'gif_fixed_height_url' => $data->data->images->fixed_height->url,
                'gif_fixed_width_url' => $data->data->images->fixed_width->url
            ]
        ];
    }
}
