<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Control de Acceso Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-5">Sistema de Control de Acceso RFID</h1>
        
        <div class="row">
            <!-- Módulo del Simulador -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Simulador de Lector ESP32</h5>
                    </div>
                    <div class="card-body">
                        <p>Simula el paso de una tarjeta por el lector físico.</p>
                        <form action="controllers/api_rfid.php" method="POST" target="_blank">
                            <div class="mb-3">
                                <label for="uid" class="form-label">UID de la Tarjeta</label>
                                <input type="text" class="form-control" name="uid" value="TEST_POO_123" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simular Marcación</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Módulo de Vistas -->
            <div class="col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">Módulo Administrativo</h5>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center">
                        <p>Visualiza el registro de entradas, salidas y multas.</p>
                        <a href="views/historial.php" class="btn btn-success w-100 btn-lg">Ver Historial de Asistencias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>