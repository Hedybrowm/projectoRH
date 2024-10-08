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
        Schema::create('faltas', function (Blueprint $table) {
            $table->id();
            $table->date('data_falta');
            $table->string('motivo_falta');
            $table->enum('tipo_falta', ['Justificada', 'Injustificada']);
            $table->enum('estado', ['Analisada', 'Não analisada']);
            $table->foreignId('id_funcionario')->constrained('funcionarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faltas');
    }
};
