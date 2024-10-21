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
        Schema::create('product_attrs', function (Blueprint $table) {
            $table->id();
            $table->integer("products_id");
            $table->string("sku");
            $table->string("attr_image")->default("NULL");
            $table->integer("mrp");
            $table->integer("price");
            $table->integer("qty");
            $table->integer("size_id");
            $table->integer("color_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attrs');
    }
};
