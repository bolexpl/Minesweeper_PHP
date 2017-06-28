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

  <a href="api/records.php">rekords</a><br/>
  <a href="api/records.php?board=8x8">rekords 8x8</a><br/>
  <br/>
  <a href="api/records_user.php">rekords_user</a><br/><br/>

  <form method="post" action="api/register.php" enctype="multipart/form-data">

    <div class="form-group">
      <label for="login2">Login</label>
      <input type="text" name="login" class="form-control" title="Login" id="login2" value="api" required>
    </div>

    <div class="form-group">
      <label for="email2">Email</label>
      <input type="email" name="email" class="form-control" title="Email" id="email2" value="api@ap.i" required>
    </div>

    <div class="form-group">
      <label for="pass2">Hasło</label>
      <input type="password" name="pass" class="form-control" title="Hasło" id="pass2" value="api" required>
    </div>

    <div class="form-group">
      <label for="avatar2">Awatar</label>
      <input type="file" name="avatar" class="form-control" title="Awatar" id="avatar2">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default">Zarejestruj</button>
    </div>

  </form>

  <hr/>
  Logowanie:<br/>
  <form method="post" action="api/login.php">

    <div class="form-group">
      <label for="login">Login lub email</label>
      <input type="text" name="login" class="form-control" title="Login lub email" id="login" value="api"
             placeholder="Login lub email" required>
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