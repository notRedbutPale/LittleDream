<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    public function run()
    {
        Story::create([
            'title' => 'The Brave Little Fox',
            'content' => 'Once upon a time, there was a brave little fox...',
        ]);

        Story::create([
            'title' => 'The Magical Forest',
            'content' => 'In a magical forest far away...',
        ]);

        // Add more stories as needed
    }
}
