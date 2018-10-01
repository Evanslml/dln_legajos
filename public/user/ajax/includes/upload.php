<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    estado_servidor('Error! Metodo de ingreso invalido!');

}else{
    require_once('../../../../core/core.php');
    $type = isset($_GET['type']) ?  $_GET['type'] : 'default';

    switch($type){
        case 'data_imagen':
            //comprobamos que sea una petición ajax
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            {
                //obtenemos el archivo a subir
                //$file = $_FILES['archivo']['name'];
                $MPERS_NUMDOC = $_POST['MPERS_NUMDOC'];
                $MADJ_NOMBRES = $_POST['MADJ_NOMBRES'];
                $MOBJ_ID = $_POST['MOBJ_ID'];
                $MADJ_URL = $_POST['MADJ_URL'];
                $MARCH_ID = $_POST['MARCH_ID'];
                $file = myUrlEncode(eliminar_tildes($_FILES['archivo']['name']));
                $time = time();
                $file = $MPERS_NUMDOC.'_'.$MARCH_ID.'_'.$file.'_'.$time;
                //comprobamos si existe un directorio para subir el archivo
                //si no es así, lo creamos
                if(!is_dir("files/".$MPERS_NUMDOC."")) 
                    mkdir("files/".$MPERS_NUMDOC."", 0777);
                //comprobamos si el archivo ha subido
                if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$MPERS_NUMDOC."/".$file))
                {
                   sleep(3);//retrasamos la petición 3 segundos
                   echo $file;//devolvemos el nombre del archivo para pintar la imagen
                }
                $adjunto = new Adjunto($MPERS_NUMDOC, $MOBJ_ID, $MARCH_ID, $MADJ_NOMBRES, $file, 1);
                $adjunto ->IngresarAdjuntos();
            }else{
                throw new Exception("Error Processing Request", 1);   
            }

        break;

        case 'data_foto':
            //comprobamos que sea una petición ajax
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            {
                //obtenemos el archivo a subir
                //$file = $_FILES['archivo']['name'];
                $MPERS_NUMDOC = $_POST['MPERS_NUMDOC'];
                $MADJ_NOMBRES = $_POST['MADJ_NOMBRES'];
                $MOBJ_ID = $_POST['MOBJ_ID'];
                $MADJ_URL = $_POST['MADJ_URL'];
                $MARCH_ID = $_POST['MARCH_ID'];
                $file = myUrlEncode(eliminar_tildes($_FILES['archivo']['name']));
                $time = time();
                $file = $MPERS_NUMDOC.'_'.$MARCH_ID.'_'.$file.'_'.$time;
                //comprobamos si existe un directorio para subir el archivo
                //si no es así, lo creamos
                if(!is_dir("files/".$MPERS_NUMDOC."")) 
                    mkdir("files/".$MPERS_NUMDOC."", 0777);
                //comprobamos si el archivo ha subido
                if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$MPERS_NUMDOC."/".$file))
                {
                   sleep(3);//retrasamos la petición 3 segundos
                   echo $file;//devolvemos el nombre del archivo para pintar la imagen
                }
                $adjunto = new Adjunto($MPERS_NUMDOC, $MOBJ_ID, $MARCH_ID, $MADJ_NOMBRES, $file, 1);
                $adjunto ->IngresarAdjuntos();
                $adjunto ->IngresarFoto();

            }else{
                throw new Exception("Error Processing Request", 1);   
            }

        break;


    } //Switch

}




