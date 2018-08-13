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
        $pass="123456";
        $database = "LEGAJOS";
        $info = array('Database'=>$database,"UID"=>$user,"PWD"=>$pass,"CharacterSet" => "UTF-8");
        $this->cn =sqlsrv_connect($servidor, $info);
    }

    public function getConecta(){
        return $this->cn;
    }

}

?>