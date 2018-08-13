<?php

class Departamento{
	
	public static function listaDepartamentos() { 
	    $db = new Conexion();
	    $query="SELECT *  FROM MDEPARTAMENTO WHERE MDEPA_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $departamento = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $departamento[$row['MDEPA_ID']] = $row;
	          }
	         // return $departamento;
	      }
	    if (!isset($departamento)) {$departamento='';}
	    return $departamento;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}


}


class Provincia{

	public static function listaProvincia($Id_departamento) { 
	    $db = new Conexion();
	    $query="SELECT B.MPROV_ID,B.MDEPA_ID,B.MPROV_NOMBRE,B.MPROV_ESTADO FROM MDEPARTAMENTO A
		INNER JOIN MPROVINCIA B
		ON A.MDEPA_ID=B.MDEPA_ID
		WHERE A.MDEPA_ID='$Id_departamento'
		AND A.MDEPA_ESTADO='1' AND B.MPROV_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $provincia = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $provincia[$row['MPROV_ID']] = $row;
	          }
	         // return $provincia;
	      }
	    if (!isset($provincia)) {$provincia='';}
	    return $provincia;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}
}


class Distrito{

	public static function listaDistrito($Id_provincia) { 
	    $db = new Conexion();
	    $query="SELECT B.MDIST_ID,B.MPROV_ID,B.MDIST_NOMBRE,B.MDIST_ESTADO FROM MPROVINCIA A
		INNER JOIN MDISTRITO B
		ON A.MPROV_ID=B.MPROV_ID
		WHERE A.MPROV_ID='$Id_provincia'
		AND A.MPROV_ESTADO='1' AND B.MDIST_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $distrito = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $distrito[$row['MDIST_ID']] = $row;
	          }
	      }
	    if (!isset($distrito)) {$distrito='';}
	    return $distrito;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}

	public static function listaDistritoLima() { 
	    $db = new Conexion();
	    $query="SELECT B.MDIST_ID,B.MPROV_ID,B.MDIST_NOMBRE,B.MDIST_ESTADO 
		FROM MPROVINCIA A
		INNER JOIN MDISTRITO B
		ON A.MPROV_ID=B.MPROV_ID
		WHERE A.MDEPA_ID='15' AND MDIST_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $distrito = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $distrito[$row['MDIST_ID']] = $row;
	          }
	      }
	    if (!isset($distrito)) {$distrito='';}
	    return $distrito;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}
}


class Establecimiento{

	public static function listaEstablecimientos() { 
	    $db = new Conexion();
	    $query="SELECT MEST_ORDEN,MEST_CODIGO,MEST_NOMBRE,MEST_UBIGEO,MEST_ESTADO 
		FROM MESTABLECIMIENTO /*WHERE MEST_PADRE IN ('100','101','102')*/";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $distrito = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $distrito[$row['MEST_ORDEN']] = $row;
	          }
	      }
	    if (!isset($distrito)) {$distrito='';}
	    return $distrito;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}
}

class Ubicacion{

	public static function listaGrupoOcupacional() { 
	    $db = new Conexion();
	    $query="SELECT MUBI_ID,MUBI_ALIAS,MUBI_NOMBRE,MDEPA_ESTADO 
		FROM dbo.MUBICACION WHERE MDEPA_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $distrito = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $distrito[$row['MUBI_ID']] = $row;
	          }
	      }
	    if (!isset($distrito)) {$distrito='';}
	    return $distrito;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}
}

class Cargo{

	public static function listaCargo() { 
	    $db = new Conexion();
	    $query="SELECT MCARG_ID,MCARG_CODIGO,MCARG_NOMBRE,MCARG_ESTADO 
		FROM MCARGO
		WHERE MCARG_ESTADO='1'";
	    $registros = sqlsrv_query($db->getConecta(), $query);
	    if($registros === false ){
	      $cargo = false;
	    } else {
	      while($row= sqlsrv_fetch_array($registros)) {
	          $cargo[$row['MCARG_ID']] = $row;
	          }
	      }
	    if (!isset($cargo)) {$cargo='';}
	    return $cargo;
	    sqlsrv_free_stmt( $registros);
	    sqlsrv_close($db);
	}
}


?>