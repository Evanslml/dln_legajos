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
										<li><a onclick="editar(1)"><i class="fa fa-edit"></i><h5>Filiación E Identificación de Personal</h5></a></li>
										<li><a onclick="editar(2)"><i class="fa fa-edit"></i><h5>Nivel Educativo</h5></a></li>
										<li><a onclick="editar(3)"><i class="fa fa-edit"></i><h5>Capacitación</h5></a></li>
										<li><a onclick="editar(4)"><i class="fa fa-edit"></i><h5>Contratos y Nombramientos</h5></a></li>
										<li><a onclick="editar(5)"><i class="fa fa-edit"></i><h5>Renuncia y Liquidaciones</h5></a></li>
										<li><a onclick="editar(6)"><i class="fa fa-edit"></i><h5>Desplazamientos y cargos desempeñados</h5></a></li>
										<li><a onclick="editar(7)"><i class="fa fa-edit"></i><h5>Licencias</h5></a></li>
										<li><a onclick="editar(8)"><i class="fa fa-edit"></i><h5>Vacaciones</h5></a></li>
										<li><a onclick="editar(9)"><i class="fa fa-edit"></i><h5>Ascensos</h5></a></li>
										<li><a onclick="editar(10)"><i class="fa fa-edit"></i><h5>Remuneración Personal</h5></a></li>
										<li><a onclick="editar(11)"><i class="fa fa-edit"></i><h5>Remuneración Familiar</h5></a></li>
										<li><a onclick="editar(12)"><i class="fa fa-edit"></i><h5>Evaluaciones</h5></a></li>
										<li><a onclick="editar(13)"><i class="fa fa-edit"></i><h5>Meritos</h5></a></li>
										<li><a onclick="editar(14)"><i class="fa fa-edit"></i><h5>Demeritos</h5></a></li>
										<li><a onclick="editar(15)"><i class="fa fa-edit"></i><h5>Otros</h5></a></li>
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