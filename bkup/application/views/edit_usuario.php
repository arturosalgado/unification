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
    <option value="admin" <?php if($usuario['rol']=='admin') echo"selected='selected'"; ?>>Admin</option>
    <option value="sadmin">Super Admin</option>
  </select>
</p>
<p>
  <label for="mail">Correo Electronico</label>
  <input type="text" name="mail" id="mail" value="<?= $usuario['mail'] ?>">
</p>

    <p>
        <label for="rol">Area (no tiene efecto en los super administradores)</label>
        <select name="idarea" id="idarea">
            <option value="">Seleccione Una</option>
            <?php
            foreach($areas as $a){
                $selected = $a['nombre']==$usuario['area']?"selected='selected'":"";
                ?>
                <option value="<?= $a['id']?>" <?= $selected ?>><?= $a['nombre'] ?></option>
                <?php } ?>
        </select>
    </p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>