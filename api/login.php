<?php
require_once "../php/connect.php";

header("Content-type:application/json");

$login = $_POST['login'];
$pass = $_POST['pass'];

$response = [];
$response["error"] = null;
$response["empty"] = null;
$response["success"] = true;
$response["user"] = [];
$response["data"] = null;

try {
    $stmt = $db->prepare("SELECT * FROM users WHERE login=:login OR email=:email");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":email", $login, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() != 1) {
        $response["error"] = "Zły login lub hasło";
    } else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        if (password_verify($pass, $result["pass"])) {
            $response["user"] = [
                "id" => $result['id'],
                "login" => $result['login'],
                "avatar" => $result['avatar']
            ];

        } else {
            $response["error"] = "Zły login lub hasło";
        }
    }

} catch (PDOException $e) {
    $response["error"] = "Błąd logowania";
}
echo json_encode($response, JSON_PRETTY_PRINT);