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
        Schema::create('services_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('home')->unique();
            $table->string('section_title')->default('Our Services');
            $table->string('image_url')->nullable()->default('home/our_services/our_services.png');
            $table->json('cards')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_sections');
    }
};
