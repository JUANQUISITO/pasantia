<!-- header -->
<?php include 'Views/Template/header_lateral.php'; ?>

        <!-- DASHBOARD-->
                
        <div id="layoutSidenav">
        <div class="card"> 
            <div id="layoutSidenav_content" class="right">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard/mostrarAdministrador">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>Home/mostrarCharts">Graficos</a></li>
                        </ol>

                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem; box-shadow:12px 15px 20px 0px rgb(46 61 73 / 15%);" >
                                <div style="padding:20px; background-color:rgba(51, 105, 232, 0.1);color:#ffc107; " ><i class="fas fa-file-alt fa-3x align-content-center" ></i></div>
                                <div class="card-body" style="background-color:aliceblue ;">
                                    <h5 class="card-title">VER CONVENIOS </h5>
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Convenios">Detalles </a>
                                        <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['cantConv']; ?></div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem;" >
                                <div style="padding:20px; background-color:beige; color:goldenrod " ><i class="fas fa-envelope fa-3x"></i></div>
                                <div class="card-body" style="background-color:aliceblue ;">
                                    <h5 class="card-title">VER SOLICITUDES </h5>
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>SolicitudPasantias">Detalles </a>
                                        <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['totalSolicitudes']; ?></div>
                                </div>
                            </div>
                            <?php if(!empty($_SESSION['permisos'][5]['u']))
                            {?>
                            <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem;" >
                                <div style="padding:20px; background-color:lightskyblue; color:cornflowerblue; " ><i class="fas fa-building fa-3x"></i></div>
                                <div class="card-body" style="background-color:aliceblue ;">
                                    <h5 class="card-title">VER EMPRESAS </h5>
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Empresas">Detalles </a>
                                        <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['cantEmpresas']; ?></div>
                                </div>
                            </div>
                           
                            <?php  } ?>
                            <?php if(!empty($_SESSION['permisos'][3]['u']))
                            {?>
                            <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem;" >
                                <div style="padding:20px; background-color:lemonchiffon; color:goldenrod " ><i class="fas fa-user-graduate fa-3x"></i></div>
                                <div class="card-body" style="background-color:aliceblue ;">
                                    <h5 class="card-title">VER ESTUDIANTES </h5>
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Estudiantes">Detalles </a>
                                        <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['cantEstudiantes']; ?></div>
                                </div>
                            </div>
                            <?php  } ?>
                     
                            <?php if(!empty($_SESSION['permisos'][8]['u']))
                            {?>
                             <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem;" >
                                <div style="padding:20px; background-color:lightgray; color:lightgreen; " ><i class="fas fa-user-cog fa-3x"></i></div>
                                <div class="card-body" style="background-color:aliceblue ;">
                                    <h5 class="card-title">VER ADMINISTRATIVOS </h5>
                                        <a class="small text-white stretched-link" href="<?php echo base_url();?>Administrativos">Detalles </a>
                                        <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['cantAdministrativos']; ?></div>
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-md-6 col-lg-6" style="width: 22rem; border-radius:2px;margin-bottom:1.5rem;" >
                                <div style="padding:20px; background-color:rgba(213, 15, 37, 0.1); color:red " ><i class="fas fa-ad fa-3x"></i></div>
                                    <div class="card-body" style="background-color:aliceblue ;">
                                        <h5 class="card-title">VER PUBLICACIONES </h5>
                                            <a class="small text-white stretched-link" href="<?php echo base_url();?>Publicaciones">Detalles </a>
                                            <i class="fas fa-angle-right"> </i>
                                        <div class="pull-right badge" style="background-color:red; "><?=   $data['cantPublicaciones']; ?></div>
                                    </div>
                            </div>
                            <?php  } ?>
                            <?php if(!empty($_SESSION['permisos'][8]['u']))
                            {?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        ULTIMAS SOLICITUDES
                                        <!-- contar la cantidad de solicitudes por carrera y que carrera tiene mas solicitudes  -->
                                    </div>
                                    <table class="table table-hover table-bordered" id="DocenteTable">
                                        <thead class="table-primary" >
                                            <tr>
                                                <th>Nombre Completo </th>
                                                <th>Carnet</th>
                                                <th>Matricula</th>
                                                <th>Carrera</th> 
                                                <th>Empresa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php if (count($data['cantSolicitudPasantias']) > 0){
                                                    foreach($data['cantSolicitudPasantias'] as $datos) {      
                                                        ?>   
                                            <tr>
                                         
                                                <td><?php echo $datos['nombre_completo'];?></td> 
                                                <td><?php echo $datos['carnet'];?></td> 
                                                <td><?php echo $datos['nro_matricula'];?></td> 
                                                <td><?php echo $datos['carrera'];?></td> 
                                                <td><?php echo $datos['nombre_empresa_sin_convenio'];?></td> 
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>

                                        TABLA DE RESULTADOS
                                    </div>
                                    <!-- <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div> -->
                                    <div id="tipodepagos">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>

                                        SOLICITUD MENSUAL FINALIZADOS
                                    </div>
                                    <div id="resultadomes">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>

                                        RESULTADO ANUAL
                                    </div>
                                  
                                    
                                        <!-- <div class="row justify-content-center" id="dataPicker">
                                            <div class="col-lg-6 col-sm-3" >
                                                <input  class="form-control" type="date" />
                                            </div>
                                            <div class="col-lg-6 col-sm-3">
                                            <button class="btn btn-info btn-sm "><i class="fas fa-search"></i></button>
                                            </div>
                                        </div> -->
                                   
                                    <div id="resultadosanio">
                                    </div>
                                    
                                </div>
                            </div>
                         
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                CANTIDAD DE SEGUIMIENTOS FINALIZADOS: 
                                <?= $data['cantidad_seg']
                                     ?>
                            </div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </main>

            </div>
        </div>
                            </div>
      
    <!-- footer  -->

    
    <?php include 'Views/Template/foot.php'; ?>
<script>

    
    // Data retrieved from https://netmarketshare.com
        Highcharts.chart('tipodepagos', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Solicitudes por Carrera, <?php echo $data['solicitudporcarrera']['mes'].' '.$data['solicitudporcarrera']['anio'] ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
                }
            },
            series: [{
                name: 'Cantidad por Carrera',
                colorByPoint: true,
                data: [
                    <?php foreach( $data['solicitudporcarrera']['total'] as $sol_materias) 
                    {
                        echo "{
                            name:'".$sol_materias['carrera']."',
                            y:".$sol_materias['cantidad_carrera']."
                        },";
                    }
                        ?>
                  , ]
            }]
        });

       
            // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
            Highcharts.chart('resultadomes', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: '<?= $data['solicitudMDia']['mes'].' '.  $data['solicitudMDia']['anio']?>'
                },
                subtitle: {
                    text: '<?php 
              
                        echo 'total:'.$data['solicitudMDia']['total'];
                   
                                      
                     ?> ' 
                },
                xAxis: {
                    categories: [<?php  foreach($data['solicitudMDia']['empresas'] as $dias)
                    {
                        echo $dias['dia'].",";  
                    } 
                    ?>]
                },
                yAxis: {
                    title: {
                        text: 'Cantidad de Solicitud por dia'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                     name: '',
                    data: [<?php  foreach($data['solicitudMDia']['empresas'] as $dias)
                    {
                        echo $dias['totalSolicitud'].",";  
                    } 
                    ?>
                    ]
                }]
            });

        // Create the chart
    Highcharts.chart('resultadosanio', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: ' Ano:<?= $data['solicitudYear']['anio']?>'
        },
        subtitle: {
            align: 'left',
            text: 'link'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total solicitudes'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }                                      
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> del total<br/>'
        },

        series: [
            {
                name: "Solicitudes Finalizadas",
                colorByPoint: true,
                data: [
                    <?php  foreach($data['solicitudYear']['meses'] as $mes)
                   
                        echo "['".$mes['mes']."',".$mes['solicitudes']."],";  
                    
                    ?>,
                  
                ]
            }
        ],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: [
                {
                    name: "Chrome",
                    id: "Chrome",
                    data: [
                        [
                            "v65",
                            0.1
                        ],
                        [
                            "v64.0",
                            1.3
                        ],
                        [
                            "v63.0",
                            53.02
                        ],
                        [
                            "v62.0",
                            1.4
                        ],
                        [
                            "v61.0",
                            0.88
                        ],
                        [
                            "v60.0",
                            0.56
                        ],
                        [
                            "v59.0",
                            0.45
                        ],
                        [
                            "v58.0",
                            0.49
                        ],
                        [
                            "v57.0",
                            0.32
                        ],
                        [
                            "v56.0",
                            0.29
                        ],
                        [
                            "v55.0",
                            0.79
                        ],
                        [
                            "v54.0",
                            0.18
                        ],
                        [
                            "v51.0",
                            0.13
                        ],
                        [
                            "v49.0",
                            2.16
                        ],
                        [
                            "v48.0",
                            0.13
                        ],
                        [
                            "v47.0",
                            0.11
                        ],
                        [
                            "v43.0",
                            0.17
                        ],
                        [
                            "v29.0",
                            0.26
                        ]
                    ]
                },
               
            ]
        }
    });  
    let startDate = document.getElementById('startDate')


    startDate.addEventListener('change',(e)=>{
    let startDateVal = e.target.value
    //document.getElementById('startDateSelected').innerText = startDateVal
    })
   

</script>