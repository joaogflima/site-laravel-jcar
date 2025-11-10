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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_id')->constrained('modelos')->onDelete('cascade');
            $table->foreignId('cor_id')->constrained('cores');
            $table->year('ano'); // ano de fabricação
            $table->integer('quilometragem'); // quilometragem atual
            $table->decimal('valor', 10, 2); // valor do veículo (10 dígitos, 2 decimais)
            $table->text('detalhes')->nullable(); // descrição adicional
            $table->string('imagem1'); // URL da foto principal
            $table->string('imagem2'); // URL da segunda foto
            $table->string('imagem3'); // URL da terceira foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
