<a href="<?= $site ?>/reportes/index">Regresar</a>
<form action="<?= $site ?>/reportes/viewoperador" method="post">
    <legend>Seleccione los operadores</legend>
    <p>
      <label for="textfield">Fecha inicial</label>
      <input type="text" name="textfield" id="textfield" class="datepicker">
    </p>
    <p>
      <label for="textfield2">Fecha final</label>
      <input type="text" name="textfield2" id="textfield2" class="datepicker">
    </p>
    Filtro
    <p>
      <label>
        <input type="checkbox" name="Operadores" value="checkbox" id="Operadores_0">
        Operador 1</label>
      <br>
      <label>
        <input type="checkbox" name="Operadores" value="checkbox" id="Operadores_1">
        Operador 2</label>
      <br>
      <label>
        <input type="checkbox" name="Operadores" value="checkbox" id="Operadores_2">
        Operador 3</label>
      <br>
      <label>
        <input type="checkbox" name="Operadores" value="checkbox" id="Operadores_3">
        Operador n</label>
      <br>
    </p>
  </fieldset>
  <input type="submit" value="Enviar"/>
</form>