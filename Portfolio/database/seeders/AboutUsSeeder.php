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
        AboutUs::created([
            'name' => "johnDe",
            'profile_image' => "dummy.png",
            'role' => 'professional role',
            'experience' => 1,
            'tagline' => 'any tag line'
        ]);
    }
}
