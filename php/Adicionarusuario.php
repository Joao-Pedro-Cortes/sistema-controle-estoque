<?php
    require_once("ControleEntrada.php");
    require_once("linkagemdb.php");
    require_once("Cifrar.php");
    $nivel = $_SESSION['level'];
    $username = $_POST['txtusuario'];
    $senha = criptografar($_POST['pwsenha']);
    $id_lvl = $_POST['seunivel'];
    $sql = "INSERT INTO usuarios (username, senha, id_lvl) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $username, $senha, $id_lvl);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt)==1){
        $_SESSION['msg'] = "Usuário $username adicionado com sucesso!";
        header("Location: gerenciamentousuario.php");
        exit();
    }
?>