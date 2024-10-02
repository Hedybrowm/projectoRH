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
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funcionario')->constrained('funcionarios');
            $table->date('data_pagamento');
            $table->float('salario_base');
            $table->float('subsidio');
            $table->float('descontos');
            $table->float('salario_liquido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarios');
    }
};
