<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('propriedade', function (Blueprint $table) {
            $table->id('idPropriedade');
            $table->string('nomePropriedade');
            $table->string('localizacao');
            $table->decimal('tamanho', 10, 2); // Tipo decimal com 10 casas no total e 2 casas decimais
            $table->string('uso');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propriedade');
    }
};
