<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">LOGIN NO SISTEMA</h5>
          <div class="card-body">
            <form method="post" class=" g-3">
              @csrf
              @if(isset($resp))
                <div class="alert alert-info">{{ $resp }}</div>
              @endif
              <div class="col-12">
                <label for="">Login</label>
                <input type="text" name="login" class="form-control">
              </div>
              <div class="col-12">
                <label for="">Senha</label>
                <input type="password" name="senha" class="form-control">
              </div>
              <div class="col-12 mt-4">
                <input type="submit" value="LOGAR" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>
</html>