@extends("layout")
@section("conteudo")
  <h2>Novo Usuario</h2>
  @if(isset($resp))
    <div class="alert alert-info">{{ $resp }}</div>
  @endif
  <form method="post">
    @csrf
    <div class="col-12">
      <label for="">Login</label>
      <input type="text" name="login" class="form-control">
    </div>
    <div class="col-12">
      <label for="">Senha</label>
      <input type="password" name="senha" class="form-control">
    </div>
    <div class="col-12">
      <label for="">Nome</label>
      <input type="text" name="nome" class="form-control">
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-success">
  </form>
  @if(isset($lista))
  <table class="table table-condensed">
    <tr>
      <th>LOGIN</th>
      <th>NOME</th>
    </tr>
    @foreach($lista as $usu)
    <tr>
      <td>{{ $usu->login }}</td>
      <td>{{ $usu->nome }}</td>
    </tr>
    @endforeach
  </table>
  @endif
@endsection