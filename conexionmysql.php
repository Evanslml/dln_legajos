<?php
  // validamos el request para el login del sitio.
  if (!isset($_SESSION)) {
    session_start();
  }
  #Constantes de conexión


define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','02_dln_recaudacion_data');

  //creamos la conexion
  class Conexion extends mysqli {

      public function __construct() {
        parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->connect_errno ? die('Error en la conexión a la base de datos') : null;
        $this->set_charset("utf8");
      }

      public function recorrer($y){
        return mysqli_fetch_array($y);
      }
     
      public function rows($y){
        return mysqli_num_rows($y);
      }
  }
  


  class Acceso 
{
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

  public static function User() {
   //instaciamos la conexion
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM musuario;");
    if($sql->num_rows > 0) {
      while($d = $sql->fetch_array()) {
        $user[$d['MUSU_ID']] = $d;
      }
    } else {
      $user = false;
    }
    $sql->free();
    $db->close();
    return $user;
  }

}


$_usuario = Acceso::User();



var_dump($_usuario);

?>