<?php
// Incluimos la conexión
require_once '../config/conexion.php';
date_default_timezone_set('America/Guayaquil');

$con = new Conexion();
$db = $con->conectar();

// Verificamos que el ESP32 envíe datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uid'])) {
    
    // Limpiamos el UID para evitar inyecciones SQL
    $uid = $db->real_escape_string($_POST['uid']);
    $fecha_actual = date("Y-m-d");
    $hora_actual = date("H:i:s");

    // 1. Buscamos si la tarjeta pertenece a un empleado
    $sql_emp = "SELECT id, nombre FROM empleados WHERE uid = '$uid'";
    $resultado = $db->query($sql_emp);

    if ($resultado->num_rows > 0) {
        $empleado = $resultado->fetch_assoc();
        $emp_id = $empleado['id'];
        $nombre = $empleado['nombre'];
        
        // (Aquí luego integraremos tu lógica de turnos y multas de $3/h)
        $tipo = "MARCACION"; 
        $multa = 0.00;

        // 2. Guardamos el registro de asistencia
        $sql_insert = "INSERT INTO asistencias (empleado_id, tipo, fecha, hora, multa) 
                       VALUES ('$emp_id', '$tipo', '$fecha_actual', '$hora_actual', '$multa')";
        
        if ($db->query($sql_insert)) {
            // Le respondemos al ESP32 para que prenda el LED Verde
            echo "OK:" . $nombre;
        } else {
            echo "ERR:BD";
        }
    } else {
        // Tarjeta no registrada (LED Rojo en ESP32)
        echo "ERR:DESCONOCIDO";
    }
} else {
    echo "ERR:PETICION_INVALIDA";
}
?>