<?php require_once 'Views/Template/header_lateral.php'; ?>
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
                            <input class="form-check-input" type="radio" name="puntualidad" id="punt1">
                            <label class="form-check-label" for="punt1">
                               alto
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad" id="punt2" >
                            <label class="form-check-label" for="punt2">
                                regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad" id="punt3" >
                            <label class="form-check-label" for="punt3">
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
                            <input class="form-check-input" type="radio" name="responsabilidad" id="inlineRadio1" value="alto">
                            <label class="form-check-label" for="inlineRadio1">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="responsabilidad" id="inlineRadio2" value="regular">
                            <label class="form-check-label" for="inlineRadio2">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="responsabilidad" id="inlineRadio3" value="bajo" >
                            <label class="form-check-label" for="inlineRadio3">bajo</label>
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col">
                            <label >3.  Honradez y honestidad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="honradez" id="inlineRadio4" value="alto">
                            <label class="form-check-label" for="inlineRadio4">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="honradez" id="inlineRadio5" value="regular">
                            <label class="form-check-label" for="inlineRadio5">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="honradez" id="inlineRadio6" value="bajo" >
                            <label class="form-check-label" for="inlineRadio6">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >4. Sociabilidad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="sociabilidad" id="inlineRadio7" value="alto">
                            <label class="form-check-label" for="inlineRadio7">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="sociabilidad" id="inlineRadio8" value="regular">
                            <label class="form-check-label" for="inlineRadio8">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="sociabilidad" id="inlineRadio9" value="bajo" >
                            <label class="form-check-label" for="inlineRadio9">bajo</label>
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col">
                            <label >5. Iniciativa y creatividad</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="iniciativa" id="inlineRadio10" value="alto">
                            <label class="form-check-label" for="inlineRadio10">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="iniciativa" id="inlineRadio11" value="bajo">
                            <label class="form-check-label" for="inlineRadio11">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="iniciativa" id="inlineRadio12" value="alto" >
                            <label class="form-check-label" for="inlineRadio12">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >6. Orden y limpieza</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="orden" id="orden_alto" value="alto">
                            <label class="form-check-label" for="orden_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="orden" id="orden_regular" value="regular">
                            <label class="form-check-label" for="orden_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="orden" id="orden_bajo" value="bajo" >
                            <label class="form-check-label" for="orden_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >7. Analisis y razonamiento</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="analisis" id="analisis_alto" value="alto">
                            <label class="form-check-label" for="analisis_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="analisis" id="analisis_regular" value="regular">
                            <label class="form-check-label" for="analisis_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="analisis" id="analisis_bajo" value="bajo" >
                            <label class="form-check-label" for="analisis_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >8. Relaciones humanas</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="relaciones" id="relaciones_alto" value="alto">
                            <label class="form-check-label" for="relaciones_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="relaciones" id="relaciones_regular" value="regular">
                            <label class="form-check-label" for="relaciones_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="relaciones" id="relaciones_bajo" value="bajo" >
                            <label class="form-check-label" for="relaciones_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >9. Adaptacion en el trabajo</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="adaptacion" id="adaptacion_alto" value="alto">
                            <label class="form-check-label" for="adaptacion_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="adaptacion" id="adaptacion_regular" value="regular">
                            <label class="form-check-label" for="adaptacion_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="adaptacion" id="adaptacion_bajo" value="bajo" >
                            <label class="form-check-label" for="adaptacion_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >10. Eficiencia</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficiencia" id="eficiencia_alto" value="alto">
                            <label class="form-check-label" for="eficiencia_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficiencia" id="eficiencia_regular" value="regular">
                            <label class="form-check-label" for="eficiencia_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficiencia" id="eficiencia_bajo" value="bajo" >
                            <label class="form-check-label" for="eficiencia_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >11. Eficacia</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficacia" id="eficiencia_alto" value="alto">
                            <label class="form-check-label" for="eficiencia_alto">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficacia" id="eficiencia_regular" value="regular">
                            <label class="form-check-label" for="eficiencia_regular">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="eficacia" id="eficiencia_bajo" value="bajo" >
                            <label class="form-check-label" for="eficiencia_bajo">bajo</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >12. Ética profesional</label>
                        </div>  
    
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="etica" id="etica_alta" value="alto">
                            <label class="form-check-label" for="etica_alta">alto</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="etica" id="etica_media" value="regular">
                            <label class="form-check-label" for="etica_media">regular</label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="etica" id="etica_baja" value="bajo" >
                            <label class="form-check-label" for="etica_baja">bajo</label>
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
                            <input class="form-check-input" type="radio" name="puntualidad_disc" id="puntualidad_buena" value="bueno">
                            <label class="form-check-label" for="puntualidad_buena">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad_disc" id="puntualidad_regular"  value="">
                            <label class="form-check-label" for="puntualidad_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad_disc" id="puntualidad_mala"  value="">
                            <label class="form-check-label" for="puntualidad_mala">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >2.Manejo de Máquinas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_maq" id="manejo_bueno" value="">
                            <label class="form-check-label" for="manejo_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_maq" id="manejo_regular" value="" >
                            <label class="form-check-label" for="manejo_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_maq" id="manejo_malo"  value="">
                            <label class="form-check-label" for="manejo_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >3.Manejo de Equipos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_equip" id="manejo_equip_bueno">
                            <label class="form-check-label" for="manejo_equip_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_equip" id="manejo_equip_regular" >
                            <label class="form-check-label" for="manejo_equip_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_equip" id="manejo_equip_malo" >
                            <label class="form-check-label" for="manejo_equip_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >4.Manejo de Herramientas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_herramientas" id="manejo_herramientas_bueno"value="bueno">
                            <label class="form-check-label" for="manejo_herramientas_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_herramientas" id="manejo_herramientas_regular" value="regular">
                            <label class="form-check-label" for="manejo_herramientas_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_herramientas" id="manejo_herramientas_malo"  value="malo">
                            <label class="form-check-label" for="manejo_herramientas_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >5.Manejo de Instrumentos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_instrumentos" id="manejo_instrumentos_bueno"value="bueno">
                            <label class="form-check-label" for="manejo_instrumentos_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_instrumentos" id="manejo_instrumentos_regular" value="regular">
                            <label class="form-check-label" for="manejo_instrumentos_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="manejo_instrumentos" id="manejo_instrumentos_malo" value="malo" >
                            <label class="form-check-label" for="manejo_instrumentos_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >6.Uso de insumos y materiales</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="uso_insumos" id="uso_insumos_bueno" value="bueno">
                            <label class="form-check-label" for="uso_insumos_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="uso_insumos" id="uso_insumos_regular" value="regular">
                            <label class="form-check-label" for="uso_insumos_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="uso_insumos" id="uso_insumos_malo" value="malo">
                            <label class="form-check-label" for="uso_insumos_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >7.Precisión en el trabajo</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="presicion" id="flexRadioDefault1" value="bueno" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="presicion" id="flexRadioDefault2" value="" value="regular">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="presicion" id="flexRadioDefault2" value="" value="malo">
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
                            <input class="form-check-input" type="radio" name="calidad" id="calidad_bueno" value="bueno">
                            <label class="form-check-label" for="calidad_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="calidad" id="calidad_regular" value="regular" >
                            <label class="form-check-label" for="calidad_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="calidad" id="calidad_malo" value="malo" >
                            <label class="form-check-label" for="calidad_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >9.Puntualidad en la entrega de trabajos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad_trabajos" id="puntualidad_trabajos_bueno" value="bueno">
                            <label class="form-check-label" for="puntualidad_trabajos_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad_trabajos" id="puntualidad_trabajos_regular" value="regular">
                            <label class="form-check-label" for="puntualidad_trabajos_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="puntualidad_trabajos" id="puntualidad_trabajos_malo" value="malo">
                            <label class="form-check-label" for="puntualidad_trabajos_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >10.Cuidadoso y previsor</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cuidadoso_bueno" value="bueno">
                            <label class="form-check-label" for="cuidadoso_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cuidadoso_regular" value="regular">
                            <label class="form-check-label" for="cuidadoso_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="cuidadoso_malo" value="malo">
                            <label class="form-check-label" for="cuidadoso_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >11.Planificación y organización</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="planificacion_organizacion" id="planificacion_organizacion_bueno" value="bueno" >
                            <label class="form-check-label" for="planificacion_organizacion_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="planificacion_organizacion" id="planificacion_organizacion_regular"  value="regular">
                            <label class="form-check-label" for="planificacion_organizacion_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="planificacion_organizacion" id="planificacion_organizacion_malo"  value="malo">
                            <label class="form-check-label" for="planificacion_organizacion_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >12.Razonamiento y criterio técnico</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="razonamiento_criterio" id="razonamiento_criterio_bueno" value="bueno" >
                            <label class="form-check-label" for="razonamiento_criterio_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="razonamiento_criterio" id="razonamiento_criterio_regular"  value="regular">
                            <label class="form-check-label" for="razonamiento_criterio_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="razonamiento_criterio" id="razonamiento_criterio_malo" value="malo">
                            <label class="form-check-label" for="razonamiento_criterio_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >13.Cálculo de taller y/o laboratorio</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="calculo_taller" id="calculo_taller_bueno" value="bueno">
                            <label class="form-check-label" for="calculo_taller_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="calculo_taller" id="calculo_taller_regular" value="_regular" >
                            <label class="form-check-label" for="calculo_taller_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="calculo_taller" id="calculo_taller_malo" value="malo" >
                            <label class="form-check-label" for="calculo_taller_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Interpretación de planos técnicos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_planos" id="interpretacion_planos_bueno" value="bueno">
                            <label class="form-check-label" for="interpretacion_planos_">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_planos" id="interpretacion_planos_regular" value="regular">
                            <label class="form-check-label" for="interpretacion_planos_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_planos" id="interpretacion_planos_malo" value="malo">
                            <label class="form-check-label" for="interpretacion_planos_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Interpretación de catálogos y tablas técnicas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_catalogos" id="interpretacion_catalogos_bueno" value="bueno">
                            <label class="form-check-label" for="interpretacion_catalogos_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_catalogos" id="interpretacion_catalogos_regular" value="regular" >
                            <label class="form-check-label" for="interpretacion_catalogos_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="interpretacion_catalogos" id="interpretacion_catalogos_malo" value="malo" >
                            <label class="form-check-label" for="interpretacion_catalogos_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Instalación de máquinas y/o equipos</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="instalacion_maq" id="instalacion_maq_bueno" value="bueno">
                            <label class="form-check-label" for="instalacion_maq_bueno">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="instalacion_maq" id="instalacion_maq_regular" value="regular" >
                            <label class="form-check-label" for="instalacion_maq_regular">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="instalacion_maq" id="instalacion_maq_malo" value="malo" >
                            <label class="form-check-label" for="instalacion_maq_malo">
                                Malo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label >Reposición y cambio de piezas</label>
                        </div>       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="bueno">
                            <label class="form-check-label" for="flexRadioDefault1">
                               Bueno
                            </label>
                         </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Regular
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="" >
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
<?php include 'Views/Template/foot.php'; ?>	
		