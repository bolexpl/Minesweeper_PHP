<?php
session_start();
$_SESSION["login"] = "api";
$_SESSION['avatar'] = "no_avatar.jpg"

?>
<form method="post" action="api/set_avatar.php" enctype="multipart/form-data">

  <div class="form-group" style="width: 50%;">
    <label for="avatar">Zmiana awatara</label>
    <input type="file" name="avatar" class="form-control" title="Aby usunąć awatar nie podawaj obrazka" id="avatar"
           placeholder="Awatar">
  </div>

  <button class="btn btn-default" type="submit" style="display: inline-block;">Zmień</button>
</form>
