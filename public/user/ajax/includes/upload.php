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
                $file = $MPERS_NUMDOC.'_'.$MARCH_ID.'_'.$file;

                //comprobamos si existe un directorio para subir el archivo
                //si no es así, lo creamos
                if(!is_dir("files/")) 
                    mkdir("files/", 0777);
                //comprobamos si el archivo ha subido

                if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file))
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

/*
        case 'datos':

            $data = json_decode($_POST['data1']);
            foreach($data  as $key=>$val){
                switch ($key) {
                    case '0': $MPERS_NUMDOC=$val;break;
                    case '1': $MADJ_NOMBRES=$val;break;
                    case '2': $MOBJ_ID=$val;break;
                    case '3': $MADJ_URL=$val;break;
                }
            }//FOREACH

            $MADJ_URL = myUrlEncode(eliminar_tildes($MADJ_URL));
            $adjunto = new Adjunto($MPERS_NUMDOC, $MOBJ_ID, $MADJ_NOMBRES, $MADJ_URL, 1);
            $adjunto ->IngresarAdjuntos();

        break;
*/

    } //Switch

}




