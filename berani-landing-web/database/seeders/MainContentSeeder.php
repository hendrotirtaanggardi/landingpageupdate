<?php

namespace Database\Seeders;

use App\Models\MainContent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainContent::create([
            'content_id' => 2,
            'about' => 'Landing Page',
            'contentHeader' => '<h1>Talent Platform by Berani ID</h1>',
            'contentMain' => '<h3>Place where developers can get projects easily. Platform to help developers grow. Home for new start developers to begin their journey.</h3>',
            'contentFooter' => '<p>Starting the path to becoming a developer can be complicated and stressful. We are here to reach out and help you begin this journey. We can provide you project that you can work on. Learn by getting your hand dirty by involved with real-world projects and grow from the experience. Berani digital talent platform will guide you to land your first project.</p>',
            'image' => 'img/1600x800.jpg'
        ]);

        MainContent::create([
            'content_id' => 3,
            'about' => 'Talent Page',
            'contentHeader' => '<div>📄 <strong>Your Information Page<br></strong>You can edit your information about personal, skill, and technical here. This information will used by Recruiter to find you project!</div>',
            'contentMain' => '<div>👋 About Us<br>We are part of Berani Digital ID, which focuses on finding talent to work on projects. This platform is open to anyone that has the suitable skill and is capable to fulfill the responsibility.</div>',
            'contentFooter' => '<div>📝 Guidance Detail<br>We will offer you a project if we have a suitable project base on your information.</div>',
            'image' => 'public_contents/ViqT4WDx9elCChZirKIUaPUD0SWdaNasdu6a4LEr.jpg'
        ]);
    }
}
