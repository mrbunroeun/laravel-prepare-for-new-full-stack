<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('about_values_sections')) {
            Schema::create('about_values_sections', function (Blueprint $table) {
                $table->id();
                $table->string('page')->default('about-us')->unique();
                $table->json('cards')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('about_values_sections');
    }
};