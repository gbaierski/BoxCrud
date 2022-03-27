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
                <form method="POST" action="../controller/usuario.php?action=login" id="formCadastro">
                    <input type="text" name="nome" class="inputCadastro" placeholder="Nome" required>
                    <input type="email" name="email" class="inputCadastro" placeholder="E-mail" required>
                    <input type="password" name="senha" class="inputCadastro" placeholder="Senha" required>
                    <input type="password" name="confirmarSenha" class="inputCadastro" placeholder="Confirmar Senha" required>
                    <button class="botaoCadastrar-pushable" onclick="cadastrar();">
                        <span class="botaoCadastrar-shadow"></span>
                        <span class="botaoCadastrar-edge"></span>
                        <span class="botaoCadastrar-front">
                            CADASTRAR
                        </span>
                    </button>
                    <!-- <input type="submit" value="CADASTRAR" class="inputCadastro" id="botaoCadastro">  -->
                </form>
            </div>
        </section>
    </body>
</html>