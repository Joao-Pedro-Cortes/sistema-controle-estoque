<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="VerificarLogin.php" method="post">
            <p>
                Usuário:
                <input type="text" name="txtusuario">
            </p>
            <p>
                Senha:
                <input type="password" name="pwsenha">
            </p>
            <p>
                <input type="submit" name="btn" value="Entrar">
            </p>
        </form>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            $_SESSION['msg'] = "";
        }
        ?>
    </div>
</body>
</html>