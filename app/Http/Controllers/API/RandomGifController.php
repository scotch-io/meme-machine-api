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
        return format_gif($gif);
    }
}
