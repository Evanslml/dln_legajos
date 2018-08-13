<?php
require_once ('../../../../core/core.php');
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';  
if($action == 'get_provincia'){
	$Id_departamento = $_POST['Id_departamento'];
	$_ListaProvincia=Provincia::listaProvincia($Id_departamento);
	$html= "<option value>Seleccionar Provincia</option>";
	if( !empty($_ListaProvincia)) {
		foreach ($_ListaProvincia as $key => $value) {
			$html.= "<option value='".$value['MPROV_ID']."'>".$value['MPROV_NOMBRE']."</option>";
		}
	}
	echo $html;
}

if($action == 'get_distrito'){
	$Id_provincia = $_POST['Id_provincia'];
	$_ListaDistrito=Distrito::listaDistrito($Id_provincia);
	$html= "<option value>Seleccionar Distrito</option>";
	if( !empty($_ListaDistrito)) {
		foreach ($_ListaDistrito as $key => $value) {
			$html.= "<option value='".$value['MDIST_ID']."'>".$value['MDIST_NOMBRE']."</option>";
		}
	}
	echo $html;
}




?>