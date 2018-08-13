<?php

class Tabla
{
	
	public static function Lista($id){
		$db = new Conexion();
		$query="SELECT MTABL_ID,MTABL_TIPO,MTABL_DESCRIP,MTABL_ABREVIA,MTABL_IDPADRE,MTABL_NORDEN,MTABL_ESTADO 
		FROM MTABLA WHERE MTABL_ESTADO='1' AND MTABL_IDPADRE='$id' 
		ORDER BY MTABL_NORDEN
		";
		$registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[$row['MTABL_ID']] = $row;
		      }
		     // return $tabla;
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		sqlsrv_close($db);
	}
}

?>