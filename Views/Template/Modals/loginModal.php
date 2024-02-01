<div class="modal fade" id="modalFormProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nuevo estudiante</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <form method="post" action="<?php echo base_url(); ?>Estudiantes/insertar" autocomplete="off">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombrecompleto">Nombre Completo</label>
                                    <input id="nombrecompleto" class="form-control" type="text" name="nombres" placeholder="Nombre Completo" required>
                                </div>

                                <div class="form-group">
                                    <label for="appaterno">Apellido Paterno</label>
                                    <input id="appaterno" class="form-control" type="text" name="apellidoPat" placeholder="Apellido Paterno">
                                </div>

                                <div class="form-group">
                                    <label for="apmaterno">Apellido Materno</label>
                                    <input id="apmaterno" class="form-control" type="text" name="apellidoMat" placeholder="Apellido Materno">
                                </div>

                                <div class="form-group">
                                    <label for="carnet">carnet</label>
                                    <input id="carnet" class="form-control" type="text" name="carnet1" placeholder="Carnet">
                                </div>

                                <div class="form-group">
                                    <label for="Matricula">Matricula</label>
                                    <input id="matricula" class="form-control" type="text" name="nroMatricula" placeholder="Matricula">
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Telefono</label>
                                    <input id="nombre" class="form-control" type="text" name="telefono" placeholder="Telefono">
                                </div>

                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección">
                                </div>
                            
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary"  type="submit"><i class="fas fa-save"></i> Registrar</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
