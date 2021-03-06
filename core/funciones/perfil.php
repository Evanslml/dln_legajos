<?php
/**************************************************************************************************
PERFIL
**************************************************************************************************/
class Perfil 
{

  protected $MPERF_ID;
  protected $MPERF_ALIAS;
  protected $MPERF_NOMBRE;
  protected $MPERF_DESCRIP;
  protected $MPERF_FECINS;
  protected $MPERF_HOST;
  protected $MPERF_USERINS;
  protected $MPERF_ESTADO;
  
  function __construct($a,$b,$c,$d,$e,$f,$g,$h)
  {
        $this->MPERF_ID=$a;
        $this->MPERF_ALIAS=$b;
        $this->MPERF_NOMBRE=$c;
        $this->MPERF_DESCRIP=$d;
        $this->MPERF_FECINS=$e;
        $this->MPERF_HOST=$f;
        $this->MPERF_USERINS=$g;
        $this->MPERF_ESTADO=$h;
  }

  public static function Perfiles_Totales (){
      $db = new Conexion();
      $query="SELECT count(*) as CANTIDAD FROM MPERFIL A";

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

  public static function Buscar_Perfiles ($offset,$per_page){
    $db = new Conexion();
    $query="
    SELECT MPERF_ID,MPERF_NOMBRE,MPERF_DESCRIP FROM MPERFIL
    ORDER BY MPERF_ID OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY
    ";

    $registros = sqlsrv_query($db->getConecta(), $query);
    if($registros === false ){
      $tabla = false;
    } else {
      while($row= sqlsrv_fetch_array($registros)) {
          $tabla[$row['MPERF_ID']] = $row;
          }
      }
    if (!isset($tabla)) {$tabla='';}
    return $tabla;
    sqlsrv_free_stmt( $registros);
  }
/*  public function NuevoPerfil(){
    $db = new Conexion();
    $sql = $db->query("INSERT INTO mperfil ( 
      MPERF_ID,MPERF_ROL,MPERF_NOMBRE,MPERF_DESCRIPCION,MPERF_FECIN,MPERF_HOST,MPERF_USERIN,MPERF_ESTADO
      )
      VALUES (
      default,
      '$this->MPERF_ROL',
      '$this->MPERF_NOMBRE',
      '$this->MPERF_DESCRIPCION',
      '$this->MPERF_FECIN',
      '$this->MPERF_HOST',
      '$this->MPERF_USERIN',
      '$this->MPERF_ESTADO'
      )
    ");
    $db->close();
  }

  public static function getLastId(){
    $db = new Conexion();
    $sql = $db->query("SELECT MPERF_ID FROM mperfil  ORDER BY MPERF_ID DESC LIMIT 1");
    if($sql->num_rows > 0) {
      while($d = $sql->fetch_array()) {
        $dato = $d['MPERF_ID'];
      }
      } else {
        $dato = '0';
      }
      $sql->free();
      $db->close();
      return $dato;
  }

  public function EditarPerfil(){
    $db = new Conexion();
    $sql = $db->query("UPDATE mperfil SET
      MPERF_ROL= '$this->MPERF_ROL',
      MPERF_NOMBRE= '$this->MPERF_NOMBRE',
      MPERF_DESCRIPCION= '$this->MPERF_DESCRIPCION',
      MPERF_FECIN= '$this->MPERF_FECIN',
      MPERF_HOST= '$this->MPERF_HOST',
      MPERF_USERIN= '$this->MPERF_USERIN',
      MPERF_ESTADO= '$this->MPERF_ESTADO'
      WHERE 
      MPERF_ID='$this->MPERF_ID'
    ");
    $db->close();
  }
*/


} //PERFIL



/**************************************************************************************************
PERMISO
**************************************************************************************************/

class Permisos extends Perfil
{
  
  protected $MPERM_ID;
  protected $MOBJ_ID;
  protected $MPERM_TIP;
  protected $MPERM_ESTADO;


