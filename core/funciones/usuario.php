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





?>