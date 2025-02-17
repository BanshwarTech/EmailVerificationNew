<?php

namespace Database\Seeders;

use App\Models\Admin\ContactDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactDetails::create([
            'email' => 'your-email@example.com',
            'phone' => '+1234567890',
            'address' => '123 Main St, Your City, Your Country'
        ]);
    }
}
