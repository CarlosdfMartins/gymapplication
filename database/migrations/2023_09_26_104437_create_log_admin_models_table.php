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
        Schema::create('log_admin_models', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->string('log',200);
            $table->unsignedBigInteger('colaborador_id')->nullable();
            $table->unsignedBigInteger('socio_id')->nullable();;
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_admin_models');
    }
};
