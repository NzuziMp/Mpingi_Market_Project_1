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
        Schema::create('tbl_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('tbl_categories');
            $table->string('sub_category_name_en')->nullable();
            $table->string('sub_category_name_fr')->nullable();
            $table->text('sub_category_image')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_categories');
    }
};
