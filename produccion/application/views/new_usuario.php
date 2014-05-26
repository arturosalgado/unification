<a href="<?= $site ?>/usuarios">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/usuarios/saveUsuario">
<fieldset>
<legend>Usuario</legend>
<p>
  <label for="username">Nombre de Usuario</label>
  <input type="text" name="username" id="username">
</p>
<p>
  <label for="passwd">Contraseña</label>
  <input type="password" name="passwd" id="passwd">
</p>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre">
</p>
<p>
  <label for="apellidos">Apellidos</label>
  <input type="text" name="apellidos" id="apellidos">
</p>
<p>
  <label for="rol">Rol</label>
  <select name="rol" id="rol">
    <option value="usuario" selected="selected">Usuario</option>
    <option value="admin">Supervisor</option>
    <option value="sadmin">Super Admin</option>
    <!--<option value="visitor">Supervisor</option>-->
  </select>
</p>
<p>
  <label for="mail">Correo Electronico</label>
  <input type="text" name="mail" id="mail">
</p>

    

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>