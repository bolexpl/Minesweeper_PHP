<?php
session_start();
$_SESSION['id'] = 38;
$_SESSION["login"] = "api";
$_SESSION['avatar'] = "no_avatar.jpg"

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>debug</title>
  <style>
    body {
      background: black;
      color: white;
    }
  </style>
</head>
<body>
<div class="container">

  <h1>API test</h1>

  <hr/>
  Logowanie:<br/>
  <form method="post" action="api/login.php">

    <div class="form-group">
      <label for="login">Login lub email</label>
      <input type="text" name="login" class="form-control" title="Login lub email" id="login" value="api"
             placeholder="Login lub email" required autofocus>
    </div>

    <div class="form-group">
      <label for="pass">Hasło</label>
      <input type="password" name="pass" class="form-control" title="Hasło" id="pass" placeholder="Hasło" value="api"
             required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">Zaloguj</button>
    </div>

  </form>

  <hr/>
  Wylogowanie:<br/>
  <a href="api/logout.php">wyloguj</a>

  <hr/>
  Awatar:<br/>
  <form method="post" action="api/set_avatar.php" enctype="multipart/form-data">

    <div class="form-group" style="width: 50%;">
      <input type="file" name="avatar" class="form-control" title="Aby usunąć awatar nie podawaj obrazka">
    </div>

    <button class="btn btn-default" type="submit" style="display: inline-block;">Zmień</button>

  </form>

  <hr/>
  Dodawanie rekordu:<br/>
  <form method="post" action="api/add_record.php">

    <div class="form-group" style="width: 50%;">
      Czas:
      <input type="number" name="time" class="form-control" value="50">
    </div>

    <div class="form-group" style="width: 50%;">
      Plansza:
      <input type="text" name="board" class="form-control" value="20x20">
    </div>

    <button class="btn btn-default" type="submit" style="display: inline-block;">Dodaj</button>

  </form>

  <hr/>
  Usuwanie rekordu:<br/>
  <form method="get" action="api/delete_record.php">

    <div class="form-group" style="width: 50%;">
      Id:
      <input type="text" name="id" class="form-control" value="58">
    </div>

    <button class="btn btn-default" type="submit" style="display: inline-block;">Usuń</button>

  </form>

</div>
</body>
</html>