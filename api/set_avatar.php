<?php
session_start();
require_once "../php/connect.php";

header("Content-type:application/json");

$response = [];
$response['error'] = null;

if (!isset($_SESSION['login'])) {
    echo json_encode("login");
} else {

    try {
        $db->beginTransaction();

        if ($_SESSION['avatar'] !== "no_avatar.jpg") {
            unlink('../avatars/' . $_SESSION['avatar']);
        }

        $stmt = $db->prepare("UPDATE `users` SET `avatar`=:avatar WHERE id=:id");

        $stmt->bindValue(":id", $_SESSION['id'], PDO::PARAM_STR);

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
                    $_SESSION['avatar'] = $filename;
                }
            }
        } else {
            $stmt->bindValue(":avatar", "no_avatar.jpg", PDO::PARAM_STR);
            $_SESSION['avatar'] = "no_avatar.jpg";
        }
        $stmt->execute();
        $db->commit();

        $response['success'] = "Zmieniono";
        $response['avatar'] = $_SESSION['avatar'];


    } catch (PDOException $e) {
        $db->rollBack();
        $response['error'] = "Błąd bazy danych";
    }
}
echo json_encode($response, JSON_PRETTY_PRINT);