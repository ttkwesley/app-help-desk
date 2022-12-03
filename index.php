<html lang="pt-BR">
<charset utf-8>

  <head>
    <meta charset="utf-8" />
    <title>Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
    </nav>

    <div class="container">
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Fazer login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <!--Criando a mensagem de erro dentro do formulario -->
                <?php if (isset($_GET['login']) and $_GET['login'] == 'erro') { ?>
                <div class="text-danger">
                  Usuario ou senha ínvalido(s)
                </div>
                <?php } ?>
                <!--Fim da mensagem de erro -->

                <!-- Mensagem de erro 2 -->
                <?php if (isset($_GET['login']) and $_GET['login'] == 'erro2') { ?>
                <div class="text-danger">
                  Faça login para acessar as paginas protegidas
                </div>
                <?php } ?>
                <!-- Fim mensagem de erro 2 -->

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </body>

</html>