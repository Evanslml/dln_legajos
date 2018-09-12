<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

	require_once('../../../../core/core.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'formulario'){

		$data = json_decode($_POST['data1']);

		$CRT_1= 2;
		$TMPDATA1 = array_slice($data, 0, $CRT_1); 

		foreach($TMPDATA1  as $key=>$val){
    	 	switch ($key) {
				case '0': $nFilas_childs = $val;break;
				case '1': $MPERS_NUMDOC = $val;break;
    	 	}//SWITCH
	       	

		} //FOREACH

		/*array 2*/
		$CRT_2 				= $nFilas_childs*2;
		$TMPDATA2 			= array_slice($data, $CRT_1, $CRT_2);
		$MTABL_ID 			= array();
		$MDOC_DESCRIPCION 	= array();

		foreach($TMPDATA2  as $key=>$val){
    	 	if(($key+2)%2 == 0){
    	 			$MTABL_ID[]= $val;
    	 	}if(($key+1)%2 == 0){
    	 			$MDOC_DESCRIPCION[]= $val;
    	 	}
	    }


/*PROCESO DE GUARDADO*/
		$MOBJ_ID='13';
		$Existe_Persona = Resumen::Busqueda_resumen_dni($MPERS_NUMDOC,$MOBJ_ID);
		if($Existe_Persona ==''){

			for ($i=0; $i <= ($nFilas_childs-1); $i++) { 
					
					$documento1= new Documentos(
						$MPERS_NUMDOC,
						$MTABL_ID[$i],
						$MOBJ_ID,
						$MDOC_DESCRIPCION[$i],
						'',
						'1'
					);
					$documento1->In();
			}
		
		$summary = new Resumen($MPERS_NUMDOC,$MOBJ_ID,'1');
		$summary->In();

		echo '0';

		}else{

		echo '1';

		} //IF ACTION
	} //ELSE
}
?>