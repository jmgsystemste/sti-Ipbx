<?php

if(!isset($_SESSION)){
	session_start();

}
require_once("configuracion.php");

$valida=0;
for($i=0;$i<count($user);$i++){
	if($user[$i]->usuario==$_SESSION[usuario]&&$user[$i]->clave==$_SESSION[clave]){
		$valida=1;
		break;
	}
}

	if(!$valida)
		header("Location: login.php");


?>