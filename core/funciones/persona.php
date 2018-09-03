<?php

class Persona
{

	protected $MPERS_APEPAT;
	protected $MPERS_APEMAT;
	protected $MPERS_NOMBRES;
	protected $MPERS_TIPDOC;
	protected $MPERS_NUMDOC;
	protected $MPERS_TIPOPER;
	protected $MDEPA_ID;
	protected $MPROV_ID;
	protected $MDIST_ID;
	protected $MPERS_FECNAC;
	protected $MPERS_NACIONAL;
	protected $MPERS_SEXO;
	protected $MPERS_ESTACIVIL;
	protected $MPERS_NOMCONYU;
	protected $MPERS_GRADINST;
	protected $MPERS_PROFESION;
	protected $MPERS_ESPECIALID;
	protected $MPERS_MONTO;
	protected $MCARG_CODIGO;
	protected $MPERS_REGPENSION;
	protected $MPERS_REGLABORAL;
	protected $MPERS_NIVREMUN;
	protected $MPERS_FECREGIMEN;
	protected $MEST_CODIGO;
	protected $MPERS_EMAIL;
	protected $MPERS_GRUPOCUPAC;
	protected $MPERS_NUMUBI;
	protected $MPERS_FECINGR;
	protected $MPERS_NUMCONTRA;
	protected $MPERS_NUMRUC;
	protected $MPERS_TELMOVIL;
	protected $MPERS_NOMPADRE;
	protected $MPERS_NOMMADRE;
	protected $MPERS_DOMPADRES;
	protected $MPERS_TELPADRES;
	protected $MPERS_ESTADO;
	protected $MPERS_NOMAPE_COMPLETO;
	protected $MPERS_FECINS;
	protected $MPERS_FECACT;
	protected $MPERS_USERINS;
	protected $MPERS_USERACT;
	protected $MPERS_HOST;

