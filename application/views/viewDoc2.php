
<a class="flat" href="<?= $site ?>/viewdoc/listview/<?= $id ?>">Ver Lista de Documentos</a> 
<a class="flat" href="<?= $docs."/".$ruta ?>" target="_blank"> Ver en tama�o completo (debe cerrar la pesta�a del navegador al final) </a>
<style>
      #doccontainer { overflow: auto; -webkit-overflow-scrolling: touch; height: 500px; }
      object#obj { width: 1400px; height: 10000px }
    </style>
<div id="doccontainer">
<object id="obj" data="<?= $docs."/".$ruta ?>" >object can't be rendered</object>

</div>