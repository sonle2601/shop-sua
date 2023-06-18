<?php
    $_SESSION["customerid"] ="";
    $_SESSION["login"]=false;
    session_unset();
    header("Location: login.php");
?>