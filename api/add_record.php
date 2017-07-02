<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

//TODO nie używać sesji
if (!isset($_SESSION['login'])) {
    echo json_encode("false");
    die();
}

$user_id = $_SESSION['id'];
$time = $_POST['time'];
$board = $_POST['board'];

$response = [];
$response["error"] = null;
$response["empty"] = null;
$response["success"] = false;
$response["user"] = null;
$response["data"] = null;

try {
    $db->beginTransaction();

    $stmt = $db->prepare("INSERT INTO records (user_id, czas, board) VALUE (:user_id, :czas, :board)");
    $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindValue(":czas", $time, PDO::PARAM_INT);
    $stmt->bindValue(":board", $board, PDO::PARAM_STR);
    $stmt->execute();

    $db->commit();
    $response["success"] = true;

} catch (PDOException $e) {
    $db->rollBack();
    $response["error"] = "Błąd bazy danych";
}
echo json_encode($response, JSON_PRETTY_PRINT);