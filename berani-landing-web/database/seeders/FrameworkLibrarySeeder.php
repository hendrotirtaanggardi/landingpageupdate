<?php

namespace Database\Seeders;

use App\Models\FrameworkLibrary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameworkLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frameworkLibraries = [
            'Laravel',
            'Symfony',
            'Django',
            'Flask',
            'Express',
            'Ruby on Rails',
            'Spring',
            'Yii',
            'CodeIgniter',
            'CakePHP',
            'Zend',
            'Sails',
            'Koa',
            'Nuxt.js',
            'Vue.js',
            'React',
            'Angular',
            'Vuex',
            'Vue Router',
            'Vuex ORM',
            'Vuex Persistence',
            'Node JS'
        ];

        foreach ($frameworkLibraries as $frameworkLibrary) {
            FrameworkLibrary::create([
                'name' => $frameworkLibrary
            ]);
        }
    }
}
