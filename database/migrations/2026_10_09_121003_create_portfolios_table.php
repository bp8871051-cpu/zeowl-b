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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('project_code', 10)->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('domain')->nullable();
            $table->string('category')->nullable();
            $table->string('category_label')->nullable();
            $table->text('description');
            $table->string('impact')->nullable();
            $table->string('users_metric')->nullable();
            $table->json('tech_stack')->nullable();
            $table->string('image')->nullable();
            $table->string('live_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
