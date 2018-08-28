<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

    require_once('../../../core/core.php');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    $data = json_decode($_POST['data1']);

    foreach($data  as $key=>$val){
        switch ($key) {
            case '0': $MUSU_NOMBRES=$val;break;
            case '1': $MUSU_APELLIDO_PAT=$val;break;
            case '2': $MUSU_APELLIDO_MAT=$val;break;
            case '3': $MUSU_DNI=$val;break;
            case '4': $MUSU_CORREO=$val;break;
            case '5': $MUSU_PASSWORD=$val;break;
        }
    }

    $MUSU_PASSWORD=password_hash($MUSU_PASSWORD, PASSWORD_DEFAULT);

    $usuario1 = new Usuario(
        $MUSU_CORREO,
        $MUSU_PASSWORD,
        $MUSU_APELLIDO_PAT,
        $MUSU_APELLIDO_MAT,
        $MUSU_NOMBRES,
        '',
        '',
        '',
        $MUSU_CORREO,
        $MUSU_DNI,
        '',
        '',
        '',
        '',
        '',
        '',
        ''
    );

    $usuario1->Actualizar();


    } //Else

?>