<?php
function convertir($cantidad, $origen, $destino) {
    $factores = [
        "metros" => 1,
        "yardas" => 1.09361,
        "pies" => 3.28084,
        "varas" => 1.1963
    ];
    
    if (!isset($factores[$origen]) || !isset($factores[$destino])) {
        return "Unidad no válida";
    }
    
    $cantidad_en_metros = $cantidad / $factores[$origen];
    return $cantidad_en_metros * $factores[$destino];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
</head>
<body>
    <h2>Conversor de Unidades</h2>
    <form method="post">
        Cantidad: <input type="number" name="cantidad" step="any" required>
        <br>
        Convertir de:
        <select name="origen">
            <option value="metros">Metros</option>
            <option value="yardas">Yardas</option>
            <option value="pies">Pies</option>
            <option value="varas">Varas</option>
        </select>
        <br>
        A:
        <select name="destino">
            <option value="metros">Metros</option>
            <option value="yardas">Yardas</option>
            <option value="pies">Pies</option>
            <option value="varas">Varas</option>
        </select>
        <br>
        <input type="submit" name="convertir" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = floatval($_POST["cantidad"]);
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        $resultado = convertir($cantidad, $origen, $destino);
        echo "<h3>Resultado: $cantidad $origen equivale a $resultado $destino</h3>";
    }
    ?>
</body>
</html>
