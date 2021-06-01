<?php


    session_start();
    unset($_SESSION["user"]);
    header('Location: ../../views/Front/Accueil.php');
?>