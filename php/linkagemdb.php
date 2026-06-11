<?php  
    $computador = "localhost";
    $usuario = "root";
    $pw = "";
    $db = "estoque_db";
    $con = mysqli_connect($computador, $usuario, $pw, $db);

    if(!$con){
        die("Erro ao conectar: ".mysqli_connect_error());
    }
?>