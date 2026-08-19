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
        Schema::create('why_choose_us_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('home')->unique();
            $table->string('heading_line_1')->default('Why Choose');
            $table->string('heading_line_2')->default('CWD Realty & Hospitality?');
            $table->enum('text_align', ['left', 'center'])->default('left');
            $table->json('items')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_sections');
    }
};
