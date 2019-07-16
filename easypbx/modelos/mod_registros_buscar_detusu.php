<?php

require_once 'mod_conexion_bd.php';

class mod_resgistros_buscar_detusu {

    private static $thedate1;
    private static $thedate2;
    private static $estado;
    private static $extencion;
    private static $ini_reg;
    private static $can_reg;

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
        self::$estado = $_POST['estado'];
        self::$ini_reg = $_POST['ini_reg'];
        self::$can_reg = $_POST['can_reg'];
        return;
    }

    public static function BuscarRegistros() {

        self::actualizar_Variables();


        $consulta = "SELECT id, calldate, src, dst, duration, disposition, userfield FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='" . self::$estado . "' AND src='" . self::$extencion . "' OR calldate>='".self::$thedate1."' AND calldate<='".self::$thedate2."' AND disposition='" . self::$estado .  "' AND dst='" . self::$extencion . "' ORDER BY id LIMIT " . self::$ini_reg . "," . self::$can_reg;
        $rows = self::consulta_Bd($consulta);
        $consulta01 = "SELECT COUNT(*) FROM cdr WHERE calldate>='" . self::$thedate1 . "' AND calldate<='" . self::$thedate2 . "' AND disposition='" . self::$estado .  "' AND src='" . self::$extencion .  "' OR calldate>='".self::$thedate1."' AND calldate<='".self::$thedate2."' AND disposition='" . self::$estado .  "' AND dst='" . self::$extencion ."'";
        $rows01 = self::consulta_Bd($consulta01);
        $retorno = $rows01[0]['COUNT(*)'];
        $total[self::$can_reg + 1] = array('cantidad' => $retorno);
        $resultado = array_merge($rows, $total);

        echo (json_encode($resultado));
    }

}

mod_resgistros_buscar_detusu::BuscarRegistros();
