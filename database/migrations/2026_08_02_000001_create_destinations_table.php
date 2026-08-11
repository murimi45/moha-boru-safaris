<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('region');
            $table->string('location');
            $table->string('region_key'); // south|north|rift|coast — client filter
            $table->string('tag');
            $table->string('best_time')->nullable();
            $table->string('image');
            $table->string('hero_image')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('intro')->nullable();
            $table->longText('description')->nullable();
            $table->json('activities')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
