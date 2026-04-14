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
        Schema::table('product_availabilities', function (Blueprint $table) {
            $table->dropColumn('day'); // Remove old 'day' column
            $table->date('available_date'); // Add new date column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_availabilities', function (Blueprint $table) {
            $table->dropColumn('available_date'); // Remove new date column
            $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
        });
    }
};
