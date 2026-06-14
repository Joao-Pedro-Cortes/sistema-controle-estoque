<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

if($_SESSION['level'] != 0){
    $_SESSION['msg'] = "<p>Você não tem permissão para reativar produtos.</p>";
    header("Location: Entrada.php");
    exit();
}

$id_produto = $_GET['id'];

$sql = "UPDATE produtos SET ativo = 1 WHERE id_produto = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_produto);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0){
    $_SESSION['msg'] = "<p>Produto reativado com sucesso!</p>";
}
else{
    $_SESSION['msg'] = "<p>Erro ao reativar produto.</p>";
}

header("Location: ProdutosDesativados.php");
exit();
?>