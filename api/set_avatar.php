<?php
require_once "../php/connect.php";

header("Content-type:application/json");

$response = [];
$response["error"] = null;
$response["empty"] = null;
$response["success"] = true;
$response["user"] = [];
$response["data"] = null;

try {
    $db->beginTransaction();

    $select = "SELECT * FROM users WHERE id=:id";

    $stmt2 = $db->prepare($select);
    $stmt2->bindValue(":id", $_POST['id'], PDO::PARAM_STR);
    $stmt2->execute();

    if ($stmt2->rowCount() == 0) {
        $response["error"] = "Brak takiego użytkownika";
        echo json_encode($response, JSON_PRETTY_PRINT);
        die();
    }

    $row = $stmt2->fetchAll();

    if ($row['avatar'] !== "no_avatar.jpg") {
        unlink('../avatars/' . $_SESSION['avatar']);
    }

    $stmt = $db->prepare("UPDATE `users` SET `avatar`=:avatar WHERE id=:id");

    $stmt->bindValue(":id", $_POST['id'], PDO::PARAM_STR);

    $max_rozmiar = 1024 * 1024;

    if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {

        if ($_FILES['avatar']['size'] > $max_rozmiar) {
            $response['error'] = "Plik jest za duży";
            echo json_encode($response);
            die();

        } else {

            if (isset($_FILES['avatar']['type']) != "image/jpeg" && $_FILES['avatar']['type'] != "image/png") {
                $response['error'] = "Zły format pliku";
                echo json_encode($response);
                die();

            } else {

                $filename = null;

                do {
                    $filename = generateRandomString();
                } while (file_exists("../avatars/" . $filename));

                if ($_FILES['avatar']['type'] == "image/jpeg") {
                    $filename .= ".jpg";
                } else if ($_FILES['avatar']['type'] == "image/png") {
                    $filename .= ".png";
                }

                move_uploaded_file($_FILES['avatar']['tmp_name'], '../avatars/' . $filename);

                chmod('../avatars/' . $filename, 0777);

                $stmt->bindValue(":avatar", $filename, PDO::PARAM_STR);
                $response["user"]['avatar'] = $filename;
            }
        }
    } else {
        $stmt->bindValue(":avatar", "no_avatar.jpg", PDO::PARAM_STR);
        $response["user"]['avatar'] = "no_avatar.jpg";
    }
    $stmt->execute();
    $db->commit();

    $response['success'] = true;


} catch (PDOException $e) {
    $db->rollBack();
    $response['error'] = "Błąd bazy danych";
}
echo json_encode($response, JSON_PRETTY_PRINT);