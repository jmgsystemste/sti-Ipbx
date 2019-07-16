<?php

require_once 'mod_conexion_bd.php';

class Mdl_Ajax_Info_Bd {
    
    private static $ini_reg;
    private static $can_reg;
    private static $total_reg;
    
    static private function consulta_Bd($consulta){        
            $conn = mod_conexion_bd::BdConectar();
            $sql = $consulta;
            $stmt = $conn->prepare($sql);
            $resultado = $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_BOTH);
            return $rows;
    }
    
    private static function actualizar_Variables() {        
        self::$ini_reg = $_POST['ini_reg'];
        self::$can_reg = $_POST['can_reg'];
    }
    
    private static function total_Registros() {
        self::actualizar_Variables();
        $consulta = "SELECT COUNT(*) FROM cdr";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];
        return $retorno;
    }
    
    public static function mostrar_Contactos() {
        self::actualizar_Variables();
        self::$total_reg = self::total_Registros();
        $consulta = "SELECT id, calldate, src, dst, duration, disposition, userfield FROM cdr ORDER BY id DESC LIMIT ".self::$ini_reg.",".self::$can_reg;
        $rows = self::consulta_Bd($consulta);
        $total[self::$can_reg+1] = array('cantidad'=> self::$total_reg);
        $resultado = array_merge($rows, $total);
                
        echo (json_encode($resultado));
    }
}
Mdl_Ajax_Info_Bd::mostrar_Contactos();