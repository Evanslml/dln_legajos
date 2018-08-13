<?php
  // validamos el request para el login del sitio.
  if (!isset($_SESSION)) {
    session_start();
  }
  #Constantes de conexión
  
class Conexion{

    private $cn;

    public function __construct(){
        $servidor = "localhost";
        //$servidor = "172.16.0.3,1433\FINAL";
        $user="sa";
        $pass="123";
        $database = "LEGAJOS";
        $info = array('Database'=>$database,"UID"=>$user,"PWD"=>$pass,"CharacterSet" => "UTF-8");
        $this->cn =sqlsrv_connect($servidor, $info);
    }

    public function getConecta(){
        return $this->cn;
    }

}


class MiClase{      

    public static function miFuncion(){
    $cn= new Conexion;
        $query = "SELECT * FROM MUSUARIO";
        $registros = sqlsrv_query($cn->getConecta(), $query);
            if( $registros === false ){
                echo "Error al ejecutar consulta.</br>";
            }  else {
                    while($demo= sqlsrv_fetch_array($registros)) {
                        $listado[] = $demo;                     
                    }
                    return $listado;
            }
    }       
}


$_LISTA= MiClase::miFuncion();

var_dump($_LISTA);




?>