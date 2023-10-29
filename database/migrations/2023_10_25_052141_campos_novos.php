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
        Schema::table('filmes', function(Blueprint $table) {
            $table->string('nome_filme', 150)->change(); // defini que o campo mudou
            $table->integer('pontuacao');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filmes', function(Blueprint $table) {
            $table->string('nome_filme')->change(); // defini que o campo mudou
            $table->removeColumn('pontuacao');
        });    
    }
};
