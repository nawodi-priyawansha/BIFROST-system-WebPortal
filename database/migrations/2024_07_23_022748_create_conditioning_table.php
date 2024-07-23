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
        Schema::create('conditioning', function (Blueprint $table) {
            $table->id();
            $table->integer('rounds'); // Number of rounds
            $table->foreignId('category_id')->nullable()
                ->constrained('category_options')
                ->onDelete('cascade');
            $table->foreignId('workout_id')->nullable()
                ->constrained('workout_libraries')
                ->onDelete('cascade');
            $table->integer('reps'); // Number of repetitions
            $table->float('complete_time'); // Time in minutes or seconds
            $table->float('weight')->nullable(); // Weight for the exercise, nullable if not applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditioning');
    }
};
