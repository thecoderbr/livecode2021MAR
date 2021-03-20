@extends("layout")
@section("conteudo")
  <h1>Buscar Movimentação</h1>      
  <form method="post">
    @csrf
    <div class="col-12">
      <label for="">Tipo</label>
      <select name="tipo" class="form-control" id="">
        <option value=""></option>
        <option value="ENT">Entrada</option>
        <option value="SAI">Saida</option>
      </select>
    </div>
    <input type="submit" value="Buscar" class="btn btn-primary">
    <a href="{{ route('admin.movimentacao.export') }}" class="btn btn-warning">
      Exportar</a>
  </form>
  @if(isset($lista))
  <table class="table table-condensed">
    <tr>
      <th>TITULO</th>
      <th>TIPO</th>
      <th>VALOR</th>
      <th>DATA MOVIMENTAÇÃO</th>
      <th>USUARIO</th>
      <th>CATEGORIA</th>
    </tr>
    @foreach($lista as $mov)
    <tr>
      <td>{{ $mov->titulo }}</td>
      <td>{{ $mov->getTipoDesc() }}</td>
      <td>R$ {{ $mov->valor }}</td>
      <td>{{ $mov->data_movimentacao->format("d/m/Y") }}</td>
      <td>{{ $mov->usuario->nome }}</td>
      <td>{{ $mov->categoria->categoria }}</td>
    </tr>
    @endforeach
  </table>  
  @endif
@endsection