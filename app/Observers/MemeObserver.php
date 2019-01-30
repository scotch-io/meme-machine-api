<?php

namespace App\Observers;

use App\Meme;
use GuzzleHttp\Client;

class MemeObserver
{
    /**
     * Handle the meme "created" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function created(Meme $meme)
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/{$meme->gif_id}?api_key={$giphyKey}";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody());

        $meme->gif_original_url= $data->data->images->original->url;
        $meme->gif_fixed_height_url= $data->data->images->fixed_height->url;
        $meme->gif_fixed_width_url= $data->data->images->fixed_width->url;
    }

    /**
     * Handle the meme "updated" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function updated(Meme $meme)
    {
        //
    }

    /**
     * Handle the meme "deleted" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function deleted(Meme $meme)
    {
        //
    }

    /**
     * Handle the meme "restored" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function restored(Meme $meme)
    {
        //
    }

    /**
     * Handle the meme "force deleted" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function forceDeleted(Meme $meme)
    {
        //
    }
}
