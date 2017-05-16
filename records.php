<?php
session_start();
$title = "Wyniki";
$page = "records";
require_once "parts/header.php";
?>

  <section class="records">

    <form>
      <div class="form-group" style="width: 50%;">
        <label for="plansza">Rozmiar planszy:</label>
        <select class="form-control" id="plansza" style="width: 50%;display: inline-block;">
          <option value="all">Wszystkie</option>
          <option value="8x8">8x8</option>
          <option value="16x16">16x16</option>
          <option value="30x16">30x16</option>
          <option value="custom">Własne ustawienia</option>
        </select>
        <button class="btn btn-default" type="submit" style="display: inline-block;">Filtruj</button>
      </div>

    </form>

    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <td>#</td>
        <td>Czas</td>
        <td>Plansza</td>
        <td>Gracz</td>
        <td></td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>1.</td>
        <td>długo</td>
        <td>duża</td>
        <td>ja</td>
        <td>
          <button type="button" class="btn btn-danger">Usuń</button>
        </td>
      </tr>
      <tr>
        <td>2.</td>
        <td>krótko</td>
        <td>nieduża</td>
        <td>ty</td>
        <td>
          <button type="button" class="btn btn-danger">Usuń</button>
        </td>
      </tr>
      <tr>
        <td>3.</td>
        <td>1s</td>
        <td>BIG</td>
        <td>on</td>
        <td>
          <button type="button" class="btn btn-danger">Usuń</button>
        </td>
      </tr>
      </tbody>
    </table>

  </section>

<?php
require_once "parts/footer.php";
?>