<!DOCTYPE html>
<html lang="pt-br" content="pt-br">
    <head>
        <title><?= $nomePagina ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../assets/img/logo.ico">
        <link rel="stylesheet" href="../../assets/css/telaCadastro.css">
    </head>
    <body>
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
        <a href="../controller/redirect.php?action=telaLogin">
            <button class="botaoVoltar-pushable">
                <span class="botaoVoltar-shadow"></span>
                <span class="botaoVoltar-edge"></span>
                <span class="botaoVoltar-front">
                    <img src="../../assets/img/voltar.png" width="30" height="30">
                </span>
            </button>
        </a>
        <section id="containerCadastro">
            <h1 id="tituloCadastro">Cadastro de usuário:</h1>
            <div id="boxCadastro">
                <a href="../controller/redirect.php?action=telaLogin"><img src="../../assets/img/logo.png" width="130" height="130" alt="BoxTI" id="logoCadastro"></a>
                <form method="POST" action="../controller/usuario.php?action=cadastrar" id="formCadastro">
                    <input type="text" name="nome" class="inputCadastro" placeholder="Nome" required>
                    <input type="email" name="email" id="email" class="inputCadastro" onchange="verificaEmail('teste');" placeholder="E-mail" required>
                    <input type="password" name="senha" id="senha" class="inputCadastro" onkeyup="verificaSenha()" placeholder="Senha" required>
                    <input type="password" name="confirmarSenha" id="confirmarSenha" class="inputCadastro" onkeyup="verificaSenha()" placeholder="Confirmar Senha" required>
                    <input type="submit" id="submitCadastro">
                    <button type="button" class="botaoCadastrar-pushable" id="botaoCadastro" onclick="cadastrar();">
                        <span class="botaoCadastrar-shadow"></span>
                        <span class="botaoCadastrar-edge"></span>
                        <span class="botaoCadastrar-front">
                            CADASTRAR
                        </span>
                    </button>
                </form>
            </div>
        </section>
    </body>
    <script>
        let mensagem = document.getElementById("textoModalAviso");
        let categoria = document.getElementById("tituloModalAviso");
        emailDuplicado = "";

        if (mensagem.innerHTML != "") {
            if (categoria.innerHTML == "Erro") {
                document.getElementById("modalHeader").style = "background-color: #b11818";
            }
            modalAviso();
        }

        function modalAviso () {
            document.getElementById("modalAviso").style = "display: block";
        }

        function fecharModal() {
            document.getElementById("modalAviso").style = "display: none";
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById("modalAviso")) {
            document.getElementById("modalAviso").style.display = "none";
            }
        }

        function cadastrar() {
            if (verificaSenha()) {
                if (emailDuplicado != document.getElementById("email").value){
                    document.getElementById("submitCadastro").click();
                } else {
                    emailDuplicado = document.getElementById("email").value;
                    mensagem.innerHTML = "Este e-mail já está cadastrado! Por favor informe outro.";
                    categoria.innerHTML = "Aviso";
                    document.getElementById("modalHeader").style = "background-color: #b11818";
                    modalAviso();
                }
            }
        }

        function verificaSenha() {
            let senha = document.getElementById("senha").value;
            let confirmarSenha = document.getElementById("confirmarSenha").value;
            if(confirmarSenha == "") {
                document.getElementById("confirmarSenha").style="border: none;";
            } else if (senha != confirmarSenha){
                document.getElementById("confirmarSenha").style="border: solid 2px #b11818;";
                document.getElementById("botaoCadastro").style="display: none";
                return false;
            } else {
                document.getElementById("confirmarSenha").style="border: solid 2px #00c37e;";
                document.getElementById("botaoCadastro").style="display: block";
                return true;
            }
        }

        function verificaEmail() {
            var email = document.getElementById('email').value;
            const url = '../controller/usuario.php?action=verificaEmail&email=' + email;

            fetch(url)
            .then((resp) => resp.json())
            .then(function(data) {
                if(data.duplicidade) {
                    emailDuplicado = document.getElementById("email").value;
                    mensagem.innerHTML = "Este e-mail já está cadastrado! Por favor informe outro.";
                    categoria.innerHTML = "Aviso";
                    document.getElementById("modalHeader").style = "background-color: #b11818";
                    modalAviso()
                }
            });
        }
    </script>
</html>