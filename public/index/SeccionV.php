<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccioniv.js"></script>


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
                  <h3 class="text-center">RENUNCIA Y LIQUIDACIONES</h3>
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> Renuncias</h5>
              </div>
               <!---->
              <div id="legajos_1" class="collapse in row datos_estudios formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="row-agregado-study"> 
                    <div class="col-md-3 border-seccion">
                        <div class="group">      
                          <input class="inputMaterial" type="text" id="dni" name="dni" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>DNI <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <h6 class="subtitle pad-top-10"> REG. PENSIONES <i class="danger">*</i></h6>
                        <select data-placeholder="SELECCIONE" class="chosen-select-deselect" tabindex="2" name="cbx_capacitacion" id="cbx_capacitacion">
                            <option value=""></option>
                            <?php 
                              $_ListaGraInstruccion= Tabla::Lista(29);
                              foreach ($_ListaGraInstruccion   as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 border-seccion">
                      <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_num_contrato1" name="txt_num_contrato1" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Nº RESOLUCION / CONTRATO <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                      <div class="group">      
                          <input class="inputMaterial" type="text" id="txt_modalidad1" name="txt_modalidad1" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>MODALIDAD <i class="danger">*</i></label>
                        </div>
                    </div>
                </div>
                  <!--./FIRST -->
              </div>

              <div>
                 <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_3" role="button" aria-expanded="true" aria-controls="legajos_3"><i class="fa fa-plus"></i> INFORMACIÓN ADJUNTA</h5> <!--LABORAL, FILIAL -->
              </div>
              <div id="legajos_3" class="collapse row border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">RESOLUCIONES DE CONTRATO</h5>
                          <form enctype="multipart/form-data" class="formulario_19">
                              <input name="archivo" type="file" id="file-19" class="inputfile inputfile-6"/>
                              <label for="file-19" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">RENOVACIÓN DE CONTRATO</h5>
                          <form enctype="multipart/form-data" class="formulario_20">
                              <input name="archivo" type="file" id="file-20" class="inputfile inputfile-6" />
                              <label for="file-20" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">RESOLUCIONES DE NOMBRAMIENTO</h5>
                          <form enctype="multipart/form-data" class="formulario_21">
                              <input name="archivo" type="file" id="file-21" class="inputfile inputfile-6" />
                              <label for="file-21" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">TÉRMINO DE LA RELACIÓN LABORAL</h5>
                          <form enctype="multipart/form-data" class="formulario_22">
                              <input name="archivo" type="file" id="file-22" class="inputfile inputfile-6"/>
                              <label for="file-22" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
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