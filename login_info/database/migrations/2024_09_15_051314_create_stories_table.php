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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Story title
            $table->text('content'); // Story content
            $table->string('youtube_video_url')->nullable(); // YouTube video URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->dropColumn('youtube_video_url'); // Remove the YouTube video URL column
        });

        Schema::dropIfExists('stories'); // Drop the stories table
    }
};
