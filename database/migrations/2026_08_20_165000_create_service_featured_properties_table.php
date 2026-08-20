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
        Schema::create('service_featured_properties', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('property-sales');
            $table->string('grade')->default('A'); // 'A', 'B', 'C'
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('30% Available');
            $table->string('image')->nullable();
            $table->json('detail_images')->nullable();
            $table->string('link')->nullable();
            $table->string('link_text')->default('View Project');
            $table->integer('sort_order')->default(1);
            $table->string('publish_status')->default('published'); // 'published', 'draft'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_featured_properties');
    }
};
