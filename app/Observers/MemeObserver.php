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
        $meme->getGiphyGifUrls();
    }

    /**
     * Handle the meme "updated" event.
     *
     * @param  \App\Meme  $meme
     * @return void
     */
    public function updated(Meme $meme)
    {
        $meme->getGiphyGifUrls();
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
