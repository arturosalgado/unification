<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Ips</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/ips/nuevo">Crear nueva</a> </h3>
<table width="100%" border="0">
    <tr>
        <th>Id</th>
        <th>IP</th>
        <th>Area</th>
        <th>Modiciar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach($ips as $ip){ ?>
    <tr>
        <td><?= $ip['idip'] ?></td>
        <td><?= $ip['ip'] ?></td>
        <td><?= $ip['area'] ?></td>
        <td><a href="<?= $site ?>/ips/edit/<?=$ip['idip']?>">modificar</a></td>
        <td><a href="<?= $site ?>/ips/delete/<?=$ip['idip']?>">eliminar</a></td>
    </tr>
    <?php } ?>
</table>

<p>&nbsp;</p>
