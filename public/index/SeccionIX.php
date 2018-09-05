<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccionix.js"></script>


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
                  <h3 class="text-center">ASCENSOS</h3>
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> RESOLUCIONES</h5> 
              </div>
               <!---->
              <div id="legajos_1" class="collapse in row datos_certificados border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-resolucion"> 
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="dni" name="dni" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>DNI <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion formulario-legajos">
                        <h6 class="subtitle pad-top-10"> TIPO <i class="danger">*</i></h6>
                        <select data-placeholder="SELECCIONE" class="chosen-select-deselect" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">
                            <option value=""></option>
                            <?php 
                              $_ListaGraInstruccion= Tabla::Lista(62);
                              foreach ($_ListaGraInstruccion   as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_casa_estudios" name="txt_casa_estudios" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Nº DE RESOLUCION <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-4 border-seccion relative">
                      <input class="hidden" type="hidden" value="18" />
                      <div class="js pad-top-10">
                          <h5 class="input-file-title" style="margin: 3px">RESOLUCION</h5>
                          <form enctype="multipart/form-data" class="formulario_18">
                              <input name="archivo" type="file" id="file-18" class="inputfile inputfile-6"/>
                              <label for="file-18" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>
                          </form>
                      </div>
                      <button id="btnAdd-resolucion" type="button" class="btn btn-primary absolute" data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
                    </div>
                </div>
                  <!--./FIRST -->
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