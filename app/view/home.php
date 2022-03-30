<?php
if (!isset($_SESSION['tipoUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>

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
            <input type="text" name="nome" class="inputAltera" placeholder="<?=$_SESSION['nome']?>">
            <input type="email" name="email" id="email" class="inputAltera" onchange="verificaEmail();" placeholder="<?=$_SESSION['email']?>">
            <input type="password" name="senha" id="senha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Senha">
            <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputAltera" onkeyup="verificaSenha()" placeholder="Confirmar Senha">
            <input type="hidden" name="idUsuario" value="<?= $_SESSION['idUsuario'] ?>">
            <input type="submit" id="submitAlteraExclui">

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
</body>

<script>
    function excluir() {
        document.getElementById("modalConfirmaExclui").style = "display:block";
    }

    function fecharModalExclui() {
        document.getElementById("modalConfirmaExclui").style = "display: none";
    }

    function verificaConfirmacao () {
        input = document.getElementById("confirmarExclusao");
        confirma = document.getElementById("botaoConfirmaExclui");

        if(input.value == "confirmar" || input.value == "Confirmar" || input.value == "CONFIRMAR") {
            confirma.style="display: block;";
        } else {
            confirma.style="display: none;";
        }
    }

    function confirmaExclusao() {
        document.getElementById("formAltera").action = "../controller/usuario.php?action=excluir";
        document.getElementById("submitAlteraExclui").click();
    }
</script>