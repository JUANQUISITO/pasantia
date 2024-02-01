<?php include 'Views/EstudiantesControlador/header_lateral_estudiante.php'; ?>
<div class="card">
    <div class="card-header card-header-primary">
        FORMULARIO PRI-100
    </div>
    <div class="card-body">
        <div class="container">
            <div class="p-3 mb-2 bg-ss">
                <figure class="text-center">
                    <h2><strong>EVALUACIÓN DE PRACTICA EN LA INDUSTRIA</strong></h2>
                </figure>
                <br>
            
                <h4><u>DATOS DE LA EMPRESA</u></h4><br>
                <form>
                    <div class="row"> 
                        <div class="col">
                            <label for="nombreEmp" class="">Nombre o Razon Social</label>
                            <input type="text" class="form-control" id="nombreEmp">
                        </div>
                    
                        <div class="col">
                            <label for="sectorEmp" class="">Sector de actividades</label>
                            <input type="text" class="form-control" id="sectorEmp">
                        </div>
                        <div class="col">
                            <label for="direccionEmp" class="">Direccion</label>
                            <input type="text" class="form-control" id="direccionEmp">
                        </div>
                    </div>
                </form>

                <h4><br><u>DATOS DEL ESTUDIANTE PRACTICANTE</u></h4><br>

                <form  method="post" action="<?php echo base_url(); ?>SolicitudPasantias/autocompletar" autocomplete="off">
                    <div class="row" >
                        <div class="col">
                            <label for="practicante" class="">Nombre y Apellidos</label>
                            <input type="text" class="form-control" id="practicante"    >
                        </div>
                        <div class="col">
                            <label for="carnet" class="">C.I.</label> 
                            <input type="text" class="form-control" id="carnet" >
                        </div>
                    </div>
                    <div class="row "> 
                        <div class="col">
                            <label for="carrera" class="">Carrera</label>
                            <input type="text" class="form-control" id="carrea" >
                        </div>
                        
                        <div class="col">
                        <label for="nivel" class="">Nivel de Formacion</label>
                            <input type="text" class="form-control" id="nivel">
                        </div>
                    </div>
                    <div class="row ">
                    
                        <div class="col">
                            <label for="fechaPraIni" class="">Fecha inicio de Practica</label>
                            <input type="date" class="form-control" id="fechaPraIni">
                        </div>
                        <div class="col">
                            <label for="fechaPraConclu" class="">Fecha de Conclusion</label>
                            <input type="date" class="form-control" id="fechaPraConclu">
                        </div>
                        <div class="col">
                            <label for="tiempoTotal" class="">Tiempo total de la practica</label>
                            <input type="text" class="form-control" id="tiempoTotal">
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="cargoEmp" class="">Cargo desempeñado en la empresa</label>
                            <input type="text" class="form-control" id="cargoEmp">
                        </div>
                        <div class="col">
                            <label for="nroMatricula" class="">Nº de matricula</label>
                            <input type="number" class="form-control" id="nroMatricula">
                        </div>
                        <div class="col">
                            <label for="nroMatricula" class="">Gestión</label>
                            <input type="number" class="form-control" id="nroMatricula">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h4><u>CUESTIONARIO</u></h4><br>
                    <h5>1. ASPECTOS GENERALES</h5> 
                  
                    <hr>
                    <div class="row">
                        <!--
                        <div class="col">
                            <label >1.</label>
                        </div>-->
                        <div class="col">
                            <label >1.Puntualidad y disciplina</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               alto
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                medio
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                bajo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <!--
                        <div class="col">
                            <label >2.</label>
                        </div>-->
                        <div class="col">
                            <label >2. Responsabilidad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col">
                            <label >3.  Honradez y honestidad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                            <label class="form-check-label" for="inlineRadio4">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                            <label class="form-check-label" for="inlineRadio5">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6" >
                            <label class="form-check-label" for="inlineRadio6">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >4. Sociabilidad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col">
                            <label >5. Iniciativa y creatividad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >6. Orden y limpieza</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >7. Analisis y razonamiento</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >8. Relaciones humanas</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >9. Adaptacion en el trabajo</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >10. Eficiencia</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >11. Eficacia</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >12. Ética profesional</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">medio</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div>
                    <br>
                    <hr>
                    <h5>2. ASPECTOS TÉCNICOS</h5> 
                    <br>
                    <div class="row">
                        <div class="col">
                            <label >HABILIDADES Y DESTREZAS</label>
                        </div>

                        <div class="col">
                            <label >DESEMPEÑO</label>
                        </div>
                          
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label >1.Puntualida y disciplina</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >2.Manejo de Máquinas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >3.Manejo de Equipos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >4.Manejo de Herramientas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >5.Manejo de Instrumentos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >6.Uso de insumos y materiales</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >7.Precisión en el trabajo</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >8.Calidad en el acabado</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >9.Puntualidad en la entrega de trabajos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >10.Cuidadoso y previsor</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >11.Planificación y organización</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >12.Razonamiento y criterio técnico</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >13.Cálculo de taller y/o laboratorio</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Interpretación de planos técnicos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Interpretación de catálogos y tablas técnicas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Instalación de máquinas y/o equipos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Reposición y cambio de piezas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Higiene y seguridad industrial</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Iniciativa y creatividad</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Trabajo en equipo</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Relación con compañeros de trabajo</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col">
                            <label >Relación con los mandos superiores</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Cumplimiento de normas y Reglamentos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Lealtad y cooperación</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Lenguaje Técnico</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Malo
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <br><button class="btn btn-warning " type="button">Validar PASANTIA</button><br><br>
                        <br><button class="btn btn-primary " type="button">Convertir en PDF</button><br><br>
                        <br><button class="btn btn-danger "  href="<?php echo base_url(); ?>SolicitudPasantias/sigForm" type="button" >Guardar</button><br><br>
                       
                    </div>
                </form>
            </div>    
        </div>
    </div>  
</div>
<?php include 'Views/EstudiantesControlador/footer.php'; ?>     
		