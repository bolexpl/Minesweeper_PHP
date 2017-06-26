<?php
session_start();

if(isset($_SESSION['login'])){
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    unset($_SESSION['avatar']);
    echo json_encode("Wylogowano");
}
