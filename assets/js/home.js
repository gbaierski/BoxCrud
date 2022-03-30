function abrirModalExclui() {
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