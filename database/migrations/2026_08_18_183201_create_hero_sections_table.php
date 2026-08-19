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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('home')->unique();
            $table->string('tagline_box1')->nullable()->default('CWD');
            $table->string('tagline_box1_style')->default('bold-gold');
            $table->string('tagline_box2')->nullable()->default('Real Estate Agent & Developer');
            $table->string('tagline_box2_style')->default('light-gold');
            $table->text('headline')->nullable();
            $table->boolean('show_bullets')->default(true);
            $table->json('bullets')->nullable();
            $table->json('buttons')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
