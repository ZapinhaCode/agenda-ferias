<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableFeriasEnviadoSolicitacao extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ferias', function (Blueprint $table) {
            $table->boolean('enviado_solicitacao')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ferias', function (Blueprint $table) {
            $table->dropColumn('enviado_solicitacao');
        });
    }
};
