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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('number', 10)->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('eyebrow')->nullable();
            $table->text('short_desc')->nullable();
            $table->longText('full_desc')->nullable();
            $table->string('card_type')->nullable();
            $table->string('theme')->nullable();
            $table->string('accent_color')->nullable();
            $table->json('tags')->nullable();
            $table->string('image')->nullable();
            $table->json('metrics')->nullable();
            $table->json('deliverables')->nullable();
            $table->json('technologies')->nullable();
            $table->json('process')->nullable();
            $table->json('faqs')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
