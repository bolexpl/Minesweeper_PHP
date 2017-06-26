<?php
session_start();
require_once "../php/connect.php";

$login = $_POST['login'];
$pass = $_POST['pass'];

$db = new PDO('mysql:host=' . $db_host . ";dbname=$db_name;charset=utf8", $db_user, $db_password,
    array(
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )
);

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
            echo json_encode($response);

        }else{
            echo json_encode("Zły login lub hasło");
        }
    }

} catch (PDOException $e) {
    echo json_encode("Błąd logowania");
}
