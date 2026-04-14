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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('short_description')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('allergens')->nullable();
            $table->text('preparation_advice')->nullable();
            $table->string('weight')->nullable();
            $table->json('nutritional_values')->nullable(); // Calories, Proteins, etc.
            $table->json('dietary_preferences')->nullable(); // lactos free.
            $table->text('expiry_date')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1); // 1: Active, 0: Inactive
            $table->integer('quantity')->default(0);

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
