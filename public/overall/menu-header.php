<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
 
  <!-- Menu Header -->
  <header class="main-header">
 
    <!-- Logo -->
    <a href="<?php echo URL_WEB; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>eg</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo NOMBRE_WEB; ?></b></span>
    </a>
 
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <?php 
          //var_dump($_usuario);
          //var_dump($_ListaUsuario);
          ?>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo URL_VIEW.'bootstrap-default/img/'.$_usuario[$_SESSION['sesion_id']]['MUSU_IMG']; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_NOMBRES'].' '.$_ListaUsuario[$_SESSION['sesion_id']]['MUSU_APELLIDO_PAT'].' '.$_ListaUsuario[$_SESSION['sesion_id']]['MUSU_APELLIDO_MAT']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo URL_VIEW.'bootstrap-default/img/'.$_usuario[$_SESSION['sesion_id']]['MUSU_IMG']; ?>" class="img-circle" alt="User Image">
 
                <p>
                  <?php echo $_usuario[$_SESSION['sesion_id']]['MUSU_NOMBRES']; ?> </br> <?php  echo $_ListaUsuario[$_SESSION['sesion_id']]['MPERF_NOMBRE'];?> </br>
                  <small><b><?php echo $_ListaUsuario[$_SESSION['sesion_id']]['MEST_NOMBRE']?></b></small>
                  <input type="hidden" id="id_establecimiento" value="<?php echo $_ListaUsuario[$_SESSION['sesion_id']]['MEST_CODIGO']?>">
                  
                  <?php
                  $fecha = $_usuario[$_SESSION['sesion_id']]['MUSU_FECINI'];
                  $fecha = $fecha->format('d/m/Y');
                  ?>
                  <small>Miembro desde <?php echo $fecha; ?></small>
                </p>
              </li>
               
              <!-- Menu Body -->
              <!--<li class="user-body">
                
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a target="_blank" href="https://twitter.com/blogueroec">Twitter</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a target="_blank" href="https://plus.google.com/103895538543297304664">Gmail</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a target="_blank" href="https://www.facebook.com/blogueroec">Facebook</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo URL_WEB; ?>usuario" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo URL_WEB; ?>?view=logout&logout=desconectar" class="btn btn-default btn-flat">Desconectar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>