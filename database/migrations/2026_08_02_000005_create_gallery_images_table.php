<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('caption')->nullable();
            $table->string('image'); // full-size, opened in the lightbox
            $table->string('thumbnail')->nullable(); // grid tile; falls back to image
            $table->string('category_key'); // wildlife|landscapes|camps|coast|on-safari
            $table->boolean('is_tall')->default(false); // spans two rows in the masonry grid
            $table->boolean('is_featured')->default(false); // shown in the homepage preview
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
