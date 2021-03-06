<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccioni.js?v=<?php echo time();?>"></script>

<?php

$dni = (isset($_REQUEST['d'])&& $_REQUEST['d'] !=NULL)?$_REQUEST['d']:'';    
$dni = base64_decode($dni);
$MPERSONA = Persona::Listar_MPERSONA($dni);
$MDOMICILIO = Persona::Listar_MDOMICILIO($dni);
$MFILIAL = Persona::Listar_MFILIAL($dni);
$MADJUNTO = Persona::Listar_MADJUNTOS($dni,2);

if ( $dni!='' && !empty($MPERSONA)) {?>

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
              <input type="hidden" class="form_edit" value='1'>
              <div>
                  <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse" href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                  <i class="fa fa-plus"></i> INFORMACIÓN PERSONAL</h5> <!-- FILIAL -->
              </div>
               <!---->
              <div id="legajos_1" class="collapse in row formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                  <div class="col-md-4 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text" id="ape_pat" name="ape_pat" required value="<?php echo $MPERSONA[0][1];?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDO PATERNO <i class="danger">*</i></label>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text"  id="ape_mat" name="ape_mat" required value="<?php echo $MPERSONA[0][2];?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDO MATERNO <i class="danger">*</i></label>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                    <div class="group">      
                        <input class="inputMaterial" type="text" id="nombres" name="nombres" required value="<?php echo $MPERSONA[0][3];?>">
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
                        <input class="inputMaterial" type="text"  id="dni" name="dni" required value="<?php echo $MPERSONA[0][8];?>" readonly>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="top: -20px; color: #3399FF;">DNI</label>
                    </div>
                  </div>
                  <!-- ./SECOND-->
                  <div class="col-md-3 border-seccion">
                      <div class="group">      
                        <input class="inputMaterial" type="text" id="nacionalidad" name="nacionalidad" value="PERUANA" required value="<?php echo $MPERSONA[0][9];?>">
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
                        <input class="inputMaterial" type="text" name="nombre_conyugue" id="nombre_conyugue" value="<?php echo $MPERSONA[0][12];?>">
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
                    <input class="inputMaterial" type="text" name="profesion" id="profesion" required="" value="<?php echo $MPERSONA[0][14];?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>PROFESION</label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                    <div class="group"> 
                    <input class="inputMaterial" type="text" name="especialidad" id="especialidad" value="<?php echo $MPERSONA[0][15];?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>ESPECIALIDAD</label>
                </div>
                </div>
                <div class="col-md-2 border-seccion">
                    <div class="group">      
                      <input type="text" name="type-price" class="inputMaterial type-price" id="monto" value="<?php echo $MPERSONA[0][16];?>">
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
                      <input class="inputMaterial" type="text"  id="nivel_remunerativo" name="nivel_remunerativo" required value="<?php echo $MPERSONA[0][20];?>">
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
                      <input class="inputMaterial" type="text"  id="correo" name="correo" required value="<?php echo $MPERSONA[0][23];?>">
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
                      <input class="inputMaterial" type="text"  id="num_ubicacion" name="num_ubicacion" required value="<?php echo $MPERSONA[0][25];?>">
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
                      <input class="inputMaterial" type="text"  id="num_contrato" name="num_contrato" required value="<?php echo $MPERSONA[0][27];?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NÚMERO DE CONTRATO <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                  <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_ruc" name="num_ruc" required value="<?php echo $MPERSONA[0][28];?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>NÚMERO DE RUC <i class="danger">*</i></label>
                  </div>
                </div>
                <div class="col-md-3 border-seccion">
                    <div class="group">      
                      <input class="inputMaterial" type="text"  id="num_celular" name="num_celular" value="<?php echo $MPERSONA[0][29];?>">
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
                            <input class="inputMaterial" type="text"  id="domicilio" name="domicilio" required value="<?php echo $MDOMICILIO[0][2];?>">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>DOMICILIO <i class="danger">*</i></label>
                            </div>
                        </div>
                        <div class="col-md-3 border-seccion">
                            <h6 class="subtitle pad-top-10">DISTRITO <i class="danger">*</i></h6>
                            <select data-placeholder="Distrito" class="chosen-select-deselect" tbindex="2" name="cbx_distrito_filial" id="cbx_distrito_filial">
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
                                <input class="inputMaterial" type="text"  id="referencia" name="referencia" required value="<?php echo $MDOMICILIO[0][4];?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>REFERENCIA <i class="danger">*</i></label>
                            </div>
                        </div>
                        <div class="col-md-2 border-seccion relative">
                            <div class="group">      
                            <input class="inputMaterial" type="text"  id="num_telefono" name="num_telefono" value="<?php echo $MDOMICILIO[0][5];?>">
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
                        <input class="inputMaterial" type="text"  id="datos_padre" name="datos_padre" required value="<?= $MPERSONA[0][30];?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDOS Y NOMBRES DEL PADRE <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-3 border-seccion">
                        <div class="group">      
                        <input class="inputMaterial" type="text"  id="datos_madre" name="datos_madre" required value="<?= $MPERSONA[0][31];?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>APELLIDOS Y NOMBRES DE LA MADRE <i class="danger">*</i></label>
                        </div>
                    </div>
                    <div class="col-md-4 border-seccion">
                    <div class="group">      
                        <input class="inputMaterial" type="text"  id="domicilio_padres" name="domicilio_padres" required value="<?= $MPERSONA[0][32];?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>DOMICILIO <i class="danger">*</i></label>
                    </div>
                    </div>
                    <div class="col-md-2 border-seccion">
                        <div class="group">      
                        <input class="inputMaterial" type="text"  id="num_padres" name="num_padres" value="<?= $MPERSONA[0][33];?>">
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
                                <input class="inputMaterial" type="text"  id="apellidos_hijo" name="apellidos_hijo" required value="<?php if(!empty($MFILIAL)){ echo $MFILIAL[0][2]; }?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>APELLIDOS</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group">      
                                <input class="inputMaterial" type="text"  id="nombres_hijo" name="nombres_hijo" required value="<?php if(!empty($MFILIAL)){ echo $MFILIAL[0][3]; }?>">
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
                                <input class="form-control" type="text" readonly style="font-size: 18px; border-bottom: 1px solid #5f5f5f; border-top: none; border-left: none; border-right: none; background: #fff;"> 
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
                            <input class="inputMaterial" type="text"  id="txt_essalud_child" name="txt_essalud_child" value="<?php if(!empty($MFILIAL)){ echo $MFILIAL[0][6]; }?>">
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
                          <h5 class="input-file-title inline">FICHA DE RESUMEN</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='1'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0101">
                              <input name="archivo" type="file" id="file-0101" class="inputfile inputfile-6"/>
                              <label for="file-0101" class="mar-bot-0" style="height: 40px">
                                <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='1'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">FICHA DE ACTUALIZACION DE PERSONAL</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='2'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0102">
                              <input name="archivo" type="file" id="file-0102" class="inputfile inputfile-6" />
                              <label for="file-0102" class="mar-bot-0" style="height: 40px">
                                <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='2'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">SOLICITUD DE TRABAJO</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='3'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0103">
                              <input name="archivo" type="file" id="file-0103" class="inputfile inputfile-6" />
                              <label for="file-0103" class="mar-bot-0" style="height: 40px">
                                <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='3'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">DECLARACIÓN JURADA DE BIENES Y RENTAS</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='4'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0104">
                              <input name="archivo" type="file" id="file-0104" class="inputfile inputfile-6"/>
                              <label for="file-0104" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='4'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">CERTIFICADO DE SALUD</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='5'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0105">
                              <input name="archivo" type="file" id="file-0105" class="inputfile inputfile-6" />
                              <label for="file-0105" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='5'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">CERTIFICADO DE ANTECEDENTES JUDICIALES</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='6'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0106">
                              <input name="archivo" type="file" id="file-0106" class="inputfile inputfile-6" />
                              <label for="file-0106" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='6'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">CERTIFICADO DE ANTECEDENTES PENALES</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='7'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0107">
                              <input name="archivo" type="file" id="file-0107" class="inputfile inputfile-6" />
                              <label for="file-0107" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='7'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">PARTIDA DE NACIMIENTO O BAUTIZO LEGALIZADO</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='8'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0108">
                              <input name="archivo" type="file" id="file-0108" class="inputfile inputfile-6" />
                              <label for="file-0108" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='8'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">COPIA DE DNI O LIBRETA ELECTORAL</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='9'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0109">
                              <input name="archivo" type="file" id="file-0109" class="inputfile inputfile-6" />
                              <label for="file-0109" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='9'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">COPIA DE LIBRETA MILITAR</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='10'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0110">
                              <input name="archivo" type="file" id="file-0110" class="inputfile inputfile-6" />
                              <label for="file-0110" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='10'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">CERTIFICADO DOMICILIARIO</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='11'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0111">
                              <input name="archivo" type="file" id="file-0111" class="inputfile inputfile-6" />
                              <label for="file-0111" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='11'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">PARTIDA DE MATRIMONIO</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='12'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0112">
                              <input name="archivo" type="file" id="file-0112" class="inputfile inputfile-6" />
                              <label for="file-0112" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='12'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">PARTIDA DE NACIMIENTO DE LOS HIJOS - DNI</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='13'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0113">
                              <input name="archivo" type="file" id="file-0113" class="inputfile inputfile-6" />
                              <label for="file-0113" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='13'){ echo substr($valor[5],23); } } ?></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title inline">OTROS</h5>
                          <?php
                          foreach($MADJUNTO as $key=>$valor){
                            if((int)$valor[3] =='14'){
                                echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                }
                            }
                          ?>
                          <form enctype="multipart/form-data" class="formulario_0114">
                              <input name="archivo" type="file" id="file-0114" class="inputfile inputfile-6" />
                              <label for="file-0114" class="mar-bot-0" style="height: 40px">
                              <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='14'){ echo substr($valor[5],23); } } ?></span>
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
  </div>

