<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");
$id_produto = $_GET['id'];
$sql = "SELECT codigo_produto, nome_produto, descricao, preco FROM produtos WHERE id_produto = ?";
$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_produto);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $codigo_produto, $nome_produto, $descricao, $preco);
mysqli_stmt_fetch($stmt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/produtos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
<div class="produtos-container">
    <h1>Editar Produto</h1>
    <form action="SalvarEdicaoProduto.php" method="post">
        <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">
        <p>Código do Produto:
            <input type="text" name="codigo_produto" value="<?php echo $codigo_produto; ?>">
        </p>
        <p>Nome do Produto:
            <input type="text" name="nome_produto" value="<?php echo $nome_produto; ?>">
        </p>
        <p>Descrição:</p>
        <p>
            <textarea name="descricao"><?php echo $descricao; ?></textarea>
        </p>
        <p>Preço:
            <input type="number" step="0.01" name="preco" value="<?php echo $preco; ?>">
        </p>
        <input class="botao-salvar" type="submit" name="btn" value="Salvar Alterações">
    </form>
    <a class="botao-voltar" href="ConsultarProdutos.php">Voltar</a>
</div>
</body>
</html>