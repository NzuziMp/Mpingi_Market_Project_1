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
        Schema::create('tbl_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('tbl_categories');
            $table->foreignId('sub_category_id')->references('id')->on('tbl_sub_categories');
            $table->string('article_name_en')->nullable();
            $table->string('article_name_fr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_articles');
    }
};
