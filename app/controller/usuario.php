
<?php
require_once ('../model/Usuario.php');

function login() {
    $usuario = new Usuario;
    $usuario->loginUsuario($_POST['login'], $_POST['senha']);
}

function cadastrar() {
    $usuario = new Usuario;
    $usuario->cadastraUsuario($_POST['nome'], $_POST['email'], 1, base64_encode($_POST['senha']));
    $nomePagina = "Tela de Login | Box";
    require '../view/telaLogin.php';
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>