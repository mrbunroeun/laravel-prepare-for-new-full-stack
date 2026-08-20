<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_management_models', function (Blueprint $table) {
            $table->id();
            $table->string('page')->default('property-management')->index();
            $table->string('title_line1')->nullable()->default('Our');
            $table->string('title_line2')->nullable()->default('Management');
            $table->string('title_line3')->nullable()->default('Models');
            $table->json('models')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_management_models');
    }
};
