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
            $table->id();
            $table->unsignedBigInteger('NUT_id')->nullable();
            $table->unsignedBigInteger('PT_id')->nullable();
            $table->string('profile', 50);
            $table->string('nome', 50);
            $table->string('apelido', 50);
            $table->string('email', 50);
            $table->string('telefone', 12);
            $table->string('password');
            $table->string('sexo', 3);
            $table->date('data_nascimento');
            $table->timestamps();
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
