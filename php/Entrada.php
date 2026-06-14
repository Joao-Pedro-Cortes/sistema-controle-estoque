<?php
    require_once("ControleEntrada.php"); // expulsa penetras
    $nivel = $_SESSION['level'];
    switch($nivel)
    {
        case 0:
            echo "Olá Administrador " . $_SESSION['username'];
            echo "<hr>";
            echo "<a href='gerenciamentousuario.php'>Gerenciar Usuários</a></p>";
            echo "<a href='CadastrarProdutos.php'>Cadastrar Produtos</a></p>";
            echo "<p><a href='ProdutosDesativados.php'>Produtos Desativados</a></p>";
            break;

        case 1:
            echo "Olá Operador " . $_SESSION['username'];
            echo "<hr>";
            echo "<a href='CadastrarProdutos.php'>Cadastrar Produtos</a></p>";
            break;

        case 2:
            echo "Olá Vendedor " . $_SESSION['username'];
            echo "<hr>";
            break;
    }
    echo "<a href='ConsultarProdutos.php'>Consultar Produtos</a></p>";
    echo "<p><a href='HistoricoMovimentacao.php'>Histórico de Movimentações</a></p>";
?>
<hr>

<p><a href="Deslogar.php">SAIR</a></p>
