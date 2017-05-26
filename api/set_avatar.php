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

$db = new PDO('mysql:host=' . $db_host . ";dbname=$db_name;charset=utf8", $db_user, $db_password,
    array(
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )
);
try {
    $db->beginTransaction();

    if ($_SESSION['avatar'] !== "no_avatar.jpg") {
        echo '../avatars/'.$_SESSION['avatar'];
        unlink('../avatars/'.$_SESSION['avatar']);
    }

    $stmt = $db->prepare("UPDATE `users` SET `avatar`=:avatar WHERE id=:id");

    $stmt->bindValue(":id", $_SESSION['id'] . ".jpg", PDO::PARAM_STR);

    $max_rozmiar = 1024 * 1024;
    if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {

        if ($_FILES['avatar']['size'] > $max_rozmiar) {
            $_SESSION['error'] = "Plik jest za duży";

        } else {

            if (isset($_FILES['avatar']['type']) != "image/jpg") {
                $_SESSION['error'] = "Zły format pliku";

            } else {

                $filename = generateRandomString().".jpg";




                move_uploaded_file($_FILES['avatar']['tmp_name'],
                    $_SERVER['DOCUMENT_ROOT'] . '/Minesweeper_Web/avatars/' . $filename);
                chmod('../avatars/' . $filename . ".jpg", 0777);
                $stmt->bindValue(":avatar", $filename, PDO::PARAM_STR);
                $_SESSION['avatar'] = $filename . ".jpg";
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
    echo $e;
}

//header("Location: ../records_user.php");
