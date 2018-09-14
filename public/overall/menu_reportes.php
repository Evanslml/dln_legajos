<?php

    if(isset($_GET['view'])) {
      	$vista_seccion = $_GET['view'];
    }

?>	
<div class="col-md-12">
	<div class="row pad-bot-10">
  		<div class="col-md-4">
  			<h4 class="heading-inline bold"><i class="fa fa-edit"></i> Reportes</h4>
  		</div>
  		<div class="col-md-8">
  			<div class="panel-tools">
			    <div class="button btn-save">
			    	<a href="#"><i class="fa fa-file-excel-o"></i><span>Guardar</span></a>
			    </div>
				<div class="button btn-secciones">
					<a href="#"><i class="fa fa-file-pdf-o"></i><span>Secciones</span></a>
				</div>
			   	<div class="button btn-cancel">
			   		<a href="./"><i class="fa fa-times"></i><span>Cancelar</span></a>
			   	</div>
			</div>
  		</div>
  	</div>
</div>
