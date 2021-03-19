<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Movimentacao;
use PDF;

class MovimentacaoController extends Controller
{
    public function index(Request $request){
      $data = [];
      if($request->isMethod("POST")){
        $tipo = $request->input("tipo", "");
        $query = Movimentacao::where("status", "ATV");
        if($tipo != ""){
          $query = $query->where("tipo", $tipo);
        }
        $query = $query->orderBy("data_movimentacao", "desc");
        $data["lista"] = $query->get();
      }
      return view("admin/movimentacao/index", $data);
    }

    public function export(){
      $data = [];
      $query = Movimentacao::where("status", "ATV")->orderBy("data_movimentacao", "desc");
      $data["lista"] = $query->get();

      $pdf = PDF::loadView('admin/movimentacao/index', $data);
      return $pdf->download('movimentacao_contas.pdf');

    }

    public function novo(Request $request){
      $data = [];

      if($request->isMethod("POST")){

        $mov = new Movimentacao($request->all());
        $mov->status = "ATV";
        $mov->data_movimentacao = date('Y-m-d');

        //O usuario desta movimentacao cadastrada é o usuario logado no sistema
        $mov->usuario()->associate(\Auth::user());
        $categoriaForm = $request->input("categoria");
        if($categoriaForm != ""){
          $cat = Categoria::find($categoriaForm);
          $mov->categoria()->associate($cat);
        }
        $mov->save();
        $data["resp"] = "Movimentação cadastrada com sucesso!";
      }

      $data["categorias"] = Categoria::all();
      return view("admin/movimentacao/novo", $data);
    }
}
