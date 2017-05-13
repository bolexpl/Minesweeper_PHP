<?php
$title = "Saper";
$page = "index";
require_once "parts/header.php";
?>

  <section class="index">

    <a href="board.php">plansza</a>
    <form>
      <div class="form-group">
        <label for="nick">Nazwa gracza</label>
        <input type="text" class="form-control" title="Nazwa gracza" id="nick" placeholder="Nazwa gracza">
      </div>
      <div class="form-group">
        <label for="plansza">Rozmiar planszy:</label>
        <select class="form-control" id="plansza" title="Rozmiar planszy">
          <option value="all">Wszystkie</option>
          <option value="8x8">8x8</option>
          <option value="16x16">16x16</option>
          <option value="30x16">30x16</option>
          <option value="custom">Własne ustawienia</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Nowa gra</button>
    </form>

  </section>

<?php
require_once "parts/footer.php";
?>