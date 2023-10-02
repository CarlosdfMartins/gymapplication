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
        Schema::create('nutricao_models', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->unsignedBigInteger('socio_id');
            $table->float('peso_kg', 5, 3)->nullable();
            $table->float('altura_cm', 5, 3)->nullable();
            $table->float('IMC', 5, 3)->nullable();
            $table->float('m_Gorda_kg', 5, 3)->nullable();
            $table->float('m_Gorda_Percen', 5, 2)->nullable();
            $table->float('m_Magra_kg', 5, 2)->nullable();
            $table->float('m_Magra_Percen', 5, 2)->nullable();
            $table->float('ffm', 5, 2)->nullable();
            $table->float('TBW', 5, 2)->nullable();
            $table->float('Vis_Fat_R', 5, 2)->nullable();
            $table->float('Peito', 5, 2)->nullable();
            $table->float('Abdomen', 5, 2)->nullable();
            $table->float('Anca', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutricao_models');
    }
};
