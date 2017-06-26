<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

if(!isset($_SESSION['login'])){
    echo json_encode("false");
    die();
}

$user_id = $_SESSION['id'];
$time = $_POST['time'];
$board = $_POST['board'];

try {
    $db->beginTransaction();

    $stmt = $db->prepare("INSERT INTO records (user_id, czas, board) VALUE (:user_id, :czas, :board)");
    $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindValue(":czas", $time, PDO::PARAM_INT);
    $stmt->bindValue(":board", $board, PDO::PARAM_STR);
    $stmt->execute();

    $db->commit();
    echo json_encode(true);

} catch (PDOException $e) {
    $db->rollBack();
    echo json_encode("Błąd bazy danych");
}
