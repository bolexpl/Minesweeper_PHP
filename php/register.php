<?php
session_start();
require_once "connect.php";

$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$db = new PDO('mysql:host=' . $db_host . ";dbname=$db_name;charset=utf8", $db_user, $db_password,
    array(
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    )
);
try {
    $db->beginTransaction();

    $stmt = $db->prepare("select * from users where login=:login");
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);

    $stmt->execute();

    if($stmt->rowCount() == 0){
        $stmt = $db->prepare("INSERT INTO users (login, email, pass) VALUE (:login, :email,:pass)");
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":pass", password_hash($pass, PASSWORD_BCRYPT, ["cost" => 10]), PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['success'] = "Zarejestrowano";
    }else {
        $_SESSION['error'] = "Nazwa użytkownika zajęta";
    }

    $db->commit();

} catch (PDOException $e) {
    $db->rollBack();
    $_SESSION['error'] = "Błąd rejestracji";
    echo $e;
}

if(isset($_SESSION['error'])){
    header("Location: ../register_form.php");
}else{
    header("Location: ../index.php");
}