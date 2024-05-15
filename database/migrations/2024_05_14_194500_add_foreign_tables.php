<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTables extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->foreign('cargo_id', 'cargo_id_foreign')->references('id')->on('cargo')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('estado_id', 'estado_id_foreign_usuario')->references('id')->on('estado')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('cidade_id', 'cidade_id_foreign')->references('id')->on('cidade')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('setor_id', 'setor_id_foreign')->references('id')->on('setores')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });

        Schema::table('ferias', function (Blueprint $table) {
            $table->foreign('user_autorizacao_id', 'user_autorizacao_id_foreign')->references('id')->on('usuario')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });

        Schema::table('cidade', function (Blueprint $table) {
            $table->foreign('estado_id', 'estado_id_foreign')->references('id')->on('estado')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });

        Schema::table('setores', function (Blueprint $table) {
            $table->foreign('gerente_user_id', 'gerente_user_id_foreign')->references('id')->on('usuario')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign('cargo_id_foreign');
            $table->dropForeign('estado_id_foreign_usuario');
            $table->dropForeign('cidade_id_foreign');
            $table->dropForeign('setor_id_foreign');
        });

        Schema::table('ferias', function (Blueprint $table) {
            $table->dropForeign('user_autorizacao_id_foreign');
        });

        Schema::table('cidade', function (Blueprint $table) {
            $table->dropForeign('estado_id_foreign');
        });

        Schema::table('setores', function (Blueprint $table) {
            $table->dropForeign('gerente_user_id_foreign');
        });
    }
};
