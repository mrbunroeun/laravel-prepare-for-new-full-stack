<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('insight_detail_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('insights'); // scoped key
            // Banner section
            $table->string('banner_title')->nullable();
            // Hero images (2 overlapping)
            $table->string('image_left')->nullable();   // large left image
            $table->string('image_right')->nullable();  // smaller right image
            // Main body text (stored as JSON array of paragraphs)
            $table->json('body_paragraphs')->nullable();
            // Feature section
            $table->string('feature_image')->nullable();
            $table->json('feature_paragraphs')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('insight_detail_sections');
    }
};
