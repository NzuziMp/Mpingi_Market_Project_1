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
        Schema::create('tbl_sub_products', function (Blueprint $table) {
            $table->id();
            $table->string('post_date_of_item')->nullable();
            $table->foreignId('category_id')->references('id')->on('tbl_categories');
            $table->foreignId('subcategory_id')->references('id')->on('tbl_sub_categories');
            $table->foreignId('article_id')->references('id')->on('tbl_articles');
            // $table->foreignId('product_id')->references('id')->on('tbl_products');
            $table->integer('product_id')->unsigned()->nullable()->index();
            $table->string('sub_product_name_en')->nullable();
            $table->string('sub_product_name_fr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_products');
    }
};
