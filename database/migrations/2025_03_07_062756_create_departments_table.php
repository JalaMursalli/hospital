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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->text('icon');
            $table->text('image1');
            $table->text('image2');
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->text('description1_az')->nullable();
            $table->text('description1_en')->nullable();
            $table->text('description1_ru')->nullable();
            $table->text('description2_az')->nullable();
            $table->text('description2_en')->nullable();
            $table->text('description2_ru')->nullable();
            $table->string('meta_title_az');
            $table->string('meta_title_en');
            $table->string('meta_title_ru');
            $table->text('meta_description_az');
            $table->text('meta_description_en');
            $table->text('meta_description_ru');
            $table->string('alt_image1_az');
            $table->string('alt_image1_en');
            $table->string('alt_image1_ru');
            $table->string('alt_image2_az');
            $table->string('alt_image2_en');
            $table->string('alt_image2_ru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
