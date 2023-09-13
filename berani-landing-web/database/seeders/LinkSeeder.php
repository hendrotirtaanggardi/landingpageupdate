<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'user_id' => 2,
            'slug' => 'facebook',
            'name' => 'Facebook',
            'address' => 'facebook.com'
        ]);

        Link::create([
            'user_id' => 2,
            'slug' => 'youtube',
            'name' => 'Youtube',
            'address' => 'youtube.com'
        ]);
    }
}
