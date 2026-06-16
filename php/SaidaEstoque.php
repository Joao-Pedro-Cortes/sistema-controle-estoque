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
    <title>Saída de Estoque</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/estoque.css">
</head>
<body>
<div class="estoque-container">
<h1>Saída de Estoque</h1>
<p>Produto: <?php echo $nome_produto; ?></p>
<p>Quantidade atual: <?php echo $quantidade; ?></p>
<form action="RegistrarSaidaEstoque.php" method="post">
    <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
    <input type="hidden" name="quantidade_atual" value="<?php echo $quantidade; ?>">
    <p>Quantidade de saída:
        <input type="number" name="quantidade_saida">
    </p>
  <input class="botao-confirmar" type="submit" value="Registrar Saída">
</form>
<a class="botao-voltar" href="ConsultarProdutos.php">Voltar</a>
</div>
</body>
</html>