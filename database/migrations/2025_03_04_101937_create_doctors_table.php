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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->string('position_az');
            $table->string('position_en');
            $table->string('position_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('meta_title_az');
            $table->string('meta_title_en');
            $table->string('meta_title_ru');
            $table->text('meta_description_az');
            $table->text('meta_description_en');
            $table->text('meta_description_ru');
            $table->string('alt_image_az');
            $table->string('alt_image_en');
            $table->string('alt_image_ru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
