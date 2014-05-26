<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de N&uacute;mero de Parte</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/ndps/nuevo">Crear nueva</a> </h3>
<table width="100%" border="0">
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Modiciar</th>
        <th>Eliminar</th>
        <th>Caracteristicas</th>
    </tr>
    <?php foreach($ndps as $ndp){ ?>
    <tr>
        <td><?= $ndp['idndp'] ?></td>
        <td><?= $ndp['nombre'] ?></td>
        <td><?= $ndp['descripcion'] ?></td>
        <td><a href="<?= $site ?>/ndps/edit/<?=$ndp['idndp']?>">modificar</a></td>
        <td><a href="<?= $site ?>/ndps/delete/<?=$ndp['idndp']?>">eliminar</a></td>
        <td><a href="<?= $site ?>/features/index/<?=$ndp['idndp']?>">caracteristicas</a></td>
    </tr>
    <?php } ?>
</table>

<p>&nbsp;</p>