	function __construct($MPERS_APEPAT, $MPERS_APEMAT, $MPERS_NOMBRES, $MPERS_TIPDOC, $MPERS_NUMDOC, $MPERS_TIPOPER, $MDEPA_ID, $MPROV_ID, $MDIST_ID, $MPERS_FECNAC, $MPERS_NACIONAL, $MPERS_SEXO, $MPERS_ESTACIVIL, $MPERS_NOMCONYU, $MPERS_GRADINST, $MPERS_PROFESION, $MPERS_ESPECIALID, $MPERS_MONTO, $MCARG_CODIGO, $MPERS_REGPENSION, $MPERS_REGLABORAL, $MPERS_NIVREMUN, $MPERS_FECREGIMEN, $MEST_CODIGO, $MPERS_EMAIL, $MPERS_GRUPOCUPAC, $MPERS_NUMUBI, $MPERS_FECINGR, $MPERS_NUMCONTRA, $MPERS_NUMRUC, $MPERS_TELMOVIL, $MPERS_NOMPADRE, $MPERS_NOMMADRE, $MPERS_DOMPADRES, $MPERS_TELPADRES, $MPERS_ESTADO, $MPERS_NOMAPE_COMPLETO, $MPERS_FECINS, $MPERS_FECACT, $MPERS_USERINS, $MPERS_USERACT, $MPERS_HOST, $MPERS_IMAGEN)
	{
		$this->MPERS_APEPAT=$MPERS_APEPAT;
		$this->MPERS_APEMAT=$MPERS_APEMAT;
		$this->MPERS_NOMBRES=$MPERS_NOMBRES;
		$this->MPERS_TIPDOC=$MPERS_TIPDOC;
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MPERS_TIPOPER=$MPERS_TIPOPER;
		$this->MDEPA_ID=$MDEPA_ID;
		$this->MPROV_ID=$MPROV_ID;
		$this->MDIST_ID=$MDIST_ID;
		$this->MPERS_FECNAC=$MPERS_FECNAC;
		$this->MPERS_NACIONAL=$MPERS_NACIONAL;
		$this->MPERS_SEXO=$MPERS_SEXO;
		$this->MPERS_ESTACIVIL=$MPERS_ESTACIVIL;
		$this->MPERS_NOMCONYU=$MPERS_NOMCONYU;
		$this->MPERS_GRADINST=$MPERS_GRADINST;
		$this->MPERS_PROFESION=$MPERS_PROFESION;
		$this->MPERS_ESPECIALID=$MPERS_ESPECIALID;
		$this->MPERS_MONTO=$MPERS_MONTO;
		$this->MCARG_CODIGO=$MCARG_CODIGO;
		$this->MPERS_REGPENSION=$MPERS_REGPENSION;
		$this->MPERS_REGLABORAL=$MPERS_REGLABORAL;
		$this->MPERS_NIVREMUN=$MPERS_NIVREMUN;
		$this->MPERS_FECREGIMEN=$MPERS_FECREGIMEN;
		$this->MEST_CODIGO=$MEST_CODIGO;
		$this->MPERS_EMAIL=$MPERS_EMAIL;
		$this->MPERS_GRUPOCUPAC=$MPERS_GRUPOCUPAC;
		$this->MPERS_NUMUBI=$MPERS_NUMUBI;
		$this->MPERS_FECINGR=$MPERS_FECINGR;
		$this->MPERS_NUMCONTRA=$MPERS_NUMCONTRA;
		$this->MPERS_NUMRUC=$MPERS_NUMRUC;
		$this->MPERS_TELMOVIL=$MPERS_TELMOVIL;
		$this->MPERS_NOMPADRE=$MPERS_NOMPADRE;
		$this->MPERS_NOMMADRE=$MPERS_NOMMADRE;
		$this->MPERS_DOMPADRES=$MPERS_DOMPADRES;
		$this->MPERS_TELPADRES=$MPERS_TELPADRES;
		$this->MPERS_ESTADO=$MPERS_ESTADO;
		$this->MPERS_NOMAPE_COMPLETO=$MPERS_NOMAPE_COMPLETO;
		$this->MPERS_FECINS=$MPERS_FECINS;
		$this->MPERS_FECACT=$MPERS_FECACT;
		$this->MPERS_USERINS=$MPERS_USERINS;
		$this->MPERS_USERACT=$MPERS_USERACT;
		$this->MPERS_HOST=$MPERS_HOST;
		$this->MPERS_IMAGEN=$MPERS_IMAGEN;
	}

	public function IngresarPersona(){
	    $db = new Conexion();
	    $query="
	    INSERT INTO MPERSONA (MPERS_APEPAT,MPERS_APEMAT,MPERS_NOMBRES,MPERS_TIPDOC,MPERS_NUMDOC,MPERS_TIPOPER,MDEPA_ID,MPROV_ID,
		MDIST_ID,MPERS_FECNAC,MPERS_NACIONAL,MPERS_SEXO,MPERS_ESTACIVIL,MPERS_NOMCONYU,MPERS_GRADINST,MPERS_PROFESION,
		MPERS_ESPECIALID,MPERS_MONTO,MCARG_CODIGO,MPERS_REGPENSION,MPERS_REGLABORAL,MPERS_NIVREMUN,MPERS_FECREGIMEN,MEST_CODIGO,
		MPERS_EMAIL,MPERS_GRUPOCUPAC,MPERS_NUMUBI,MPERS_FECINGR,MPERS_NUMCONTRA,MPERS_NUMRUC,MPERS_TELMOVIL,MPERS_NOMPADRE,
		MPERS_NOMMADRE,MPERS_DOMPADRES,MPERS_TELPADRES,MPERS_ESTADO,MPERS_NOMAPE_COMPLETO,MPERS_FECINS,MPERS_FECACT,MPERS_USERINS,
		MPERS_USERACT,MPERS_HOST,MPERS_IMAGEN)
		VALUES(
		'$this->MPERS_APEPAT',
		'$this->MPERS_APEMAT',
		'$this->MPERS_NOMBRES',
		'$this->MPERS_TIPDOC',
		'$this->MPERS_NUMDOC',
		'$this->MPERS_TIPOPER',
		'$this->MDEPA_ID',
		'$this->MPROV_ID',
		'$this->MDIST_ID',
		'$this->MPERS_FECNAC',
		'$this->MPERS_NACIONAL',
		'$this->MPERS_SEXO',
		'$this->MPERS_ESTACIVIL',
		'$this->MPERS_NOMCONYU',
		'$this->MPERS_GRADINST',
		'$this->MPERS_PROFESION',
		'$this->MPERS_ESPECIALID',
		'$this->MPERS_MONTO',
		'$this->MCARG_CODIGO',
		'$this->MPERS_REGPENSION',
		'$this->MPERS_REGLABORAL',
		'$this->MPERS_NIVREMUN',
		'$this->MPERS_FECREGIMEN',
		'$this->MEST_CODIGO',
		'$this->MPERS_EMAIL',
		'$this->MPERS_GRUPOCUPAC',
		'$this->MPERS_NUMUBI',
		'$this->MPERS_FECINGR',
		'$this->MPERS_NUMCONTRA',
		'$this->MPERS_NUMRUC',
		'$this->MPERS_TELMOVIL',
		'$this->MPERS_NOMPADRE',
		'$this->MPERS_NOMMADRE',
		'$this->MPERS_DOMPADRES',
		'$this->MPERS_TELPADRES',
		'$this->MPERS_ESTADO',
		'$this->MPERS_NOMAPE_COMPLETO',
		'$this->MPERS_FECINS',
		'$this->MPERS_FECACT',
		'$this->MPERS_USERINS',
		'$this->MPERS_USERACT',
		'$this->MPERS_HOST',
		'$this->MPERS_IMAGEN')";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt( $registros);
	}

