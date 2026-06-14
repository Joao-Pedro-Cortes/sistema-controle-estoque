<?php
session_start();

require_once "Cifrar.php";
require_once "linkagemdb.php";

$senha = criptografar($_POST['pwsenha']);
$username = $_POST['txtusuario'];

$sql = "SELECT U.id_usuario, U.username, N.lvl
        FROM usuarios AS U
        INNER JOIN login_lvls AS N ON U.id_lvl = N.id_lvl
        WHERE U.username = ? AND U.senha = ?
        LIMIT 1";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $senha);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) > 0){

    mysqli_stmt_bind_result($stmt, $id_usuario, $username_db, $level);

    if(mysqli_stmt_fetch($stmt)){

        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['username'] = $username_db;
        $_SESSION['level'] = $level;

        header("Location: Entrada.php");
        exit();
    }
}
else{
    $_SESSION['msg'] = "<p>Usuário ou senha inválidos!</p>";
    header("Location: Logar.php");
    exit();
}
?>