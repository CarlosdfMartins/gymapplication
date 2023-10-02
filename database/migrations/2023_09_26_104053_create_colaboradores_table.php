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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->string('profile', 50);
            $table->string('nome', 50);
            $table->string('apelido', 50);
            $table->string('email', 50);
            $table->string('telefone', 12);
            $table->string('password');
            $table->string('sexo', 3);
            $table->date('data_nascimento');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
