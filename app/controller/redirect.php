<?php

function telaLogin() {
    $nomePagina = "Tela de Login | Box";
    $mensagem = "";
    $categoria = "";
    require '../view/telaLogin.php';
}

function telaCadastro() {
    $nomePagina = "Tela de Cadastro | Box";
    require '../view/telaCadastro.php';
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>