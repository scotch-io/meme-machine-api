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
        });
    }
}
