<?php
$alumnos=[
[
    'nombre'=>"Juan",
    'apellido'=>"Perez",
    'Carnet'=> "CC230286",
    'CUM'=>5,
    'materias'=>['lis104','APN501','ESA501']
],
[
    'nombre'=>"Chepe",
    'apellido'=>"Toñito",
    'Carnet'=> "PP28689",
    'CUM'=>8,
    'materias'=>['lis104','APN501','ESA501']
],
[
    'nombre'=>"Juan",
    'apellido'=>"Perez",
    'Carnet'=> "CC230286",
    'CUM'=>5,
    'materias'=>['lis104','APN501','ESA501']
]
];
var_dump($alumnos);

?>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Carnet</th>
        <th>Cum</th>
        <th>Materias escritas</th>
    </tr>
    <?php
    foreach($alumnos as $alumno){
    ?>
    <tr>
        <td><?=$alumno['nombre']?></td>
        <td><?=$alumno['apellido']?></td>
        <td><?=$alumno['Carnet']?></td>
        <td><?=$alumno['CUM']?></td>
        <td><?=implode('',$alumno['materias'],)?></td>

    </tr>
    <?php
    }
    ?>
</table>