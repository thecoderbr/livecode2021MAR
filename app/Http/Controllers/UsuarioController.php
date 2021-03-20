<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function login(Request $request){
      $data = [];
      if($request->isMethod("POST")){
        //pegar os dados do form
        $login = $request->input("login");
        $senha = $request->input("senha");

        if(\Auth::attempt([ "login" => $login, "password" => $senha])){
          //redirecionar pro sistema
          return redirect()->route("admin.home");
        }else{
          $data["resp"] = "Usuario invalido";
        }
      }
      return view('login', $data);
    }

    public function sair(){
      \Auth::logout();
      return redirect()->route("home");
    }

    public function index(){
      
      return view('admin/index');
    }

    public function novo(Request $request){
      $data = [];
      if($request->isMethod("POST"))
      {
        //Se entrar neste IF, significa que o usuario clicou no botão SALVAR
        //$request->all() -- Enviar os dados do formulario para o Usuario
        $usuario = new Usuario( $request->all() );
        //;/pegar o valor do campo senha
        $senha = $request->input("senha");
        //Criptografar esse valor
        $senhaCript = \Hash::make($senha);
        //Adicionar a senha Criptografada no usuario
        $usuario->password = $senhaCript;

        //Gravar no banco
        $usuario->save();
        $data["resp"] = "Usuario salvo com sucesso!";
      }
      $listaUsuario = Usuario::all();
      $data["lista"] = $listaUsuario;
      return view('admin/novousuario', $data);
    }
}
