<a href="<?= $site ?>/usuarios">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/usuarios/editusuario">
<fieldset>
<legend>Usuario</legend>
<input type="hidden" name="idusuario" value="<?= $idusuario ?>">
<p>
  <label for="username">Nombre de Usuario</label>
  <input type="text" name="username" id="username" value="<?= $usuario['username'] ?>">
</p>
<p>
  <label for="passwd">Contraseña (dejar vac&iacute;o para no modificar</label>
  <input name="passwd" type="password" id="passwd">
</p>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>">
</p>
<p>
  <label for="apellidos">Apellidos</label>
  <input type="text" name="apellidos" id="apellidos" value="<?= $usuario['apellidos'] ?>">
</p>
<p>
  <label for="rol">Rol</label>
  <select name="rol" id="rol">
    <option value="usuario" <?php if($usuario['rol']=='usuario') echo"selected='selected'"; ?>>Usuario</option>
    <option value="admin" <?php if($usuario['rol']=='admin') echo"selected='selected'"; ?>>Supervisor</option>
    <option value="sadmin" <?php if($usuario['rol']=='sadmin') echo"selected='selected'"; ?>>Super Admin</option>
    <!--<option value="visitor" <?php if($usuario['rol']=='visitor') echo"selected='selected'"; ?>>Supervisor</option>-->
  </select>
</p>
<p>
  <label for="mail">Correo Electronico</label>
  <input type="text" name="mail" id="mail" value="<?= $usuario['mail'] ?>">
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>