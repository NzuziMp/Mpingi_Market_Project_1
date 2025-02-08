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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('tbl_categories');
            $table->foreignId('sub_category_id')->references('id')->on('tbl_sub_categories');
            $table->foreignId('article_id')->references('id')->on('tbl_articles');
            $table->string('product_name_en')->nullable();
            $table->string('product_name_fr')->nullable();
            $table->text('product_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};
