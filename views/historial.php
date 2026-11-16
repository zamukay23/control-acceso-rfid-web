<?php
require_once '../models/AsistenciaDAO.php';
$dao = new AsistenciaDAO();
$asistencias = $dao->listarHistorial();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Asistencias</title>
    <!-- Incluimos Bootstrap 5 desde su CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Historial de Marcaciones</h2>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Empleado</th>
                            <th>Departamento</th>
                            <th>Tipo</th>
                            <th>Multa ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asistencias as $reg): ?>
                        <tr>
                            <td><?= $reg['fecha'] ?></td>
                            <td><?= $reg['hora'] ?></td>
                            <td><?= $reg['nombre'] ?></td>
                            <td><?= $reg['departamento'] ?></td>
                            <td><?= $reg['tipo'] ?></td>
                            <!-- Pintamos de rojo si hay multa, o verde si es 0.00 -->
                            <td class="<?= $reg['multa'] > 0 ? 'text-danger fw-bold' : 'text-success' ?>">
                                $<?= number_format($reg['multa'], 2) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="../index.php" class="btn btn-secondary">Volver al Inicio</a>
            <a href="../controllers/exportar_csv.php" class="btn btn-success">
            Exportar a CSV (Excel)
    </a>
</div>
    </div>
</body>
</html>