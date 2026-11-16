<?php
// Incluimos el modelo para obtener los datos
require_once '../models/AsistenciaDAO.php';

$dao = new AsistenciaDAO();
$asistencias = $dao->listarHistorial();

// Configuramos los headers para forzar la descarga del archivo en el navegador
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=reporte_asistencias_' . date('Y-m-d_H-i-s') . '.csv');

// Abrimos la salida de PHP como si fuera un archivo
$salida = fopen('php://output', 'w');

// Agregamos el BOM de UTF-8 para que Excel lea correctamente las tildes y las "ñ"
fputs($salida, "\xEF\xBB\xBF");

// Escribimos la primera fila con los encabezados de las columnas
fputcsv($salida, ['Fecha', 'Hora', 'Empleado', 'Departamento', 'Tipo', 'Multa ($)']);

// Recorremos el historial y escribimos cada fila en el CSV
foreach ($asistencias as $reg) {
    fputcsv($salida, [
        $reg['fecha'],
        $reg['hora'],
        $reg['nombre'],
        $reg['departamento'],
        $reg['tipo'],
        number_format($reg['multa'], 2)
    ]);
}

fclose($salida);
exit();
?>