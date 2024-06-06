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
        Schema::create('ferias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index('user_id_foreign')->nullable();
            $table->string('titulo');
            $table->string('observacao')->nullable();
            $table->date('data_inicio');
            $table->date('data_retorno');
            $table->string('local_ferias')->nullable();
            $table->enum('status', ['aprovado', 'pendente', 'recusado'])->nullable();
            $table->unsignedBigInteger('user_autorizacao_id')->nullable()->index('user_autorizacao_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};
