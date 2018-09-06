<?php

phpinfo();

var_dump( PDO::getAvailableDrivers() );

function encrypt($string, $key="@ejemploPHP") {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

function decrypt($string, $key="@ejemploPHP") {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

echo base64_encode("zero").'<br>'; //emVybw==
echo base64_decode("emVybw==").'<br>'; //zero

$hola = encrypt("zero");
echo $hola.'<br>';
//yqXX2Q==

$des = decrypt("yqXX2Q==");
echo $des;
//hola


?>