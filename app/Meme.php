<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
}
