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
        Schema::table('insight_cards', function (Blueprint $table) {
            $table->string('banner_title')->nullable()->after('status');
            $table->string('image_left')->nullable()->after('banner_title');
            $table->string('image_right')->nullable()->after('image_left');
            $table->json('body_paragraphs')->nullable()->after('image_right');
            $table->string('feature_image')->nullable()->after('body_paragraphs');
            $table->json('feature_paragraphs')->nullable()->after('feature_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insight_cards', function (Blueprint $table) {
            $table->dropColumn([
                'banner_title',
                'image_left',
                'image_right',
                'body_paragraphs',
                'feature_image',
                'feature_paragraphs',
            ]);
        });
    }
};
