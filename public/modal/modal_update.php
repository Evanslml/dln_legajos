<?php
	
	if (isset($_SESSION['sesion_id'])){

	//include 'view/bootstrap-default/js/modalPerfiles.php';
?>
	<div class="modal fade" id="update_legajos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h3 class="modal-title fl">Actualizar Registro</h3>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div id="mensaje"></div>
	      	<div class="form-horizontal">
				<!--<div id="resultados_ajax2"></div>-->
				  <div class="form-group">
					<input type="hidden" class="update_dni">
							<div class="col-md-12">
									<ul class="lista-menu-legajos-2 no-padding">
										<li><a onclick="editar_1()"><i class="fa fa-edit"></i><h5>Filiación E Identificación de Personal</h5></a></li>
										<li><a href="./seccionii"><i class="fa fa-edit"></i><h5>Nivel Educativo</h5></a></li>
										<li><a href="./seccioniii"><i class="fa fa-edit"></i><h5>Capacitación</h5></a></li>
										<li><a href="./seccioniv"><i class="fa fa-edit"></i><h5>Contratos y Nombramientos</h5></a></li>
										<li><a href="./seccionv"><i class="fa fa-edit"></i><h5>Renuncia y Liquidaciones</h5></a></li>
										<li><a href="./seccionvi"><i class="fa fa-edit"></i><h5>Desplazamientos y cargos desempeñados</h5></a></li>
										<li><a href="./seccionvii"><i class="fa fa-edit"></i><h5>Licencias</h5></a></li>
										<li><a href="./seccionviii"><i class="fa fa-edit"></i><h5>Vacaciones</h5></a></li>
										<li><a href="./seccionix"><i class="fa fa-edit"></i><h5>Ascensos</h5></a></li>
										<li><a href="./seccionx"><i class="fa fa-edit"></i><h5>Remuneración Personal</h5></a></li>
										<li><a href="./seccionxi"><i class="fa fa-edit"></i><h5>Remuneración Familiar</h5></a></li>
										<li><a href="./seccionxii"><i class="fa fa-edit"></i><h5>Evaluaciones</h5></a></li>
										<li><a href="./seccionxiii"><i class="fa fa-edit"></i><h5>Meritos</h5></a></li>
										<li><a href="./seccionxiv"><i class="fa fa-edit"></i><h5>Demeritos</h5></a></li>
										<li><a href="./seccionxv"><i class="fa fa-edit"></i><h5>Otros</h5></a></li>
									</ul>
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