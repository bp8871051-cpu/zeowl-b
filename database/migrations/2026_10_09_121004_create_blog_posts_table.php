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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->text('excerpt');
            $table->json('content')->nullable();
            $table->string('author_name')->default('Zeowl Tech Team');
            $table->string('author_role')->default('Engineering Solutions');
            $table->string('author_avatar')->nullable();
            $table->string('read_time')->default('5 min read');
            $table->string('date_display')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('tags')->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