	public static function Busqueda_persona_dni($dni){
		$db = new Conexion();
		$query="SELECT * FROM dbo.MPERSONA WHERE MPERS_NUMDOC='$dni'";
		$registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[$row['MPERS_ID']] = $row;
		      }
		     // return $tabla;
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		//sqlsrv_close($db);
	}

	public static function Legajos_Totales ($cbx,$txt){
      $db = new Conexion();
      switch ($cbx) {
      	case '0':
      		$query="SELECT count(*) as CANTIDAD FROM MPERSONA A";
      		break;
      	case '1':
      		$query="
      			SELECT count(*) as CANTIDAD
				FROM MPERSONA A
				INNER JOIN MUBICACION B ON A.MPERS_GRUPOCUPAC = B.MUBI_ID
				WHERE MPERS_NUMDOC='$txt'
		  	";
      		break;
      	case '2':
      		$query="
		      	SELECT count(*) as CANTIDAD
				FROM MPERSONA A
				INNER JOIN MUBICACION B ON A.MPERS_GRUPOCUPAC = B.MUBI_ID
				WHERE MPERS_NOMAPE_COMPLETO LIKE '%$txt%'
		  	";
      		break;
      }

  	  $registros = sqlsrv_query($db->getConecta(), $query);
	  if($registros === false ){
	    $tabla = false;
	  } else {
	    while($row= sqlsrv_fetch_array($registros)) {
	        $tabla[0] = $row['CANTIDAD'];
	        }
	    }
	  if (!isset($tabla)) {$tabla='';}
	  return $tabla;
	  sqlsrv_free_stmt( $registros);
    } 

	public static function Buscar_Legajos ($cbx,$txt,$offset,$per_page){
      $db = new Conexion();
      switch ($cbx) {
      	case '0':
      		$query="
      			SELECT A.MPERS_ID,A.MPERS_NUMDOC,A.MPERS_NOMAPE_COMPLETO,
      			CAST(B.MUBI_ALIAS AS VARCHAR(5))+' - '+ CAST(A.MPERS_NUMUBI AS VARCHAR(10)) AS 'UBICACION',SUBSTRING(A.MPERS_FECINS,0,11) FECHA,A.MPERS_IMAGEN
				FROM MPERSONA A	INNER JOIN MUBICACION B ON A.MPERS_GRUPOCUPAC = B.MUBI_ID
				ORDER BY A.MPERS_ID OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY
		  	";
      		break;
      	case '1':
      		$query="
		      	SELECT A.MPERS_ID,A.MPERS_NUMDOC,A.MPERS_NOMAPE_COMPLETO,
		      	CAST(B.MUBI_ALIAS AS VARCHAR(5))+' - '+ CAST(A.MPERS_NUMUBI AS VARCHAR(10)) AS 'UBICACION',SUBSTRING(A.MPERS_FECINS,0,11) FECHA,A.MPERS_IMAGEN
				FROM MPERSONA A	INNER JOIN MUBICACION B ON A.MPERS_GRUPOCUPAC = B.MUBI_ID
				WHERE MPERS_NUMDOC='$txt' ORDER BY A.MPERS_ID OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY
		  	";
      		break;
      	case '2':
      		$query="
		      	SELECT A.MPERS_ID,A.MPERS_NUMDOC,A.MPERS_NOMAPE_COMPLETO,
		      	CAST(B.MUBI_ALIAS AS VARCHAR(5))+' - '+ CAST(A.MPERS_NUMUBI AS VARCHAR(10)) AS 'UBICACION',SUBSTRING(A.MPERS_FECINS,0,11) FECHA,A.MPERS_IMAGEN
				FROM MPERSONA A
				INNER JOIN MUBICACION B ON A.MPERS_GRUPOCUPAC = B.MUBI_ID
				WHERE MPERS_NOMAPE_COMPLETO LIKE '%$txt%' ORDER BY A.MPERS_ID OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY
		  	";
      		break;
      }

  	  $registros = sqlsrv_query($db->getConecta(), $query);
	  if($registros === false ){
	    $tabla = false;
	  } else {
	    while($row= sqlsrv_fetch_array($registros)) {
	        $tabla[$row['MPERS_ID']] = $row;
	        }
	    }
	  if (!isset($tabla)) {$tabla='';}
	  return $tabla;
	  sqlsrv_free_stmt( $registros);
    }    

}


