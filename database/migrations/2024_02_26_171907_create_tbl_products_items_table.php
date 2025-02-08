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
        Schema::create('tbl_products_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('post_date_of_item')->nullable();
            $table->foreignId('category_id')->references('id')->on('tbl_categories');
            $table->foreignId('sub_category_id')->references('id')->on('tbl_sub_categories');
            $table->foreignId('article_id')->references('id')->on('tbl_articles');
            $table->integer('product_id')->references('id')->on('tbl_products');
            $table->integer('sub_product_id')->unsigned()->nullable()->index();
            // $table->foreignId('sub_product_id')->references('id')->on('tbl_sub_products');
            $table->string('item_name')->nullable();
            $table->string('product_type')->nullable();
            $table->string('brand_name')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('pieces')->nullable();
            $table->string('price')->nullable();
            $table->string('old_price')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('sub_color_id')->nullable();
            $table->string('price_range_start')->nullable();
            $table->string('price_range_end')->nullable();
            $table->integer('product_color')->nullable();
            $table->string('place_of_origin')->nullable();
            $table->string('city')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('item_descriptions')->nullable();
            $table->integer('item_images')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('supplier_region')->nullable();
            $table->string('type')->nullable();
            $table->string('post_expiry_date')->nullable();
            $table->string('post_delete_date')->nullable();
            $table->string('post_date_count')->nullable();
            $table->string('post_expiry_count')->nullable();
            $table->string('post_delete_count')->nullable();
            $table->integer('expire_status')->nullable();
            $table->integer('ad_type')->nullable();
            $table->integer('views')->nullable();
            $table->string('shipping')->nullable();
            $table->string('shipping_price')->nullable();
            $table->string('price_id')->nullable();
            $table->float('rate', 8, 2);
            $table->float('total_rate', 8, 2);
            $table->integer('hits')->nullable();
            $table->string('payment')->nullable();
            $table->string('weight')->nullable();
            $table->string('volume')->nullable();
            $table->string('delivery')->nullable();
            $table->string('day_return')->nullable();
            $table->string('negotiable')->nullable();
            $table->string('currency')->nullable();
            $table->string('category')->nullable();
            $table->string('product_web_name')->nullable();
            $table->string('product_web_link')->nullable();
            $table->string('disponibility')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products_items');
    }
};
