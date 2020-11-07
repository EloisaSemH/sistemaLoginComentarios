<?php
error_reporting(-1);

setlocale(LC_ALL, 'pt_BR');
date_default_timezone_set('America/Sao_Paulo');

session_start();

$pag = $_GET['pg'] ?? 'inicio';
$_SESSION['logado'] = $_SESSION['logado'] ?? null;

include('view/cabecalho.php');
include('view/menu.php');

if(file_exists("view/$pag.php")){
    include('view/' . $pag . '.php');
}else{
    include('view/404.php');
}

include('view/rodape.php');
?>