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
        Schema::create('mail_cofigs', function (Blueprint $table) {
            $table->id();
            $table->string('MAIL_MAILER')->default('smtp');
            $table->string('MAIL_HOST');
            $table->integer('MAIL_PORT');
            $table->string('MAIL_USERNAME');
            $table->string('MAIL_PASSWORD');
            $table->string('MAIL_ENCRYPTION')->nullable();
            $table->string('MAIL_FROM_ADDRESS');
            $table->string('MAIL_FROM_NAME');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_cofigs');
    }
};
