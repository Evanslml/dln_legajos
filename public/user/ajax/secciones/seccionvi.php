<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

	require_once('../../../../core/core.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'formulario'){

		$data = json_decode($_POST['data1']);

		$CRT_1= 3;
		$TMPDATA1 = array_slice($data, 0, $CRT_1); 

		foreach($TMPDATA1  as $key=>$val){
    	 	switch ($key) {
				case '0': $nFilas_childs1 = $val;break;
				case '1': $nFilas_childs2 = $val;break;
				case '2': $MPERS_NUMDOC = $val;break;
    	 	}//SWITCH
	       	

		} //FOREACH

		/*array 2*/
		$CRT_2 				= $nFilas_childs1*3;
		$TMPDATA2 			= array_slice($data, $CRT_1, $CRT_2);
		$MTABL_ID1 			= array();
		$MDOC_DESCRIPCION1 	= array();
		$MDOC_ALIAS1 		= array();

		foreach($TMPDATA2  as $key=>$val){
    	 	if(($key+3)%3 == 0){
    	 			$MTABL_ID1[]= $val;
    	 	}if(($key+2)%3 == 0){
    	 			$MDOC_DESCRIPCION1[]= $val;
    	 	}if(($key+1)%3 == 0){
    	 			$MDOC_ALIAS1[]= $val;
    	 	}
	    }

	    $CRT_3 				= $nFilas_childs2*3;
	    $TMPDATA3 			= array_slice($data, $CRT_2+3, $CRT_3);
	    $MTABL_ID2 			= array();
		$MDOC_DESCRIPCION2 	= array();
		$MDOC_ALIAS2 		= array();

	    foreach($TMPDATA3  as $key=>$val){
    	 	if(($key+3)%3 == 0){
    	 			$MTABL_ID2[]= $val;
    	 	}if(($key+2)%3 == 0){
    	 			$MDOC_DESCRIPCION2[]= $val;
    	 	}if(($key+1)%3 == 0){
    	 			$MDOC_ALIAS2[]= $val;
    	 	}
	    }

/*PROCESO DE GUARDADO*/
		$MOBJ_ID='7';
		$Existe_Persona = Resumen::Busqueda_resumen_dni($MPERS_NUMDOC,$MOBJ_ID);
		if($Existe_Persona ==''){

			for ($i=0; $i <= ($nFilas_childs1-1); $i++) { 
					
					$documento1= new Documentos(
						$MPERS_NUMDOC,
						$MTABL_ID1[$i],
						$MOBJ_ID,
						$MDOC_DESCRIPCION1[$i],
						$MDOC_ALIAS1[$i],
						'1'
					);
					$documento1->In();
			}

			for ($n=0; $n <= ($nFilas_childs2-1); $n++) { 
					
					$documento2= new Documentos(
						$MPERS_NUMDOC,
						$MTABL_ID2[$n],
						$MOBJ_ID,
						$MDOC_DESCRIPCION2[$n],
						$MDOC_ALIAS2[$n],
						'1'
					);
					$documento2->In();
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