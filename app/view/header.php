<!DOCTYPE html>
<html lang="pt-br" content="pt-br">
    <head>
        <title><?= $nomePagina ?></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="../../assets/img/logo.ico">
        <link rel="stylesheet" href="../../assets/css/header.css">
        <link rel="stylesheet" href="../../assets/css/home.css">
        <link rel="stylesheet" href="../../assets/css/homeAdmin.css">
        <link rel="stylesheet" href="../../assets/css/modalAviso.css">
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navMenu" id="itensMenu">
                    <img src="../../assets/img/logo.png" width="100" height="100" alt="BoxTI">
                </nav>
                <nav class="navMenu">
                    <ul>
                        <li> 
                            <?php 
                            if ($nomePagina == "Home Admin | Box")
                                echo "Administrador";
                            else
                                echo $_SESSION['nome'];
                            ?>
                        </li>
                        <li><a href="../controller/usuario.php?action=logoff">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </header>
