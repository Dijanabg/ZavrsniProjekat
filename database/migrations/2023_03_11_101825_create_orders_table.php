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
            $table->foreignId('user_id');
            $table->string('tracking_no');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->integer('pincode');
            $table->integer('total_price');
            $table->string('pay_mode');
            $table->string('pay_id')->nullable();
            $table->tinyInteger('status')->defoult('0');
            $table->text('comment')->nullable();
            $table->timestamps();
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
