<!--Verificação de sessão nas pagina-->
<?php require_once('validadorAcesso.php') ?>

<?php


//array pra contar chamados
$chamados = [];
//Abrir arquivo pra leitura
$arquivo = fopen('arquivo.hd', 'r');

//percorrer cada linha do arquivo 
while (!feof($arquivo)) {

  $registro = fgets($arquivo);
  $chamados[] = $registro;
}

//Fechar arquivo aberto
fclose($arquivo);
?>



<html lang="pt-BR">

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
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="logoff.php">SAIR</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">
            <!-- Instrução para a para criação de cards de maneira automatica -->
            <?php
            foreach ($chamados as $chamado) { ?>
            <?php
              //Criando controle de visualização de usuario /
              $chamado_dados = explode(':', $chamado);
              if ($_SESSION['perfil_id'] == 2) {
                if ($_SESSION['id'] != $chamado_dados[0]) {
                  continue;
                }
              }
              //controle para que usuarios vejam apenas os chamados que abriram (adms ve todos chamados)
              //Removendo o card 4
              if (count($chamado_dados) < 3) {
                continue;
              }
            ?>
            <div class="card mb-3 bg-light">
              <div class="card-body">
                <h5 class="card-title">
                  <!--Passando os dados de forma automatica pro card -->
                  <?php echo ($chamado_dados[1]) ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                  <!--Passando os dados de forma automatica pro card -->
                  <?php echo ($chamado_dados[2]) ?>
                </h6>
                <p class="card-text">
                  <!--Passando os dados de forma automatica pro card -->
                  <?php echo ($chamado_dados[3]) ?>
                </p>

              </div>
            </div>
            <?php } ?>
            <!-- Fim da instrução -->

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>