<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $uvs = $_POST['uvs'];
    $nota = $_POST['nota'];

    $materias = simplexml_load_file('materias.xml');

    foreach ($materias->materia as $materia) {
        if ($materia->codigo == $codigo) {
            $materia->nombre = $nombre;
            $materia->uvs = $uvs;
            $materia->nota = $nota;
            break;
        }
    }

    file_put_contents('materias.xml', $materias->asXML());

    header('location:index.php?editado=1');
}
?>
