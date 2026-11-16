<?php
class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = ""; 
    private $db = "control_acceso_web";
    private $conexion;

    public function conectar() {
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->db);
        
        if ($this->conexion->connect_error) {
            die("Error de conexión a MySQL: " . $this->conexion->connect_error);
        }
        
        $this->conexion->set_charset("utf8");
        return $this->conexion;
    }
}
?>