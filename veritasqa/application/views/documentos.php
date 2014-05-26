<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Documentos</h1>

<h3 id="nuevo_documento"> <a href="<?= $site ?>/documentos/nuevo">Crear nuevo</a> </h3>

<a href="#" id="toggleform">Ocultar</a>
<form id="filtro" action="" method="post">
  <fieldset>
  <legend> Filtro </legend>
  
    <p>  
      <label> Nombre </label> <input name="fnombre" type="text" />
      </p>
      <p>
      <label> Descripcion </label> <input name="fdescripcion" type="text" />
      </p>
      <p>
          <label> Creador </label> <input name="fcreador" type="text" />
      </p>
      <p>
          <label> Linea </label> <input name="flinea" type="text" />
      </p>
      <p>
      <input name="Filtrar" type="submit" value="Filtrar" />
      </p><br />

  </fieldset>

</form>
<br />

<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Descrpción</th>
    <th>Creador</th>
    <th>Creación</th>
    <th>Modificacion</th>
    <th>L&iacute;nea</th>
      <th>&Aacute;rea</th>
    <th>Descargar</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($documentos as $documento){ ?>
  <tr>
    <td><?= $documento['id'] ?></td>
    <td><?= $documento['nombre'] ?></td>
    <td><?= $documento['descripcion'] ?></td>
      <td><?= $documento['creador'] ?></td>
    <td><?= $documento['creacion'] ?></td>
      <td><?= $documento['modificacion'] ?></td>
    <td><?= $documento['linea'] ?></td>
      <td><?= $documento['area'] ?></td>
    <td><a href="<?= $docs."/".$documento['ruta'] ?>"><?= $documento['nombre'] ?></a></td>
    <td><a href="<?= $site ?>/documentos/edit/<?=$documento['id']?>">modificar</a></td>
    <td><a href="<?= $site ?>/documentos/delete/<?=$documento['id']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
