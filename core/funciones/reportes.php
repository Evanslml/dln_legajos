<?php


class Reportes
{
	

//Escalafon 01
	Public static function Reporte_Escalafon_01($dni){
		$db = new Conexion();

	    $query="
	    	SELECT 
			A.MPERS_NOMAPE_COMPLETO,
			A.MPERS_FECNAC,B.MDEPA_NOMBRE DEPARTAMENTO,C.MPROV_NOMBRE PROVINCIA,D.MDIST_NOMBRE DISTRITO,A.MPERS_NUMDOC,
			A.MPERS_NACIONAL,E.MTABL_DESCRIP,F.MTABL_DESCRIP,
			G.MTABL_DESCRIP,A.MPERS_PROFESION,A.MPERS_ESPECIALID,A.MPERS_MONTO,
			H.MCARG_NOMBRE,I.MTABL_DESCRIP,J.MTABL_DESCRIP,A.MPERS_NIVREMUN,A.MPERS_FECREGIMEN,
			K.MEST_NOMBRE,L.MUBI_NOMBRE,A.MPERS_NUMUBI,
			A.MPERS_FECINGR,A.MPERS_NUMCONTRA,A.MPERS_NUMRUC,A.MPERS_TELMOVIL
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
			INNER JOIN MESTABLECIMIENTO K ON A.MEST_CODIGO=K.MEST_CODIGO
			INNER JOIN MUBICACION L ON A.MPERS_GRUPOCUPAC=L.MUBI_ID
			WHERE A.MPERS_NUMDOC='$dni' AND A.MPERS_ESTADO='1'
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


	Public static function Distrito_x_Reporte(){
		$db = new Conexion();
	    $query="
			SELECT A.MEST_UBIGEO,B.MDIST_NOMBRE FROM MESTABLECIMIENTO A 
			INNER JOIN MDISTRITO B ON A.MEST_UBIGEO=B.MDIST_ID
			GROUP BY A.MEST_UBIGEO,B.MDIST_NOMBRE
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

	Public static function Establecimiento_x_Reporte(){
		$db = new Conexion();
	    $query="
			SELECT A.MEST_CODIGO,A.MEST_NOMBRE FROM MESTABLECIMIENTO A 
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

// Reporte

	Public static function Reporte_01($NIVEL,$MEST_CODIGO, $MEST_UBIGEO){
		$db = new Conexion();

		switch ($NIVEL) {
			case '1':
			$WHERE="";
			break;

			case '2':
			$WHERE=" AND K.MEST_UBIGEO='$MEST_UBIGEO' ";
			break;

			case '3':
			$WHERE=" AND K.MEST_CODIGO='$MEST_CODIGO' ";
			break;
		}

		$query="
	    	SELECT 
			A.MPERS_NOMAPE_COMPLETO,
			A.MPERS_FECNAC,B.MDEPA_NOMBRE DEPARTAMENTO,C.MPROV_NOMBRE PROVINCIA,D.MDIST_NOMBRE DISTRITO,A.MPERS_NUMDOC,
			A.MPERS_NACIONAL,E.MTABL_DESCRIP,F.MTABL_DESCRIP,
			G.MTABL_DESCRIP,A.MPERS_PROFESION,A.MPERS_ESPECIALID,A.MPERS_MONTO,
			H.MCARG_NOMBRE,I.MTABL_DESCRIP,J.MTABL_DESCRIP,A.MPERS_NIVREMUN,A.MPERS_FECREGIMEN,
			K.MEST_NOMBRE,L.MUBI_NOMBRE,A.MPERS_NUMUBI,
			A.MPERS_FECINGR,A.MPERS_NUMCONTRA,A.MPERS_NUMRUC,A.MPERS_TELMOVIL
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
			INNER JOIN MESTABLECIMIENTO K ON A.MEST_CODIGO=K.MEST_CODIGO
			INNER JOIN MUBICACION L ON A.MPERS_GRUPOCUPAC=L.MUBI_ID
			WHERE A.MPERS_ESTADO='1' 
			". $WHERE;
		
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