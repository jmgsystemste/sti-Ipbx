<?php

class Usuario{
	var $usuario;
	var $clave;
	var $perfil;
	
	function Usuario($u,$c,$p){
		$this->usuario=$u;
		$this->clave=$c;
		$this->perfil=$p;
	}
}

//Usuarios Encriptados

$user[]=new Usuario("21232f297a57a5a743894a0e4a801fc3","21232f297a57a5a743894a0e4a801fc3",1);  //admin:admin
$user[]=new Usuario("122b738600a0f74f7c331c0ef59bc34c","122b738600a0f74f7c331c0ef59bc34c",2);  //usuario1:usuario1
$user[]=new Usuario("2fb6c8d2f3842a5ceaa9bf320e649ff0","2fb6c8d2f3842a5ceaa9bf320e649ff0",3);  //usuario2:usuario2

//echo md5("usuario2")."<br>".md5("");


//Variables archivos interface.

$ruta_panel="/panel/";
$ruta_grabaciones="../../easypbx/";
$ruta_configuracion="formulario.php";


//Archivos editables en configuracion

//$select_archivo[]=array("nombre"=>"sip.conf","ruta"=>"/etc/asterisk/sip.conf","accion"=>"/usr/bin/sudo /usr/sbin/asterisk -rx \"sip reload\"");
//$select_archivo[]=array("nombre"=>"extensions.conf","ruta"=>"/etc/asterisk/extensions.conf","accion"=>"/usr/bin/sudo /usr/sbin/asterisk -rx \"dialplan reload\"");
$select_archivo[]=array("nombre"=>"sip_registros.conf","ruta"=>"/etc/asterisk/sip_registros.conf","accion"=>"/usr/bin/sudo /usr/sbin/asterisk -rx \"sip reload\"");
$select_archivo[]=array("nombre"=>"sip_extensiones.conf","ruta"=>"/etc/asterisk/sip_extensiones.conf","accion"=>"/usr/bin/sudo /usr/sbin/asterisk -rx \"sip reload\"");
$select_archivo[]=array("nombre"=>"sip_troncales.conf","ruta"=>"/etc/asterisk/sip_troncales.conf","accion"=>"/usr/bin/sudo /usr/sbin/asterisk -rx \"sip reload\"");





?>
