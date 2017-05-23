<?php
session_start();
$title = "Saper";
$page = "index";
require_once "parts/header.php";
?>

  <div class="row">
    <div class="col-md-12">
      <form method="post">

        <div class="form-group">
          <label for="width">Login</label>
          <input type="text" name="login" class="form-control" title="Login" id="login" placeholder="Login">
        </div>

        <div class="form-group">
          <label for="width">Email</label>
          <input type="email" name="email" class="form-control" title="Email" id="email" placeholder="Email">
        </div>

        <div class="form-group">
          <label for="width">Hasło</label>
          <input type="password" name="pass" class="form-control" title="Hasło" id="pass" placeholder="Hasło">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default">Zarejestruj</button>
        </div>

      </form>
    </div>
  </div>


<?php
require_once "parts/footer.php";
?>