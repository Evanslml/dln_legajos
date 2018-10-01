<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

	require_once('../../../../core/core.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'formulario'){

		$data = json_decode($_POST['data1']);

		foreach($data  as $key=>$val){
    	 	switch ($key) {
				case '0':$MPERS_NUMDOC=$val;break;
				case '1':$MCON_FECHA=$val;break;
				case '2':$MCON_NUMERO=$val;break;
				case '3':$MCON_MODALIDAD=$val;break;
				case '4':$MTABLA_ID=$val;break;
				case '5':$MCON_ORIGEN=$val;break;
				case '6':$MPERS_NIVREMUN=$val;break;
				case '7':$MCON_TIPO=$val;break;
				case '8':$MCON_ESTADO=$val;break;
    	 	}//SWITCH
	       	

		} //FOREACH

/*PROCESO DE GUARDADO*/
		$MOBJ_ID='5';
		$Existe_Persona = Resumen::Busqueda_resumen_dni($MPERS_NUMDOC,$MOBJ_ID);
//		$Existe_Persona = Contrato::Busqueda_contratos_dni($MPERS_NUMDOC);
		if($Existe_Persona ==''){
			
			$Contrato= new Contrato(
					$MPERS_NUMDOC,
					//$MCON_FECHA,
					date('Y-m-d', strtotime($MCON_FECHA)),
					$MCON_NUMERO,
					$MCON_MODALIDAD,
					$MTABLA_ID,
					$MCON_ORIGEN,
					$MPERS_NIVREMUN,
					$MCON_TIPO,
					$MCON_ESTADO
			);
			$Contrato->IngresarContrato();

			//echo $Contrato;
		$summary = new Resumen($MPERS_NUMDOC,$MOBJ_ID,'1');
		$summary->In();

		echo '0';
		}else{

		echo '1';
		}

	} //IF ACTION
	else if ($action == 'checkbox'){

		$data2 = json_decode($_POST['data2']);

		$ME_i= 2;
		foreach($data2  as $key=>$val){
    	 	switch ($key) {
				case '0':$MPERS_NUMDOC=$val;break;
				case '1':$nFilas_childs=$val;break;
    	 	}//SWITCH
		} //FOREACH

		$ME_f = $nFilas_childs*3;
		$TMDATA = array_slice($data2, $ME_i, $ME_f);
		$MNUM_ADENDA = array();
		$MFECHA_EMISION = array();
		$MDURACION = array();


		foreach($TMDATA  as $key=>$val){
    	 	if(($key+3)%3 == 0){
    	 			$MNUM_ADENDA[]= $val;
    	 	}if(($key+2)%3 == 0){
    	 			$MFECHA_EMISION[]= $val;
    	 	}if(($key+1)%3 == 0){
    	 			$MDURACION[]= $val;
    	 	}
		}

//		var_dump($MNUM_ADENDA);
//		var_dump($MFECHA_EMISION);
//		var_dump($MDURACION);
		
/*PROCESO DE GUARDADO*/
		$MOBJ_ID='5';
		
		for ($i=0; $i <= ($nFilas_childs-1); $i++) { 
			
			$adendas= new Adenda(
				$MPERS_NUMDOC,
				$MNUM_ADENDA[$i],
				date('Y-m-d', strtotime($MFECHA_EMISION[$i])),
				$MDURACION[$i],
				1
			);
			$adendas->In();
		}	
		echo '0';

	} //IF ACTION
}//ELSE

?>