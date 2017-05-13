<?php

if(!isset($_POST['nick'])){
  header("Location: index.php");
}

$title = "Saper";
$page = "index";
require_once "parts/header.php";
?>

  <section class="board">

    <div class="row">
      <div class="col-md-5 text-right"><span class="licznik">Pozostałe miny: 99</span></div>
      <div class="col-md-2">
        <button class="center-block btn btn-default">
          <img src="res/smiley1.ico" class="new-game" id="new-game">
        </button>
      </div>
      <div class="col-md-5"><span class="licznik">Czas: 0s</span></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table>
          <tr>
            <td class="blank one">
              <div></div>
            </td>
            <td class="blank two">
              <div></div>
            </td>
            <td class="blank three">
              <div></div>
            </td>
            <td class="blank four">
              <div></div>
            </td>
          </tr>
          <tr>
            <td class="blank five">
              <div></div>
            </td>
            <td class="blank six">
              <div></div>
            </td>
            <td class="blank seven">
              <div></div>
            </td>
            <td class="blank eight">
              <div></div>
            </td>
          </tr>
          <tr>
            <td class="blank">
              <div></div>
            </td>
            <td class="blank">
              <div></div>
            </td>
            <td class="blank">
              <div></div>
            </td>
            <td class="blank">
              <div></div>
            </td>
          </tr>
          <tr>
            <td class="blank mine-red">
              <div></div>
            </td>
            <td class="flag">
              <div></div>
            </td>
            <td class="mine">
              <div></div>
            </td>
            <td class="covered">
              <div></div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <a href="index.php">
          <button class="btn btn-default center-block" onclick="back()">
            Wróć do ustawień
          </button>
        </a>
      </div>
    </div>

  </section>
<?php
require_once "parts/footer.php";
?>