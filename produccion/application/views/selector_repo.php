<div id="content">
<a href="<?= $site ?>/dashboard/index" data-role="button" data-transition="flip">Regresar</a>
Elegir la linea a reportar, elija todos para ver el reporte global
<form>
<label>Inicio: </label> <br />
<input type="text" class="datepicker" data-role="none"/> 
</form>

<form>
<label>Fin: </label><br />
<input type="text" class="datepicker" data-role="none"/> 
</form>
<ul data-role="listview" data-inset="true" data-filter="true">
	<li> <a href="<?= $site ?>/reportes/individual">Todos </a></li>
	<li> <a href="<?= $site ?>/reportes/individual">AB00345 </a></li>
    <li> <a href="<?= $site ?>/reportes/individual">NDP 2302 </a></li>
    <li> <a href="<?= $site ?>/reportes/individual">NDP 2302 </a></li>
    <li> <a href="<?= $site ?>/reportes/individual">NDP 2302 </a></li>
</ul>
</div>