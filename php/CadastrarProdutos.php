<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");
require_once("ControleEntrada.php");

$nivel = $_SESSION['level'];
if($nivel > 1){
    header("Location: Entrada.php");
    exit();
}

if(isset($_POST['btn'])){
    $codigo_produto = $_POST['codigo_produto'];
    $nome_produto = $_POST['nome_produto'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos(codigo_produto, nome_produto, descricao, preco, quantidade) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssdi", $codigo_produto, $nome_produto, $descricao, $preco, $quantidade);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) == 1){
        $_SESSION['msg'] = "<p>Produto cadastrado com sucesso!</p>";
        header("Location: CadastrarProdutos.php");
        exit();
    }
    else{
        $_SESSION['msg'] = "<p>Erro ao cadastrar produto.</p>";
        header("Location: CadastrarProdutos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <?php
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
    ?>

    <form action="CadastrarProdutos.php" method="post">
        <p>Código do Produto: <input type="text" name="codigo_produto"></p>
        <p>Nome do Produto: <input type="text" name="nome_produto"></p>
        <p>Descrição:</p>
        <p><textarea name="descricao"></textarea></p>
        <p>Preço: <input type="number" step="0.01" name="preco"></p>
        <p>Quantidade: <input type="number" name="quantidade"></p>
        <p><input type="submit" name="btn" value="Cadastrar"></p>
    </form>
    <hr>
    <p><a href="Entrada.php">Voltar</a></p>
</body>
</html>