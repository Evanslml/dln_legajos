<?php
	
	if (isset($_SESSION['sesion_id'])){

	//include 'view/bootstrap-default/js/modalPerfiles.php';
?>
	<div class="modal fade" id="nueva_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title fl">Nuevo Foto</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div id="mensaje"></div>
	      	<div class="form-horizontal">
				<!--<div id="resultados_ajax2"></div>-->
				  <div class="form-group">
					<label for="mod_nombre" class="col-sm-3 control-label">
						<input type="hidden" id="new_dni" value="dni">
					</label>
					<div class="col-md-8">
                      <div class="js pad-top-10">
                          <form enctype="multipart/form-data" class="formulario_1">
                              <input name="archivo" type="file" id="file-1" class="inputfile inputfile-6"/>
                              <label for="file-1" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  	</div>
				  </div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button type="submit" class="btn btn-primary" onclick="SubirFoto();">Aceptar</button>
	      </div>
	    </div>
	  </div>
	</div>



<?php
   	} 
?>