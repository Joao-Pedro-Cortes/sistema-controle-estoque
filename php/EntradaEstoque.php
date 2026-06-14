<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

$id_produto = $_GET['id'];

$sql = "SELECT nome_produto, quantidade FROM produtos WHERE id_produto = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_produto);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nome_produto, $quantidade);
mysqli_stmt_fetch($stmt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Entrada de Estoque</title>
</head>
<body>

<h1>Entrada de Estoque</h1>

<p>Produto: <?php echo $nome_produto; ?></p>
<p>Quantidade atual: <?php echo $quantidade; ?></p>

<form action="RegistrarEntradaEstoque.php" method="post">
    <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">

    <p>Quantidade de entrada:
        <input type="number" name="quantidade_entrada">
    </p>

    <p><input type="submit" name="btn" value="Registrar Entrada"></p>
</form>

<hr>

<p><a href="ConsultarProdutos.php">Voltar</a></p>

</body>
</html>