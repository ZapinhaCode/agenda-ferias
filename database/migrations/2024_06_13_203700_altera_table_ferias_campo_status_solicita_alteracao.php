<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteraTableFeriasCampoStatusSolicitaAlteracao extends Migration {
    /**
     * Run the migrations.
     */
	public function up()
	{
        DB::statement("ALTER TABLE ferias MODIFY COLUMN status enum('aprovado', 'pendente', 'recusado', 'solicitaAlteracao') default null");
	}

    public function down()
    {
        DB::statement("ALTER TABLE ferias MODIFY COLUMN status enum('aprovado', 'pendente', 'recusado', 'solicitaAlteracao') default null");
    }
};
