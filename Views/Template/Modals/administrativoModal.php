<div class="modal" id="modalAdministrativo"  aria-labelledby="exampleModalLabel" data-bs-keyboard="true" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1b72f9; color:white;">
                <h4 class="modal-title" id="exampleModalLabel">Nuevo Administrativo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="container">
                    <form method="post" id="frm_verficar_administrativo" >
                        <figure class="text-center" >
                            <h6 style="color:black;"><strong>VERIFIQUE SI EXISTE <strong></h6>
                        </figure>
                        <div class="text-center">                           
                            <label style="color:blue;" for="carnet">Ingrese el numero de carnet:</label>                           
                            <input style="border-color: blue;"  class="form-control" type="text" id="nro_carnet_administrativo" name="nro_carnet_administrativo" required>
                            <button type="submit" class="btn btn-primary mt-2">Verificar</button>
                        </div>
                    </form>
                 
                    <form id="frm_nuevo_administrativo" method="post" >
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="idAdministrativo" id="idAdministrativo" > 
                            <figure class="text-center" >
                                <h6 style="color:black;"><strong>DATOS PERSONALES<strong></h6>
                            </figure>
                            
                            <div class="form-group ">
                                <label for="nombres">Nombres </label>
                                
                                <input style="border-color: blue;"  id="nombres" class="form-control" type="text" name="nombres" placeholder="Nombres" >

                            </div>

                            <div class="form-group ">
                                <label for="apPat">Apellido Paterno</label>
                                <input  style="border-color: blue;"  id="apPat" class="form-control" type="text" name="apPat"   >
                            </div>

                            <div class="form-group ">
                                <label for="apMat">Apellido Materno</label>
                                <input style="border-color: blue;"  id="apMat" class="form-control" type="text" name="apMat"  >
                            </div>

                            <div class="form-group ">
                                <label for="email">Email</label>
                                <input style="border-color: blue;"  id="email" class="form-control" type="text" name="email"  >
                            </div>

                            <div class="form-group ">
                                <label for="ci">Carnet</label>
                                <input style="border-color: blue;"  id="ci" class="form-control" type="text" name="ci"  >
                            </div>

                            <div class="form-group ">
                                <label for="tel">Telefono</label>
                                <input style="border-color: blue;"  id="tel" class="form-control" type="text" name="tel"  >
                            </div>
                        
                            <div class="form-group ">
                                <label for="dir">Direccion</label>
                                <input style="border-color: blue;"  id="dir" class="form-control" type="text" name="dir"  >
                            </div>

                            <div class="form-group ">
                                <label for="cargo">Cargo</label>                                               
                                <select style="border-color: blue;"  class="form-select" aria-label="Default select example" id="cargo" name="cargo">

                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="cargo">Carrera-Sede</label>       
                                <select style="border-color: blue;"  class="form-select" aria-label="Default select example" id="carreraSede" name="carreraSede">

                                </select>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btnAgregar"  type="submit"><i class="fas fa-save"></i> Registrar</button>                                         
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  