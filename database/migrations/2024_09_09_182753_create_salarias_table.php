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
        Schema::create('salarias', function (Blueprint $table) {
            $table->id();
            $table->date('data_pagamento');
            $table->float('salario_base', 9,2)->default(0);
            $table->float('subsiduio',)->default(0);
            $table->float('descontos', )->default();
            $table->decimal('salario_liquido',)->default();
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarias');
    }
};
