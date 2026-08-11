<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('duration');
            $table->string('guests');
            $table->string('price');
            $table->string('price_note')->nullable();
            $table->string('badge')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('intro')->nullable();
            $table->string('image');
            $table->string('hero_image')->nullable();
            $table->string('destination_key'); // client-side filter key
            $table->string('duration_key'); // short|medium|long
            $table->string('budget_key'); // value|premium|ultra
            $table->json('included')->nullable();
            $table->json('excluded')->nullable();
            $table->json('itinerary')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
