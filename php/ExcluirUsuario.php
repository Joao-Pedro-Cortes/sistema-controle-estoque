<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

if($_SESSION['level'] != 0){
    $_SESSION['msg'] = "<p>Você não tem permissão para excluir usuários.</p>";
    header("Location: Entrada.php");
    exit();
}

$id_usuario = $_GET['id'];

if($id_usuario == $_SESSION['id_usuario']){
    $_SESSION['msg'] = "<p>Você não pode excluir o próprio usuário logado.</p>";
    header("Location: gerenciamentousuario.php");
    exit();
}

$sql = "DELETE FROM usuarios WHERE id_usuario = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_usuario);
mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0){
    $_SESSION['msg'] = "<p>Usuário excluído com sucesso!</p>";
}
else{
    $_SESSION['msg'] = "<p>Erro ao excluir usuário.</p>";
}

header("Location: gerenciamentousuario.php");
exit();
?>