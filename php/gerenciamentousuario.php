<?php
require_once("ControleEntrada.php"); // expulsa penetras
require_once("linkagemdb.php");

$nivel = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
</head>
<body>
    <h1>Gerenciamento de Usuários</h1>
    <h2>Adicionar Usuário</h2>

<?php

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
}

switch($nivel)
{
    case 0:
        ?>
        <form action="Adicionarusuario.php" method="post">
            <p>Username: <input type="text" name="txtusuario"></p>
            <p>Senha: <input type="password" name="pwsenha"></p>
        <?php
        $sql = "SELECT * FROM login_lvls WHERE lvl>=?";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $nivel);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_lvl, $lvl, $descricao);

        echo "<select name='seunivel'>";
        while(mysqli_stmt_fetch($stmt)){
            echo "<option value='$id_lvl'>$lvl - $descricao</option>";
        }
        echo "</select>";
        ?>

            <p><input type="submit" name="btn" value="Adicionar"></p>
            </form>
        <?php
        break;
}
?>

<hr>

<h2>Usuários cadastrados</h2>

<table border='1'>
    <tr>
        <th>Username</th>
        <th>Nível</th>
        <th>ALT</th>
        <th>Excluir</th>
    </tr>

<?php
$sql = "SELECT usuarios.id_usuario, usuarios.username, login_lvls.id_lvl, login_lvls.descricao FROM usuarios INNER JOIN login_lvls ON usuarios.id_lvl = login_lvls.id_lvl 
        WHERE login_lvls.lvl >= ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $nivel);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id_usuario, $username, $id_lvl, $descricao);

while(mysqli_stmt_fetch($stmt)){
    echo "
        <tr>
            <td>$username</td>
            <td>$descricao</td>
            <td><a href='users_alt.php?id=$id_usuario'>ALT</a></td>
            <td><a href='ExcluirUsuario.php?id=$id_usuario'>Excluir</a></td>
        </tr>";
}
?>

</table>
<hr>

<p><a href="Entrada.php">Voltar</a></p>
<p><a href="Deslogar.php">Sair</a></p>
</body>
</html>