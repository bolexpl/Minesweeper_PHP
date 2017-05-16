<?php
session_start();
$title = "Saper";
$page = "index";
require_once "parts/header.php";
?>

  <section class="board" id="container">
    <?php
    require_once "form.php";
    ?>
  </section>

<?php
require_once "parts/footer.php";
?>