<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    
    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h1 class="page-header text-center">Calculadora de CUM</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal">
                <span class="glyphicon glyphicon-plus"></span> Agregar materia
            </a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>UVs</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php 
                        $materias = simplexml_load_file('materias.xml');
                        $cum = 0;
                        $numerador = 0;
                        $denominador = 0;

                        foreach($materias->materia as $materia){
                            $numerador += $materia->nota * $materia->uvs;
                            $denominador += $materia->uvs;                        
                    ?>
                    <tr>
                        <td><?=$materia->codigo?></td>
                        <td><?=$materia->nombre?></td>
                        <td><?=$materia->uvs?></td>
                        <td><?=$materia->nota?></td>
                        <td>
                            <button class="btn btn-success editBtn"
                                    data-codigo="<?=$materia->codigo?>"
                                    data-nombre="<?=$materia->nombre?>"
                                    data-uvs="<?=$materia->uvs?>"
                                    data-nota="<?=$materia->nota?>">
                                Editar
                            </button>
                            <a href="borrar.php?codigo=<?=$materia->codigo?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php 
            if($denominador != 0){
                $cum = round($numerador / $denominador, 2);
                echo "<h2>CUM: $cum</h2>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Incluir modales -->
<?php include_once('nueva_modal.php'); ?>
<?php include_once('editar_modal.php'); ?>

<!-- Alertas de éxito -->
<?php if(isset($_GET['exito'])) { ?>
    <script>alertify.success('Materia Agregada');</script>
<?php } ?>
<?php if(isset($_GET['editado'])) { ?>
    <script>alertify.success('Materia Editada');</script>
<?php } ?>

<!-- JavaScript para el modal de edición -->
<script>
    $(document).ready(function() {
        $('.editBtn').on('click', function() {
            let codigo = $(this).data('codigo');
            let nombre = $(this).data('nombre');
            let uvs = $(this).data('uvs');
            let nota = $(this).data('nota');

            $('#edit_codigo').val(codigo);
            $('#edit_nombre').val(nombre);
            $('#edit_uvs').val(uvs);
            $('#edit_nota').val(nota);

            $('#editModal').modal('show');
        });
    });
</script>

</body>
</html>
