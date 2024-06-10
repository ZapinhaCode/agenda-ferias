<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableFeriasCampoCorSolicitacao extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ferias', function (Blueprint $table) {
            $table->string('ferias_cor')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ferias', function (Blueprint $table) {
            $table->dropColumn('ferias_cor');
        });
    }
};
