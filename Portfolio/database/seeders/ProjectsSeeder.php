<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Analytics Dashboard',
                'description' => 'A web-based dashboard providing insights into customer behavior, sales trends, and product performance.',
                'image' => 'ecommerce_dashboard.png',
                'link' => 'https://example.com/ecommerce-dashboard',
                'github_link' => "",
                'completion_date' => Carbon::parse('2024-05-01'),
            ],
            [
                'title' => 'AI-powered Recommendation System',
                'description' => 'An AI-based recommendation system that suggests products based on user behavior and historical data.',
                'image' => 'ai_recommendation.png',
                'link' => 'https://example.com/ai-recommendation',
                'github_link' => "",
                'completion_date' => Carbon::parse('2023-11-15'),
            ],
            [
                'title' => 'Customer Churn Prediction Model',
                'description' => 'A machine learning model predicting customer churn for a SaaS company, improving retention strategies.',
                'image' => 'churn_prediction.png',
                'link' => 'https://example.com/churn-prediction',
                'github_link' => "",
                'completion_date' => Carbon::parse('2023-07-20'),
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert([
                'title' => $project['title'],
                'description' => $project['description'],
                'image' => $project['image'],
                'link' => $project['link'],
                'github_link' => $project['github_link'],
                'completion_date' => $project['completion_date'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
