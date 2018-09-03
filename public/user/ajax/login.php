<?php

//verificamos que se haya enviado via post
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    estado_servidor('Error! Metodo de ingreso invalido!');
}
//instaciamos la conexion
$db = new Conexion();
$email = $_POST['user']; 
$pass = strip_tags($_POST['pass']);

$b_user = "SELECT TOP 1 * FROM MUSUARIO WHERE MUSU_LOGIN='$email' AND MUSU_ESTADO='1'";
$result = sqlsrv_query($db->getConecta(), $b_user);
if( $result === false) { die( print_r( sqlsrv_errors(), true) ); }

$listado= array();
$i=0;
while($row= sqlsrv_fetch_array($result)){
  $key = $i;
  $listado[$key][0]=$row['MUSU_ID'];
  $listado[$key][1]=$row['MUSU_LOGIN'];
  $listado[$key][2]=$row['MUSU_PASSWORD'];
  $listado[$key][3]=$row['MUSU_APELLIDO_PAT'];
  $listado[$key][4]=$row['MUSU_APELLIDO_MAT'];
  $listado[$key][5]=$row['MUSU_NOMBRES'];
  $listado[$key][6]=$row['MPERF_ID'];
  $i++;
}

//var_dump($listado);
//var_dump($_usuario);

$query = sqlsrv_query($db->getConecta(), $b_user, array(), array( "Scrollable" => 'static' ));
$row_count = sqlsrv_num_rows( $query );   
// if ($row_count === false)
//    echo "Error in retrieveing row count.";
// else
//    echo $row_count;


    if(($email != '') && ($pass != ''))
    {//vaildar datos
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {//validar mail
          if($row_count>0)
          {//buscamos email
              if(password_verify($pass, $listado[0][2]))
              {//buscamos pass
                //declaramos variables todo OK
                $_SESSION['sesion_id'] = $listado[0][0];
                $_SESSION['login'] = $listado[0][1];
                $_SESSION['sesion_perfil'] = $listado[0][6];
                if($_POST['sesion']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); 
                } //Segundos 
                $message = 1;
              }//fin de buscar pass
              else
              {
                  $message ='<div class="alert alert-form alert-warning text-xs-center">Verifique contraseña.</div>';
                  $auditor1 = new Auditor('0','Verifique contraseña',$email,'0',get_datetodayhour(),get_client_ip());
                  $auditor1->In();
              }
          }//fin de buscar email
          else
          {
              $message ='<div class="alert alert-form alert-danger text-xs-center">Email deshabilitado o no existe en nuestro sistema.</div>';
              $auditor1 = new Auditor('0','Email deshabilitado',$email,'0',get_datetodayhour(),get_client_ip());
              $auditor1->In();
          }
        }//fin validar mail
        else
        {
          $message = '<div class="alert alert-form alert-danger text-xs-center">Email inválido.</div>';
          $auditor1 = new Auditor('0','Email inválido',$email,'0',get_datetodayhour(),get_client_ip());
          $auditor1->In();
        }
    }//fin validar datos
    else
    {
        $message = '<div class="alert alert-form alert-danger text-xs-center">Deberas llenar todos los campos.</div>';
    }
 
echo $message;


function estado_servidor($str){
    echo json_encode(array('estado'=>$str));
    exit;
}
?>