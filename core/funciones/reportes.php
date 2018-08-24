<?php


class Reportes
{
	

//R01
	Public static function Reporte_Escalafon_01($dni){
		$db = new Conexion();

	    $query="
	    	SELECT 
			A.MPERS_NOMAPE_COMPLETO,
			A.MPERS_FECNAC,B.MDEPA_NOMBRE DEPARTAMENTO,C.MPROV_NOMBRE PROVINCIA,D.MDIST_NOMBRE DISTRITO,A.MPERS_NUMDOC,
			A.MPERS_NACIONAL,E.MTABL_DESCRIP,F.MTABL_DESCRIP,A.MPERS_NOMCONYU,
			G.MTABL_DESCRIP,A.MPERS_PROFESION,A.MPERS_ESPECIALID,A.MPERS_MONTO,
			H.MCARG_NOMBRE,I.MTABL_DESCRIP,J.MTABL_DESCRIP,A.MPERS_NIVREMUN,A.MPERS_FECREGIMEN
			FROM MPERSONA A
			INNER JOIN MDEPARTAMENTO B ON A.MDEPA_ID=B.MDEPA_ID
			INNER JOIN MPROVINCIA C ON A.MPROV_ID=C.MPROV_ID
			INNER JOIN MDISTRITO D ON A.MDIST_ID=D.MDIST_ID
			INNER JOIN MTABLA E ON A.MPERS_SEXO=E.MTABL_ID
			INNER JOIN MTABLA F ON A.MPERS_ESTACIVIL=F.MTABL_ID
			INNER JOIN MTABLA G ON A.MPERS_GRADINST=G.MTABL_ID
			INNER JOIN MCARGO H ON A.MCARG_CODIGO=H.MCARG_CODIGO
			INNER JOIN MTABLA I ON A.MPERS_REGPENSION=I.MTABL_ID
			INNER JOIN MTABLA J ON A.MPERS_REGLABORAL=J.MTABL_ID
			WHERE A.MPERS_NUMDOC='$dni'
		";

	    $registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[] = $row;
		      }
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		sqlsrv_close($db);

	}

	Public static function Busqueda_Foto($dni){
		$db = new Conexion();

	    $query="
			SELECT MOBJ_ID,MARCH_ID,MADJ_NOMBRES,MADJ_URL FROM MADJUNTOS WHERE MPERS_NUMDOC='$dni' and MOBJ_ID='0'
		";

	    $registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[] = $row;
		      }
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		sqlsrv_close($db);

	}







}

?>