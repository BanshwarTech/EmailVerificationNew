<?php

namespace Database\Seeders;

use App\Models\Admin\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'This is a fantastic service! Highly recommended.',
            'image' => 'testimonials/john_doe.jpg',
            'rating' => 5,
            'status' => 1,
        ]);

        Testimonial::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'message' => 'Great experience working with this team!',
            'image' => null,
            'rating' => 4,
            'status' => 1,
        ]);
    }
}
