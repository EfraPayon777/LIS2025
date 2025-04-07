<?php
include_once 'Models/EditorialModel.php';
$model= new EditorialModel();
$editorial=[
    'codigo_editorial'=> 'EDI789',
    'nombre_editorial'=> 'Prueba INSERT',
    'contacto'=> "Jose",
    'telefono'=>"222222"
];
echo $model->update($editorial);
//echo $model->delete('EDI789');
var_dump($model->get());