<?php

namespace Database\Seeders;

use App\Models\Admin\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'Home' => true,
            'About' => true,
            'Skill' => true,
            'EduExp' => true,
            'Project' => true,
            'Contact' => true,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
