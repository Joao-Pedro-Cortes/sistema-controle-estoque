<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

$id_produto = $_POST['id_produto'];
$quantidade_entrada = $_POST['quantidade_entrada'];
$usuario = $_SESSION['username'];

if($quantidade_entrada <= 0){
    $_SESSION['msg'] = "<p>Informe uma quantidade válida.</p>";
    header("Location: EntradaEstoque.php?id=$id_produto");
    exit();
}

$sql = "UPDATE produtos SET quantidade = quantidade + ?, ativo = 1 WHERE id_produto = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ii", $quantidade_entrada, $id_produto);
mysqli_stmt_execute($stmt);

$sql = "INSERT INTO movimentacoes_estoque
        (id_produto, tipo, quantidade, usuario)
        VALUES (?, ?, ?, ?)";

$tipo = "entrada";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "isis", $id_produto, $tipo, $quantidade_entrada, $usuario);
mysqli_stmt_execute($stmt);

$_SESSION['msg'] = "<p>Entrada registrada com sucesso!</p>";
header("Location: ConsultarProdutos.php");
exit();
?>