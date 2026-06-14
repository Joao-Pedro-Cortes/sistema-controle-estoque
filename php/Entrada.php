<?php
    require_once("ControleEntrada.php"); // expulsa penetras
    $nivel = $_SESSION['level'];
    switch($nivel)
    {
        case 0:
            echo "Olá Administrador " . $_SESSION['username'];
            echo "<hr>";
            echo "<a href='gerenciamentousuario.php'>Gerenciar Usuários</a>";
            break;

    }
?>
<hr>
<p><a href="Deslogar.php">SAIR</a></p>