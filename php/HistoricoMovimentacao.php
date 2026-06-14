<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Movimentações</title>
</head>
<body>

<h1>Histórico de Movimentações</h1>

<table>
    <tr>
        <td valign="top">
            <h2>Saídas de Estoque</h2>

            <table border="1">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Usuário</th>
                    <th>Data</th>
                </tr>

                <?php
                $sql = "SELECT P.nome_produto, M.quantidade, M.usuario, M.data_movimentacao FROM movimentacoes_estoque AS M INNER JOIN produtos AS P ON M.id_produto = P.id_produto 
                WHERE M.tipo = 'saida' ORDER BY M.data_movimentacao DESC";

                $stmt = mysqli_stmt_init($con);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $nome_produto, $quantidade, $usuario, $data_movimentacao);

                while(mysqli_stmt_fetch($stmt)){
                    $data_br = date("d/m/Y H:i:s", strtotime($data_movimentacao));

                    echo "
                        <tr>
                            <td>$nome_produto</td>
                            <td>$quantidade</td>
                            <td>$usuario</td>
                            <td>$data_br</td>
                        </tr>
                    ";
                }
                ?>
            </table>
        </td>

        <td width="50"></td>

        <td valign="top">
            <h2>Entradas de Estoque</h2>

            <table border="1">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Usuário</th>
                    <th>Data</th>
                </tr>

                <?php
                $sql = "SELECT P.nome_produto, M.quantidade, M.usuario, M.data_movimentacao FROM movimentacoes_estoque AS M INNER JOIN produtos AS P ON M.id_produto = P.id_produto
                        WHERE M.tipo = 'entrada' ORDER BY M.data_movimentacao DESC";

                $stmt = mysqli_stmt_init($con);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $nome_produto, $quantidade, $usuario, $data_movimentacao);

                while(mysqli_stmt_fetch($stmt)){
                    $data_br = date("d/m/Y H:i:s", strtotime($data_movimentacao));

                    echo "
                        <tr>
                            <td>$nome_produto</td>
                            <td>$quantidade</td>
                            <td>$usuario</td>
                            <td>$data_br</td>
                        </tr>
                    ";
                }
                ?>
            </table>
        </td>
    </tr>
</table>

<hr>

<p><a href="Entrada.php">Voltar</a></p>

</body>
</html>