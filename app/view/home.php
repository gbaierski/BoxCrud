<?php
if (!isset($_SESSION['tipoUsuario'])) {
    header("Location: ../controller/redirect.php?action=telaLogin");
}

require_once "header.php";

//session_destroy();
?>

<section id="containerHome">
    <div id="boxHome">

    </div>
</section>