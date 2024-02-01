<?php require_once 'Views/Template/plantilla.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Graficos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="charts.php">Graficos</a></li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Pasantias
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Actualizado ayer a las 11:00 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Tablas
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Tortas
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </main>
            </div>