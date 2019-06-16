<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use GuzzleHttp\Client;

class Meme extends Model
{
    protected $fillable = [
        'user_id',
        'gif_id',
        'gif_original_url',
        'gif_fixed_height_url',
        'gif_fixed_width_url',
        'captioned_url',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Used when saving memes
     * We'll go grab all the links needed using a gif_id
     */
    public function getGiphyGif()
    {
        if ($this->gif_original_url && $this->gif_fixed_height_url && $this->gif_fixed_width_url)
            return;

        $gif = get_gif($this->gif_id);
        $this->gif_original_url = $gif->images->original->url;
        $this->gif_fixed_height_url = $gif->images->fixed_height->url;
        $this->gif_fixed_width_url = $gif->images->fixed_width->url;
    }
}
