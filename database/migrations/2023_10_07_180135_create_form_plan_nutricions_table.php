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
        Schema::create('form_plan_nutricions', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->foreignId('socio_id')->constrained('socios');
            $table->time('hora_PA')->default('00:00')->nullable();
            $table->text('pequeno_almoco')->nullable();
            $table->time('hora_1LM')->default('00:00')->nullable();
            $table->text('laMati1')->nullable();
            $table->time('hora_2LM')->default('00:00')->nullable();
            $table->text('laMati2')->nullable();
            $table->time('hora_A')->default('00:00')->nullable();
            $table->text('almoco')->nullable();
            $table->time('hora_L1')->default('00:00')->nullable();
            $table->text('lanche1')->nullable();
            $table->time('hora_L2')->default('00:00')->nullable();
            $table->text('lanche2')->nullable();
            $table->time('hora_L3')->default('00:00')->nullable();
            $table->text('lanche3')->nullable();
            $table->time('hora_JA')->default('00:00')->nullable();
            $table->text('jantar')->nullable();
            $table->time('hora_C')->default('00:00')->nullable();
            $table->text('ceia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_plan_nutricions');
    }
};
