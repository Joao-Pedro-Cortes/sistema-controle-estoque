<?php
require_once("ControleEntrada.php");
$nivel = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <div class="menu-container">

        <?php
        switch($nivel)
        {
            case 0:
                echo "<h1>Olá Administrador " . $_SESSION['username'] . "</h1>";
                break;
            case 1:
                echo "<h1>Olá Operador " . $_SESSION['username'] . "</h1>";
                break;
            case 2:
                echo "<h1>Olá Vendedor " . $_SESSION['username'] . "</h1>";
                break;
        }
        ?>

        <hr>

        <?php
        if($nivel == 0)
        {
            echo "<a href='gerenciamentousuario.php'>Gerenciar Usuários</a>";
            echo "<a href='CadastrarProdutos.php'>Cadastrar Produtos</a>";
            echo "<a href='ProdutosDesativados.php'>Produtos Desativados</a>";
        }
        if($nivel == 1)
        {
            echo "<a href='CadastrarProdutos.php'>Cadastrar Produtos</a>";
        }
        ?>

        <a href="ConsultarProdutos.php">Consultar Produtos</a>
        <a href="HistoricoMovimentacao.php">Histórico de Movimentações</a>
        <hr>
        <a class="botao-sair" href="Deslogar.php">Sair</a>
    </div>
</body>
</html>