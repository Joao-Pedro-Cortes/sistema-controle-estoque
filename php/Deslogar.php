<?php
session_start();
session_destroy();
header("Location: Logar.php");
exit();
?>