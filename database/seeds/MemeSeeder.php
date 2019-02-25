<?php

use Illuminate\Database\Seeder;
use App\Meme;

class MemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Meme::class, 20)->create();
    }
}
