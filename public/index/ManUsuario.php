<?php
require_once 'public/overall/header.php'; 
   if (!isset($_SESSION['sesion_id'])){
    include('public/overall/nosesion.php');
   }
 else { ?>
<?php include 'public/overall/menu-header.php'; ?>
<?php include 'public/overall/menu-aside.php'; ?>
<script src="./view/bootstrap-default/js/usuarios.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
 
      <div class="row">

        <div class="col-md-12">
          <h3><i class="fa fa-edit"></i>Modificar datos de Usuario</h3>
        </div>
 
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
              <img src="<?php echo URL_VIEW.'bootstrap-default/img/'.$_usuario[$_SESSION['sesion_id']]['MUSU_IMG']; ?>" class="user-panel"/>
            </div>

            <div class="col-md-9 col-sm-9 col-xs-12 content">
              <form class="form-horizontal mantenimiento_usuario">
                <div class="form-group">
                  <label class="col-lg-3 control-label">Nombres:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="u_nombre" id="u_nombre" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_NOMBRES'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Apellido Paterno:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="u_apellido_p" id="u_apellido_p" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_APELLIDO_PAT'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Apellido Materno:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="u_apellido_m" id="u_apellido_m" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_APELLIDO_MAT'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">DNI:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="u_dni" id="u_dni" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_DNI'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Correo:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="u_usuario" id="u_usuario" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_LOGIN'];?>" disabled="true">
                    <input type="hidden" name="email" id="email" value="<?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_LOGIN'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Cambiar Contraseña:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="password" name="u_pass_1" id="u_pass_1" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Repetir contraseña:</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="password" name="u_pass_2" id="u_pass_2" value="">
                    <input class="form-control" type="hidden" name="form_perfil" id="form_perfil" value="1">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label"></label>
                  <div class="col-lg-8">
                    <div class="btn btn-primary"><a href="#" style="color: #fff;" class="save_user">Guardar</a></div>
                    <input type="reset" class="btn btn-default" value="Cancel" id="cancel_user">
                    <a href="index.php" class="hide salir">Salir</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
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