<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtor', function (Blueprint $table) {
            $table->id('idProdutor');
            $table->string('nomeProdutor');
            $table->string('cpfProdutor')->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtor');
    }
};