class Domicilio extends Persona
{
	
	protected $MDOM_NOMBRE;
	protected $MDIST_ID;
	protected $MDOM_REFERENCIA;
	protected $MDOM_TELFIJO;
	protected $MDOM_ESTADO;

	function __construct($MPERS_NUMDOC,$MDOM_NOMBRE,$MDIST_ID,$MDOM_REFERENCIA,$MDOM_TELFIJO,$MDOM_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MDOM_NOMBRE=$MDOM_NOMBRE;
		$this->MDIST_ID=$MDIST_ID;
		$this->MDOM_REFERENCIA=$MDOM_REFERENCIA;
		$this->MDOM_TELFIJO=$MDOM_TELFIJO;
		$this->MDOM_ESTADO=$MDOM_ESTADO;
	}

	public function IngresarDomicilio(){
	    $db = new Conexion();
	    $query="INSERT INTO MDOMICILIO(MPERS_NUMDOC,MDOM_NOMBRE,MDIST_ID,MDOM_REFERENCIA,MDOM_TELFIJO,MDOM_ESTADO)
		VALUES (
		'$this->MPERS_NUMDOC',
		'$this->MDOM_NOMBRE',
		'$this->MDIST_ID',
		'$this->MDOM_REFERENCIA',
		'$this->MDOM_TELFIJO',
		'$this->MDOM_ESTADO')";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

}


class Filial extends Persona
{
	
	protected $MFIL_APEHIJO;
	protected $MFIL_NOMHIJO;
	protected $MFIL_FECNAC;
	protected $MFIL_SEXO;
	protected $MFIL_ESSALUD;
	protected $MFIL_ESTADO;

	function __construct($MPERS_NUMDOC,$MFIL_APEHIJO,$MFIL_NOMHIJO,$MFIL_FECNAC,$MFIL_SEXO,$MFIL_ESSALUD,$MFIL_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MFIL_APEHIJO=$MFIL_APEHIJO;
		$this->MFIL_NOMHIJO=$MFIL_NOMHIJO;
		$this->MFIL_FECNAC=$MFIL_FECNAC;
		$this->MFIL_SEXO=$MFIL_SEXO;
		$this->MFIL_ESSALUD=$MFIL_ESSALUD;
		$this->MFIL_ESTADO=$MFIL_ESTADO;
	}

