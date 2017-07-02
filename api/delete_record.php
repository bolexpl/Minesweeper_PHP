<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

$response = [];
$response["error"] = null;
$response["empty"] = null;
$response["success"] = true;
$response["user"] = null;
$response["data"] = null;

try {
    $db->beginTransaction();

    $stmt = $db->prepare("DELETE FROM records WHERE id=:id");
    $stmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();

    $db->commit();

    $response["success"] =true;

} catch (PDOException $e) {
    $db->rollBack();
    $response["error"] ="Błąd usuwania wyniku";
}
echo json_encode($response);