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
        Schema::create('ferias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funcionario')->constrained('funcionarios');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('dias_ferias');
            $table->string('aprovado_por');
            $table->enum('estado', ['Aprovado', 'Pendente', 'Recusado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};