	public function IngresarFilial(){
	    $db = new Conexion();
	    $query="INSERT INTO MFILIAL(MPERS_NUMDOC,MFIL_APEHIJO,MFIL_NOMHIJO,MFIL_FECNAC,MFIL_SEXO,MFIL_ESSALUD,MFIL_ESTADO)
		VALUES (
		'$this->MPERS_NUMDOC',
		'$this->MFIL_APEHIJO',
		'$this->MFIL_NOMHIJO',
		'$this->MFIL_FECNAC',
		'$this->MFIL_SEXO',
		'$this->MFIL_ESSALUD',
		'$this->MFIL_ESTADO')";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

}


class Estudio extends Persona
{
	
	protected $MTABL_ID;
	protected $MESTU_DESC;
	protected $MESTU_ESPE;
	protected $MESTU_UBIC;
	protected $MESTU_ESTADO;
	protected $MESTU_TIPO;

	function __construct($MPERS_NUMDOC,$MTABL_ID,$MESTU_DESC,$MESTU_ESPE,$MESTU_UBIC,$MESTU_ESTADO,$MESTU_TIPO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MTABL_ID=$MTABL_ID;
		$this->MESTU_DESC=$MESTU_DESC;
		$this->MESTU_ESPE=$MESTU_ESPE;
		$this->MESTU_UBIC=$MESTU_UBIC;
		$this->MESTU_ESTADO=$MESTU_ESTADO;
		$this->MESTU_TIPO=$MESTU_TIPO;
	}

	public function IngresarEstudios(){
	    $db = new Conexion();
	    $query="INSERT INTO MESTUDIOS(MPERS_NUMDOC,MTABL_ID,MESTU_DESC,MESTU_ESPE,MESTU_UBIC,MESTU_ESTADO,MESTU_TIPO)
		VALUES (
		'$this->MPERS_NUMDOC',
		'$this->MTABL_ID',
		'$this->MESTU_DESC',
		'$this->MESTU_ESPE',
		'$this->MESTU_UBIC',
		'$this->MESTU_ESTADO',
		'$this->MESTU_TIPO'
		)";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

	public static function Busqueda_estudios_dni($dni,$tipo){
		$db = new Conexion();
		$query="SELECT * FROM dbo.MESTUDIOS WHERE MPERS_NUMDOC='$dni' AND MESTU_TIPO='$tipo' ";
		$registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[$row['MESTU_ID']] = $row;
		      }
		     // return $tabla;
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		//sqlsrv_close($db);
	}

}


class Adjunto extends Persona
{

	protected $MOBJ_ID;
	protected $MARCH_ID;
	protected $MADJ_NOMBRES;
	protected $MADJ_URL;
	protected $MADJ_ESTADO;

	function __construct($MPERS_NUMDOC,$MOBJ_ID,$MARCH_ID,$MADJ_NOMBRES,$MADJ_URL,$MADJ_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MOBJ_ID=$MOBJ_ID;
		$this->MARCH_ID=$MARCH_ID;
		$this->MADJ_NOMBRES=$MADJ_NOMBRES;
		$this->MADJ_URL=$MADJ_URL;
		$this->MADJ_ESTADO=$MADJ_ESTADO;
	}

