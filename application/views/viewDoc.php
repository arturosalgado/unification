<a href="<?= $site ?>/viewdoc/listview/<?= $id ?>">Ver Lista de Documentos</a> 
<style>
      #doccontainer { overflow: auto; -webkit-overflow-scrolling: touch; height: 500px; }
      object { width: 900px; height: 850px }
    </style>
<div id="doccontainer" width ="900" style="height:1300px; overflow:auto; text-align:center">
<object id="obj" data="<?= $docs."/".$ruta ?>" >object can't be rendered</object>
<a href="<?= $docs."/".$ruta ?>" target="_blank"> Ver en tamaño completo (debe cerrar la pestaña del navegador al final) </a>

<script>
	$(document).ready(function(e) {
        if(navigator.userAgent.indexOf("iPhone") != -1 || navigator.userAgent.indexOf("iPod") != -1 || navigator.userAgent.indexOf("iPad") != -1){
			$("obj").css("height", "10000px");
		}
    });
</script>
</div>
