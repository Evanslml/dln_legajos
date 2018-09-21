<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccioni.js"></script>


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
                  <h3 class="text-center">FILIACIÓN E IDENTIFICACIÓN PERSONAL</h3>
              </div>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> INFORMACIÓN PERSONAL</h5> <!-- FILIAL -->
              </div>
               <!---->
              <div id="legajos_1" class="collapse in row formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                  <div class="col-md-4 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text" id="ape_pat" name="ape_pat" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDO PATERNO <i class="danger">*</i></label>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text"  id="ape_mat" name="ape_mat" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDO MATERNO <i class="danger">*</i></label>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                    <div class="group">      
                        <input class="inputMaterial" type="text" id="nombres" name="nombres" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>NOMBRES <i class="danger">*</i></label>
                      </div>
                  </div>
                  <!--./FIRST -->
                  <div class="col-md-2 border-seccion">
                      <h5>FECHA DE NACIMIENTO</h5>
                      <h6 class="subtitle">FECHA <i class="danger">*</i></h6>
                      <div id="fecha_nacimiento" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                          <input class="form-control" type="text" readonly="" style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                          <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                  </div>
                  <div class="col-md-8 border-seccion">
                      <h5>LUGAR DE NACIMIENTO <i class="danger">*</i></h5>
                      <div class="row">
                        <div class="col-md-4 col-departamento">
                          <h6 class="subtitle">DEPARTAMENTO</h6>
                          <select data-placeholder="Departamento" class="chosen-select-deselect" tabindex="2" name="cbx_departamento" id="cbx_departamento">
                              <option value=""></option>
                              <?php 
                                foreach ($_ListaDepartamento as $key => $value) {
                                  echo "<option value='".$value['MDEPA_ID']."'>".$value['MDEPA_NOMBRE']."</option>";
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-provincia">
                          <div class="temporal_provincia">
                            <h6 class="subtitle">PROVINCIA</h6>
                              <select data-placeholder="Provincias" class="chosen-select-deselect" tabindex="2" name="cbx_provincia" id="cbx_provincia">
                                <option value="">Seleccione Provincia</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4 col-distrito">
                          <div class="temporal_distrito">
                            <h6 class="subtitle">DISTRITO</h6>
                            <select data-placeholder="Distritos" class="chosen-select-deselect" tabindex="2" name="cbx_distrito" id="cbx_distrito">
                              <option value="">Seleccione Distrito</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-2 border-seccion">
                    <h5>DOC. IDENTIDAD <i class="danger">*</i></h5>
                    <div class="group">      
                        <input class="inputMaterial" type="text"  id="dni" name="dni" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>DNI</label>
                    </div>
                  </div>
                  <!-- ./SECOND-->
                  <div class="col-md-3 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text" id="nacionalidad" name="nacionalidad" value="PERUANA" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>NACIONALIDAD <i class="danger">*</i></label>
                      </div>
                  </div>
                  <div class="col-md-1 border-seccion">
                      <h6 class="subtitle pad-top-10">SEXO <i class="danger">*</i></h6>
                          <select data-placeholder="SEXO" class="chosen-select" tabindex="2" name="cbx_sexo" id="cbx_sexo">
                              <option value=""></option>
                              <?php 
                                $_ListaSexo= Tabla::Lista(6);
                                foreach ($_ListaSexo as $key => $value) {
                                  echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_ABREVIA']."</option>";
                                }
                              ?>
                            </select>
                  </div>
                  <div class="col-md-3 border-seccion">
                      <h6 class="subtitle pad-top-10">EST. CIVIL <i class="danger">*</i></h6>
                          <select data-placeholder="ESTADO CIVIL" class="chosen-select-deselect" tabindex="2" name="cbx_est_civil" id="cbx_est_civil">
                              <option value=""></option>
                              <?php 
                                $_ListaEstCivil= Tabla::Lista(1);
                                foreach ($_ListaEstCivil as $key => $value) {
                                  echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                                }
                              ?>
                            </select>
                  </div>
                  <div class="col-md-5 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text" name="nombre_conyugue" id="nombre_conyugue">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>NOMBRES DEL CONYUGUE</label>
                      </div>
                  </div>
                <!-- /THREE-->
              </div>
              <div>
                 <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_2" role="button" aria-expanded="true" aria-controls="legajos_2"><i class="fa fa-plus"></i> INFORMACIÓN LABORAL</h5> <!--LABORAL, FILIAL -->
              </div>
              <div id="legajos_2" class="collapse row formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                <div class="col-md-4 border-seccion">
                    <h6 class="subtitle pad-top-10">GRADO INSTRUCCIÓN <i class="danger">*</i></h6>
                        <select data-placeholder="GRADO INSTRUCCION" class="chosen-select-deselect" tabindex="2" name="grado_instruccion" id="grado_instruccion">
                            <option value=""></option>
                            <?php 
                              $_ListaGraInstruccion= Tabla::Lista(16);
                              foreach ($_ListaGraInstruccion as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                              }
                            ?>
                          </select>
                </div>
                <div class="col-md-3 border-seccion">
                  <div class="group"> 
                    <input class="inputMaterial" type="text" name="profesion" id="profesion" required="">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>PROFESION</label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                    <div class="group"> 
                    <input class="inputMaterial" type="text" name="especialidad" id="especialidad">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>ESPECIALIDAD</label>
                </div>
                </div>
                <div class="col-md-2 border-seccion">
                    <div class="group">      
                      <input type="text" value="000" name="type-price" class="inputMaterial type-price" id="monto">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>MONTO <i class="danger">*</i></label>
                    </div>
                </div>
                <!-- ./FOUR-->
                <div class="col-md-4 border-seccion">
                    <h6 class="subtitle pad-top-10">CARGO <i class="danger">*</i></h6>
                        <select data-placeholder="CARGO" class="chosen-select-deselect" tabindex="2" name="cbx_cargo" id="cbx_cargo">
                            <option value=""></option>
                            <?php 
                              foreach ($_ListaCargo as $key => $value) {
                                echo "<option value='".$value['MCARG_CODIGO']."'>".$value['MCARG_NOMBRE']."</option>";
                              }
                            ?>
                          </select>
                </div>
                <div class="col-md-2 border-seccion">
                  <h6 class="subtitle pad-top-10">REG. DE PENSIONES <i class="danger">*</i></h6>
                    <select data-placeholder="REGIMEN DE PENSIONES" class="chosen-select-deselect" tabindex="2" name="cbx_reg_pensiones" id="cbx_reg_pensiones">
                        <option value=""></option>
                        <?php 
                          $_ListaGraInstruccion= Tabla::Lista(9);
                          foreach ($_ListaGraInstruccion as $key => $value) {
                            echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                          }
                        ?>
                      </select>
                </div>
                <div class="col-md-2 border-seccion">
                  <h6 class="subtitle pad-top-10">REG. LABORAL <i class="danger">*</i></h6>
                    <select data-placeholder="REGIMEN LABORAL" class="chosen-select-deselect" tabindex="2" name="cbx_reg_laboral" id="cbx_reg_laboral">
                        <option value=""></option>
                        <?php 
                          $_ListaGraInstruccion= Tabla::Lista(12);
                          foreach ($_ListaGraInstruccion as $key => $value) {
                            echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_DESCRIP']."</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="nivel_remunerativo" name="nivel_remunerativo" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NIV. REMUNERATIVO <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-2 border-seccion">
                    <h6 class="subtitle" style="padding-top: 7px;">FECHA DE REGIMEN <i class="danger">*</i></h6>
                    <div id="fecha_regimen" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                        <input class="form-control" type="text" readonly="" style="    font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                        <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
                <!-- /FIVE-->
                <div class="col-md-4 border-seccion">
                    <h6 class="subtitle pad-top-10">ESTABLECIMIENTO <i class="danger">*</i></h6>
                        <select data-placeholder="ESTABLECIMIENTO" class="chosen-select-deselect" tabindex="2" name="cbx_establecimiento" id="cbx_establecimiento">
                            <option value=""></option>
                            <?php 
                              foreach ($_ListaEstableciento as $key => $value) {
                                echo "<option value='".$value['MEST_CODIGO']."'>".$value['MEST_NOMBRE']."</option>";
                              }
                            ?>
                          </select>
                </div>
                <div class="col-md-3 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="correo" name="correo" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>CORREO ELECTRONICO</label>
                  </div>
                </div>
                <div class="col-md-4 border-seccion">
                  <h6 class="subtitle pad-top-10">GRUPO OCUPACIONAL <i class="danger">*</i></h6>
                    <select data-placeholder="GRUPO OCUPACIONAL" class="chosen-select-deselect" tabindex="2" name="cbx_grupo_ocupacional" id="cbx_grupo_ocupacional">
                        <option value=""></option>
                        <?php 
                          foreach ($_ListaUbicacion as $key => $value) {
                            echo "<option value='".$value['MUBI_ID']."'>".$value['MUBI_NOMBRE']."</option>";
                          }
                        ?>
                    </select>
                </div>
                <div class="col-md-1 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_ubicacion" name="num_ubicacion" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>N° UBIC.</label>
                    </div>
                </div>
                <!-- /SIX-->
                <div class="col-md-3 border-seccion">
                     <h6 class="subtitle" style="padding-top: 7px;">FECHA DE INGRESO <i class="danger">*</i></h6>
                        <div id="fecha_ingreso" class="input-group date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                            <input class="form-control" type="text" readonly="" style="    font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                            <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                </div>
                <div class="col-md-3 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_contrato" name="num_contrato" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NÚMERO DE CONTRATO <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_ruc" name="num_ruc" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NÚMERO DE RUC <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_celular" name="num_celular">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NÚMERO DE CELULAR</label>
                    </div>
                </div>
                <!-- /SEVEN-->
              </div>
              <div>
                 <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_3" role="button" aria-expanded="true" aria-controls="legajos_3"><i class="fa fa-plus"></i> INFORMACIÓN FILIAL</h5> <!--LABORAL, FILIAL -->
              </div>
              <div id="legajos_3" class="collapse">
              <div class="row formulario-legajos datos_direccion border-seccion-left border-seccion-right border-seccion-top">
                  <div class="row-agregado-address">
                    <div class="col-md-4 border-seccion">
                        <div class="group">      
                          <input class="inputMaterial" type="text"  id="domicilio" name="domicilio" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>DOMICILIO <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <h6 class="subtitle pad-top-10">DISTRITO <i class="danger">*</i></h6>
                          <select data-placeholder="Distrito" class="chosen-select-deselect" tabindex="2" name="cbx_distrito_filial" id="cbx_distrito_filial">
                              <option value=""></option>
                              <?php 
                                foreach ($_ListaDistritosLima as $key => $value) {
                                  echo "<option value='".$value['MDIST_ID']."'>".$value['MDIST_NOMBRE']."</option>";
                                }
                              ?>
                            </select>
                    </div>
                    <div class="col-md-3 border-seccion">
                      <div class="group">      
                          <input class="inputMaterial" type="text"  id="referencia" name="referencia" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>REFERENCIA <i class="danger">*</i></label>
                      </div>
                    </div>
                    <div class="col-md-2 border-seccion relative">
                        <div class="group">      
                          <input class="inputMaterial" type="text"  id="num_telefono" name="num_telefono">
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>TELEFONO</label>
                        </div>
                        <button id="btnAdd-address" type="button" class="btn btn-primary absolute" data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
                    </div>
                </div>
              </div>
              <div class="row formulario-legajos border-seccion-left border-seccion-right">
                <!-- /EIGHT-->
                <div class="col-md-3 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="datos_padre" name="datos_padre" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>APELLIDOS Y NOMBRES DEL PADRE <i class="danger">*</i></label>
                    </div>
                </div>
                <div class="col-md-3 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="datos_madre" name="datos_madre" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>APELLIDOS Y NOMBRES DE LA MADRE <i class="danger">*</i></label>
                    </div>
                </div>
                <div class="col-md-4 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="domicilio_padres" name="domicilio_padres" required>
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>DOMICILIO <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-2 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_padres" name="num_padres">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>TELEFONO</label>
                    </div>
                </div>
              </div>
                <!-- -->
              <div class="row formulario-legajos datos_hijos border-seccion-left border-seccion-right border-seccion-bottom">
                <div class="row-agregado-child">
                  <div class="col-md-7 border-seccion">
                      <h5 class="mar-bot-0">DATOS DEL HIJO</h5>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text"  id="apellidos_hijo" name="apellidos_hijo" required>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>APELLIDOS</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="group">      
                              <input class="inputMaterial" type="text"  id="nombres_hijo" name="nombres_hijo" required>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>NOMBRES</label>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-2 border-seccion">
                      <h5>FECHA</h5>
                      <h6 class="subtitle">NAC.</h6>
                          <div class="input-group fecha_hijo date" data-date-format="mm-dd-yyyy" style="margin-top: 17px;">
                              <input class="form-control" type="text" readonly style="    font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
                              <span class="input-group-addon" style="border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none;"><i class="glyphicon glyphicon-calendar"></i></span>
                          </div>
                  </div>
                  <div class="col-md-1 border-seccion">
                        <h6 class="subtitle" style="padding-top: 7px; padding-bottom: 28px;">SEXO</h6>
                        <select data-placeholder="SEXO" class="chosen-select" tabindex="2" name="cbx_sexo_child" id="cbx_sexo_child">
                            <option value=""></option>
                            <?php 
                              $_ListaSexo= Tabla::Lista(6);
                              foreach ($_ListaSexo as $key => $value) {
                                echo "<option value='".$value['MTABL_ID']."'>".$value['MTABL_ABREVIA']."</option>";
                              }
                            ?>
                          </select>
                  </div>
                  <div class="col-md-2 border-seccion relative">
                      <h5>ESSALUD </h5>
                      <div class="group">      
                          <input class="inputMaterial" type="text"  id="txt_essalud_child" name="txt_essalud_child">
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label></label>
                          <button id="btnAdd-child" type="button" class="btn btn-primary absolute" data-toggle="tooltip" data-original-title="Agregar filas" style="top: -25px; right: -35px;"><i class="glyphicon glyphicon-plus-sign"></i> Add</button>
                      </div>
                  </div>
                </div>
              </div><!--row.-->
              </div>

              <div>
                 <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_4" role="button" aria-expanded="true" aria-controls="legajos_4"><i class="fa fa-plus"></i> INFORMACIÓN ADJUNTA</h5> <!--LABORAL, FILIAL -->
              </div>
              <div id="legajos_4" class="collapse row border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">FICHA DE RESUMEN</h5>
                          <form enctype="multipart/form-data" class="formulario_1">
                              <input name="archivo" type="file" id="file-1" class="inputfile inputfile-6"/>
                              <label for="file-1" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">FICHA DE ACTUALIZACION DE PERSONAL</h5>
                          <form enctype="multipart/form-data" class="formulario_2">
                              <input name="archivo" type="file" id="file-2" class="inputfile inputfile-6" />
                              <label for="file-2" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">SOLICITUD DE TRABAJO</h5>
                          <form enctype="multipart/form-data" class="formulario_3">
                              <input name="archivo" type="file" id="file-3" class="inputfile inputfile-6" />
                              <label for="file-3" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">DECLARACIÓN JURADA DE BIENES Y RENTAS</h5>
                          <form enctype="multipart/form-data" class="formulario_4">
                              <input name="archivo" type="file" id="file-4" class="inputfile inputfile-6"/>
                              <label for="file-4" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE SALUD</h5>
                          <form enctype="multipart/form-data" class="formulario_5">
                              <input name="archivo" type="file" id="file-5" class="inputfile inputfile-6" />
                              <label for="file-5" class="mar-bot-0" style="height: 40px">
                              <span class="demo"></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE ANTECEDENTES JUDICIALES</h5>
                          <form enctype="multipart/form-data" class="formulario_6">
                              <input name="archivo" type="file" id="file-6" class="inputfile inputfile-6" />
                              <label for="file-6" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE ANTECEDENTES PENALES</h5>
                          <form enctype="multipart/form-data" class="formulario_7">
                              <input name="archivo" type="file" id="file-7" class="inputfile inputfile-6" />
                              <label for="file-7" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE NACIMIENTO O BAUTIZO LEGALIZADO</h5>
                          <form enctype="multipart/form-data" class="formulario_8">
                              <input name="archivo" type="file" id="file-8" class="inputfile inputfile-6" />
                              <label for="file-8" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">COPIA DE DNI O LIBRETA ELECTORAL</h5>
                          <form enctype="multipart/form-data" class="formulario_9">
                              <input name="archivo" type="file" id="file-9" class="inputfile inputfile-6" />
                              <label for="file-9" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">COPIA DE LIBRETA MILITAR</h5>
                          <form enctype="multipart/form-data" class="formulario_10">
                              <input name="archivo" type="file" id="file-10" class="inputfile inputfile-6" />
                              <label for="file-10" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DOMICILIARIO</h5>
                          <form enctype="multipart/form-data" class="formulario_11">
                              <input name="archivo" type="file" id="file-11" class="inputfile inputfile-6" />
                              <label for="file-11" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE MATRIMONIO</h5>
                          <form enctype="multipart/form-data" class="formulario_12">
                              <input name="archivo" type="file" id="file-12" class="inputfile inputfile-6" />
                              <label for="file-12" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE NACIMIENTO DE LOS HIJOS - DNI</h5>
                          <form enctype="multipart/form-data" class="formulario_13">
                              <input name="archivo" type="file" id="file-13" class="inputfile inputfile-6" />
                              <label for="file-13" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">OTROS</h5>
                          <form enctype="multipart/form-data" class="formulario_14">
                              <input name="archivo" type="file" id="file-14" class="inputfile inputfile-6" />
                              <label for="file-14" class="mar-bot-0" style="height: 40px">
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