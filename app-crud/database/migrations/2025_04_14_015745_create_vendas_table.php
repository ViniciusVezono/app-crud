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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            // Relacionamento com clientes
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            // Relacionamento com usuários (quem registrou a venda)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Campos da venda
            $table->decimal('valor', 10, 2);
            $table->date('data');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
