<?php

class Acceso 
{
    /*
    protected $nombre;
    protected $passw;
    protected $email;
    protected $perfilId;
    protected $id;
    protected $telefono;
    protected $EstablecimientoId;
    protected $dni;
  
  function __construct($a,$b,$email,$perfil,$id,$tel,$est,$dni)
  {
    $this->nombre =$a;
    $this->passw =$b;
    $this->email =$email;
    $this->perfilId =$perfil;
    $this->id =$id;
    $this->telefono =$tel;
    $this->EstablecimientoId =$est;
    $this->dni =$dni;
  }
*/

  public static function Usuario() {
    $cn = new Conexion();
    $query = "SELECT * FROM MUSUARIO";
    $registros = sqlsrv_query($cn->getConecta(), $query);

    if($registros === false ){
      echo "Error al ejecutar consulta.</br>";
    } else {
      while($demo= sqlsrv_fetch_array($registros)) {
          $listado[$demo['MUSU_ID']] = $demo;
          }
          return $listado;
      }
  sqlsrv_free_stmt( $registros);
  }

  public static function ListaUsuarioPerfil(){
    $db = new conexion();
    $query = "SELECT A.MUSU_ID,A.MUSU_LOGIN,A.MUSU_PASSWORD,A.MUSU_NOMBRES,A.MUSU_APELLIDO_PAT,A.MUSU_APELLIDO_MAT,A.MUSU_TEL,A.MPERF_ID,B.MPERF_NOMBRE,
    C.MEST_NOMBRE,C.MEST_CODIGO,A.MUSU_ESTADO,A.MUSU_DNI 
    FROM MUSUARIO A 
    INNER JOIN MPERFIL B ON A.MPERF_ID=B.MPERF_ID 
    INNER JOIN MESTABLECIMIENTO C ON A.MESTA_RENAES=C.MEST_CODIGO
    WHERE B.MPERF_ESTADO='1' ORDER BY A.MUSU_ID;";

    $registros = sqlsrv_query($db->getConecta(), $query);

    if($registros === false ){
      $UserPerfil = false;
    } else {
      while($demo= sqlsrv_fetch_array($registros)) {
          $UserPerfil[$demo['MUSU_ID']] = $demo;
          }
          return $UserPerfil;
      }
   
    return $UserPerfil;
    sqlsrv_free_stmt( $registros);
  }  




} //CLASS ACCESO 



class Usuario
{

  protected $MUSU_LOGIN;
  protected $MUSU_PASSWORD;
  protected $MUSU_APELLIDO_PAT;
  protected $MUSU_APELLIDO_MAT;
  protected $MUSU_NOMBRES;
  protected $MUSU_FECINI;
  protected $MUSU_FECVEN;
  protected $MUSU_TEL;
  protected $MUSU_CORREO;
  protected $MUSU_DNI;
  protected $MUSU_USERINS;
  protected $MUSU_IMG;
  protected $MUSU_HOST;
  protected $MUSU_ESTADO;
  protected $MPERF_ID;
  protected $MESTA_RENAES;
  protected $MUSU_OBSERVACION;
  
  function __construct($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q)
  {
      $this->MUSU_LOGIN=$a;
      $this->MUSU_PASSWORD=$b;
      $this->MUSU_APELLIDO_PAT=$c;
      $this->MUSU_APELLIDO_MAT=$d;
      $this->MUSU_NOMBRES=$e;
      $this->MUSU_FECINI=$f;
      $this->MUSU_FECVEN=$g;
      $this->MUSU_TEL=$h;
      $this->MUSU_CORREO=$i;
      $this->MUSU_DNI=$j;
      $this->MUSU_USERINS=$k;
      $this->MUSU_IMG=$l;
      $this->MUSU_HOST=$m;
      $this->MUSU_ESTADO=$n;
      $this->MPERF_ID=$o;
      $this->MESTA_RENAES=$p;
      $this->MUSU_OBSERVACION=$q;
  }

  public function Actualizar(){
    $db = new Conexion();
      $query="UPDATE MUSUARIO SET 
      MUSU_NOMBRES ='$this->MUSU_NOMBRES',
      MUSU_APELLIDO_PAT = '$this->MUSU_APELLIDO_PAT',
      MUSU_APELLIDO_MAT = '$this->MUSU_APELLIDO_MAT',
      MUSU_DNI = '$this->MUSU_DNI',
      MUSU_PASSWORD = '$this->MUSU_PASSWORD'
      WHERE MUSU_CORREO='$this->MUSU_CORREO'";
    $registros = sqlsrv_query($db->getConecta(), $query);
      sqlsrv_free_stmt($registros);
  }



}

?>