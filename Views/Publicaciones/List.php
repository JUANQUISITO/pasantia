<?php include 'Views/Template/header_lateral.php';?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4>PUBLICACIONES</h4>
    </div>
    <div class="card-body">
        <div class="container" >
            <div class="row">   
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card text-primary mb-4">
                        <div class="card-body">
                            <i class="fas fa-user fa-2x"></i> 
                            Publicacion 1
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
                                <i class="fas fa-user"></i>
                                
                                <p class="card-text"></p>
                                <span class="visually-hidden"></span>
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-light">
                            <a class="small text-white stretched-link" href="<?php echo base_url; ?>Usuarios">Ver detalle</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card text-success mb-4">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x"></i> Clientes
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-success">
                                <i class="fas fa-users"></i>
                                
                                <span class="visually-hidden"></span>
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-light">
                            <a class="small text-white stretched-link" href="<?php echo base_url; ?>Clientes">Ver detalle</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card text-danger mb-4">
                        <div class="card-body">
                            <i class="fas fa-taxi fa-2x"></i> Vehiculos
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                                <i class="fab fa-product-hunt"></i>

                                <span class="visually-hidden"></span>
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-light">
                            <a class="small text-white stretched-link" href="<?php echo base_url; ?>Vehiculos">Ver detalle</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-6">
                    <div class="card text-warning mb-4">
                        <div class="card-body"><i class="fas fa-tags fa-2x"></i> Tipos
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-warning">
                                <i class="fas fa-tag"></i>

                                <span class="visually-hidden"></span>
                            </span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-light">
                            <a class="small text-white stretched-link" href="<?php echo base_url; ?>Tipos">Ver detalle</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<?php require_once 'Views/Template/foot.php'; ?>