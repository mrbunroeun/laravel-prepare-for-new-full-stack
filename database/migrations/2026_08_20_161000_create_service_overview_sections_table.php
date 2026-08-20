<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_overview_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('property-management')->index();
            $table->string('image')->default('services/bg_img/bg_img.png');
            $table->string('alt_text')->nullable()->default('What is Property Management?');
            $table->string('title_line1')->nullable()->default('What is');
            $table->string('title_line2')->nullable()->default('Property');
            $table->string('title_line3')->nullable()->default('Management?');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_overview_sections');
    }
};
