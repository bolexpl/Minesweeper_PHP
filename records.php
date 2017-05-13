<?php
$title = "Wyniki";
$page = "records";
require_once "parts/header.php";
?>

  <section class="records">

    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <td>#</td>
        <td>Czas</td>
        <td>Plansza</td>
        <td>Gracz</td>
        <td>Usuń</td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>1.</td>
        <td>długo</td>
        <td>duża</td>
        <td>ja</td>
      </tr>
      <tr>
        <td>2.</td>
        <td>krótko</td>
        <td>nieduża</td>
        <td>ty</td>
      </tr>
      <tr>
        <td>3.</td>
        <td>1s</td>
        <td>BIG</td>
        <td>on</td>
      </tr>
      </tbody>
    </table>

  </section>

<?php
require_once "parts/footer.php";
?>