<?php
session_start();
require_once "../php/connect.php";

$db = new PDO('mysql:host=' . $db_host . ";dbname=$db_name;charset=utf8", $db_user, $db_password,
    array(
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )
);

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
