<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FeriasController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\PermissaoFuncionario;

Auth::routes();
Route::middleware('auth')->group(function() { 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/inicial', [HomeController::class, 'index'])->name('telaInicial');
        
    Route::get('/ferias/calendario', [FeriasController::class , 'getCalendario'])->name('ferias.calendario');
    Route::put('ferias/enviaSolicitacao/{id}', [FeriasController::class, 'enviaSolicitacao'])->name('ferias.enviaSolicitacao');
    
    Route::get('/meuPerfil/{id}', [UsuarioController::class, 'visualizaMeuPerfil'])->name('usuario.visualizaMeuPerfil');
    Route::get('/alterarSenha/{id}', [UsuarioController::class, 'getAlteraSenhaPerfil'])->name('usuario.getAlteraSenhaPerfil');
    Route::put('/alterarSenha/salvarNovaSenha/{id}', [UsuarioController::class, 'postAlteraSenhaPerfil'])->name('usuario.postAlterarSenhaPerfil');
    
    Route::middleware([PermissaoFuncionario::class])->group(function () {
        Route::get('/adm/ferias/solicitacoes', [FeriasController::class, 'admSolicitacoes'])->name('adm.ferias.solicitacoes');
        Route::put('adm/ferias/aprovaSolicitacao/{id}', [FeriasController::class, 'aprovaSolicitacao'])->name('adm.ferias.aprovaSolicitacao');
        Route::put('adm/ferias/recusaSolicitacao/{id}', [FeriasController::class, 'negaSolicitacao'])->name('adm.ferias.recusaSolicitacao');
    
        Route::resource('adm/usuario', UsuarioController::class)->names([
            'index' => 'adm.usuario.lista',
            'create' => 'adm.usuario.adicionar',
            'store' => 'adm.usuario.salvar',
            'show' => 'adm.usuario.mostrar',
            'edit' => 'adm.usuario.editar',
            'update' => 'adm.usuario.atualizar',
            'destroy' => 'adm.usuario.excluir',
        ]);
        
        Route::resource('adm/setor', SetorController::class)->names([
            'index' => 'adm.setor.lista',
            'create' => 'adm.setor.adicionar',
            'store' => 'adm.setor.salvar',
            'show' => 'adm.setor.mostrar',
            'edit' => 'adm.setor.editar',
            'update' => 'adm.setor.atualizar',
            'destroy' => 'adm.setor.excluir',
        ]);        
    });
    
    Route::resource('ferias', FeriasController::class)->names([
        'index' => 'ferias.lista',
        'create' => 'ferias.adicionar',
        'store' => 'ferias.salvar',
        'show' => 'ferias.mostrar',
        'edit' => 'ferias.editar',
        'update' => 'ferias.atualizar',
        'destroy' => 'ferias.excluir',
    ]);
});