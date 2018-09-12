<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

	require_once('../../../../core/core.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'formulario'){

		$data = json_decode($_POST['data1']);

		$ME_i= 2;
		$TMPERSONA = array_slice($data, 0, $ME_i); 

		foreach($TMPERSONA  as $key=>$val){
			if($key < $ME_i){
	        	 	switch ($key) {
						case '0': $MPERS_NUMDOC=$val;break;
						case '1': $nFilas_childs=$val;break;
	        	 	}//SWITCH
	       	}

		} //FOREACH

		/*ARRAY 2*/
		$ME_f = $nFilas_childs*4;
		$TMESTUDIOS = array_slice($data, $ME_i, $ME_f);
		$MTABL_ID = array();
		$MESTU_DESC = array();
		$MESTU_ESPE = array();
		$MESTU_UBIC = array();

		foreach($TMESTUDIOS  as $key=>$val){
    	 	if(($key+4)%4 == 0){
    	 			$MTABL_ID[]= $val;
    	 	}if(($key+3)%4 == 0){
    	 			$MESTU_DESC[]= $val;
    	 	}if(($key+2)%4 == 0){
    	 			$MESTU_ESPE[]= $val;
    	 	}if(($key+1)%4 == 0){
    	 			$MESTU_UBIC[]= $val;
    	 	}
	    }

/*PROCESO DE GUARDADO*/
		$MOBJ_ID='3';
		$Existe_Persona = Resumen::Busqueda_resumen_dni($MPERS_NUMDOC,$MOBJ_ID);
		//$Existe_Persona = Estudio::Busqueda_estudios_dni($MPERS_NUMDOC,'E');
		if($Existe_Persona ==''){

		for ($i=0; $i <= ($nFilas_childs-1); $i++) { 
			
				$estudios1= new Estudio(
					$MPERS_NUMDOC,
					$MTABL_ID[$i],
					$MESTU_DESC[$i],
					$MESTU_ESPE[$i],
					$MESTU_UBIC[$i],
					1,
					'E'
				);
				$estudios1->IngresarEstudios();
		}	

		$summary = new Resumen($MPERS_NUMDOC,$MOBJ_ID,'1');
		$summary->In();

		echo '0';
		}else{

		echo '1';
		}

	} //IF ACTION
}//ELSE

?>