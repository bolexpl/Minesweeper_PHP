<?php
$title = "Saper";
$page = "game";
require_once "parts/header.php";
?>

  <section>

    <table class="board">
      <tr>
        <td class="blank one"><span></span></td>
        <td class="blank two"><span></span></td>
        <td class="blank three"><span></span></td>
        <td class="blank four"><span></span></td>
      </tr>
      <tr>
        <td class="blank five"><span></span></td>
        <td class="blank six"><span></span></td>
        <td class="blank seven"><span></span></td>
        <td class="blank eight"><span></span></td>
      </tr>
      <tr>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
        <td class="blank"><span></span></td>
      </tr>
      <tr>
        <td class="blank mine-red"><img src=""></td>
        <td class="flag"><img src=""></td>
        <td class="mine"><img src=""></td>
        <td class="covered"><img src=""></td>
      </tr>
    </table>

  </section>

<?php
require_once "parts/footer.php";
?>