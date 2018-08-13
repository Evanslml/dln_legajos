<?php

echo password_hash('password',PASSWORD_DEFAULT,array(
	'cost'=>12,
	'salt'=>'1111111111111111111111'
	)
);

echo '<br>';
//$clave_crypt = crypt($pass, $salt);



$Permiso[]='';

var_dump($Permiso);

?>