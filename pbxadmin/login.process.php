<?php
session_start();
require_once("configuracion.php");

$login=0;
for($i=0;$i<count($user);$i++){

	if($user[$i]->usuario==md5($_POST[usuario])&&$user[$i]->clave==md5($_POST[clave])){
		$_SESSION[usuario]=md5($_POST[usuario]);
		$_SESSION[clave]=md5($_POST[clave]);
		$_SESSION[perfil]=$user[$i]->perfil;
		$login=1;
		break;
	}
}

	if($login)
		header("Location: index.php");
	else
		header("Location: login.php");		
?>