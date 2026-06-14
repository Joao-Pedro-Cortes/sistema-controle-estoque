<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

$id_produto = $_POST['id_produto'];
$codigo_produto = $_POST['codigo_produto'];
$nome_produto = $_POST['nome_produto'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

$sql = "UPDATE produtos SET codigo_produto = ?, nome_produto = ?, descricao = ?, preco = ? WHERE id_produto = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "sssdi", $codigo_produto, $nome_produto, $descricao, $preco, $id_produto);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) >= 0){
    $_SESSION['msg'] = "<p>Produto alterado com sucesso!</p>";
    header("Location: ConsultarProdutos.php");
    exit();
}
else{
    $_SESSION['msg'] = "<p>Erro ao alterar produto.</p>";
    header("Location: ConsultarProdutos.php");
    exit();
}
?>