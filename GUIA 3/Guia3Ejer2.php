<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio de Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FAF3E0; /* Blanco hueso */
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #D8BFD8; /* Morado claro */
            color: white;
        }
        .promedio {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Promedio de Notas de Estudiantes</h2>
        <form method="post" class="mb-4">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del estudiante" required>
                </div>
                <div class="col">
                    <input type="number" name="tarea" class="form-control" placeholder="Nota Tarea (0-100)" required>
                </div>
                <div class="col">
                    <input type="number" name="investigacion" class="form-control" placeholder="Nota Investigación (0-100)" required>
                </div>
                <div class="col">
                    <input type="number" name="examen" class="form-control" placeholder="Nota Examen Parcial (0-100)" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>

        <?php
        session_start();
        if (!isset($_SESSION['estudiantes'])) {
            $_SESSION['estudiantes'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $tarea = $_POST['tarea'];
            $investigacion = $_POST['investigacion'];
            $examen = $_POST['examen'];
            
            $_SESSION['estudiantes'][$nombre] = [
                "tarea" => $tarea,
                "investigacion" => $investigacion,
                "examen_parcial" => $examen
            ];
        }

        function calcularPromedio($notas) {
            return ($notas["tarea"] * 0.50) + ($notas["investigacion"] * 0.30) + ($notas["examen_parcial"] * 0.20);
        }

        if (!empty($_SESSION['estudiantes'])) {
            echo "<table class='table table-bordered mt-3'>
                    <tr>
                        <th>Nombre del Estudiante</th>
                        <th>Tarea (50%)</th>
                        <th>Investigación (30%)</th>
                        <th>Examen Parcial (20%)</th>
                        <th>Promedio</th>
                    </tr>";

            foreach ($_SESSION['estudiantes'] as $nombre => $notas) {
                $promedio = calcularPromedio($notas);
                echo "<tr>
                        <td>$nombre</td>
                        <td>{$notas['tarea']}</td>
                        <td>{$notas['investigacion']}</td>
                        <td>{$notas['examen_parcial']}</td>
                        <td class='promedio'>" . number_format($promedio, 2) . "</td>
                      </tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
