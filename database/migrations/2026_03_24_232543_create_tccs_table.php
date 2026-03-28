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
        Schema::create('tccs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->smallInteger('paginas');
            $table->date('data');
            $table->time('hora');
            $table->string('aluno', 100);
            $table->string('resumo', 300);
            $table->string('palavras_chave', 200);
            $table->string('pdf', 100);
            $table->foreignId('orientador')
                ->constrained('bancas')
                ->onDelete('cascade');
            $table->foreignId('banca_1')
                ->constrained('bancas')
                ->onDelete('cascade');
            $table->foreignId('banca_2')
                ->constrained('bancas')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tccs');
    }
};
