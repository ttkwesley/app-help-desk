<?php
//$_POST faz a recuperação dos metodos post
//$_GET faz a recuperação dos metodos get

//iniciando sessão 
session_start();

//Autenticação do usuario // E que pagina o usuario pode ver com seu ID de login
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;
$perfis = [1 => 'administrativo', 2 => 'usuario'];

//criação usuarios do sistema (modo hardcode)
$usuarios_app = [
    ['id' => 1, 'email' => 'adm@teste.com', 'senha' => '123', 'perfil_id' => 1],
    ['id' => 2, 'email' => 'user@teste.com', 'senha' => '123', 'perfil_id' => 1],
    ['id' => 3, 'email' => 'julia@teste.com', 'senha' => '123', 'perfil_id' => 2],
    ['id' => 4, 'email' => 'ana@teste.com', 'senha' => '123', 'perfil_id' => 2],
];
//Autenticação comparando com os usuarios criando 
foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'sim';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('location: home.php');
} else {
    //Retorno do usuario para a pagina de autenticação caso email e senha nao esteja correta
    $_SESSION['autenticado'] = 'não';
    header('location: index.php?login=erro');

}
?>