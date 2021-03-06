<?php
session_start();
require_once "../php/connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

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
            $_SESSION['error'] = "Plik jest za duży";

        } else {

            if (isset($_FILES['avatar']['type']) != "image/jpeg" && $_FILES['avatar']['type'] != "image/png") {
                $_SESSION['error'] = "Zły format pliku";

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

    $_SESSION['success'] = "Zmieniono";

    $db->commit();

} catch (PDOException $e) {
    $db->rollBack();
    $_SESSION['error'] = "Błąd zmiany awatara";
}

header("Location: ../records_user.php");
