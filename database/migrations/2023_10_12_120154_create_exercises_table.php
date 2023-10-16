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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('train_plan_id')->constrained('train_plans');
            $table->foreignId('socio_id')->constrained('socios');
            $table->string('nome')->nullable();
            $table->string('tipo_treino')->nullable();
            $table->text('exercicio')->nullable();
            $table->integer ('series')->nullable();
            $table->integer ('reps')->nullable();
            $table->text('CAD')->nullable();
            $table->decimal('intense')->nullable();
            $table->integer ('pausa')->nullable();
            $table->text('OBS')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
