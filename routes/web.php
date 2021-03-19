<?php

use Illuminate\Support\Facades\Route;
//importar o usuarioController
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MovimentacaoController;

Route::match(['get', 'post'], '/', 
    [ UsuarioController::class, 'login' ])->name("home");
Route::match(['get', 'post'], '/login', 
    [ UsuarioController::class, 'login' ])->name("login");

Route::match(['get', 'post'], '/sair', 
    [ UsuarioController::class, 'sair' ])->name("sair");
Route::middleware(['auth'])->prefix("admin")->name("admin.")->group(function(){
  //nome dessa rota --- admin.home
  // localhost/admin/
  Route::match(['get', 'post'], '/', 
    [ UsuarioController::class, 'index' ])->name("home");

    //admin.novo
    // localhost/admin/usuario
  Route::match(['get', 'post'], '/usuario', 
    [ UsuarioController::class, 'novo' ])->name("novo");

    // localhost/admin/movimentacao
  Route::match(['get', 'post'], '/movimentacao', 
    [ MovimentacaoController::class, 'index' ])->name("movimentacao");

    // localhost/admin/movimentacao/novo
  Route::match(['get', 'post'], '/movimentacao/novo', 
    [ MovimentacaoController::class, 'novo' ])->name("movimentacao.novo");

  Route::match(['get', 'post'], '/movimentacao/export', 
    [ MovimentacaoController::class, 'export' ])->name("movimentacao.export");
});