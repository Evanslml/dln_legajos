<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/init_seccionii.js?v=<?php echo time();?>"></script>

<?php
$dni = (isset($_REQUEST['d'])&& $_REQUEST['d'] !=NULL)?$_REQUEST['d']:'';    
$dni = base64_decode($dni);

$MESTUDIO = Estudio::Busqueda_estudios_dni($dni,'E');
$MADJUNTO = Persona::Listar_MADJUNTOS($dni,3);

if ( $dni!='' & $MESTUDIO!='') {?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">

        <div class="row">
            <?php include('./public/overall/menu-legajos.php');?>
        </div>
        <!--row-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="content" style="margin-bottom: 150px">
                        <div>
                            <h3 class="text-center">NIVEL EDUCATIVO</h3>
                        </div>
                        <input type="hidden" class="form_edit" value='1'>
                        <div>
                            <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse"
                                href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                                <i class="fa fa-plus"></i> ESTUDIOS</h5>
                        </div>
                        <div id="legajos_1" class="collapse in row datos_estudios formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                            <div class="row-agregado-study">
                                <div class="col-md-2 border-seccion">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="dni" name="dni" value='<?php echo $MESTUDIO[0][1];?>' readonly>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="top: -20px; color: #3399FF;">DNI <i class="danger">*</i></label>
                                    </div>
                                </div>
                                <div class="col-md-3 border-seccion">
                                    <h6 class="subtitle pad-top-10">GRADO INSTRUCCIÓN <i class="danger">*</i></h6>
                                    <select data-placeholder="GRADO INSTRUCCION" class="chosen-select-deselect"
                                        tabindex="2" name="cbx_grado_instruccion" id="cbx_grado_instruccion">
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
                                        <input class="inputMaterial" type="text" id="txt_estudios" name="txt_estudios" value='<?php echo $MESTUDIO[0][3];?>' required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>ESTUDIOS <i class="danger">*</i></label>
                                    </div>
                                </div>
                                <div class="col-md-2 border-seccion">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="txt_especialidad" name="txt_especialidad" value='<?php echo $MESTUDIO[0][4];?>' required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>ESPECIALIDAD </label>
                                    </div>
                                </div>
                                <div class="col-md-2 border-seccion relative">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="txt_casa_estudios" name="txt_casa_estudios" value='<?php echo $MESTUDIO[0][5];?>' required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CASA DE ESTUDIOS <i class="danger">*</i></label>
                                    </div>
                                    <button id="btnAdd-study" type="button" class="btn btn-primary absolute"
                                        data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i
                                            class="glyphicon glyphicon-plus-sign"></i> Add</button>
                                </div>
                            </div>
                            <!--./FIRST -->
                        </div>
                        <div>
                            <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse"
                                href="#legajos_2" role="button" aria-expanded="true" aria-controls="legajos_2"><i class="fa fa-plus"></i>
                                INFORMACIÓN ADJUNTA</h5>
                            <!--LABORAL, FILIAL -->
                        </div>
                        <div id="legajos_2" class="collapse row border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title inline">CURRICULUM VITAE</h5>
                                    <?php
                                    foreach($MADJUNTO as $key=>$valor){
                                        if((int)$valor[3] =='1'){
                                            echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                            }
                                        }
                                    ?>
                                    <form enctype="multipart/form-data" class="formulario_0201">
                                        <input name="archivo" type="file" id="file-0201" class="inputfile inputfile-6" />
                                        <label for="file-0201" class="mar-bot-0" style="height: 40px">
                                            <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='1'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title inline">CERTIFICADO DE ESTUDIOS</h5>
                                    <?php
                                    foreach($MADJUNTO as $key=>$valor){
                                        if((int)$valor[3] =='2'){
                                            echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                            }
                                        }
                                    ?>
                                    <form enctype="multipart/form-data" class="formulario_0202">
                                        <input name="archivo" type="file" id="file-0202" class="inputfile inputfile-6" />
                                        <label for="file-0202" class="mar-bot-0" style="height: 40px">
                                            <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='2'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title inline">GRADO DE INSTRUCCIÓN</h5>
                                    <?php
                                    foreach($MADJUNTO as $key=>$valor){
                                        if((int)$valor[3] =='3'){
                                            echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                            }
                                        }
                                    ?>
                                    <form enctype="multipart/form-data" class="formulario_0203">
                                        <input name="archivo" type="file" id="file-0203" class="inputfile inputfile-6" />
                                        <label for="file-0203" class="mar-bot-0" style="height: 40px">
                                            <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='3'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title inline">HABILIDAD PROFESIONAL</h5>
                                    <?php
                                    foreach($MADJUNTO as $key=>$valor){
                                        if((int)$valor[3] =='4'){
                                            echo '(<a href="'.URL_ADJUNTOS.'/'.$dni.'/'.$valor[5].'" download class="color-1"><i class="fa fa-arrow-down"></i>Descarga</a>)';
                                            }
                                        }
                                    ?>
                                    <form enctype="multipart/form-data" class="formulario_0204">
                                        <input name="archivo" type="file" id="file-0204" class="inputfile inputfile-6" />
                                        <label for="file-0204" class="mar-bot-0" style="height: 40px">
                                            <span><?php foreach($MADJUNTO as $key=>$valor){ if((int)$valor[3] =='3'){ echo substr($valor[5],23); } } ?></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong></label>
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
<!--content wrapper-->
<?php
$num_estudio= count($MESTUDIO);
$cbx_grado_instruccion = $MESTUDIO[0][2];
?>
  <!--SCRIPT-->
  <script>
    var $ = jQuery.noConflict();
    $(document).ready(function(){
        $("#cbx_grado_instruccion").val('<?php echo $cbx_grado_instruccion;?>').trigger("chosen:updated");
    });

    
    </script>

<?php 
    $i=2; 
    while ($i<= $num_estudio)
    { 
?>
    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function(){
            var div = $("<div class='row-agregado-study'>");
            div.html(AddDateStudy(""));
            $(".datos_estudios").append(div);
            $(".formulario-legajos .row-agregado-study:nth-child(<?= $i;?>) #cbx_grado_instruccion").val(<?= $MESTUDIO[$i-1][2];?>).trigger("chosen:updated");
            $(".formulario-legajos .row-agregado-study:nth-child(<?= $i;?>) #txt_estudios").val("<?= $MESTUDIO[$i-1][3];?>");
            $(".formulario-legajos .row-agregado-study:nth-child(<?= $i;?>) #txt_especialidad").val("<?= $MESTUDIO[$i-1][4];?>");
            $(".formulario-legajos .row-agregado-study:nth-child(<?= $i;?>) #txt_casa_estudios").val("<?= $MESTUDIO[$i-1][5];?>");
            
        });
    </script>
<?php  
    $i++; 
    } 
