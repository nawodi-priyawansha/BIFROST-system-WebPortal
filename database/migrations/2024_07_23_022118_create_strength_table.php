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
        Schema::create('strength', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()
                ->constrained('category_options')
                ->onDelete('cascade');
            $table->foreignId('workout_id')->nullable()
                ->constrained('workout_libraries')
                ->onDelete('cascade');
            $table->float('weight');
            $table->integer('sets');
            $table->integer('rest'); // Assuming rest is in seconds
            $table->string('intensity'); // Adjust if you have a specific enum or validation
            $table->enum('type', ['alternate', 'primary']); // Using ENUM for predefined types
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strength');
    }
};
