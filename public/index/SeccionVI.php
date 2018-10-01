<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccionvi.js?v=<?php echo time();?>"></script>


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
                  <h3 class="text-center">DESPLAZAMIENTO Y CARGOS DESEMPEÑADOS</h3>
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> Desplazamiento</h5>
              </div>
               <!---->
               <div id="legajos_1" class="collapse in row datos_certificados1 border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-resolucion"> 
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="dni" name="dni" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>DNI <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <h6 class="subtitle pad-top-10"> TIPO <i class="danger">*</i></h6>
                        <select data-placeholder="SELECCIONE" class="chosen-select-deselect" tabindex="2" name="cbx_tipo_desplazamiento" id="cbx_tipo_desplazamiento">
                            <option value=""></option>
                            <?php 
                              $_ListaGraInstruccion= Tabla::Lista(80);
                              foreach ($_ListaGraInstruccion   as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_lugar_procedencia" name="txt_lugar_procedencia" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>LUGAR DE PROCEDENCIA <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_lugar_destino" name="txt_lugar_destino" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>LUGAR DE DESTINO </label>
                        </div>
                    </div>
                    <div class="col-md-4 border-seccion relative">
                      <input class="hidden" type="hidden" value="28" />
                      <div class="js pad-top-10">
                          <h5 class="input-file-title" style="margin: 3px">CONSTANCIA DE TRABAJO</h5>
                          <form enctype="multipart/form-data" class="formulario_28">
                              <input name="archivo" type="file" id="file-28" class="inputfile inputfile-6"/>
                              <label for="file-28" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>
                          </form>
                      </div>
                      <button id="btnAdd-resolucion" type="button" class="btn btn-primary absolute" data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
                    </div>
                </div>
                  <!--./FIRST -->
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_2" role="button" aria-expanded="true" aria-controls="legajos_2">
                  <i class="fa fa-plus"></i> CARGOS</h5>
              </div>
               <!---->
              <div id="legajos_2" class="collapse row datos_certificados2 border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-cargo"> 
                    <div class="col-md-3 border-seccion formulario-legajos">
                        <h6 class="subtitle pad-top-10"> TIPO <i class="danger">*</i></h6>
                        <select data-placeholder="SELECCIONE" class="chosen-select-deselect" tabindex="2" name="cbx_tipo_cargo" id="cbx_tipo_cargo">
                            <option value=""></option>
                            <?php 
                              $_ListaGraInstruccion= Tabla::Lista(89);
                              foreach ($_ListaGraInstruccion   as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_num_documento" name="txt_num_documento" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Nº DE DOCUMENTO <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-2 border-seccion formulario-legajos">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_observacion" name="txt_observacion" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>OBSERVACION </label>
                        </div>
                    </div>
                    <div class="col-md-4 border-seccion relative">
                      <input class="hidden" type="hidden" value="29" />
                      <div class="js pad-top-10">
                          <h5 class="input-file-title" style="margin: 3px">DOCUMENTO</h5>
                          <form enctype="multipart/form-data" class="formulario_29">
                              <input name="archivo" type="file" id="file-29" class="inputfile inputfile-6"/>
                              <label for="file-29" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir un archivo</strong></label>
                          </form>
                      </div>
                      <button id="btnAdd-cargo" type="button" class="btn btn-primary absolute" data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
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