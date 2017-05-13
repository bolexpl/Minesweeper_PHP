<?php
$title = "Saper";
$page = "index";
require_once "parts/header.php";
?>

  <section class="board">

    <table>
      <tr>
        <td class="blank one"><div></div></td>
        <td class="blank two"><div></div></td>
        <td class="blank three"><div></div></td>
        <td class="blank four"><div></div></td>
      </tr>
      <tr>
        <td class="blank five"><div></div></td>
        <td class="blank six"><div></div></td>
        <td class="blank seven"><div></div></td>
        <td class="blank eight"><div></div></td>
      </tr>
      <tr>
        <td class="blank"><div></div></td>
        <td class="blank"><div></div></td>
        <td class="blank"><div></div></td>
        <td class="blank"><div></div></td>
      </tr>
      <tr>
        <td class="blank mine-red"><div></div></td>
        <td class="flag"><div></div></td>
        <td class="mine"><div></div></td>
        <td class="covered"><div></div></td>
      </tr>
    </table>

    <!--
    <table>
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
    -->

  </section>

<?php
require_once "parts/footer.php";
?>