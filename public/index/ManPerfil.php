<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<script src="./view/bootstrap-default/js/busqueda_perfiles.js"></script>
<?php

/*  $editid = (isset($_REQUEST['editid'])&& $_REQUEST['editid'] !=NULL)?$_REQUEST['editid']:''; */
/*  if(!empty($editid)){*/
/*    echo "<script> var $ = jQuery.noConflict(); $(document).ready(function(){ $('#editar_Perfil').modal('show'); }); </script>";*/
/*  }*/

?>

<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<?php //include 'public/modal/modal_perfiles.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
 
      <div class="row">
        
        <div class="col-md-6 pad-bot-10">
            <h4 class="heading-inline bold"><i class="fa fa-edit"></i> Administrador de perfiles</h4>
            <a href="#" class="btn-accion"><i class="fa fa-plus"></i> Agregar Nuevo</a>
        </div>
    
        <div class="col-md-12">
            <span id="loader"></span>
          <div id="resultados"></div>
          <div class='outer_div'></div>
        </div>

      </div>


<!--         <div class="col-md-12"> -->
<!--           <h3><i class="fa fa-edit"></i>Administrador de perfiles</h3> -->
<!--         </div> -->

<!--         <div class="col-md-12"> -->
<!--         <div class="row"> -->
<!--           <div class="col-xs-12"> -->
<!--             <button data-toggle="modal" title="Crear Perfil" onclick="" data-target="#nuevo_Perfil"  class="btn btn-primary" style="margin: 5px 0 15px 0"> -->
<!--               <i class="fa fa-user"></i> Agregar Perfil -->
<!--             </button> -->
<!--           </div> -->
<!--         </div> -->
<!--           <span id="loader"></span> -->
<!--           <div id="resultados"></div> -->
<!--           <div class='outer_div'></div> -->
<!--         </div> -->

      <!-- </div> --><!--row-->
    </section>
  </div><!--content wrapper-->
 
<?php 
 }
?>
<!--<script src="<?php //echo URL_VIEW; ?>bootstrap-default/js/modalPerfiles.js"></script>-->
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>