<!DOCTYPE html>
<html lang="pt-br" content="pt-br">
    <head>
        <title><?= $nomePagina ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../assets/img/logo.ico">
        <link rel="stylesheet" href="../../assets/css/telaLogin.css">
    </head>
    <body>
        <section id="containerLogin">
            <h1 id="tituloLogin">Seja bem-vindo! Por favor, informe seus dados para prosseguir:</h1>
            <div id="boxLogin">
                <img src="../../assets/img/logo.png" width="130" height="130" alt="BoxTI" id="logoLogin">
                <form method="POST" action="../controller/usuario.php?action=login" id="formLogin">
                    <input type="email" name="email" class="inputLogin" placeholder="E-mail" required>
                    <input type="password" name="senha" class="inputLogin" placeholder="Senha" required>
                    <button class="botaoLogin-pushable" onclick="cadastrar();">
                        <span class="botaoLogin-shadow"></span>
                        <span class="botaoLogin-edge"></span>
                        <span class="botaoLogin-front">
                            LOGIN
                        </span>
                    </button>
                    <!-- <input type="submit" value="LOGIN" class="inputLogin" id="botaoLogin">  -->
                </form>
                <div id="linkCadastro"><a href="../controller/redirect.php?action=telaCadastro">Não possui uma conta? Cadastre-se!</a></div>
            </div>
        </section>
    </body>
</html>