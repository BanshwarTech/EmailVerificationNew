<?php

namespace Database\Seeders;

use App\Models\Admin\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'name' => "johnDe",
            'profile_image' => "dummy.png",
            'role' => 'professional role',
            'experience' => 1,
            'tagline' => 'any tag line',
            'profile_background' => "Web Developer",
            'education' => "Bachelor of Engineering",
            'language' => "English, Hindi",
            'other_skills' => "GIT",
            'is_del' => true
        ]);
    }
}
