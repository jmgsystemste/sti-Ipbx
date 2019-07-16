<?php

require_once 'mod_conexion_bd.php';

class mod_informe_usudet {

    private static $thedate1;
    private static $thedate2;
    private static $extencion;   
    private static $total_llamadas_ent;
    private static $total_llamadas_sal;
    private static $total_minutos_ent;
    private static $total_minutos_sal;
    private static $total_contestadas_ent;
    private static $total_contestadas_sal;
    private static $total_no_contestadas_ent;
    private static $total_no_contestadas_sal;
    private static $total_ocupadas_ent;
    private static $total_ocupadas_sal;
    private static $total_falladas_ent;
    private static $total_falladas_sal;

    static private function consulta_Bd($consulta) {
        $conn = mod_conexion_bd::BdConectar();
        $sql = $consulta;
        $stmt = $conn->prepare($sql);
        $resultado = $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_BOTH);
        return $rows;
    }

    private static function actualizar_Variables() {
        self::$thedate1 = $_POST['thedate'] . ' 00:00:00';
        self::$thedate2 = $_POST['thedate1'] . ' 23:59:59';
        self::$extencion = $_POST['extencion'];
        return;
    }
    
    private static function total_Llamadas_sal() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_minutos_sal() {
        $consulta = "SELECT SUM(duration) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['SUM(duration)'];        
        return $retorno;
    }
     private static function total_contestadas_sal() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "' AND disposition='ANSWERED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_NoContestadas_sal() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "' AND disposition='NO ANSWER'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_ocupadas_sal() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "' AND disposition='BUSY'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_falladas_sal() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND src='" . self::$extencion . "' AND disposition='FAILED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    
    private static function total_Llamadas_ent() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_minutos_ent() {
        $consulta = "SELECT SUM(duration) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['SUM(duration)'];        
        return $retorno;
    }    
    private static function total_contestadas_ent() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "' AND disposition='ANSWERED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }   
    private static function total_NoContestadas_ent() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "' AND disposition='NO ANSWER'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }    
    private static function total_ocupadas_ent() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "' AND disposition='BUSY'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }    
    private static function total_falladas_ent() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND dst='" . self::$extencion . "' AND disposition='FAILED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    
    public static function generarConsulta() {

        self::actualizar_Variables();       
        
        self::$total_llamadas_sal = self::total_Llamadas_sal();
        $resultado[0] = array('tot_llam_sal' => self::$total_llamadas_sal);
        self::$total_minutos_sal = self::total_minutos_sal();
        $resultado[1] = array('tot_mint_sal' => self::$total_minutos_sal);
        self::$total_contestadas_sal = self::total_contestadas_sal();
        $resultado[2] = array('tot_contes_sal' => self::$total_contestadas_sal);
        self::$total_no_contestadas_sal = self::total_NoContestadas_sal();
        $resultado[3] = array('tot_nocontes_sal' => self::$total_no_contestadas_sal);
        self::$total_ocupadas_sal = self::total_ocupadas_sal();
        $resultado[4] = array('tot_ocup_sal' => self::$total_ocupadas_sal);
        self::$total_falladas_sal = self::total_falladas_sal();
        $resultado[5] = array('tot_fall_sal' => self::$total_falladas_sal);
                
        self::$total_llamadas_ent = self::total_Llamadas_ent();
        $resultado[6] = array('tot_llam_ent' => self::$total_llamadas_ent);
        self::$total_minutos_ent = self::total_minutos_ent();
        $resultado[7] = array('tot_mint_ent' => self::$total_minutos_ent);       
        self::$total_contestadas_ent = self::total_contestadas_ent();
        $resultado[8] = array('tot_contes_ent' => self::$total_contestadas_ent);       
        self::$total_no_contestadas_ent = self::total_NoContestadas_ent();
        $resultado[9] = array('tot_nocontes_ent' => self::$total_no_contestadas_ent);       
        self::$total_ocupadas_ent = self::total_ocupadas_ent();
        $resultado[10] = array('tot_ocup_ent' => self::$total_ocupadas_ent);       
        self::$total_falladas_ent = self::total_falladas_ent();
        $resultado[11] = array('tot_fall_ent' => self::$total_falladas_ent);       
                    
        echo (json_encode($resultado));
        
    }

}
mod_informe_usudet::generarConsulta();