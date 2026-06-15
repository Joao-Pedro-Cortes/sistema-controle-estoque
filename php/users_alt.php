<?php
require_once("ControleEntrada.php");
require_once("linkagemdb.php");

if($_SESSION['level'] != 0){
    $_SESSION['msg'] = "<p>Você não tem permissão para alterar usuários.</p>";
    header("Location: Entrada.php");
    exit();
}

$id_usuario = $_GET['id'];

$sql = "SELECT username, id_lvl FROM usuarios WHERE id_usuario = ?";

$stmt = mysqli_stmt_init($con);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username, $id_lvl);
mysqli_stmt_fetch($stmt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
</head>
<body>

<h1>Alterar Usuário</h1>

<form action="SalvarAltUsuario.php" method="post">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

    <p>Username:
        <input type="text" name="username" value="<?php echo $username; ?>">
    </p>

    <p>Nível:</p>

    <select name="id_lvl">
        <?php
        mysqli_stmt_close($stmt);

        $sql = "SELECT id_lvl, lvl, descricao FROM login_lvls";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_lvl_opcao, $lvl, $descricao);

        while(mysqli_stmt_fetch($stmt)){
            if($id_lvl_opcao == $id_lvl){
                echo "<option value='$id_lvl_opcao' selected>$lvl - $descricao</option>";
            }
            else{
                echo "<option value='$id_lvl_opcao'>$lvl - $descricao</option>";
            }
        }
        ?>
    </select>

    <p><input type="submit" value="Salvar Alterações"></p>
</form>

<hr>

<p><a href="gerenciamentousuario.php">Voltar</a></p>

</body>
</html>