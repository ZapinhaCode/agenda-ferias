<?php

use Illuminate\Support\Facades\Route;

Route::resource('usuario', 'UsuarioController')->names([
    'index' => 'usuario.lista',
    'create' => 'usuario.criar',
    'store' => 'usuario.salvar',
    'show' => 'usuario.mostrar',
    'edit' => 'usuario.editar',
    'update' => 'usuario.atualizar',
    'destroy' => 'usuario.excluir',
]);