<?php 
$fecha_nac = $MPERSONA[0][4]->format('d-m-Y');
$cbx_departamento = $MPERSONA[0][5];
$cbx_sexo = $MPERSONA[0][10];
$cbx_est_civil = $MPERSONA[0][11];
$grado_instruccion = $MPERSONA[0][13];
$cbx_cargo = $MPERSONA[0][17];
$cbx_reg_pensiones = $MPERSONA[0][18];
$cbx_reg_laboral = $MPERSONA[0][19];
$fecha_regimen = $MPERSONA[0][21]->format('d-m-Y');
$cbx_establecimiento = $MPERSONA[0][22];
$cbx_grupo_ocupacional = $MPERSONA[0][24];
$fecha_ingreso = $MPERSONA[0][26]->format('d-m-Y');
$cbx_distrito_filial = $MDOMICILIO[0][3];
$num_domicilio= count($MDOMICILIO);
if(!empty($MFILIAL)){
$num_filial= count($MFILIAL);
$fecha_hijo = $MFILIAL[0][4]->format('d-m-Y');
$cbx_sexo_child = $MFILIAL[0][5];
}
?>                            
  <!--SCRIPT-->
  <script>
    var $ = jQuery.noConflict();
    $(document).ready(function(){
        document.getElementById('dni').readOnly = true;
        $("#fecha_nacimiento").datepicker({
            autoclose: true, 
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).datepicker('update', '<?php echo $fecha_nac;?>');
        
        $("#fecha_regimen").datepicker({
            autoclose: true, 
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).datepicker('update', '<?php echo $fecha_regimen;?>');
        
        $("#fecha_ingreso").datepicker({
            autoclose: true, 
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).datepicker('update', '<?php echo $fecha_ingreso;?>');

        <?php
        if(!empty($MFILIAL)){
        ?>
        $(".row-agregado-child:nth-child(1) .fecha_hijo").datepicker({
            autoclose: true, 
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).datepicker('update', '<?php echo $fecha_hijo;?>');
        <?php
        }
        ?>
        
    });

    $("#cbx_departamento").val('<?php echo $cbx_departamento;?>').trigger("chosen:updated");
    get_provincia_mod('<?php echo $MPERSONA[0][5];?>');
    get_distrito_mod('<?php echo $MPERSONA[0][6];?>');
    $("#cbx_sexo").val(<?php echo $cbx_sexo;?>).trigger("chosen:updated");
    $("#cbx_est_civil").val(<?php echo $cbx_est_civil;?>).trigger("chosen:updated");
    $("#grado_instruccion").val('<?php echo $grado_instruccion;?>').trigger("chosen:updated");
    $("#cbx_cargo").val('<?php echo $cbx_cargo;?>').trigger("chosen:updated");
    $("#cbx_reg_pensiones").val('<?php echo $cbx_reg_pensiones;?>').trigger("chosen:updated");
    $("#cbx_reg_laboral").val("<?php echo $cbx_reg_laboral;?>").trigger("chosen:updated");
    $("#cbx_establecimiento").val("<?php echo $cbx_establecimiento;?>").trigger("chosen:updated");
    $("#cbx_grupo_ocupacional").val(<?php echo $cbx_grupo_ocupacional;?>).trigger("chosen:updated");
    $(".row-agregado-address:nth-child(1) #cbx_distrito_filial").val(<?php echo $cbx_distrito_filial;?>).trigger("chosen:updated");
    
    <?php if(!empty($MFILIAL)){?>
    $(".row-agregado-child:nth-child(1) #cbx_sexo_child").val(<?php echo $cbx_sexo_child;?>).trigger("chosen:updated");
    <?php }?>

    function get_provincia_mod($parameter){
        $.ajax({
              type: 'POST',
              url: './public/user/ajax/includes/get_ubicacion.php?action=get_provincia',
              data: { Id_departamento: $parameter } ,
              success: function (data) {
                  var $select_elem = $("#cbx_provincia");
                  $select_elem.empty();
                  $select_elem.html(data);
                  $select_elem.chosen({
                    allow_single_deselect: true,
                    disable_search_threshold: 10,
                    no_results_text: "Oops, ningun resultado",
                    width: "95%"
                  });
                  $("#cbx_provincia").val('<?php echo $MPERSONA[0][6];?>').trigger("chosen:updated");
              }
            });
    }

    function get_distrito_mod($parameter){
        $.ajax({
                type: 'POST',
                url: './public/user/ajax/includes/get_ubicacion.php?action=get_distrito',
                data: { Id_provincia: $parameter } ,
                success: function (data) {
                    var $select_elem = $("#cbx_distrito");
                    $select_elem.empty();
                    $select_elem.html(data);
                    $select_elem.chosen({
                        allow_single_deselect: true,
                        disable_search_threshold: 10,
                        no_results_text: "Oops, ningun resultado",
                        width: "95%"
                    });
                    $("#cbx_distrito").val('<?php echo $MPERSONA[0][7];?>').trigger("chosen:updated");
                },
                error: function () {
                    alert("error");
                }
            }); 
    }
  </script>

<?php $i=2; while ($i<= $num_domicilio){ ?>

    <script>
    var $ = jQuery.noConflict();
    $(document).ready(function(){
        var div = $("<div class='row-agregado-address'>");
        div.html(AddDateAddres(""));
        $(".datos_direccion").append(div);
        $(".formulario-legajos .row-agregado-address:nth-child(<?= $i;?>) #domicilio").val("<?= $MDOMICILIO[$i-1][2];?>");
        $(".formulario-legajos .row-agregado-address:nth-child(<?= $i;?>) #referencia").val("<?= $MDOMICILIO[$i-1][4];?>");
        $(".formulario-legajos .row-agregado-address:nth-child(<?= $i;?>) #num_telefono").val("<?= $MDOMICILIO[$i-1][5];?>");
        $(".formulario-legajos .row-agregado-address:nth-child(<?= $i;?>) #cbx_distrito_filial").val(<?= $MDOMICILIO[$i-1][3];?>).trigger("chosen:updated");
    });
    </script>

<?php  $i++; } 
if(!empty($MFILIAL)){
$j=2; while ($j <= $num_filial) {?>
    
    <script>
    var $ = jQuery.noConflict();
    $(document).ready(function(){
        var div = $("<div class='row-agregado-child'>");
        div.html(AddDateChilds(""));
        $(".datos_hijos").append(div);
        $(".formulario-legajos .row-agregado-child:nth-child(<?= $j;?>) #apellidos_hijo").val("<?= $MFILIAL[$j-1][2];?>");
        $(".formulario-legajos .row-agregado-child:nth-child(<?= $j;?>) #nombres_hijo").val("<?= $MFILIAL[$j-1][3];?>");

        $(".row-agregado-child:nth-child(<?= $j;?>) .fecha_hijo").datepicker({
            autoclose: true, 
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).datepicker('update', '<?= $MFILIAL[$j-1][4]->format('d-m-Y');?>');

        $(".formulario-legajos .row-agregado-child:nth-child(<?= $j;?>) #cbx_sexo_child").val(<?= $MFILIAL[$j-1][5];?>).trigger("chosen:updated");
        $(".formulario-legajos .row-agregado-child:nth-child(<?= $j;?>) #txt_essalud_child").val("<?= $MFILIAL[$j-1][6];?>");
        
    });
    </script>

<?php $j++; } 
};?>

<?php
}else{
?>
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
              <input type="hidden" class="form_edit" value='0'>
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
                          <form enctype="multipart/form-data" class="formulario_0101">
                              <input name="archivo" type="file" id="file-0101" class="inputfile inputfile-6"/>
                              <label for="file-0101" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">FICHA DE ACTUALIZACION DE PERSONAL</h5>
                          <form enctype="multipart/form-data" class="formulario_0102">
                              <input name="archivo" type="file" id="file-0102" class="inputfile inputfile-6" />
                              <label for="file-0102" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">SOLICITUD DE TRABAJO</h5>
                          <form enctype="multipart/form-data" class="formulario_0103">
                              <input name="archivo" type="file" id="file-0103" class="inputfile inputfile-6" />
                              <label for="file-0103" class="mar-bot-0" style="height: 40px">
                                <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                              </label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">DECLARACIÓN JURADA DE BIENES Y RENTAS</h5>
                          <form enctype="multipart/form-data" class="formulario_0104">
                              <input name="archivo" type="file" id="file-0104" class="inputfile inputfile-6"/>
                              <label for="file-0104" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE SALUD</h5>
                          <form enctype="multipart/form-data" class="formulario_0105">
                              <input name="archivo" type="file" id="file-0105" class="inputfile inputfile-6" />
                              <label for="file-0105" class="mar-bot-0" style="height: 40px">
                              <span class="demo"></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE ANTECEDENTES JUDICIALES</h5>
                          <form enctype="multipart/form-data" class="formulario_0106">
                              <input name="archivo" type="file" id="file-0106" class="inputfile inputfile-6" />
                              <label for="file-0106" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DE ANTECEDENTES PENALES</h5>
                          <form enctype="multipart/form-data" class="formulario_0107">
                              <input name="archivo" type="file" id="file-0107" class="inputfile inputfile-6" />
                              <label for="file-0107" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE NACIMIENTO O BAUTIZO LEGALIZADO</h5>
                          <form enctype="multipart/form-data" class="formulario_0108">
                              <input name="archivo" type="file" id="file-0108" class="inputfile inputfile-6" />
                              <label for="file-0108" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">COPIA DE DNI O LIBRETA ELECTORAL</h5>
                          <form enctype="multipart/form-data" class="formulario_0109">
                              <input name="archivo" type="file" id="file-0109" class="inputfile inputfile-6" />
                              <label for="file-0109" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">COPIA DE LIBRETA MILITAR</h5>
                          <form enctype="multipart/form-data" class="formulario_0110">
                              <input name="archivo" type="file" id="file-0110" class="inputfile inputfile-6" />
                              <label for="file-0110" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">CERTIFICADO DOMICILIARIO</h5>
                          <form enctype="multipart/form-data" class="formulario_0111">
                              <input name="archivo" type="file" id="file-0111" class="inputfile inputfile-6" />
                              <label for="file-0111" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE MATRIMONIO</h5>
                          <form enctype="multipart/form-data" class="formulario_0112">
                              <input name="archivo" type="file" id="file-0112" class="inputfile inputfile-6" />
                              <label for="file-0112" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">PARTIDA DE NACIMIENTO DE LOS HIJOS - DNI</h5>
                          <form enctype="multipart/form-data" class="formulario_0113">
                              <input name="archivo" type="file" id="file-0113" class="inputfile inputfile-6" />
                              <label for="file-0113" class="mar-bot-0" style="height: 40px">
                              <span></span>
                              <strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
                          </form>
                      </div>
                  </div>
                  <div class="col-md-4 border-seccion">
                      <div class="js pad-top-10">
                          <h5 class="input-file-title">OTROS</h5>
                          <form enctype="multipart/form-data" class="formulario_0114">
                              <input name="archivo" type="file" id="file-0114" class="inputfile inputfile-6" />
                              <label for="file-0114" class="mar-bot-0" style="height: 40px">
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
    }//Else
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>