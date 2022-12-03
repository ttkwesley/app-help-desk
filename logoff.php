<?php
session_start();

//Destruir a sessão ao clicar em sair 
session_destroy();
header('location: index.php')
    ?>