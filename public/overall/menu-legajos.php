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
					<a href="./seccioniii"><i class="fa fa-edit"></i><h5>Capacitación</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccioniv'){ echo 'class="active"'; }?>>
					<a href="./seccioniv"><i class="fa fa-edit"></i><h5>Contratos y Nombramientos</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionv'){ echo 'class="active"'; }?>>
					<a href="./seccionv"><i class="fa fa-edit"></i><h5>Renuncia y Liquidaciones</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionvi'){ echo 'class="active"'; }?>>
					<a href="./seccionvi"><i class="fa fa-edit"></i><h5>Desplazamientos y cargos desempeñados</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionvii'){ echo 'class="active"'; }?>>
					<a href="./seccionvii"><i class="fa fa-edit"></i><h5>Licencias</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionviii'){ echo 'class="active"'; }?>>
					<a href="./seccionviii"><i class="fa fa-edit"></i><h5>Vacaciones</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionix'){ echo 'class="active"'; }?>>
					<a href="./seccionix"><i class="fa fa-edit"></i><h5>Ascensos</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionx'){ echo 'class="active"'; }?>>
					<a href="./seccionx"><i class="fa fa-edit"></i><h5>Remuneración Personal</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionxi'){ echo 'class="active"'; }?>>
					<a href="./seccionxi"><i class="fa fa-edit"></i><h5>Remuneración Familiar</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionxi'){ echo 'class="active"'; }?>>
					<a href="./seccionxi"><i class="fa fa-edit"></i><h5>Evaluaciones</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionxii'){ echo 'class="active"'; }?>>
					<a href="./seccionxii"><i class="fa fa-edit"></i><h5>Meritos</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionxiii'){ echo 'class="active"'; }?>>
					<a href="./seccionxiii"><i class="fa fa-edit"></i><h5>Demeritos</h5></a>
				</li>
				<li <?php if($vista_seccion=='seccionxiv'){ echo 'class="active"'; }?>>
					<a href="./seccionxiv"><i class="fa fa-edit"></i><h5>Otros</h5></a>
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