<?php
    function criptografar($senha){
        $salt = "LeTester!";
        $salteado = $senha.$salt;
        $cifrado = hash("sha512", $salteado);       
        return $cifrado;
    }
?>