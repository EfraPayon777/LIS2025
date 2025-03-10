<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Venta de autos</title>
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<header>
    <h1>Autos disponibles</h1>
</header>
<div class="row">
<?php
spl_autoload_register(function($class){
    if (is_file("class/{$class}.class.php")){
        include_once("class/{$class}.class.php");
    } else {
        die("class/{$class}.class.php No existe en el proyecto");
    }
});

// Creando los objetos para cada tipo de auto.
$movil[0] = new auto("Peugeot", "307", "Gris", "img/peugeot.jpg");
$movil[1] = new auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg");
$movil[2] = new auto("BMW", "X3", "Negro", "img/bmwserie6.jpg");
$movil[3] = new auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg");
$movil[4] = new auto(); // Valores por defecto

// Procesar la selección del usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['auto_seleccionado'])) {
    $indice = $_POST['auto_seleccionado'];
    if (isset($movil[$indice])) {
        // Mostrar el auto seleccionado
        $movil[$indice]->mostrar();
        // Agregar el botón "Regresar"
        echo "<div class='col-12 mt-3'>";
        echo "<button onclick='window.location.href=\"autospoo.php\"' class='btn btn-secondary'>Regresar</button>";
        echo "</div>";
    }
} else {
    // Mostrar el formulario
    echo "<form method='post' action='autospoo.php'>";
    echo "<div class='form-group'>";
    echo "<label for='auto_seleccionado'>Seleccione un auto:</label>";
    echo "<select class='form-control' id='auto_seleccionado' name='auto_seleccionado'>";
    foreach ($movil as $indice => $auto) {
        // Usar los métodos getMarca() y getModelo() para acceder a las propiedades privadas
        echo "<option value='$indice'>" . $auto->getMarca() . " " . $auto->getModelo() . "</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Mostrar</button>";
    echo "</form>";
}
?>
</div>
</div>
</body>
</html>