<?php   
    session_start();

    function banir(){
        if(!isset($_SESSION['level'])){
            header("location: logar.php");
            exit();
        }
    }
    banir();
?>