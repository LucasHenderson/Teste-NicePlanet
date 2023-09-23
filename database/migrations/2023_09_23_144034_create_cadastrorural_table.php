<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cadastrorural', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProdutor');
            $table->unsignedBigInteger('idPropriedade');

            // Chaves estrangeiras
            $table->foreign('idProdutor')->references('idProdutor')->on('produtor');
            $table->foreign('idPropriedade')->references('idPropriedade')->on('propriedade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cadastrorural');
    }
};
