<?php

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    //estado_servidor('Error! Metodo de ingreso invalido!');
    echo 'Error! Metodo de ingreso invalido!';
}else{

	require_once('../../../../core/core.php');
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	$tipo = (isset($_REQUEST['tipo'])&& $_REQUEST['tipo'] !=NULL)?$_REQUEST['tipo']:'';

	if($action == 'formulario'){

		$data = json_decode($_POST['data1']);

		$DMP= 37;
		$TMPERSONA = array_slice($data, 0, $DMP); 

		foreach($TMPERSONA  as $key=>$val){
			if($key <= $DMP){
	        	 	switch ($key) {
						case '0': $MPERS_APEPAT=$val;break;
						case '1': $MPERS_APEMAT=$val;break;
						case '2': $MPERS_NOMBRES=$val;break;
						case '3': $MPERS_TIPDOC=$val;break;
						case '4': $MPERS_NUMDOC=$val;break;
						case '5': $MPERS_TIPOPER=$val;break;
						case '6': $MDEPA_ID=$val;break;
						case '7': $MPROV_ID=$val;break;
						case '8': $MDIST_ID=$val;break;
						case '9': $MPERS_FECNAC=$val;break;
						case '10': $MPERS_NACIONAL=$val;break;
						case '11': $MPERS_SEXO=$val;break;
						case '12': $MPERS_ESTACIVIL=$val;break;
						case '13': $MPERS_NOMCONYU=$val;break;
						case '14': $MPERS_GRADINST=$val;break; 
						case '15': $MPERS_PROFESION=$val;break; 
						case '16': $MPERS_ESPECIALID=$val;break; 
						case '17': $MPERS_MONTO=$val;break; 
						case '18': $MCARG_CODIGO=$val;break; 
						case '19': $MPERS_REGPENSION=$val;break;
						case '20': $MPERS_REGLABORAL=$val;break; 
						case '21': $MPERS_NIVREMUN=$val;break; 
						case '22': $MPERS_FECREGIMEN=$val;break; 
						case '23': $MEST_CODIGO=$val;break;
						case '24': $MPERS_EMAIL=$val;break; 
						case '25': $MPERS_GRUPOCUPAC=$val;break;
						case '26': $MPERS_NUMUBI=$val;break;
						case '27': $MPERS_FECINGR=$val;break; 
						case '28': $MPERS_NUMCONTRA=$val;break; 
						case '29': $MPERS_NUMRUC=$val;break; 
						case '30': $MPERS_TELMOVIL=$val;break;
						case '31': $MPERS_NOMPADRE=$val;break;
						case '32': $MPERS_NOMMADRE=$val;break;
						case '33': $MPERS_DOMPADRES=$val;break;
						case '34': $MPERS_TELPADRES=$val;break;
						case '35': $nFilas_address=$val;break;
						case '36': $nFilas_childs=$val;break;

	        	 	}//SWITCH
	       	}

		} //FOREACH

		/*ARRAY 2*/
		$DMD = $nFilas_address*4;
		$TMDOMICILIO = array_slice($data, 37, $DMD); 
		$A_MDOM_NOMBRE = array();
		$A_MDIST_ID = array();
		$A_MDOM_REFERENCIA = array();
		$A_MDOM_TELFIJO = array();

		foreach($TMDOMICILIO  as $key=>$val){
    	 	if(($key+4)%4 == 0){
    	 			$A_MDOM_NOMBRE[]= $val;
    	 	}if(($key+3)%4 == 0){
    	 			$A_MDIST_ID[]= $val;
    	 	}if(($key+2)%4 == 0){
    	 			$A_MDOM_REFERENCIA[]= $val;
    	 	}if(($key+1)%4 == 0){
    	 			$A_MDOM_TELFIJO[]= $val;
    	 	}
	    }

	    /*ARRAY 3*/
	    $DMF_i = 37+$DMD;
	    $DMF_f = $nFilas_childs*5;
	    $TMFILIAL = array_slice($data, $DMF_i, $DMF_f);
	    $C_MFIL_APEHIJO = array();
	    $C_MFIL_NOMHIJO = array();
		$C_MFIL_FECNAC = array();
		$C_MFIL_SEXO = array();
		$C_MFIL_ESSALUD = array();

	    foreach($TMFILIAL  as $key=>$val){
    	 	if(($key+5)%5 == 0){
    	 			$C_MFIL_APEHIJO[]= $val;
    	 	}if(($key+4)%5 == 0){
    	 			$C_MFIL_NOMHIJO[]= $val;
    	 	}if(($key+3)%5 == 0){
    	 			$C_MFIL_FECNAC[]= $val;
    	 	}if(($key+2)%5 == 0){
    	 			$C_MFIL_SEXO[]= $val;
    	 	}if(($key+1)%5 == 0){
    	 			$C_MFIL_ESSALUD[]= $val;
    	 	}
	    }


/*PROCESO DE GUARDADO*/
		$MOBJ_ID='2';

			if($tipo == '0'){ //NEW
				$Existe_Persona = Resumen::Busqueda_resumen_dni($MPERS_NUMDOC,$MOBJ_ID);
				if($Existe_Persona ==''){
		
				/*   	$MPERS_APEPAT='demo';*/
				/*    	$MPERS_APEMAT='demo';*/
				/*    	$MPERS_NOMBRES='demo demo';*/
				/*    	$MPERS_TIPDOC='1';*/
				/*    	$MPERS_NUMDOC='46876484';*/
				/*    	$MPERS_TIPOPER='1';*/
				/*    	$MDEPA_ID='08';*/
				/*    	$MPROV_ID='1243';*/
				/*		$MDIST_ID='123456';*/
				/*		$MPERS_FECNAC='2018-03-01';*/
				/*		$MPERS_NACIONAL='PERUANA';*/
				/*		$MPERS_SEXO='8';*/
				/*		$MPERS_ESTACIVIL='4';*/
				/*		$MPERS_NOMCONYU='';*/
						/*$MPERS_GRADINST='4';*/
				/*		$MPERS_PROFESION='DEMO';*/
				/*		$MPERS_ESPECIALID='';*/
				/*		$MPERS_MONTO='1500.00';*/
				/*		$MCARG_CODIGO='5';*/
				/*		$MPERS_REGPENSION='4';*/
				/*		$MPERS_REGLABORAL='3';*/
				/*		$MPERS_NIVREMUN='ASD';*/
				/*		$MPERS_FECREGIMEN='2018-05-09';*/
				/*		$MEST_CODIGO='05822';*/
				/*		$MPERS_EMAIL='JIVANCPLML@GMAIL.COM';*/
				/*		$MPERS_GRUPOCUPAC='3';*/
				/*		$MPERS_NUMUBI='121';*/
				/*		$MPERS_FECINGR='2018-09-12';*/
						/*$MPERS_NUMCONTRA='800';*/
				/*		$MPERS_NUMRUC='10468764844';*/
				/*		$MPERS_TELMOVIL='987898767';*/
				/*		$MPERS_NOMPADRE='DEMO DEMO DEMO';*/
				/*		$MPERS_NOMMADRE='DEMO DEMO DEMO DEMO';*/
				/*		$MPERS_DOMPADRES='DOMICILIO';*/
				/*		$MPERS_TELPADRES='1212121221';*/
						$MPERS_ESTADO='1';
						$MPERS_NOMAPE_COMPLETO= $MPERS_APEPAT.' '.$MPERS_APEMAT.' '.$MPERS_NOMBRES;
						$MPERS_FECINS=get_datetodayhour();
						$MPERS_FECACT='';
						$MPERS_USERINS=$_SESSION['sesion_id'];
						$MPERS_USERACT='';
						$MPERS_HOST=get_client_ip();
						$MPERS_IMAGEN='';
		
						$persona1 = new Persona(
							$MPERS_APEPAT, 
							$MPERS_APEMAT, 
							$MPERS_NOMBRES, 
							$MPERS_TIPDOC, 
							$MPERS_NUMDOC, 
							$MPERS_TIPOPER, 
							$MDEPA_ID, 
							$MPROV_ID,
							$MDIST_ID, 
							date('Y-m-d', strtotime($MPERS_FECNAC)),
							$MPERS_NACIONAL, 
							$MPERS_SEXO, 
							$MPERS_ESTACIVIL, 
							$MPERS_NOMCONYU, 
							$MPERS_GRADINST, 
							$MPERS_PROFESION, 
							$MPERS_ESPECIALID, 
							$MPERS_MONTO, 
							$MCARG_CODIGO, 
							$MPERS_REGPENSION, 
							$MPERS_REGLABORAL, 
							$MPERS_NIVREMUN, 
							date('Y-m-d', strtotime($MPERS_FECREGIMEN)),
							$MEST_CODIGO, 
							$MPERS_EMAIL, 
							$MPERS_GRUPOCUPAC, 
							$MPERS_NUMUBI, 
							date('Y-m-d', strtotime($MPERS_FECINGR)),
							$MPERS_NUMCONTRA, 
							$MPERS_NUMRUC, 
							$MPERS_TELMOVIL,
							$MPERS_NOMPADRE, 
							$MPERS_NOMMADRE, 
							$MPERS_DOMPADRES, 
							$MPERS_TELPADRES, 
							$MPERS_ESTADO, 
							$MPERS_NOMAPE_COMPLETO, 
							$MPERS_FECINS, 
							$MPERS_FECACT, 
							$MPERS_USERINS, 
							$MPERS_USERACT, 
							$MPERS_HOST,
							$MPERS_IMAGEN
						);
					   $persona1 ->IngresarPersona();
		
						for ($i=0; $i <= ($nFilas_address-1); $i++) { 
							$domicilio1 = new Domicilio(
								$MPERS_NUMDOC,
								$A_MDOM_NOMBRE[$i],
								$A_MDIST_ID[$i],
								$A_MDOM_REFERENCIA[$i],
								$A_MDOM_TELFIJO[$i],
								1
							);
							$domicilio1->IngresarDomicilio();
						}
		
						for ($i=0; $i <= ($nFilas_childs-1); $i++) { 
							if($C_MFIL_APEHIJO[$i] !=='' && $C_MFIL_NOMHIJO[$i] !==''){
								$filial1 = new Filial(
									$MPERS_NUMDOC,
									$C_MFIL_APEHIJO[$i],
									$C_MFIL_NOMHIJO[$i],
									//$C_MFIL_FECNAC[$i],
									date('Y-m-d', strtotime($C_MFIL_FECNAC[$i])),
									$C_MFIL_SEXO[$i],
									$C_MFIL_ESSALUD[$i],
									1
								);
								$filial1->IngresarFilial();
							}
						}	
		
						$summary = new Resumen($MPERS_NUMDOC,$MOBJ_ID,'1');
						$summary->In();
		
						echo '0'; //Se ingreso correctamente
				}else{
					echo '1'; //Ya Existe el usuario
				} //*FIN EXISTE*/
			}else{

				$EliminarPersona = Persona::EliminarPersona($MPERS_NUMDOC);
				$EliminarDomicilio = Domicilio::EliminarDomicilio($MPERS_NUMDOC);
				$EliminarFilial = Filial::EliminarFilial($MPERS_NUMDOC);

				$MPERS_ESTADO='1';
				$MPERS_NOMAPE_COMPLETO= $MPERS_APEPAT.' '.$MPERS_APEMAT.' '.$MPERS_NOMBRES;
				$MPERS_FECINS=get_datetodayhour();
				$MPERS_FECACT='';
				$MPERS_USERINS=$_SESSION['sesion_id'];
				$MPERS_USERACT='';
				$MPERS_HOST=get_client_ip();
				$MPERS_IMAGEN='';

				$persona1 = new Persona(
					$MPERS_APEPAT, 
					$MPERS_APEMAT, 
					$MPERS_NOMBRES, 
					$MPERS_TIPDOC, 
					$MPERS_NUMDOC, 
					$MPERS_TIPOPER, 
					$MDEPA_ID, 
					$MPROV_ID,
					$MDIST_ID, 
					date('Y-m-d', strtotime($MPERS_FECNAC)),
					$MPERS_NACIONAL, 
					$MPERS_SEXO, 
					$MPERS_ESTACIVIL, 
					$MPERS_NOMCONYU, 
					$MPERS_GRADINST, 
					$MPERS_PROFESION, 
					$MPERS_ESPECIALID, 
					$MPERS_MONTO, 
					$MCARG_CODIGO, 
					$MPERS_REGPENSION, 
					$MPERS_REGLABORAL, 
					$MPERS_NIVREMUN, 
					date('Y-m-d', strtotime($MPERS_FECREGIMEN)),
					$MEST_CODIGO, 
					$MPERS_EMAIL, 
					$MPERS_GRUPOCUPAC, 
					$MPERS_NUMUBI, 
					date('Y-m-d', strtotime($MPERS_FECINGR)),
					$MPERS_NUMCONTRA, 
					$MPERS_NUMRUC, 
					$MPERS_TELMOVIL,
					$MPERS_NOMPADRE, 
					$MPERS_NOMMADRE, 
					$MPERS_DOMPADRES, 
					$MPERS_TELPADRES, 
					$MPERS_ESTADO, 
					$MPERS_NOMAPE_COMPLETO, 
					$MPERS_FECINS, 
					$MPERS_FECACT, 
					$MPERS_USERINS, 
					$MPERS_USERACT, 
					$MPERS_HOST,
					$MPERS_IMAGEN
				);
				$persona1 ->IngresarPersona();

				for ($i=0; $i <= ($nFilas_address-1); $i++) { 
					$domicilio1 = new Domicilio(
						$MPERS_NUMDOC,
						$A_MDOM_NOMBRE[$i],
						$A_MDIST_ID[$i],
						$A_MDOM_REFERENCIA[$i],
						$A_MDOM_TELFIJO[$i],
						1
					);
					$domicilio1->IngresarDomicilio();
				}

				for ($i=0; $i <= ($nFilas_childs-1); $i++) { 
					if($C_MFIL_APEHIJO[$i] !=='' && $C_MFIL_NOMHIJO[$i] !==''){
						$filial1 = new Filial(
							$MPERS_NUMDOC,
							$C_MFIL_APEHIJO[$i],
							$C_MFIL_NOMHIJO[$i],
							//$C_MFIL_FECNAC[$i],
							date('Y-m-d', strtotime($C_MFIL_FECNAC[$i])),
							$C_MFIL_SEXO[$i],
							$C_MFIL_ESSALUD[$i],
							1
						);
						$filial1->IngresarFilial();
					}
				}	
				echo '0'; //Se ingreso correctamente
			}

	} //IF ACTION
}//ELSE

?>