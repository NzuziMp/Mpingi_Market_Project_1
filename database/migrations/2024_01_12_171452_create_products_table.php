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
            $table->string('product_image')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_price')->nullable();
            $table->string('original_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('product_type')->nullable();
            $table->string('color')->nullable();
            $table->string('slug')->nullable();
            $table->string('disponibility')->nullable();
            $table->string('posted_on')->nullable();
            $table->string('website')->nullable();
 

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
