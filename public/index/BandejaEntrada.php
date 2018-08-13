<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>


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
		  			<h4 class="heading-inline bold "></h4>
		  			<input type="hol" name="">
		  			<a href="#" class="btn-accion"><i class="fa fa-search"></i> Buscar Legajo</a>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-12">
		  			<ul class="lista-resumen no-padding">
		  				<li>Todos<b>(166)</b></li>
		  				<li>Nombrados<b>(56)</b></li>
		  				<li>Contratados<b>(36)</b></li>
		  				<li>Destacados<b>(16)</b></li>
		  			</ul>
				</div>
		  	</div>
        </div>

 
        <div class="col-md-12">
          <div class="box box-primary">
          		<table class="table table-striped">
          			<thead>
          				<tr class="text-center">
          					<td><b>#</b></td>
          					<td><b>DNI</b></td>
          					<td><b>NOMBRE COMPLETO</b></td>
          					<td><b>UBICACION FISICA</b></td>
          					<td><b>FECHA DE REGISTRO</b></td>
          					<td><b>ACCIONES</b></td>
          				</tr>
          			</thead>
          			<tbody class="text-12">
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_cre=='1'){ echo '<a href="#" class="btn btn-accion" title="Ingresar foto" onclick=""><i class="fa fa-eye"></i></a>'; }?>
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="Imprimir" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="Editar" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="Eliminar" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_cre=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-eye"></i></a>'; }?>
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_cre=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-eye"></i></a>'; }?>
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>
          				<tr>
          					<td>125</td>
	          				<td>46876484</td>
	          				<td>JUAN ALVARADO PEREZ CUBAS</td>
	          				<td class="text-center">NPS-20</td>
	          				<td class="text-center">01-07-2018</td>
	          				<td class="text-right">
	          					<?php if ($a_ver=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-print"></i></a>'; }?>
	          					<?php if ($a_act=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-pencil"></i></a>'; }?>
	          					<?php if ($a_eli=='1'){ echo '<a href="#" class="btn btn-accion" title="" onclick=""><i class="fa fa-trash"></i></a>'; }?>
	          				</td>
          				</tr>

          				
          			</tbody>
          		</table>
          </div>
        </div>

      </div><!--row-->
    </section>
  </div><!--content wrapper-->
 
<?php 
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>