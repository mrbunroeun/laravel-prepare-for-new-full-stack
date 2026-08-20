<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_maximize_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('property-management')->index();
            $table->string('title')->default('Maximize Your Property Investment with Professional Management');
            $table->string('image')->default('services/maximmize/maximize.png');
            $table->string('alt_text')->nullable()->default('Phnom Penh skyline');
            $table->json('paragraphs')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_maximize_sections');
    }
};
