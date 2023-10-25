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
        Schema::create('socios', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->unsignedBigInteger('NUT_id')->nullable();
            $table->unsignedBigInteger('PT_id')->nullable();
            $table->text('profile')->nullable();;
            $table->text('nome')->nullable();;
            $table->text('apelido')->nullable();;
            $table->text('email')->nullable();;
            $table->text('telefone')->nullable();;
            $table->text('password')->nullable();;
            $table->text('sexo', 3)->nullable();;
            $table->date('data_nascimento')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
