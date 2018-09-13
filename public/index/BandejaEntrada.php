<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/busqueda_legajos.js"></script>
<?php include 'public/modal/modal_foto.php'; ?>
<?php include 'public/modal/modal_delete.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
 
      <div class="row">

        <div class="col-md-12">
        	<div class="row">
          		<div class="col-md-4">
          			<h4 class="heading-inline bold"><i class="fa fa-edit"></i> Área de Legajos</h4>
		  			<?php if($a_cre=='1'){ echo '<a href="./seccioni" class="btn-accion"><i class="fa fa-plus"></i> Agregar Nuevo</a>'; }?>
		  		</div>
		  		<div class="col-md-8 text-right">
		  			<select name="cbx_busqueda" id="cbx_busqueda" style="padding: 5px;margin: 3px 5px 4px 3px;">
		  				<option value="0">Seleccione</option>
		  				<option value="1">DNI</option>
		  				<option value="2">Nombres</option>
		  			</select>
		  			<input type="type" name="txt_datos" id="txt_datos" style="padding: 4px; margin-right: 3px;">
		  			<a href="#" class="btn-accion" style="padding: 6px;"><i class="fa fa-search"></i> Buscar Legajo</a>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-12">
		  			<ul class="lista-resumen no-padding">
		  				<?php 
		  					$resumen = Persona::Resumen_Personal();
		  					//var_dump($resumen);
		  				?>
		  				<li>Todos<b><?php echo ' ('.$resumen[4].')'; ?></b></li>
		  				<li>Nombrados<b><?php echo ' ('.$resumen[0].')'; ?></b></li>
		  				<li>Contratados<b><?php echo ' ('.$resumen[1].')'; ?></b></li>
		  				<li>Destacados<b><?php echo ' ('.$resumen[2].')'; ?></b></li>
		  				<li>Otros<b><?php echo ' ('.$resumen[3].')'; ?></b></li>
		  			</ul>
				</div>
		  	</div>
        </div>

		
        <div class="col-md-12">
            <span id="loader"></span>
        	<div id="resultados"></div>
        	<div class='outer_div'></div>
		</div>

      </div><!--row-->
    </section>
  </div><!--content wrapper-->
 
<?php 
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>