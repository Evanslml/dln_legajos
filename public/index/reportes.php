<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/rpt_general.js" ></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      
      <div class="row">
        <?php include('./public/overall/menu_reportes.php');?>
      </div><!--row-->

<?php
$_ListaDistritos= reportes::Distrito_x_Reporte();
$_ListaEstablecimientos= reportes::Establecimiento_x_Reporte();
?>
      <div class="row" style="background: #ffffff9e; padding: 25px; margin-top: 20px;">
        <div class="col-md-12">
            <form class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl_tipo_reporte">Tipo de Reporte</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="cbx_tipo_reporte" id="cbx_tipo_reporte" required="">
                        <option value="1">Reporte de personal según establecimiento</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl_tipo_nivel">Nivel de Reporte</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="cbx_tipo_nivel" id="cbx_tipo_nivel" required="">
                        <option value="0">Seleccione el tipo</option>
                        <option value="01">Reporte a Nivel de Diris</option>
                        <option value="02">Reporte a Nivel de Distrito</option>
                        <option value="03">Reporte a Nivel de Establecimiento</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group" id="form-distrito">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl_nivel_distrito">Distrito</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="cbx_nivel_distrito" id="cbx_nivel_distrito" required="">
                        <option value="0">Seleccionar Distrito</option>
                         <?php
                            foreach ($_ListaDistritos as $key => $value) {
                                echo '<option value=',$value[0],'>',$value[1],'</option>';
                            }  
                          ?>
                    </select>
                      </select>
                    </div>
                  </div>

                  <div class="form-group" id="form-establecimientos">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 lbl_establecimiento">Establecimientos</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="cbx_establecimiento" id="cbx_establecimiento" required="">
                          <option value="0">Seleccionar Establecimiento</option>
                            <?php
                              foreach ($_ListaEstablecimientos as $key => $value) {
                                  echo '<option value=',$value[0],'>',$value[1],'</option>';
                              }  
                            ?>
                        </select>
                    </div>
                  </div>
            </form>
        </div>
        
      </div>
    </section>
  </div><!--content wrapper-->
 

                    
<?php 
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>