	public function IngresarAdjuntos(){
		$db = new Conexion();
	    $query="INSERT INTO MADJUNTOS(MPERS_NUMDOC,MOBJ_ID,MARCH_ID,MADJ_NOMBRES,MADJ_URL,MADJ_ESTADO)
		VALUES (
		'$this->MPERS_NUMDOC',
		'$this->MOBJ_ID',
		'$this->MARCH_ID',
		'$this->MADJ_NOMBRES',
		'$this->MADJ_URL',
		'$this->MADJ_ESTADO')";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

	public function IngresarFoto(){
		$db = new Conexion();
	    $query="UPDATE MPERSONA SET MPERS_IMAGEN ='1' WHERE MPERS_NUMDOC='$this->MPERS_NUMDOC'";
		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

}


class Contrato extends Persona
{

	protected $MCON_FECHA;
	protected $MCON_NUMERO;
	protected $MCON_MODALIDAD;
	protected $MTABLA_ID;
	protected $MCON_ORIGEN;
	//protected $MPERS_NIVREMUN;
	protected $MCON_TIPO;
	protected $MCON_ESTADO;

	function __construct($MPERS_NUMDOC,$MCON_FECHA,$MCON_NUMERO,$MCON_MODALIDAD,$MTABLA_ID,$MCON_ORIGEN,$MPERS_NIVREMUN,$MCON_TIPO,$MCON_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MCON_FECHA=$MCON_FECHA;
		$this->MCON_NUMERO=$MCON_NUMERO;
		$this->MCON_MODALIDAD=$MCON_MODALIDAD;
		$this->MTABLA_ID=$MTABLA_ID;
		$this->MCON_ORIGEN=$MCON_ORIGEN;
		$this->MPERS_NIVREMUN=$MPERS_NIVREMUN;
		$this->MCON_TIPO=$MCON_TIPO;
		$this->MCON_ESTADO=$MCON_ESTADO;
	}

	public function IngresarContrato(){
	    $db = new Conexion();
	    $query="INSERT INTO MCONTRATO(MPERS_NUMDOC,MCON_FECHA,MCON_NUMERO,MCON_MODALIDAD,MTABLA_ID,MCON_ORIGEN,MPERS_NIVREMUN,MCON_TIPO,MCON_ESTADO)
		VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MCON_FECHA',
			'$this->MCON_NUMERO',
			'$this->MCON_MODALIDAD',
			'$this->MTABLA_ID',
			'$this->MCON_ORIGEN',
			'$this->MPERS_NIVREMUN',
			'$this->MCON_TIPO',
			'$this->MCON_ESTADO')";

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

	public static function Busqueda_contratos_dni($dni){
		$db = new Conexion();
		$query="SELECT * FROM dbo.MCONTRATO WHERE MPERS_NUMDOC='$dni' ";
		$registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[$row['MCON_ID']] = $row;
		      }
		     // return $tabla;
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		//sqlsrv_close($db);
	}

}



class Renuncia extends Persona
{

	protected $MREN_FECRESOL;
	protected $MREN_FECINIRESOL;
	protected $MREN_FECCESE;
	protected $MREN_NUMRESOL;
	protected $MTABLA_ID;
	protected $MREN_MOTIVO;
	protected $MREN_TIPO;
	protected $MREN_IDTIPO;
	protected $MREN_ESTADO;

	function __construct($MPERS_NUMDOC, $MREN_FECRESOL, $MREN_FECINIRESOL, $MREN_FECCESE, $MREN_NUMRESOL, $MTABLA_ID, $MREN_MOTIVO, $MREN_TIPO, $MREN_IDTIPO, $MREN_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MREN_FECRESOL=$MREN_FECRESOL;
		$this->MREN_FECINIRESOL=$MREN_FECINIRESOL;
		$this->MREN_FECCESE=$MREN_FECCESE;
		$this->MREN_NUMRESOL=$MREN_NUMRESOL;
		$this->MTABLA_ID=$MTABLA_ID;
		$this->MREN_MOTIVO=$MREN_MOTIVO;
		$this->MREN_TIPO=$MREN_TIPO;
		$this->MREN_IDTIPO=$MREN_IDTIPO;
		$this->MREN_ESTADO=$MREN_ESTADO;
	}

