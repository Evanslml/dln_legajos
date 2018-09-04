<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccionvi.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
 
      <div class="row">
        <?php include('./public/overall/menu-legajos.php');?>
      </div><!--row-->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="content" style="margin-bottom: 150px">
                <div>
                  <h3 class="text-center">REMUNERACIÓN PERSONAL</h3>
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> Desplazamiento</h5>
              </div>
               <!---->
              <div id="legajos_1" class="collapse in row datos_estudios formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-study"> 
                    <div class="col-md-2 border-seccion">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="dni1" name="dni1" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>DNI <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <h6 class="subtitle pad-top-10"> SECTOR <i class="danger">*</i></h6>
                        <select data-placeholder="SELECCIONE" class="chosen-select-deselect" tabindex="2" name="cbx_reg_pension" id="cbx_reg_pension">
                            <option value=""></option>
                            <?php 
                              $_ListaRegPensiones= Tabla::Lista(52);
                              foreach ($_ListaRegPensiones   as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-7 border-seccion">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="lugartrabajo" name="lugartrabajo" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>LUGAR DE TRABAJO <i class="danger">*</i></label>
                        </div>
                    </div>
                </div>
                  <!--./FIRST -->
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_2" role="button" aria-expanded="true" aria-controls="legajos_2">
                  <i class="fa fa-plus"></i> Resoluciones</h5>
              </div>
               <!---->
              <div id="legajos_2" class="collapse row datos_estudios formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-study"> 
                    <div class="col-md-3 border-seccion">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="dni2" name="dni2" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>RESOLUCION SOBRE ASIGNACIÓN <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <h5>FECHA DE EMISIÓN RES. <i class="danger">*</i></h5>
                        <div id="fecha_ingreso1" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                            <input class="form-control" type="text" readonly="" style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                            <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                          <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_num_res2" name="txt_num_res2" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>RESOLUCIÓN SOBRE DESIGNACIÓN <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <h5>FECHA DE EMISIÓN DE RES.</h5>
                        <div id="fecha_ingreso2" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                            <input class="form-control" type="text" readonly="" style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                            <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
                  <!--./FIRST -->
              </div>



              <div>
                 <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_3" role="button" aria-expanded="true" aria-controls="legajos_5"><i class="fa fa-plus"></i> INFORMACIÓN ADJUNTA</h5> <!--LABORAL, FILIAL -->
              </div>
              <div id="legajos_3" class="collapse row border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CONSTANCIA DE TRABAJO</h5>
                          <form enctype="multipart/form-data" class="formulario_23">
                              <input name="archivo" type="file" id="file-23" class="inputfile inputfile-6"/>
                              <label for="file-23" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">RESOLUCIÓN SOBRE ASIGNACIÓN</h5>
                          <form enctype="multipart/form-data" class="formulario_24">
                              <input name="archivo" type="file" id="file-24" class="inputfile inputfile-6" />
                              <label for="file-24" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">RESOLUCIONES Y DOCUMENTOS DE DESIGNACIÓN</h5>
                          <form enctype="multipart/form-data" class="formulario_25">
                              <input name="archivo" type="file" id="file-25" class="inputfile inputfile-6" />
                              <label for="file-25" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </section>
  </div><!--content wrapper-->
 
<?php 
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>