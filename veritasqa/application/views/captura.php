 <!-- Home -->
 <script>
 jQuery(document).ready(function(e) {
    jQuery("#data_form").submit(function(ev) {
		var submitForm = true;
		
        jQuery(".feat").each(function(index, element) {
			var val = parseFloat(jQuery(this).val());
			var real_max = parseFloat(jQuery(this).attr("realmax")); 
			var real_min = parseFloat(jQuery(this).attr("realmin"));
            if(val > real_max || val < real_min){
				alert("La característica "+ jQuery(this).attr("featname")+" se encuentra fuera de rango, avisar al supervisor");
				jQuery(this).focus();
				jQuery(this).val("");
				submitForm = false;
			}
        });
		
		if(!submitForm)
			ev.preventDefault();
    });
});
 </script>
            <div data-role="content">
            <a href="<?= $site ?>/capturas/selector" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
                <div style="width: 250px; height: 250px; position: relative; background-color: #fbfbfb; border: 1px solid #b8b8b8;">
                    <img src="<?= $docs ?>/<?= $ndp['imagen'] ?>" alt="image"  width="250" height="250"/>
                </div>
                <form action="<?= $site ?>/capturas/save" data-ajax="false" method="post" id="data_form">
                <input type="hidden" name="idNdp" value="<?= $idNdp ?>" />
                 <?php foreach($feats as $feat) { 
				 $media = $feat['media'];
			     $tolerancia = $feat['tolerancia'];
				 $min = $media - $tolerancia;
				 $max = $media + $tolerancia;
				 ?>
                 <span>Si encuentra algun dato fuera de rango, avisar al supervisor</span>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="textinput1">
                            Característica <?= $feat['codigo'] ?>
                        </label>
                        <input featname="<?= $feat['codigo'] ?>" id="feat[]" name="feat[]" placeholder="" value="" type="range" required="required" min="<?= $min - 1 ?>" max="<?= $max + 1 ?>" step="0.01" data-mini="true" class="feat" realmin="<?= $min ?>" realmax="<?= $max ?>" />
                        
                        <input type="hidden" value="<?= $feat['idndp_feature']?>" name="featid[]"/><p>
                        <?php
						
						echo "Medida entre $min y $max mm";
						?>
                        </p>
                    </fieldset>
                </div>
               <?php } ?>
               
               
                <div data-role="fieldcontain">
                <label for="select-choice-1" class="select">Numero de Control (Separe por comas)</label>
					<input id="numControl" placeholder="" value="" type="text" name="numControl" required/>
                </div>
                
                <div data-role="fieldcontain">
                	<label> Comentario </label> <br  />
                    <textarea name="comentario" ></textarea>
                </div>
				<div data-role="fieldcontain">	
                <button aria-disabled="false" class="ui-btn-hidden" type="submit" data-theme="a">Guardar</button>
                </div>
                </form>
            </div>