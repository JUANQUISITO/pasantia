    <?php require_once 'Views/Template/header_lateral.php'; ?>
        <div id="layoutSidenav">  
            <div id="layoutSidenav_content" class="right">
                <main>        
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Graficos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Home/mostrarDashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>Home/mostrarCharts">Graficos</a></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Pasantias
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
                        </div>
                         
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Tablas
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Tortas
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
             
                </main>
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>Assets/js/scripts_dash.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url() ?>Assets/demo/chart-bar-demo.js"></script>
        <script src="<?php echo base_url() ?>Assets/demo/chart-pie-demo.js"></script>
        
<?php include 'Views/Template/foot.php'; ?>      