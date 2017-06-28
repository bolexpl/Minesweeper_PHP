<?php
require_once "../php/connect.php";

try {
    $sql = "SELECT records.id, user_id, czas, board, login, avatar FROM records INNER JOIN users ON records.user_id = users.id ORDER BY records.czas";

    if (isset($_GET['board'])) {
        switch ($_GET['board']) {
            case "8x8":
                $sql = "SELECT records.id, user_id, czas, board, login, avatar FROM records INNER JOIN users ON records.user_id = users.id WHERE board='8x8' ORDER BY records.czas";
                break;
            case "16x16":
                $sql = "SELECT records.id, user_id, czas, board, login, avatar FROM records INNER JOIN users ON records.user_id = users.id WHERE board='16x16' ORDER BY records.czas";
                break;
            case "16x30":
            case "30x16":
                $sql = "SELECT records.id, user_id, czas, board, login, avatar FROM records INNER JOIN users ON records.user_id = users.id WHERE board='30x16' OR board='16x30' ORDER BY records.czas";
                break;
            case "custom":
                $sql = "SELECT records.id, user_id, czas, board, login, avatar FROM records INNER JOIN users ON records.user_id = users.id WHERE board NOT IN('8x8','16x16','30x16','16x30') ORDER BY records.czas";
                break;
        }
    }
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $response = [];
    $response["error"] = null;
    $response["empty"] = null;
    $response["data"] = [];

    if ($stmt->rowCount() == 0) {
        $response["empty"] = "Brak wyników";
    } else {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            array_push($response["data"], $row);
        }
    }

    echo json_encode($response, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo json_encode(["error" => "Błąd pobrania wyników"]);
}