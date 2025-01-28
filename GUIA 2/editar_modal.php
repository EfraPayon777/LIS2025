<!-- Editar Materia -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="editLabel">Editar Materia</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editar.php">
                        <input type="hidden" name="codigo" id="edit_codigo">
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="edit_nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="edit_nombre">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="edit_uvs">UVS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="2" max="5" class="form-control" name="uvs" id="edit_uvs">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="edit_nota">Nota:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="0" max="10" step="0.1" class="form-control" name="nota" id="edit_nota">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
