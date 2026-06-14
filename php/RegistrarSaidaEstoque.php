<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

$id_produto = $_POST['id_produto'];
$quantidade_atual = $_POST['quantidade_atual'];
$quantidade_saida = $_POST['quantidade_saida'];
$usuario = $_SESSION['username'];

if($quantidade_saida <= 0){
    $_SESSION['msg'] = "<p>Informe uma quantidade válida.</p>";
    header("Location: SaidaEstoque.php?id=$id_produto");
    exit();
}

if($quantidade_saida > $quantidade_atual){
    $_SESSION['msg'] = "<p>Quantidade de saída maior que o estoque disponível.</p>";
    header("Location: SaidaEstoque.php?id=$id_produto");
    exit();
}

$nova_quantidade = $quantidade_atual - $quantidade_saida;

if($nova_quantidade == 0){
    $sql = "UPDATE produtos SET quantidade = ?, ativo = 0 WHERE id_produto = ?";
}
else{
    $sql = "UPDATE produtos SET quantidade = ? WHERE id_produto = ?";
}

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ii", $nova_quantidade, $id_produto);
mysqli_stmt_execute($stmt);

$sql = "INSERT INTO movimentacoes_estoque (id_produto, tipo, quantidade, usuario) VALUES (?, ?, ?, ?)";

$tipo = "saida";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "isis", $id_produto, $tipo, $quantidade_saida, $usuario);
mysqli_stmt_execute($stmt);

$_SESSION['msg'] = "<p>Saída registrada com sucesso!</p>";
header("Location: ConsultarProdutos.php");
exit();
?>