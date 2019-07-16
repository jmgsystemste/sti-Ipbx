<?php

class mod_mostrar_bd {

    static private function consulta_Bd($consulta){
        require_once 'mod_conexion_bd.php';
            $conn = mod_conexion_bd::BdConectar();
            $sql = $consulta;
            $stmt = $conn->prepare($sql);
            $resultado = $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $rows;
    }
    static public function Mostrar_Info_Calls() {
        $consulta = "SELECT id, calldate, src, dst, duration, disposition, userfield FROM cdr";
        $rows = self::consulta_Bd($consulta);
        foreach ($rows as $row) {
            $tabla.='["'.$row->id.'","'.$row->calldate.'","'.$row->src.'","'.$row->dst.'","'.$row->duration.'","'.$row->disposition.'","<audio controls><source src=\"'. $row->userfield .'\"></audio>"],';
        }

        $tabla = substr($tabla,0,-1 );

        $tablaf = '{"sEcho":1,"iTotalRecords":8,"iTotalDisplayRecords":9,"data":['.$tabla.']}';

    echo $tablaf;
    }
}
mod_mostrar_bd::Mostrar_Info_Calls();