<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

try {
    $db->beginTransaction();

    $stmt = $db->prepare("DELETE FROM records WHERE id=:id");
    $stmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();

    $db->commit();

    echo json_encode(true);

} catch (PDOException $e) {
    $db->rollBack();
    echo json_encode("Błąd usuwania wyniku");
}
