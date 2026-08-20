<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('about_story_sections')) {
            Schema::create('about_story_sections', function (Blueprint $table) {
                $table->id();
                $table->string('page')->default('about-us')->unique();
                $table->string('tagline')->default('Our Story');
                $table->text('headline')->nullable();
                $table->json('paragraphs')->nullable();
                $table->string('image_left')->nullable();
                $table->string('image_top_right')->nullable();
                $table->string('image_bottom_right')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('about_story_sections');
    }
};