<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

if($_SESSION['level'] != 0){
    $_SESSION['msg'] = "<p>Você não tem permissão para alterar usuários.</p>";
    header("Location: Entrada.php");
    exit();
}

$id_usuario = $_POST['id_usuario'];
$username = $_POST['username'];
$id_lvl = $_POST['id_lvl'];

$sql = "UPDATE usuarios SET username = ?, id_lvl = ? WHERE id_usuario = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "sii", $username, $id_lvl, $id_usuario);
mysqli_stmt_execute($stmt);

$_SESSION['msg'] = "<p>Usuário alterado com sucesso!</p>";
header("Location: gerenciamentousuario.php");
exit();
?>