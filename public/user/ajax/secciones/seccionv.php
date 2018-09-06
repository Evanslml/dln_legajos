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
				case '0': $MPERS_NUMDOC1 = $val;break;
				case '1': $MREN_FECRESOL1 = $val;break;
				case '2': $MREN_FECINIRESOL1 = $val;break;
				case '3': $MREN_FECCESE1 = $val;break;
				case '4': $MREN_NUMRESOL1 = $val;break;
				case '5': $MTABLA_ID1 = $val;break;
				case '6': $MREN_MOTIVO1 = $val;break;
				case '7': $MREN_TIPO1 = $val;break;
				case '8': $MREN_IDTIPO1 = $val;break;
				case '9': $MREN_ESTADO1 = $val;break;

				case '10': $MPERS_NUMDOC2 = $val;break;
				case '11': $MREN_FECRESOL2 = $val;break;
				case '12': $MREN_FECINIRESOL2 = $val;break;
				case '13': $MREN_FECCESE2 = $val;break;
				case '14': $MREN_NUMRESOL2 = $val;break;
				case '15': $MTABLA_ID2 = $val;break;
				case '16': $MREN_MOTIVO2 = $val;break;
				case '17': $MREN_TIPO2 = $val;break;
				case '18': $MREN_IDTIPO2 = $val;break;
				case '19': $MREN_ESTADO2 = $val;break;

				case '20': $MPERS_NUMDOC3 = $val;break;
				case '21': $MREN_FECRESOL3 = $val;break;
				case '22': $MREN_FECINIRESOL3 = $val;break;
				case '23': $MREN_FECCESE3 = $val;break;
				case '24': $MREN_NUMRESOL3 = $val;break;
				case '25': $MTABLA_ID3 = $val;break;
				case '26': $MREN_MOTIVO3 = $val;break;
				case '27': $MREN_TIPO3 = $val;break;
				case '28': $MREN_IDTIPO3 = $val;break;
				case '29': $MREN_ESTADO3 = $val;break;

				case '30': $MPERS_NUMDOC4 = $val;break;
				case '31': $MREN_FECRESOL4 = $val;break;
				case '32': $MREN_FECINIRESOL4 = $val;break;
				case '33': $MREN_FECCESE4 = $val;break;
				case '34': $MREN_NUMRESOL4 = $val;break;
				case '35': $MTABLA_ID4 = $val;break;
				case '36': $MREN_MOTIVO4 = $val;break;
				case '37': $MREN_TIPO4 = $val;break;
				case '38': $MREN_IDTIPO4 = $val;break;
				case '39': $MREN_ESTADO4 = $val;break;

    	 	}//SWITCH
	       	

		} //FOREACH

/*PROCESO DE GUARDADO*/
		
		if(!empty($MREN_FECRESOL1)){ $MREN_FECRESOL1 = date('Y-m-d', strtotime($MREN_FECRESOL1)); }
		if(!empty($MREN_FECINIRESOL1)){ $MREN_FECINIRESOL1 = date('Y-m-d', strtotime($MREN_FECINIRESOL1)); }
		if(!empty($MREN_FECCESE1)){ $MREN_FMREN_FECCESE1 = date('Y-m-d', strtotime($MREN_FECCESE1)); }

		if(!empty($MREN_FECRESOL2)){ $MREN_FECRESOL2 = date('Y-m-d', strtotime($MREN_FECRESOL2)); }
		if(!empty($MREN_FECINIRESOL2)){ $MREN_FECINIRESOL2 = date('Y-m-d', strtotime($MREN_FECINIRESOL2)); }
		if(!empty($MREN_FECCESE2)){ $MREN_FECCESE2 = date('Y-m-d', strtotime($MREN_FECCESE2)); }

		if(!empty($MREN_FECRESOL3)){ $MREN_FECRESOL3 = date('Y-m-d', strtotime($MREN_FECRESOL3)); }
		if(!empty($MREN_FECINIRESOL3)){ $MREN_FECINIRESOL3 = date('Y-m-d', strtotime($MREN_FECINIRESOL3)); }
		if(!empty($MREN_FECCESE3)){ $MREN_FECCESE3 = date('Y-m-d', strtotime($MREN_FECCESE3)); }

		if(!empty($MREN_FECRESOL4)){ $MREN_FECRESOL4 = date('Y-m-d', strtotime($MREN_FECRESOL4)); }
		if(!empty($MREN_FECINIRESOL4)){ $MREN_FECINIRESOL4 = date('Y-m-d', strtotime($MREN_FECINIRESOL4)); }
		if(!empty($MREN_FECCESE4)){ $MREN_FECCESE4 = date('Y-m-d', strtotime($MREN_FECCESE4)); }

		$Existe_Persona = Renuncia::Busqueda_renuncia_dni($MPERS_NUMDOC1);
		if($Existe_Persona ==''){


			$Renuncia1= new Renuncia(
				$MPERS_NUMDOC1,
				$MREN_FECRESOL1,
				$MREN_FECINIRESOL1,
				$MREN_FECCESE1,
				$MREN_NUMRESOL1,
				$MTABLA_ID1,
				$MREN_MOTIVO1,
				$MREN_TIPO1,
				$MREN_IDTIPO1,
				$MREN_ESTADO1
			);
			
			if(!empty($MPERS_NUMDOC1)){$Renuncia1->IngresarRenuncia();}

			$Renuncia2= new Renuncia(
				$MPERS_NUMDOC2,
				$MREN_FECRESOL2,
				$MREN_FECINIRESOL2,
				$MREN_FECCESE2,
				$MREN_NUMRESOL2,
				$MTABLA_ID2,
				$MREN_MOTIVO2,
				$MREN_TIPO2,
				$MREN_IDTIPO2,
				$MREN_ESTADO2
			);

			if(!empty($MPERS_NUMDOC2)){$Renuncia2->IngresarRenuncia();}

			$Renuncia3= new Renuncia(
				$MPERS_NUMDOC3,
				$MREN_FECRESOL3,
				$MREN_FECINIRESOL3,
				$MREN_FECCESE3,
				$MREN_NUMRESOL3,
				$MTABLA_ID3,
				$MREN_MOTIVO3,
				$MREN_TIPO3,
				$MREN_IDTIPO3,
				$MREN_ESTADO3
			);

			if(!empty($MPERS_NUMDOC3)){$Renuncia3->IngresarRenuncia();}

			$Renuncia4= new Renuncia(
				$MPERS_NUMDOC4,
				$MREN_FECRESOL4,
				$MREN_FECINIRESOL4,
				$MREN_FECCESE4,
				$MREN_NUMRESOL4,
				$MTABLA_ID4,
				$MREN_MOTIVO4,
				$MREN_TIPO4,
				$MREN_IDTIPO4,
				$MREN_ESTADO4
			);

			if(!empty($MPERS_NUMDOC4)){$Renuncia4->IngresarRenuncia();}

			$summary = new Resumen($MPERS_NUMDOC,'6','1');
			$summary->In();

			echo '0';
		}else{

		echo '1';
		}

	} //IF ACTION
}//ELSE

?>