<!DOCTYPE html>
<html lang="pt-br" content="pt-br">
    <head>
        <title><?= $nomePagina ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../assets/img/logo.ico">
        <link rel="stylesheet" href="../../assets/css/telaLogin.css">
        <link rel="stylesheet" href="../../assets/css/modalAviso.css">
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
        <section id="containerLogin">
            <h1 id="tituloLogin">Seja bem-vindo! Por favor, informe seus dados para prosseguir:</h1>
            <div id="boxLogin">
                <img src="../../assets/img/logo.png" width="130" height="130" alt="BoxTI" id="logoLogin">
                <form method="POST" action="../controller/usuario.php?action=login" id="formLogin">
                    <input type="email" name="email" id="email" class="inputLogin" placeholder="E-mail" required value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                    <input type="password" name="senha" id="senha" class="inputLogin" placeholder="Senha" required>
                    <input type="submit" id="submitLogin">
                    <button type="button" class="botaoLogin-pushable" id="botaoLogin" onclick="logar();">
                        <span class="botaoLogin-shadow"></span>
                        <span class="botaoLogin-edge"></span>
                        <span class="botaoLogin-front">
                            LOGIN
                        </span>
                    </button>
                </form>
                <div id="linkCadastro"><a href="../controller/redirect.php?action=telaCadastro">Não possui uma conta? Cadastre-se!</a></div>
            </div>
        </section>
    </body>
    <script src="../../assets/js/geral.js"></script>
    <script src="../../assets/js/telaLogin.js"></script>
</html>

