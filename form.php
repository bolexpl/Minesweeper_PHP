<form method="post" onsubmit="return start();">
  <div class="form-group">
    <label for="nick">Nazwa gracza</label>
    <input type="text" name="nick" class="form-control" title="Nazwa gracza" id="nick" placeholder="Nazwa gracza">
  </div>
  <div class="form-group">
    <label for="plansza">Rozmiar planszy:</label>
    <select class="form-control" name="plansza" id="plansza" title="Rozmiar planszy">
      <option value="8x8" selected>8x8</option>
      <option value="16x16">16x16</option>
      <option value="30x16">30x16</option>
      <option value="custom">Własne ustawienia</option>
    </select>
  </div>

  <div id="custom" class="grey">
    <div class="form-group">
      <label for="width">Szerokość</label>
      <input type="text" name="width" class="form-control" title="Szerokość" id="width" placeholder="Szerokość"
             disabled>
    </div>
    <div class="form-group">
      <label for="height">Wysokość</label>
      <input type="text" name="height" class="form-control" title="Wysokość" id="height" placeholder="Wysokość"
             disabled>
    </div>
    <div class="form-group">
      <label for="mines">Liczba min</label>
      <input type="text" name="mines" class="form-control" title="Liczba min" id="mines" placeholder="Liczba min"
             disabled>
    </div>
  </div>
  <button type="submit" class="btn btn-default">Nowa gra</button>
</form>