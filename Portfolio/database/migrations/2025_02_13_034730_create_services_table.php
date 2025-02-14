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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); // Service title (e.g., Web Development, API Integration)
            $table->text('description')->nullable(); // Detailed description of the service
            $table->decimal('price', 10, 2)->nullable(); // Optional price for the service
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); // Service availability
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
