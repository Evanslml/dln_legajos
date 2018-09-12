<?php
	
	if (isset($_SESSION['sesion_id'])){

	//include 'view/bootstrap-default/js/modalPerfiles.php';
?>
	<div class="modal fade" id="eliminar_legajos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title fl">Eliminar Registro</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div id="mensaje"></div>
	      	<div class="form-horizontal">
				<!--<div id="resultados_ajax2"></div>-->
				  <div class="form-group">
					<input type="hidden" id="mod_dni">
					<div class="col-md-12">
                      <p>Esta Seguro que desea eliminar el legajo</p>
                  	</div>
				  </div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-primary" onclick="Eliminar_Legajo();">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>



<?php
   	} 
?>