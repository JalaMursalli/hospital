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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('address_title_az');
            $table->string('address_title_en');
            $table->string('address_title_ru');
            $table->text('address_icon');
            $table->string('email_title_az');
            $table->string('email_title_en');
            $table->string('email_title_ru');
            $table->text('email_icon');
            $table->string('phone_title_az');
            $table->string('phone_title_en');
            $table->string('phone_title_ru');
            $table->text('phone_icon');
            $table->text('map');
            $table->string('phone_title2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
