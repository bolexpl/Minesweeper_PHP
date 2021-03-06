<?php
session_start();
require_once "connect.php";

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];

try {
    $db->beginTransaction();

    $stmt = $db->prepare("SELECT * FROM users WHERE login=:login OR email=:email");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $stmt = $db->prepare("INSERT INTO users (login, email, pass, avatar) VALUE (:login, :email,:pass, :avatar)");
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":pass", password_hash($pass, PASSWORD_BCRYPT, ["cost" => 10]), PDO::PARAM_STR);

        $max_rozmiar = 1024 * 1024;
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {

            if ($_FILES['avatar']['size'] > $max_rozmiar) {
                $_SESSION['error'] = "Plik jest za duży";
            } else {

                if (isset($_FILES['avatar']['type']) && $_FILES['avatar']['type'] != "image/jpeg" && $_FILES['avatar']['type'] != "image/png") {
                    echo 'Typ: ' . $_FILES['avatar']['type'] . '<br/>';
                    $_SESSION['error'] = "Zły format pliku";

                } else {
                    $filename = generateRandomString();

                    if ($_FILES['avatar']['type'] == "image/jpeg") {
                        $filename .= ".jpg";
                    } else if ($_FILES['avatar']['type'] == "image/png") {
                        $filename .= ".png";
                    }

                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../avatars/' . $filename);

                    chmod('../avatars/' . $filename, 0777);

                    $stmt->bindValue(":avatar", $filename, PDO::PARAM_STR);
                }
            }
        } else {
            $stmt->bindValue(":avatar", "no_avatar.jpg", PDO::PARAM_STR);
        }
        $stmt->execute();

        $_SESSION['success'] = "Zarejestrowano";
    } else {
        $_SESSION['error'] = "Nazwa użytkownika zajęta";
    }

    $db->commit();

} catch (PDOException $e) {
    $db->rollBack();
    $_SESSION['error'] = "Błąd rejestracji";
}

if (isset($_SESSION['error'])) {
    header("Location: ../register_form.php");
} else {
    header("Location: ../index.php");
}