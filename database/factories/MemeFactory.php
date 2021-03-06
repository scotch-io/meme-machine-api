<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Meme::class, function (Faker $faker) {
    $randomGif = get_random_gif();

    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'text' => $faker->catchPhrase,
        'gif_id' => $randomGif->id,
        'gif_original_url' => $randomGif->images->original->url,
        'gif_fixed_height_url' => $randomGif->images->fixed_height->url,
        'gif_fixed_width_url' => $randomGif->images->fixed_width->url
    ];
});
