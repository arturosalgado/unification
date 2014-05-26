<div  style="floar:left;" id="buttons">
    <?php
        foreach($links as $link){
            ?>
            <span class="clickable" link="<?=$docs."/".$link['ruta']?>"><?= $link['nombre'] ?></span>
            <?php
        }
    ?>
</div>
<iframe id="docviewer" style="float:left" width="900" height="800" src="<?= $docs."/".$ruta ?>"></iframe>