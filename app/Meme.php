<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use GuzzleHttp\Client;

class Meme extends Model
{
    protected $fillable = [
        'gif_id',
        'gif_original_url',
        'gif_fixed_height_url',
        'gif_fixed_width_url',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGiphyGif()
    {
        $giphyKey = config('services.giphy.key');
        $url = "https://api.giphy.com/v1/gifs/{$this->gif_id}?api_key={$giphyKey}";

        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody());

        $this->gif_original_url= $data->data->images->original->url;
        $this->gif_fixed_height_url= $data->data->images->fixed_height->url;
        $this->gif_fixed_width_url= $data->data->images->fixed_width->url;
    }
}
