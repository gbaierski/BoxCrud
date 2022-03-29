<?php
if (!isset($_SESSION['tipoUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>

<section id="containerHome">
    <div id="boxHome">
        <h1 id="tituloHome">Perfil de usuário:</h1>
        <form method="POST" action="../controller/usuario.php?action=alterar" id="formAltera">
            <input type="text" name="nome" class="inputAltera" placeholder="<?=$_SESSION['nome']?>" required>
            <input type="email" name="email" id="email" class="inputAltera" onchange="verificaEmail();" placeholder="<?=$_SESSION['email']?>" required>
            <input type="password" name="senha" id="senha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Senha" required>
            <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Confirmar Senha" required>
            <input type="submit" id="submitAltera">

            <div id="containerBotoesAltera">
                <button type="button" class="botaoAlterar-pushable" id="botaoExclui" onclick="excluir();">
                    <span class="botaoAlterar-shadow"></span>
                    <span class="botaoAlterar-edge" id="botaoExcluir-edge"></span>
                    <span class="botaoAlterar-front" id="botaoExcluir-front">
                        EXCLUIR CONTA
                    </span>
                </button>

                <button type="button" class="botaoAlterar-pushable" id="botaoAltera" onclick="alterar();">
                    <span class="botaoAlterar-shadow"></span>
                    <span class="botaoAlterar-edge"></span>
                    <span class="botaoAlterar-front">
                        ALTERAR
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>