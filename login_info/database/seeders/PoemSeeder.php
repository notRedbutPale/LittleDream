<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poem;

class PoemSeeder extends Seeder
{
    public function run()
    {
        Poem::create([
            'title' => 'The Little Cloud',
            'content' => "The little cloud drifts in the sky,\nIt floats so high and passes by.\nIt changes shape and dances free,\nA fluffy friend for you and me."
        ]);

        Poem::create([
            'title' => 'Twinkle, Twinkle, Little Star',
            'content' => "Twinkle, twinkle, little star,\nHow I wonder what you are!\nUp above the world so high,\nLike a diamond in the sky."
        ]);

        Poem::create([
            'title' => 'Hickory Dickory Dock',
            'content' => "Hickory dickory dock,\nThe mouse ran up the clock.\nThe clock struck one,\nThe mouse ran down,\nHickory dickory dock."
        ]);
    }
}
