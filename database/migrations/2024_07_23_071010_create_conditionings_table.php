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
        Schema::create('conditionings', function (Blueprint $table) {
            $table->id();
            $table->integer('rounds')->nullable();
            $table->boolean('amrap')->nullable();
            $table->foreignId('category_id')->nullable()
                ->constrained('category_options')
                ->onDelete('cascade');
            $table->foreignId('workout_id')->nullable()
                ->constrained('workout_libraries')
                ->onDelete('cascade');
            $table->integer('reps');
            $table->float('weight')->nullable();
            $table->enum('unit', ['%', 'Kg']); // Enum column for unit
            $table->string('date');
            $table->string('time_to_complete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conditionings');
    }
};
