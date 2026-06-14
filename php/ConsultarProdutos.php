<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");
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
            $sql = "SELECT codigo_produto, nome_produto, descricao, preco, quantidade, data_entrada 
                    FROM produtos 
                    WHERE ativo = 1";

            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $codigo, $nome, $descricao, $preco, $quantidade, $data_entrada);

            while(mysqli_stmt_fetch($stmt)){
                $data_br = date("d/m/Y H:i:s", strtotime($data_entrada));
                $preco_br = number_format($preco, 2, ",", ".");
                echo "
                    <tr>
                        <td>$codigo</td>
                        <td>$nome</td>
                        <td>$descricao</td>
                        <td>R$ $preco_br</td>
                        <td>$quantidade</td>
                        <td>$data_br</td>
                    </tr>
                ";
            }
        ?>

    </table>

    <hr>

    <p><a href="Entrada.php">Voltar</a></p>

</body>
</html>