
<?php
require_once ('../model/Usuario.php');
require_once ('../model/Consulta.php');

function login() {
    $consulta = new Usuario;
    $query = $consulta->loginUsuario($_POST['email'], base64_encode($_POST['senha']));

    if ($query && mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_assoc($query);
        
        session_start();
        $_SESSION['idUsuario'] = $row['idUsuario'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['tipoUsuario'] = $row['tipoUsuario'];

        header("Location: redirect.php?action=home");
    } else {
        session_start();
        $_SESSION['email'] = $_POST['email'];

        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Usuário ou senha incorretos";

        header("Location: redirect.php?action=telaLogin");
    }

}

function cadastrar() {
    $usuario = new Usuario;
    $cadastro = $usuario->cadastraUsuario($_POST['nome'], $_POST['email'], 1, base64_encode($_POST['senha']));

    if ($cadastro) {
        $mensagem = "Usuário cadastrado!";
        $categoria = "Sucesso!";
    } else {
        $mensagem = "Ocorreu um erro durante o cadastro.";
        $categoria = "Erro";
    }

    $nomePagina = "Tela de Login | Box";
    require '../view/telaLogin.php';
}

function verificaEmail() {
    $consulta = new Consulta;
    $verificacao = $consulta->consultaDuplicidadeEmail($_GET['email']);
    echo json_encode(['duplicidade' => $verificacao]);
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>