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
echo $_SESSION['msg'];
$_SESSION['msg'] = "";

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
    </tr>

<?php
$sql = "SELECT id_usuario, username, id_lvl, descricao 
        FROM usuarios
        INNER JOIN login_lvls ON usuarios.id_lvl = login_lvls.id_lvl
        WHERE lvl>=?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $nivel);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $lvl1, $lvl2, $lvl3, $lvl4);

while(mysqli_stmt_fetch($stmt)){
    echo "
        <tr>
            <td>$lvl2</td>
            <td>$lvl4</td>
            <td><a href='users_alt.php?id=$lvl1'>ALT</a></td>
        </tr>";
}
?>

</table>
</body>
</html>