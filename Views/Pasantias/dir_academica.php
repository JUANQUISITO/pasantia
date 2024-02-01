<?php include 'Views/Template/header_lateral.php'; ?>   


<div class="card">
    <div class="card-header card-header-primary">
        SOLICITUDES - DIRECCIÓN ACADEMICA 
    </div>
    <div class="card-body">
        <div class="page-content bg-light">
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                        <button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();"><i class="fas fa-plus"></i>Nuevo</button>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="example">
                                <thead class="table-primary" >
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Solicitud</th>
                                    <th scope="col">Remitente</th>
                                    <th scope="col">Mensaje</th>
                                    
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                        
  
                                </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<?php include 'Views/Template/foot.php'; ?>   