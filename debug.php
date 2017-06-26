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
    body{
      background: black;
      color: grey;
    }
  </style>
</head>
<body>
<div class="container">

  <form method="post" action="api/set_avatar.php" enctype="multipart/form-data">

    <div class="form-group" style="width: 50%;">
      <input type="file" name="avatar" class="form-control" title="Aby usunąć awatar nie podawaj obrazka" id="avatar"
             placeholder="Awatar">
    </div>

    <button class="btn btn-default" type="submit" style="display: inline-block;">Zmień</button>

  </form>

  <hr/>

</div>
</body>
</html>