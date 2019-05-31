<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class TrendingGifController extends Controller
{
    public function __invoke()
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/trending?api_key={$giphyKey}&limit=24";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody());

        return collect($data->data)->map(function ($gif) {
            return format_gif($gif);
        });
    }
}
