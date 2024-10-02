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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCompleto');
            $table->string('cargo');
            $table->string('categoria')->nullable(); /** nullable() é usado para deixar um campo em branco  */
            $table->integer('nAgente'); /**('nAgente', 8)->unique() estamos a dizer que valor é unico e com limite de 8 digitos*/
            $table->foreignId('users_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
