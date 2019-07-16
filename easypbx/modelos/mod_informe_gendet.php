<?php

require_once 'mod_conexion_bd.php';

class mod_informe_gendet {

    private static $thedate1;
    private static $thedate2;
    private static $total_llamadas;
    private static $total_minutos;
    private static $total_contestadas;
    private static $total_no_contestadas;
    private static $total_ocupadas;
    private static $total_falladas;

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
        return;
    }
    private static function total_Llamadas() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_minutos() {
        $consulta = "SELECT SUM(duration) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['SUM(duration)'];        
        return $retorno;
    }
    private static function total_contestadas() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='ANSWERED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_NoContestadas() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='NO ANSWER'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_ocupadas() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='BUSY'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    private static function total_falladas() {
        $consulta = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='FAILED'";
        $rows = self::consulta_Bd($consulta);
        $retorno = $rows[0]['COUNT(*)'];        
        return $retorno;
    }
    public static function generarConsulta() {

        self::actualizar_Variables();
        self::$total_llamadas = self::total_Llamadas();
        $resultado[0] = array('tot_llam' => self::$total_llamadas);
        self::$total_minutos = self::total_minutos();
        $resultado[1] = array('tot_minu' => self::$total_minutos);
        self::$total_contestadas = self::total_contestadas();
        $resultado[2] = array('tot_contes' => self::$total_contestadas);
        self::$total_no_contestadas = self::total_NoContestadas();
        $resultado[3] = array('tot_no_contes' => self::$total_no_contestadas);
        self::$total_ocupadas = self::total_ocupadas();
        $resultado[4] = array('tot_ocup' => self::$total_ocupadas);
        self::$total_falladas = self::total_falladas();
        $resultado[5] = array('tot_fall' => self::$total_falladas);
        
        echo (json_encode($resultado));        
    }
}
mod_informe_gendet::generarConsulta();