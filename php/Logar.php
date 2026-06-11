<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <p>Usuário: <input type="text" name="txtusuario"></p>
            <p>Senha:   <input type="password" name="pwsenha"></p>
            <p><input type="submit" name="btn" value="Entrar"></p>
        </form>
        <?php echo $_SESSION['msg']; $_SESSION['msg'] = ""; ?>
    </body>
</html>