	public function IngresarRenuncia(){
	    $db = new Conexion();

	    
	   	$fecha1=$this->MREN_FECINIRESOL;
	   	$fecha2=$this->MREN_FECCESE;

	    if ($fecha1=='' && $fecha2==''){

		    $query="INSERT INTO MRENUNCIA(MPERS_NUMDOC,MREN_FECRESOL,MREN_FECINIRESOL,MREN_FECCESE,MREN_NUMRESOL,MTABLA_ID,MREN_MOTIVO,MREN_TIPO,MREN_IDTIPO,MREN_ESTADO)
			VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MREN_FECRESOL',
			NULL,
			NULL,
			'$this->MREN_NUMRESOL',
			'$this->MTABLA_ID',
			'$this->MREN_MOTIVO',
			'$this->MREN_TIPO',
			'$this->MREN_IDTIPO',
			'$this->MREN_ESTADO'
			)";

		}else if ($fecha1==''){

		    $query="INSERT INTO MRENUNCIA(MPERS_NUMDOC,MREN_FECRESOL,MREN_FECINIRESOL,MREN_FECCESE,MREN_NUMRESOL,MTABLA_ID,MREN_MOTIVO,MREN_TIPO,MREN_IDTIPO,MREN_ESTADO)
			VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MREN_FECRESOL',
			NULL,
			'$this->MREN_FECCESE',
			'$this->MREN_NUMRESOL',
			'$this->MTABLA_ID',
			'$this->MREN_MOTIVO',
			'$this->MREN_TIPO',
			'$this->MREN_IDTIPO',
			'$this->MREN_ESTADO'
			)";

		}else if ($fecha2==''){

		    $query="INSERT INTO MRENUNCIA(MPERS_NUMDOC,MREN_FECRESOL,MREN_FECINIRESOL,MREN_FECCESE,MREN_NUMRESOL,MTABLA_ID,MREN_MOTIVO,MREN_TIPO,MREN_IDTIPO,MREN_ESTADO)
			VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MREN_FECRESOL',
			'$this->MREN_FECINIRESOL',
			NULL,
			'$this->MREN_NUMRESOL',
			'$this->MTABLA_ID',
			'$this->MREN_MOTIVO',
			'$this->MREN_TIPO',
			'$this->MREN_IDTIPO',
			'$this->MREN_ESTADO'
			)";
			
		}else{

			$query="INSERT INTO MRENUNCIA(MPERS_NUMDOC,MREN_FECRESOL,MREN_FECINIRESOL,MREN_FECCESE,MREN_NUMRESOL,MTABLA_ID,MREN_MOTIVO,MREN_TIPO,MREN_IDTIPO,MREN_ESTADO)
			VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MREN_FECRESOL',
			'$this->MREN_FECINIRESOL',
			'$this->MREN_FECCESE',
			'$this->MREN_NUMRESOL',
			'$this->MTABLA_ID',
			'$this->MREN_MOTIVO',
			'$this->MREN_TIPO',
			'$this->MREN_IDTIPO',
			'$this->MREN_ESTADO'
			)";

		}

		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}

	public static function Busqueda_renuncia_dni($dni){
		$db = new Conexion();
		$query="SELECT * FROM dbo.MRENUNCIA WHERE MPERS_NUMDOC='$dni' ";
		$registros = sqlsrv_query($db->getConecta(), $query);
		if($registros === false ){
		  $tabla = false;
		} else {
		  while($row= sqlsrv_fetch_array($registros)) {
		      $tabla[$row['MREN_ID']] = $row;
		      }
		     // return $tabla;
		  }
		if (!isset($tabla)) {$tabla='';}
		return $tabla;
		sqlsrv_free_stmt( $registros);
		//sqlsrv_close($db);
	}

}


class Resumen
{

	protected $MPERS_NUMDOC;
	protected $MOBJ_ID;
	protected $MRES_ESTADO;
	
	function __construct($MPERS_NUMDOC,$MOBJ_ID,$MRES_ESTADO)
	{
		$this->MPERS_NUMDOC=$MPERS_NUMDOC;
		$this->MOBJ_ID=$MOBJ_ID;
		$this->MRES_ESTADO=$MRES_ESTADO;
	}

	public function In(){
	    $db = new Conexion();
	    $query="INSERT INTO MCONTRATO(MPERS_NUMDOC,MOBJ_ID,MRES_ESTADO)
		VALUES (
			'$this->MPERS_NUMDOC',
			'$this->MOBJ_ID',
			'$this->MRES_ESTADO')";
		$registros = sqlsrv_query($db->getConecta(), $query);
	    sqlsrv_free_stmt($registros);
	}
}



?>