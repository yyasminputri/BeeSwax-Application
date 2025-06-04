<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 0); // Harga dalam rupiah
            $table->string('image'); // Main image URL
            $table->json('images')->nullable(); // Multiple images
            $table->json('features')->nullable(); // Array of features
            $table->json('specifications')->nullable(); // Product specs
            $table->integer('stock')->default(0);
            $table->string('category');
            $table->decimal('rating', 3, 2)->default(0.00); // Rating 0.00-5.00
            $table->integer('reviews_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};