<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('technical_skills', function (Blueprint $table) {
            $table->id();

            $table->string('skill_name', 255);
            $table->enum('proficiency', ['Beginner', 'Intermediate', 'Advanced', 'Expert']);
            $table->integer('experience_years')->nullable();
            $table->string('category', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technical_skills');
    }
};
