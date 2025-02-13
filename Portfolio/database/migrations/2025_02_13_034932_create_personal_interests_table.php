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
        Schema::create('personal_interests', function (Blueprint $table) {
            $table->id();
            $table->string('interest_name', 255); // Interest name (e.g., Coding, Photography)
            $table->text('description')->nullable(); // Details about the interest
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_interests');
    }
};
