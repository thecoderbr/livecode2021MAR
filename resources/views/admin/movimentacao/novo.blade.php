@extends("layout")
@section("conteudo")
  <h1>Cadastrar Movimentação</h1>
  @if(isset($resp))
    <div class="alert alert-info">{{ $resp }}</div>
  @endif
  <form method="post">
    @csrf
    <div class="col-12">
      <label for="">Titulo</label>
      <input type="text" name="titulo" class="form-control">
    </div>
    <div class="col-12">
      <label for="">Tipo</label>
      <select name="tipo" class="form-control" id="">
        <option value="ENT">Entrada</option>
        <option value="SAI">Saida</option>
      </select>
    </div>
    <div class="col-12">
      <label for="">Valor</label>
      <input type="text" name="valor" class="form-control">
    </div>
    <div class="col-12">
      <label for="">Catgoria</label>
      <select name="categoria" class="form-control" id="">
        <option value=""></option>
        @if(isset($categorias))
          @foreach($categorias as $c)
            <option value="{{ $c->id }}">{{ $c->categoria }}</option>
          @endforeach
        @endif
      </select>
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-success">
  </form>
@endsection