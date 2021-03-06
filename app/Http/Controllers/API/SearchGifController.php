<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class SearchGifController extends Controller
{
    /**
     * Get a random gif from the Giphy API
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $query)
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/search?api_key={$giphyKey}&q={$query}";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody());

        return collect($data->data)->map(function ($gif) {
            return format_gif($gif);
        });
    }
}