  function __construct($a,$b,$c,$d,$e)
  {
      $this->MPERM_ID=$a;
      $this->MPERF_ID=$b;
      $this->MOBJ_ID=$c;
      $this->MPERM_TIP=$d;
      $this->MPERM_ESTADO=$e;
  }

/*  public function NuevosPermisos(){
    $db = new Conexion();
    $sql = $db->query("
      INSERT INTO mpermiso ( 
      MPERM_ID,MPERF_ID,MOBJ_ID,MPERM_TIP,MPERM_ESTADO
      )
      VALUES (
      default,
      '$this->MPERF_ID',
      '$this->MOBJ_ID',
      '$this->MPERM_TIP',
      '$this->MPERM_ESTADO'
      )
    ");
    $db->close();
  }

  public function EliminarPermisos(){
    $db = new Conexion();
    $sql1 = $db->query("DELETE FROM mpermiso WHERE MPERF_ID='$this->MPERF_ID'; "); 
    $db->close();
  }

  public static function ListarObjetos(){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM mobjeto WHERE MOBJ_ESTADO='1' ORDER BY MOBJ_ID"); 
    if($sql->num_rows > 0) {
      while($d = $sql->fetch_array()) {
        $Objeto[$d['MOBJ_ID']] = $d;
      }
    } else {
      $Objeto = false;
    }
    $sql->free();
    $db->close();
   
    return $Objeto;
  }
*/

  public static function PermisoSegunId($id,$tipo) { //MENU PRINCIPAL
    $db = new Conexion();
    $query="SELECT B.MPERF_ID,A.MOBJ_ID,A.MOBJ_ALIAS,A.MOBJ_NOMBRE,A.MOBJ_ENLACE,A.MOBJ_PADRE,A.MOBJ_ORDEN,A.MOBJ_ESTADO,A.MOBJ_ICON 
    FROM MOBJETO A
    INNER JOIN MPERMISO B ON 
    A.MOBJ_ID=B.MOBJ_ID 
    WHERE B.MPERF_ID='$id' AND B.MPERM_ESTADO='1' AND A.MOBJ_ESTADO='1' AND A.MOBJTIPO_ID='$tipo'
    GROUP BY MPERF_ID,A.MOBJ_ID,MOBJ_ALIAS,MOBJ_NOMBRE,MOBJ_ENLACE,MOBJ_PADRE,MOBJ_ORDEN,MOBJ_ESTADO,MOBJ_ICON
    ORDER BY MOBJ_ID,MOBJ_ORDEN";

    $registros = sqlsrv_query($db->getConecta(), $query);

    if($registros === false ){
      $Permisos = false;
    } else {
      while($demo= sqlsrv_fetch_array($registros)) {
          $Permisos[$demo['MOBJ_ID']] = $demo;
          }
          return $Permisos;
      }
    if (!isset($Permisos)) {$Permisos='';}
    return $Permisos;
    sqlsrv_free_stmt( $registros);
    sqlsrv_close($db);
  }


  public static function SegunAlias($alias,$perfil_id) { //MENU PERMISOS
    $db = new Conexion();
    $query="SELECT D.MFUN_ORDEN,D.MFUN_NOMBRE FROM MPERFIL A
    INNER JOIN MPERMISO B
    ON A.MPERF_ID=B.MPERF_ID
    INNER JOIN MOBJETO C
    ON B.MOBJ_ID=C.MOBJ_ID
    INNER JOIN MFUNCION D
    ON B.MFUN_ORDEN=D.MFUN_ORDEN
    WHERE A.MPERF_ESTADO='1' AND B.MPERM_ESTADO='1' AND C.MOBJ_ESTADO='1'
    AND C.MOBJ_ENLACE='$alias' AND A.MPERF_ID='$perfil_id'
    ";
    $registros = sqlsrv_query($db->getConecta(), $query);

    if($registros === false ){
      $Permisos = false;
    } else {
      while($demo= sqlsrv_fetch_array($registros)) {
          $Permisos[$demo['MFUN_ORDEN']] = $demo;
          }
      }   

    if (!isset($Permisos)) {$Permisos='';}
    return $Permisos;
    sqlsrv_free_stmt( $registros);
    sqlsrv_close($db);
  }



}//PERMISOS



/**************************************************************************************************
OBJETO
**************************************************************************************************/

class Objeto {


  public static function ObjetoSegunEnlace($enlace) {
    $db = new Conexion();
    $query="SELECT * FROM MOBJETO WHERE MOBJ_ENLACE='$enlace'";
    $registros = sqlsrv_query($db->getConecta(), $query);

    if($registros === false ){
      $Objeto = false;
    } else {
      while($demo= sqlsrv_fetch_array($registros)) {
          $Objeto[] = $demo;
          }
          return $Objeto;
      }
    return $Objeto;
    sqlsrv_free_stmt( $registros);

  }


}

 
?>