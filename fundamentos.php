<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name= "Payon";
    $lastname ="Cortez";
    $edad=24;
    echo "Hola $name tiene $edad anios <br>";
    echo 'Mi nombre es '.$name.' '.$lastname.'<br>';

    // Coercion de tipos
    $numero=5;
    $numero2="5";
    var_dump(value: $numero==$numero2);
    var_dump(value: $numero===$numero2);
   
    //casting explicito
    $numero3=(int)($numero2);
    var_dump(value: $numero3===$numero)
    ?>
</body>
</html>