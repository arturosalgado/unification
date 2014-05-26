<a href="<?= $site ?>/viewdoc/listview/<?= $id ?>">Ver Lista de Documentos</a> 
<style>
      #doccontainer { overflow: auto; -webkit-overflow-scrolling: touch; height: 500px; }
      object { width: 900px; height: 10000px }
    </style>
<div id="doccontainer" width ="900" style="height:1300px; overflow:auto; text-align:center">
<object id="obj" data="<?= $docs."/".$ruta ?>" >object can't be rendered</object>
<a href="<?= $docs."/".$ruta ?>" target="_blank"> Ver en tamaño completo (debe cerrar la pestaña del navegador al final) </a>
</div>
