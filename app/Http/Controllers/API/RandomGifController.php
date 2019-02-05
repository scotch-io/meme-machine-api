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
        $gif = get_random_gif();

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
