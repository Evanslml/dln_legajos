<?php

class Pruebas
{
	protected $id;
	protected $nombre;	
	function __construct($id,$nombre)
	{
		$this->id=$id;
		$this->nombre=$nombre;
	}

	public function IngresarPrueba(){
	    $db = new Conexion();
	    $query = "INSERT INTO MPRUEBA (id,nombre)
		VALUES (
		'$this->id',
		'$this->nombre'
		);
		";

		$registros = sqlsrv_query($db->getConecta(), $query);
		sqlsrv_free_stmt( $registros);
	}


}








?>