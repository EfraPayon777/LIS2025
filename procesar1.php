<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <?php
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
        $motivo=$_POST['motivo'];
        $mensaje=$_POST['message'];
        
    ?>
    <div class "container">
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <td>Nombre</td>
                    <td><?= $nombre ?></td>
                </tr>
                <tr>
                    <td>Apellido</td>
                    <td><?= $apellido ?></td>
                </tr>
                <tr>
                    <td>correo</td>
                    <td><?= $correo ?></td>
                </tr>
                <tr>
                    <td>Motivo</td>
                    <td><?= $motivo ?></td>
                </tr>
                <tr>
                    <td>Mnesaje</td>
                    <td><?= $mensaje ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>