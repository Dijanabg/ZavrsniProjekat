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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_desc');
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('sell_price');
            $table->string('orig_price');
            $table->string('qty');
            $table->tinyInteger('status')->defoult('0');
            $table->tinyInteger('trending')->defoult('0');
            $table->foreignId('category_id');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
