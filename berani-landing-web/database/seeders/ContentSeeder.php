<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            "about" => "Not Assigned"
        ]);

        Content::create([
            'about' => "Landing Page"
        ]);

        Content::create([
            'about' => "Talent Page"
        ]);
    }
}
