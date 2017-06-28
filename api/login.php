<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

$login = $_POST['login'];
$pass = $_POST['pass'];

try {
    $stmt = $db->prepare("select * from users where login=:login or email=:email");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":email", $login, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() != 1){
        echo json_encode("Zły login lub hasło");
    }else{
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        if(password_verify($pass,$result["pass"])){

            $_SESSION['id'] = $result['id'];
            $_SESSION['login'] = $result['login'];
            $_SESSION['avatar'] = $result['avatar'];

            $response['error'] = null;
            $response['success'] = "Zalogowano";
            $response['id'] = $result['id'];
            $response['login'] = $result['login'];
            $response['avatar'] = $result['avatar'];
            echo json_encode($response, JSON_PRETTY_PRINT);

        }else{
            echo json_encode("Zły login lub hasło");
        }
    }

} catch (PDOException $e) {
    echo json_encode("Błąd logowania");
}
