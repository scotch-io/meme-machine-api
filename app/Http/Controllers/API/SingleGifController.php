<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class SingleGifController extends Controller
{
    public function __invoke(string $id)
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/{$id}?api_key={$giphyKey}";

        $client = new Client();
        $response = $client->get($url);
        $gif = json_decode($response->getBody());

        return format_gif($gif);
    }
}
