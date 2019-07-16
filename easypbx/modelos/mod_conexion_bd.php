<?php
require_once '../configuraciones/config_bd.php';

class mod_conexion_bd {
    public static function BdConectar() {
        try {
            $conexion = new PDO(Config_Base_Datos::TipoBd . ':host=' . Config_Base_Datos::Host . ';dbname=' . Config_Base_Datos::NombreBd, Config_Base_Datos::UsuarioBd, Config_Base_Datos::ClaveBd);
            $conexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion -> exec("SET NAMES 'utf8'");
            //$conexion->query("SET NAMES 'utf8'");        
            //echo 'Se ha conectado a la base de datos '. Config_Base_Datos::NombreBd.' sin problemas';
            return $conexion;
        } catch (Exception $ex) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $ex->getMessage();
            exit();
        }
    }
    public static function BdDesconectar() {
        $conexion = NULL;
        exit();
    }
}
//mod_conexion_bd::BdConectar();
//Probado y sin novedad para Proyecto EasyPBX ----- 28/MAY/2018 ------
