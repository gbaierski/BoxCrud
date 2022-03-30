
<?php
require_once ('../model/Usuario.php');
require_once ('../model/Consulta.php');

function cadastrar() {
    $usuario = new Usuario;
    $cadastro = $usuario->cadastraUsuario($_POST['nome'], $_POST['email'], 1, base64_encode($_POST['senha']));

    session_start();
    if ($cadastro) {
        $_SESSION['categoria'] = "Sucesso!";
        $_SESSION['mensagem'] = "Usuário cadastrado!";
        $_SESSION['email'] = $_POST['email'];
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Ocorreu um erro durante o cadastro.";
    }

    header("Location: redirect.php?action=telaLogin");
}

function login() {
    $usuario = new Usuario;
    $query = $usuario->loginUsuario($_POST['email'], base64_encode($_POST['senha']));

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

function logoff() {
    session_start();
    session_destroy();
    header("Location: redirect.php?action=telaLogin");
}

function verificaEmail() {
    $consulta = new Consulta;
    $verificacao = $consulta->consultaDuplicidadeEmail($_GET['email']);
    echo json_encode(['duplicidade' => $verificacao]);
}

function excluir() {
    session_start();
    $usuario = new Usuario;
    $exclusao = $usuario->excluirUsuario($_POST['idUsuario']);
    session_destroy();//Destrói a session em que o usuário estava logado
    session_start();//Inicia a session novamente para inserir as mensagens
    if ($exclusao) {
        $_SESSION['categoria'] = "Sucesso!";
        $_SESSION['mensagem'] = "Usuário excluído.";
    } else {
        $_SESSION['categoria'] = "Erro";
        $_SESSION['mensagem'] = "Usuário não foi excluído.";
    }
    header("Location: redirect.php?action=telaLogin");
}

//Gerenciador de Rotas
if (isset($_GET['action']) and function_exists($_GET['action']) ) {
    call_user_func($_GET['action']);
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $_SESSION['local'] = "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

?>