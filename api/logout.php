<?php
session_start();

header("Content-type:application/json");

//TODO nie używać sesji
if(isset($_SESSION['login'])){
    unset($_SESSION['id']);
    unset($_SESSION['login']);
    unset($_SESSION['avatar']);
    echo json_encode("Wylogowano");
}
