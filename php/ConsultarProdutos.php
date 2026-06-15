<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produtos</title>
</head>
<body>

    <h1>Produtos em Estoque</h1>
    
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Data de Entrada</th>
        </tr>

        <?php
            $sql = "SELECT codigo_produto, nome_produto, descricao, preco, quantidade, data_entrada, id_produto FROM produtos WHERE ativo = 1";
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $codigo, $nome, $descricao, $preco, $quantidade, $data_entrada, $id_produto);

            while(mysqli_stmt_fetch($stmt)){
                $data_br = date("d/m/Y H:i:s", strtotime($data_entrada));
                $preco_br = number_format($preco, 2, ",", ".");
                $acoes = "<a href='EditarProduto.php?id=$id_produto'>Editar</a>";
                $acoes .= "| <a href='SaidaEstoque.php?id=$id_produto'>Saída</a>";
                $acoes .= "| <a href='EntradaEstoque.php?id=$id_produto'>Entrada</a>";
                if($_SESSION['level'] == 0){
                    $acoes .= "| <a href='ExcluirProduto.php?id=$id_produto'>Excluir</a>";
                }       

                if($_SESSION['level'] == 0){
                    $acoes .= " | <a href='DesativarProduto.php?id=$id_produto'>Desativar</a>";
                }
                
                echo"
                    <tr>
                        <td>$codigo</td>
                        <td>$nome</td>
                        <td>$descricao</td>
                        <td>R$ $preco_br</td>
                        <td>$quantidade</td>
                        <td>$data_br</td>
                        <td>$acoes</td>
                    </tr>
                ";
            }
        ?>

    </table>

    <hr>

    <p><a href="Entrada.php">Voltar</a></p>

</body>
</html>