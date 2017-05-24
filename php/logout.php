<?php
session_start();

if(isset($_SESSION['login'])){
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    $_SESSION['success'] = "Wylogowano";
}

header("Location: ../index.php");