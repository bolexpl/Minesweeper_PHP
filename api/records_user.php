<?php
session_start();
require_once "../php/connect.php";

$response = [];
$response["error"] = null;
$response["empty"] = null;
$response["success"] = true;
$response["user"] = null;
$response["data"] = [];

try {
    $sql = "SELECT records.id, user_id, czas, board, login FROM records INNER JOIN users ON records.user_id = users.id WHERE user_id=:user_id ORDER BY records.czas";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_id", $_SESSION['id'], PDO::PARAM_INT);
    $stmt->execute();



    if ($stmt->rowCount() == 0) {
        $response["empty"] = "Brak wyników";
    } else {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            array_push($response["data"], $row);
        }
    }

} catch (PDOException $e) {
    $response["error"]= "Błąd pobrania wyników";
}

echo json_encode($response, JSON_PRETTY_PRINT);