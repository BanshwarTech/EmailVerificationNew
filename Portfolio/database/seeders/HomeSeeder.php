<?php

namespace Database\Seeders;

use App\Models\Admin\home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        home::create([
            'title' => 'your name',
            'subtitle' => 'subtitle',
            'image' => 'dummy.png',
            'description' => 'description'
        ]);
    }
}
