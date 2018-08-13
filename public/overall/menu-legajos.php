<?php

    if(isset($_GET['view'])) {
      	$vista_seccion = $_GET['view'];
    }

?>	
<div class="col-md-12">
	<div class="row pad-bot-10">
  		<div class="col-md-4">
  			<h4 class="heading-inline bold"><i class="fa fa-edit"></i> Nuevo Legajo</h4>
            <a class="btn-accion" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-plus"></i> Secciones
            </a>
  		</div>
  		<div class="col-md-8">
  			<div class="panel-tools">
			    <div class="button btn-save"><a href="#"><i class="fa fa-floppy-o"></i><span>Guardar</span></a></div>
				<div class="button btn-secciones"><a data-toggle="collapse" href="#collapseExample""><i class="fa fa-plus"></i><span>Secciones</span></a></div>
			   	<div class="button btn-cancel"><a href="./"><i class="fa fa-times"></i><span>Cancelar</span></a></div>
			</div>
  		</div>
  	</div>
</div>

<div class="col-md-12 collapse" id="collapseExample">
  <div>
		  <ul class="lista-menu-legajos no-padding">
				<li <?php if($vista_seccion=='seccioni'){ echo 'class="active"'; }?>>
					<a href="./seccioni"><i class="fa fa-edit"></i><h5>Filiación E Identificación de Personal</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionii'){ echo 'class="active"'; }?>>
					<a href="./seccionii"><i class="fa fa-edit"></i><h5>Nivel Educativo</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccioniii'){ echo 'class="active"'; }?>>
					<a href="#"><i class="fa fa-edit"></i><h5>Capacitación</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccioniv'){ echo 'class="active"'; }?>>
					<a href="#"><i class="fa fa-edit"></i><h5>Contratos y Nombramientos</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionv'){ echo 'class="active"'; }?>>
					<a href="#"><i class="fa fa-edit"></i><h5>Renuncia y Liquidaciones</h5></a>
				</li>
				<!--
				<li><a href="#"><i class="fa fa-edit"></i><h5>Filiación E Identificación de Personal</h5></a></li>
				<li><a href="#"><i class="fa fa-edit"></i><h5>Nivel Educativo</h5></a></li>
				<li><a href="#"><i class="fa fa-edit"></i><h5>Capacitación</h5></a></li>
				<li><a href="#"><i class="fa fa-edit"></i><h5>Contratos y Nombramientos</h5></a></li>
				<li><a href="#"><i class="fa fa-edit"></i><h5>Renuncia y Liquidaciones</h5></a></li>
				-->
		  </ul>
  </div>
</div>