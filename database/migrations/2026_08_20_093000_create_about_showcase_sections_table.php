<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_showcase_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('about-us')->unique();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('alt_1')->nullable()->default('CWD Realty Story');
            $table->string('alt_2')->nullable()->default('CWD Realty Development');
            $table->string('alt_3')->nullable()->default('CWD Realty Properties');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_showcase_sections');
    }
};