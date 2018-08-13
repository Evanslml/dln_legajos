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
}





?>