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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('title1_az');
            $table->string('title1_en');
            $table->string('title1_ru');
            $table->string('title2_az');
            $table->string('title2_en');
            $table->string('title2_ru');
            $table->string('title3_az');
            $table->string('title3_en');
            $table->string('title3_ru');
            $table->text('description1_az');
            $table->text('description1_en');
            $table->text('description1_ru');
            $table->text('description2_az');
            $table->text('description2_en');
            $table->text('description2_ru');
            $table->text('description3_az');
            $table->text('description3_en');
            $table->text('description3_ru');
            $table->text('image');
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
        Schema::dropIfExists('emergencies');
    }
};
