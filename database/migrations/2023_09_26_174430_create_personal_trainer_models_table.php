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
        Schema::create('personal_trainer_models', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->unsignedBigInteger('socio_id');
            $table->float('series', 5)->nullable();
            $table->float('reps', 5)->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_trainer_models');
    }
};
