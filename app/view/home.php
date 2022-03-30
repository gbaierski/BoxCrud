<?php
if (!isset($_SESSION['tipoUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>

<div id="modalAviso" class="modalAviso">
    <div class="modalConteudo">
        <div class="modalHeader" id="modalHeader">
            <span class="closeModal" onclick="fecharModal();">&times;</span>
            <h2 id="tituloModalAviso"><?= $categoria ?></h2>
        </div>
        <div class="modalBody">
            <p id="textoModalAviso"><?= $mensagem ?></p>
        </div>
    </div>
</div>

<section id="containerHome">
    <div id="modalConfirmaExclui">
        <div id="boxModalExclui">
            <span class="closeModalExclui" onclick="fecharModalExclui();">&times;</span>
            <b>ATENÇÃO:</b> 
            
            Deseja mesmo excluir sua conta? A ação não poderá ser desfeita.
            Caso deseje continuar, digite "confirmar".

            <input type="text" name="confirmarExclusao" id="confirmarExclusao" placeholder="..." onkeyup="verificaConfirmacao();">
            <button type="button" class="botaoAlterar-pushable" id="botaoConfirmaExclui" onclick="confirmaExclusao();">
                <span class="botaoAlterar-shadow"></span>
                <span class="botaoAlterar-edge" id="botaoExcluir-edge"></span>
                <span class="botaoAlterar-front" id="botaoExcluir-front">
                    EXCLUIR CONTA
                </span>
            </button>
        </div>
    </div>

    <div id="boxHome">
        <h1 id="tituloHome">Perfil de usuário:</h1>
        <form method="POST" action="../controller/usuario.php?action=alterar" id="formAltera">
            <input type="text" name="nome" class="inputAltera" value="<?=$_SESSION['nome']?>">
            <input type="email" name="email" id="email" class="inputAltera" onchange="verificaEmail();" value="<?=$_SESSION['email']?>">
            <input type="password" name="senha" id="senha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Senha">
            <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Confirmar Senha">
            <input type="hidden" name="idUsuario" value="<?= $_SESSION['idUsuario'] ?>">
            <input type="submit" id="submitAlteraExclui">

            <div id="containerBotoesAltera">
                <button type="button" class="botaoAlterar-pushable" id="botaoExclui" onclick="abrirModalExclui();">
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
</body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/home.js"></script>
</html>