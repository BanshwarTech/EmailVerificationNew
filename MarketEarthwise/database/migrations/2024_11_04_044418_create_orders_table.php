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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('coupon_code')->default("NULL");
            $table->string("coupon_value")->default("NULL");
            $table->integer("order_status");
            $table->enum("payment_type", ["COD", "Gateway"]);
            $table->string("payment_status");
            $table->string("payment_id")->default("NULL");
            $table->string("txn_id")->default("NULL");
            $table->integer("total_amt");
            $table->text("track_details")->default("NULL");
            $table->string('order_id');
            $table->string("added_on");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
