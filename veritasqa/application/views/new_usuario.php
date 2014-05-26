<a href="<?= $site ?>/usuarios">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/usuarios/saveUsuario">
<fieldset>
<legend>Usuario</legend>
<p>
  <label for="username">Nombre de Usuario</label>
  <input type="text" name="username" id="username" required="required">
</p>
<p>
  <label for="nombre">Número de Control</label>
  <input type="text" name="numControl" id="numControl" required="required">
</p>
<p>
  <label for="passwd">Contraseña</label>
  <input type="password" name="passwd" id="passwd" required="required">
</p>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" required="required">
</p>
<p>
  <label for="apellidos">Apellidos</label>
  <input type="text" name="apellidos" id="apellidos" required="required">
</p>

<p>
  <label for="rol">Rol</label>
  <select name="rol" id="rol">
    <option value="usuario" selected="selected">Usuario</option>
    <option value="admin">Admin</option>
    <option value="sadmin">Super Admin</option>
    <option value="visitor">Supervisor</option>
  </select>
</p>
<p>
  <label for="mail">Correo Electronico</label>
  <input type="text" name="mail" id="mail" required="required">
</p>

    <p>
        <label for="rol">Area (no tiene efecto en los super administradores)</label>
        <select name="idarea" id="idarea">
            <option value="" selected="selected">Seleccione Una</option>
            <?php
                foreach($areas as $a){
                  ?>
            <option value="<?= $a['id']?>"><?= $a['nombre'] ?></option>
                <?php } ?>
        </select>
    </p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>