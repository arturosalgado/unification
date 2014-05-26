<style>
.ui-listview{
	margin-top:15px;
}
</style>
<div id="content">
<ul data-role="listview" data-inset="true" data-filter="true">
    <?php
        foreach($links as $link){
            ?>
            <li class="hitarea">
			<?php
			$folder = "/viewdoc/view/";
			if(strpos($link['ruta'], "mp4") > 0)
				$folder = "/viewdoc/vidview/";
			?>
            <a href="<?= $site.$folder.$id."/".$link['ruta'] ?>/" data-ajax="false" ><?= $link['nombre'] ?> </a>
            </li>
            <?php
        }
    ?>
</ul>

<div id="autoimage">
<img width="200px" src="<?= $docs ?>/<?= $imgpath ?>"/>
<?php if(isset($imgpath2)){ ?>
<img width="200px" src="<?= $docs ?>/<?= $imgpath2 ?>"/>
<?php } ?>
</div>
</div>

<!-- class="clickable" data-transition="flip" -->
