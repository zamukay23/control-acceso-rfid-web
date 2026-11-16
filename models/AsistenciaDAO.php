<?php
require_once '../config/conexion.php';

class AsistenciaDAO {
    private $db;

    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function listarHistorial() {
        // Hacemos un INNER JOIN para traer el nombre del empleado junto con su asistencia
        $sql = "SELECT a.fecha, a.hora, e.nombre, e.departamento, a.tipo, a.multa 
                FROM asistencias a 
                INNER JOIN empleados e ON a.empleado_id = e.id 
                ORDER BY a.fecha DESC, a.hora DESC";
                
        $resultado = $this->db->query($sql);
        $lista = [];
        
        if ($resultado && $resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $lista[] = $fila;
            }
        }
        return $lista;
    }
}
?>