?>


<?php } //if 
 else{ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="row">
            <?php include('./public/overall/menu-legajos.php');?>
        </div>
        <!--row-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="content" style="margin-bottom: 150px">
                        <div>
                            <h3 class="text-center">NIVEL EDUCATIVO</h3>
                        </div>
                        <input type="hidden" class="form_edit" value='0'>
                        <div>
                            <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse"
                                href="#legajos_1" role="button" aria-expanded="true" aria-controls="legajos_1">
                                <i class="fa fa-plus"></i> ESTUDIOS</h5>
                        </div>
                        <!---->
                        <div id="legajos_1" class="collapse in row datos_estudios formulario-legajos border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                            <div class="row-agregado-study">
                                <div class="col-md-2 border-seccion">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="dni" name="dni" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>DNI <i class="danger">*</i></label>
                                    </div>
                                </div>
                                <div class="col-md-3 border-seccion">
                                    <h6 class="subtitle pad-top-10">GRADO INSTRUCCIÓN <i class="danger">*</i></h6>
                                    <select data-placeholder="GRADO INSTRUCCION" class="chosen-select-deselect"
                                        tabindex="2" name="cbx_grado_instruccion" id="cbx_grado_instruccion">
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
                                        <input class="inputMaterial" type="text" id="txt_estudios" name="txt_estudios"
                                            required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>ESTUDIOS <i class="danger">*</i></label>
                                    </div>
                                </div>
                                <div class="col-md-2 border-seccion">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="txt_especialidad" name="txt_especialidad"
                                            required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>ESPECIALIDAD </label>
                                    </div>
                                </div>
                                <div class="col-md-2 border-seccion relative">
                                    <div class="group">
                                        <input class="inputMaterial" type="text" id="txt_casa_estudios" name="txt_casa_estudios"
                                            required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CASA DE ESTUDIOS <i class="danger">*</i></label>
                                    </div>
                                    <button id="btnAdd-study" type="button" class="btn btn-primary absolute"
                                        data-toggle="tooltip" data-original-title="Agregar filas" style="top: 25px; right: -16px;"><i
                                            class="glyphicon glyphicon-plus-sign"></i> Add</button>
                                </div>
                            </div>
                            <!--./FIRST -->
                        </div>
                        <div>
                            <h5 class="subtitle-form subtitle-collapse" aria-expanded="true" data-toggle="collapse"
                                href="#legajos_2" role="button" aria-expanded="true" aria-controls="legajos_2"><i class="fa fa-plus"></i>
                                INFORMACIÓN ADJUNTA</h5>
                            <!--LABORAL, FILIAL -->
                        </div>
                        <div id="legajos_2" class="collapse row border-seccion-left border-seccion-right border-seccion-top border-seccion-bottom">
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title">CURRICULUM VITAE</h5>
                                    <form enctype="multipart/form-data" class="formulario_0201">
                                        <input name="archivo" type="file" id="file-0201" class="inputfile inputfile-6" />
                                        <label for="file-0201" class="mar-bot-0" style="height: 40px">
                                            <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title">CERTIFICADO DE ESTUDIOS</h5>
                                    <form enctype="multipart/form-data" class="formulario_0202">
                                        <input name="archivo" type="file" id="file-0202" class="inputfile inputfile-6" />
                                        <label for="file-0202" class="mar-bot-0" style="height: 40px">
                                            <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title">GRADO DE INSTRUCCIÓN</h5>
                                    <form enctype="multipart/form-data" class="formulario_0203">
                                        <input name="archivo" type="file" id="file-0203" class="inputfile inputfile-6" />
                                        <label for="file-0203" class="mar-bot-0" style="height: 40px">
                                            <span></span><strong><i class="fa fa-plus"></i> Subir Archivo</strong>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 border-seccion">
                                <div class="js pad-top-10">
                                    <h5 class="input-file-title">HABILIDAD PROFESIONAL</h5>
                                    <form enctype="multipart/form-data" class="formulario_0204">
                                        <input name="archivo" type="file" id="file-0204" class="inputfile inputfile-6" />
                                        <label for="file-0204" class="mar-bot-0" style="height: 40px">
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
</div>
<!--content wrapper-->
<?php } //else ?>

<?php 
 }
?>
<?php require_once 'public/overall/footer-index.php'; ?>
<?php require_once 'public/overall/footer.php'; ?>