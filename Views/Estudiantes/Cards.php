<!-- header -->
<?php include 'Views/Template/header_lateral.php'; ?>

        <!-- DASHBOARD-->
                

            
    <div id="layoutSidenav_content" class="right" style="background-color:white;">
        <main>
            <div class="container-fluid px-4">
                <br>
                <h1 class="mt-4">Estudiantes</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Home/mostrarDashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>Home/mostrarCharts">Graficos</a></li>
                </ol>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">INFORMATICA INDUSTRIAL</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="<?php echo base_url(); ?>Estudiantes/Listar">Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">ELECTRONICA</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="https://eispdm.com/baa83f9df3abcbc6997afa81e35f170cb1421804">Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"> ELECTRICIDAD INDUSTRIAL</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">METALURGIA, SIDERURGÍA Y FUNDICIÓN</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://www.industrialmurillo.edu.bo/?page_id=263">Detalles</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                         </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">INDUSTRIA TEXTIL Y CONFECCIÓN</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://www.industrialmurillo.edu.bo/?page_id=263">Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4" >
                            <div class="card-body">MECANICA AUTOMOTRIZ</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="http://www.industrialmurillo.edu.bo/?page_id=263">Detalles</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4" >
                            <div class="card-body text-center">
                                <h5 class="card-title">MECÁNICA INDUSTRIAL</h5>
                                <p class="card-text"></p>
                                
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between" style='text-align:center;'>
                                <a href="#" class="btn btn-primary">Detalles<i class="bi bi-arrow-right-square-fill"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        
                           
                                <div class="card text-white bg-info mb-4" >
                                    <div class="card-body">
                                        <h5 class="card-title">QUÍMICA INDUSTRIAL</h5>
                                        <p class="card-text"></p>
                                        <a href="#" class="btn btn-primary">Detalles</a>
                                    </div>
                                </div>
                            
                        
                    </div>
                </div>
        <!--
                <div class="row row-cols-2 row-cols-md-3 g-4 px-4">
                    <div class="col">
                        <div class="card text-white bg-info mb-3" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">QUÍMICA INDUSTRIAL</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-primary">Detalles</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card text-center border-success mb-3" style="max-width: 18rem;">
                            <div class="card-header bg-transparent border-success">Header</div>
                                <div class="card-body text-success">
                                    <h5 class="card-title">Success card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            <div class="card-footer bg-transparent border-success">Footer</div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card text-center border-success mb-3" style="max-width: 18rem;">
                            <div class="card-header bg-transparent border-success">Header</div>
                                <div class="card-body text-success">
                                    <h5 class="card-title">Success card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            <div class="card-footer bg-transparent border-success">Footer</div>
                        </div>
                    </div>

                    <div class="card" style="width:500px">
                        <img class="card-img-top" src="img_avatar1.png" alt="Card image">
                        <div class="card-img-overlay">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>

                    <div class="card" style="max-width: 500px;">
                        <div class="row g-0">
                            <div class="col-sm-5">
                                <img src="images/sample.svg" class="card-img-top h-100" alt="...">
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title">Alice Liddel</h5>
                                    <p class="card-text">Alice is a freelance web designer and developer based in London. She is specialized in HTML5, CSS3, JavaScript, Bootstrap, etc.</p>
                                    <a href="#" class="btn btn-primary stretched-link">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                        
            </div>
        </main>

    </div>


      
    <!-- footer  -->
    <?php include 'Views/Template/foot.php'; ?>
