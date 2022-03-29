<?php

function telaLogin() {
    session_start();
    $nomePagina = "Tela de Login | Box";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";

    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/telaLogin.php';
}

function telaCadastro() {
    session_start();
    $nomePagina = "Tela de Cadastro | Box";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";

    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/telaCadastro.php';
}

function home() { 
    session_start();
    $nomePagina = "Home | Box";
    $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : "";
    $categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";

    unset($_SESSION['mensagem']);
    unset($_SESSION['categoria']);

    require '../view/home.php';
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>