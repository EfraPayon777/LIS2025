<?php
$edades=[10,14,25,96,96.7];
 echo $edades[0];

$edades[1]=28;
array_push($edades,100);
$edades[10]=10;
unset($edades[0]);
print_r($edades);
echo"<h2>Recorriendo el arreglo</h2>";
foreach($edades as $edad)
{
echo "<p>$edad</p>";
}
$tamanio=count($edades);
echo"<p>El tamaño del arreglo es $tamanio</p>";
//Ordenar el arreglo
sort($edades);//Ordenamos de forma mutable
$edades=array_reverse($edades);//Invertimos el orden
print_r($edades);

$datos_personales=[];
$datos_personales['nombre']="Guillermo";
$datos_personales['apellido']="Payin";
$datos_personales['estatua']=1.70;
$datos_personales['genero']='Masculino';
print_r($datos_personales);
echo"<h2>Imprimiendo los elementos del arreglo asociativo</h2>";
foreach($datos_personales as $clave=>$dato){
    echo"<p>$clave : $dato</p>";
}

$persona2=[
    'nombre'=>"Juan",
    'apellido'=>"Perez",
    'estatura'=> 1.80,
    'genero'=>"Masculino"
];
print_r($persona2);