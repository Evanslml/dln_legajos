<?php
 //configuramos timezone vease http://php.net/manual/en/timezones.php
 date_default_timezone_set('America/Lima');
  
 //definimos ruta y titulo del sitio
 define('URL_VIEW','http://172.16.20.48:8080/dln_legajos/view/');
 define('URL_ADJUNTOS','http://172.16.20.48:8080/dln_legajos/public/user/ajax/includes/files/');
 define('TITLE_WEB','LEGAJOS DIRIS');
 define('URL_WEB','http://172.16.20.48:8080/dln_legajos/');
 define('NOMBRE_WEB','LEGAJOS');
 
 define('WWW','http://www.dirislimanorte.gob.pe/');
 define('FACE','https://www.facebook.com/DIRISLimaNorte/');
 define('YOU','https://www.youtube.com/channel/UCfDJTgs1TWTgZYlmc4CVdMw');
 //definimos url de inicios
 $Extencion = substr(strrchr(__FILE__, '.'), 1);
 //Conexion a la bases de datos
 
 require_once('classConexion/conexion.' . $Extencion);
 require_once('funciones/helpers.' . $Extencion);
 require_once('funciones/usuario.' . $Extencion);
 require_once('funciones/perfil.' . $Extencion);
 require_once('funciones/ubicacion.' . $Extencion);
 require_once('funciones/tablas.' . $Extencion);
 require_once('funciones/persona.' . $Extencion);
 require_once('funciones/prueba.' . $Extencion);
 require_once('funciones/reportes.' . $Extencion);
 require_once('funciones/pagination.' . $Extencion);

 //instaciamos User() para utilizarlo en el sitio
 
 $_usuario = Acceso::Usuario();
 $_ListaUsuario = Acceso::ListaUsuarioPerfil();
 $_ListaDepartamento = Departamento::listaDepartamentos();
 $_ListaEstableciento = Establecimiento::listaEstablecimientos();
 $_ListaUbicacion = Ubicacion::listaGrupoOcupacional();
 $_ListaDistritosLima = Distrito::listaDistritoLima();
 $_ListaCargo = Cargo::listaCargo();
 $_ListaTipo_contrato = Persona::Listar_tipo_contrato();


 

 
?>