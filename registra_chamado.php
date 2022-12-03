<?php
//formatação de array pra texto 
session_start();
/*
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao = str_replace('#', '-', $_POST['descricao']);
$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao;
echo ($texto);
*/

//Implode para substituição de caracteres
$texto = (implode(':', $_POST));
$texto = str_replace('#', '-', $texto);
//PHP_EOL faz a quebra de linha no arquivo txt 
$texto = $_SESSION['id'] . ':' . $texto . PHP_EOL;

//Abrir arquivo de texto
$arquivo = fopen('arquivo.hd', 'a');

//Escrever arquivo de texto
fwrite($arquivo, $texto);
//Fechar arquivo de texto
fclose($arquivo);
//Fazer o redirecionamento para abrir um novo chamado, após o envio do mesmo
header('location: abrir_chamado.php');
?>