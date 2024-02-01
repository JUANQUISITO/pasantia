ListaSolicitudPasantias();

function BuscarTablaSolicitud(){
    let id_carrera = $("#nombreCarrera").val();
    let id_sede = $("#nombreSede").val();
    let id_seguimiento = $("#estadoSegui").val();
    if(id_carrera> 0 && id_sede > 0 && id_seguimiento> 0)
    {
        ListaSolicitudPasantias(id_carrera, id_sede,id_seguimiento)
    }else 
    {
        ListaSolicitudPasantias(id_carrera, id_sede, id_seguimiento)
    }

}

function ListaSolicitudPasantias(id_carrera= '', id_sede='',id_seguimiento=''){
   
    var tableSolicitud = new DataTable("#SolicitudTable",{
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
        
            ajax:{
                url:  '' + base_url + 'SolicitudPasantias/getSolicitud',
                type : "POST",
                data: {id_carrera : id_carrera, id_sede: id_sede, id_seguimiento: id_seguimiento},
                dataSrc: '',
            },
                        
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            columns:[
                {data:'nombre_completo'},
                {data:'carnet'},
                {data:'nro_matricula'},
                {data:'carrera'},
                {data: 'sede'},
                {data: 'nombre_empresa_sin_convenio'},
                {data:'fecha_creada'},
                {data: 'status'},
                {data: 'options'}
        
            ],

        scrollY: 400,
        responsive: true,
        searching: true,
        info: false,
        "bDestroy": true,
        "iDisplayLength": 10, 
        "order": [[7, "desc"]]
    });
    
    // $("#filter-form").submit(function(e)
    // {
    //     e.preventDefalt();
    //     console.log(filter_data)
    //     tableSolicitud.ajax.reload();
        
    // });
}

window.addEventListener('load',function()
{   
    fntCarrera();
    fntSede();
},false);


function openModalSolicitud() {
    document.querySelector('#idSolicitud').value = "";
    // document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    // document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btn-sp').innerHTML ="Guardar";
    document.querySelector('#nueva_soliLabel').innerHTML = "Nueva Solicitud";
    document.querySelector("#frm_verficar_solicitud").reset();
    document.querySelector("#frm_nueva_solicitud").reset();
    IniciarModalNuevaSolicitud()
    $('#modalFormSolicitud').modal('show');
    

}


function openModalSolicitudEstudiante(idPersona) {
    console.log(idPersona);
    document.querySelector('#idSolicitud').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btn-sp').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btn-sp').innerHTML ="Solicitar";
    document.querySelector('#nueva_soliLabel').innerHTML = "Nueva Solicitud";
    document.querySelector("#frm_verficar_solicitud").reset();

    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/SolicitudPasantias/VerificarSolicitudEstudiante';
    var strData = "id_persona=" + idPersona;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            // console.log(objData);
            // SI NO EXISTE EL NUMERO DE CARNET 
           
               //SI EXISTE EL NUMERO DE CARNET 
               //console.log('el estudiante existe ss ');

               $("#frm_verficar_solicitud").hide();
               $("#frm_nueva_solicitud").show();
              $("#idEstudianteSolicitud").val(objData.id_estudiante);
              $("#idCarreraSede").val(objData.carrera_sede_id_carrera_sede);
            
        }
    }

    $('#modalFormSolicitud').modal('show');
    // $("#frm_nueva_solicitud").show();
    $("#frm_verficar_solicitud").hide();
  
}


function fntEditar(idSolicitud)
{
    let prevFotoBachiller = document.querySelector("#prevFotBachiller");
    prevFotoBachiller.style.display = "none";

    let prevMatricula = document.querySelector("#previewMatricula");
    prevMatricula.style.display = "none";
    
    $("#frm_verficar_solicitud").hide();
    // $('#modalFormSolicitud').ajax.reload();
    document.querySelector(".modal-title").innerHTML = "Actualizar Solicitud Pasantia";
    document.querySelector("#btn-sp").innerHTML = "Actualizar";

    var id = idSolicitud;
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + 'SolicitudPasantias/editarSolicitud/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {  
    
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {   
                document.querySelector("#idSolicitud").value= objData.data.id_solicitud;
                document.querySelector("#fechaInicio").value= objData.data.fecha_inicio_prac;
                document.querySelector("#fechaConclusion").value= objData.data.fecha_conclu_prac;
                document.querySelector("#tiempoduracion").value= objData.data.tiempo_duracion;
                document.querySelector("#Observaciones").value= objData.data.observaciones;
                document.querySelector("#nombreEmpresa").value= objData.data.nombre_empresa_sin_convenio;
                document.querySelector("#direccion").value= objData.data.direccion;
                document.querySelector("#nombreDestinatario").value= objData.data.nombre_destinatario;
                document.querySelector("#cargoDestinatario").value= objData.data.cargo_encargado;
                document.querySelector("#Telefono").value= objData.data.telefono_empresa;
                document.querySelector("#Fax").value= objData.data.fax;
                document.querySelector("#cargoPracticante").value= objData.data.cargo_estudiante;
         
                if(objData.data.fot_titulo_bachiller != "")
                {
                    // document.querySelector("#fottitulobachiller1").value(objData.data.fot_titulo_bachiller);
                    const pdfbachiller = document.getElementById('pdfbachiller');
                    const encapsular = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfbachiller.innerHTML="";
                    pdfbachiller.append(encapsular)
                    encapsular.innerHTML = 
                    
                        `
                        <iframe src="${objData.data.fot_titulo_bachiller}" title="fotocopia bachiller"  type="application/pdf" ></iframe>
                        
                        `
                    pdfbachiller.append(encapsular)

                    const pdfbachiller2 = document.getElementById('btn-pdfbachiller');
                    const encapsular2 = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfbachiller2.innerHTML="";
                    pdfbachiller2.append(encapsular2)
                    encapsular2.innerHTML = 
                    
                        `
                        <a href="${objData.data.fot_titulo_bachiller}" target="_blank" title="fotocopia bachiller" style="border:none">ver documento</a>
                        `
                        pdfbachiller2.append(encapsular2)

                }
                
                if(objData.data.fot_matricula != "")
                {
                    // document.querySelector("#fottitulobachiller1").value(objData.data.fot_titulo_bachiller);
                    const pdfmatricula = document.getElementById('pdfmatricula');
                    const abrir = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfmatricula.innerHTML="";
                    pdfmatricula.append(abrir)
                    abrir.innerHTML = 
                        `
                        <iframe src="${objData.data.fot_matricula}#view=fitH" title="matricula" type="application/pdf"></iframe>
                        `
                        pdfmatricula.append(abrir)

                    const pdfm = document.getElementById('btn-pdfmatricula');
                    const enc = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfm.innerHTML="";
                    pdfm.append(enc)
                    enc.innerHTML = 
                    
                        `
                        <a href="${objData.data.fot_matricula}" target="_blank" title="fotocopia matricula" style="border:none">ver documento</a>
                        
                        `
                        pdfm.append(enc)
                }
                document.querySelector("#mensaje").value= objData.data.mensaje;
            }
        }
    }

    $('#modalFormSolicitud').modal('show');

}


function fntEliminar(idSolicitud)
{
    var id = idSolicitud;
   console.log(id);
    Swal.fire({
        title: '¿Esta seguro?',
        text: "perdera los datos !",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            var request = new XMLHttpRequest();
            var ajaxUrl = base_url+'SolicitudPasantias/eliminar';
            var strData = "idSolicitarPasantia="+id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function()
            {
                if(request.status == 200 & request.readyState ==4)
                {
                    console.log(this.responseText);

                    var objData = JSON.parse(this.responseText);
                    if(objData.status)
                    {
                        Swal.fire("Eliminar",objData.msg,"success");
                        tableUsuarios.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }
                    
                }
                //location.reload();   
            }
        
        }
      })
}

function fntVerSeguimiento(idSeguimiento)
{
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + 'Seguimiento/mostrarSeguimiento/'+idSeguimiento;
    request.open("GET",ajaxUrl,true);
    request.send();
    
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState ==4)
        {  
            var objData = JSON.parse(this.responseText);
            //console.log(objData);

            //1. mostrar los datos de Estudiante
            //console.log(objData.data_estudiante);
            document.querySelector("#nombreEstudianteSeguimiento").innerHTML= objData.data_estudiante.nombres;
            document.querySelector("#apPatEstudianteSeguimiento").innerHTML= objData.data_estudiante.apellido_paterno;
            document.querySelector("#apMatEstudianteSeguimiento").innerHTML= objData.data_estudiante.apellido_materno;
            document.querySelector("#ciEstudianteSeguimiento").innerHTML= objData.data_estudiante.carnet;
            document.querySelector("#matriculaSeguimiento").innerHTML= objData.data_estudiante.nro_matricula;
            document.querySelector("#sedeEstudianteSeguimiento").innerHTML= objData.data_estudiante.sede;
            document.querySelector("#carreraEstudianteSeguimiento").innerHTML= objData.data_estudiante.carrera;
            document.querySelector("#celularEstudianteSeguimiento").innerHTML= objData.data_estudiante.telefono;    

            //2. mostrar el Historial del Seguimiento
            console.log(objData.data_seguimiento);
            let lista_seguimiento = objData.data_seguimiento;
            var dvTable = $("#tablaSeguimiento >tbody");
            dvTable.html("");
            for(let i=0; i < lista_seguimiento.length; i++)
            {
                //document.querySelector("#mensaje_seg").innerHTML= objData.data.nombres;
                //modiicar aqui el codigo 
                
                let html = `
                        <tr>
                          <td>${lista_seguimiento[i]["estado_seg"]}</td>
                          <td>${lista_seguimiento[i]["mensaje_seg"]}</td>
                          <td>
                            ${lista_seguimiento[i]["nombre_cargo"]}<br>
                            <small>${(lista_seguimiento[i]["carrera"] != null) ? lista_seguimiento[i]["carrera"]+' - ' : ''}  ${(lista_seguimiento[i]["sede"] != null ? lista_seguimiento[i]["sede"] : '')}</small>
                          </td>
                          <td>${lista_seguimiento[i]["fecha"]}</td>
                        </tr>
                    `;
                  
                    dvTable.append(html);
            }
        }
    }

    $('#modalFormVerSeguimiento').modal('show');

}


function fntVerificar(idSolicitud)
{
    document.querySelector(".modal-title").innerHTML = "Verificar Solicitud Pasantia";
    document.querySelector("#btn-verificar").innerHTML = "Verificar Solicitud";

    $('#verificarModalFormSolicitud').modal('show');
    let request = new XMLHttpRequest();
    let ajaxUrl = base_url + 'SolicitudPasantias/getSolPasantia/'+idSolicitud;

    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState ==4)
        {  
            console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {   
                document.querySelector("#idSolicitudVerificar").value =  objData.data.id_solicitud;
                document.querySelector("#vFechaInicio").value= objData.data.fecha_inicio_prac;
                document.querySelector("#vFechaConclusion").value= objData.data.fecha_conclu_prac;
                document.querySelector("#vTiempoDuracion").value= objData.data.tiempo_duracion;
                document.querySelector("#vObservaciones").value= objData.data.observaciones;
                document.querySelector("#vNombreEmpresa").value= objData.data.nombre_empresa_sin_convenio;
                document.querySelector("#vDireccion").value= objData.data.direccion;
                document.querySelector("#vNombreDestinatario").value= objData.data.nombre_destinatario;
                document.querySelector("#vCargoDestinatario").value= objData.data.cargo_encargado;
                document.querySelector("#vTelefono").value= objData.data.telefono_empresa;
                document.querySelector("#vFax").value= objData.data.fax;
                document.querySelector("#vCargoPracticante").value= objData.data.cargo_estudiante;
                document.querySelector("#idCarreraSedeVS").value= objData.data.carrera_sede_id_carrera_sede;
                
                if(objData.data.fot_titulo_bachiller != "")
                {
                    const pdfbachiller = document.getElementById('vPdfbachiller');
                    const encapsular = document.createElement('div')
                    pdfbachiller.innerHTML="";
                    pdfbachiller.append(encapsular)
                    encapsular.innerHTML = 
                    
                        `
                        <iframe src="${objData.data.fot_titulo_bachiller}" title="fotocopia bachiller"  type="application/pdf" ></iframe>
                        `
                    pdfbachiller.append(encapsular)

                    const pdfbachiller2 = document.getElementById('vBtn-pdfbachiller');
                    const encapsular2 = document.createElement('div')
                    pdfbachiller2.innerHTML="";
                    pdfbachiller2.append(encapsular2)
                    encapsular2.innerHTML = 
                        `
                        <a href="${objData.data.fot_titulo_bachiller}" target="_blank" title="fotocopia bachiller" style="border:none">ver documento</a>
                        `
                        pdfbachiller2.append(encapsular2)

                }
                if(objData.data.fot_matricula != "")
                {
                    // document.querySelector("#fottitulobachiller1").value(objData.data.fot_titulo_bachiller);
                    const pdfmatricula = document.getElementById('vPdfmatricula');
                    const abrir = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfmatricula.innerHTML="";
                    pdfmatricula.append(abrir)
                    abrir.innerHTML = 
                        `
                        <iframe src="${objData.data.fot_matricula}#view=fitH" title="matricula" type="application/pdf"></iframe>
                        `
                        pdfmatricula.append(abrir)

                    const pdfm = document.getElementById('vBtn-pdfmatricula');
                    const enc = document.createElement('div')
                    //wrapper.innerHTML ="";
                    pdfm.innerHTML="";
                    pdfm.append(enc)
                    enc.innerHTML = 
                    
                        `
                        <a href="${objData.data.fot_matricula}" target="_blank" title="fotocopia matricula" style="border:none">ver documento</a>
                        `
                        pdfm.append(enc)
                }
                document.querySelector("#mensaje").value= objData.data.mensaje;
            }
            else 
            {
                Swal.fire("Error",objData.msg,"error");
            }
        }
    }
}


function IniciarModalNuevaSolicitud(){
    $("#frm_nueva_solicitud").hide();
}

$("#frm_verficar_solicitud").submit(function (event) {
    event.preventDefault();
    document.querySelector("#frm_nueva_solicitud").reset();

    let nro_carnet_estudiante = $("#nro_carnet_estudiante").val();
    //console.log(nro_carnet_estudiante);
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/SolicitudPasantias/VerificarSolicitud';
    var strData = "nro_carnet_estudiante=" + nro_carnet_estudiante;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            // console.log(objData);
            // SI NO EXISTE EL NUMERO DE CARNET 
            if(!objData.nro_carnet_estudiante){
               //SI EXISTE EL NUMERO DE CARNET 
               //console.log('el estudiante existe ss ');

               $("#frm_verficar_solicitud").hide();
               $("#frm_nueva_solicitud").show();
              $("#idEstudianteSolicitud").val(objData.id_estudiante);
              $("#idCarreraSede").val(objData.carrera_sede_id_carrera_sede);
            
            } else {

                Swal.fire({
                    icon: 'warning',
                    title: 'ALERTA',
                    text: 'EL ESTUDIANTE NO ESTA REGISTRADO!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK!'
                  }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        //$("#frm_verficar_solicitud").hide();
                        //$("#frm_nueva_solicitud").hide();
                        //window.close();
                        // location.reload(); 
                        //BuscarTablaSolicitud();
                        
    
                    }
                  })

                
            }
        }
    }
});


let cartaSolicitud = document.querySelector("#frm_nueva_solicitud");
//previsualizar
    const sPrevFotBachiller = document.querySelector('#prevFotBachiller');
    const fottitulobachiller = document.querySelector('#estFottitulobachiller');
    function renderPdfFotBachiller(formData)
    {
        const file = formData.get('estFottitulobachiller');
        const pdf =  URL.createObjectURL(file);
        sPrevFotBachiller.setAttribute("src", pdf);
    }

    const previewMatricula = document.querySelector('#previewMatricula');
    const estfotocopiamatricula = document.querySelector('#estfotocopiamatricula');
    function renderPdfMatricula(formData2)
    {
        const file2 = formData2.get('estfotocopiamatricula');
        const pdf2 =  URL.createObjectURL(file2);
        previewMatricula.setAttribute("src", pdf2);
    }

    fottitulobachiller.addEventListener('change',()=>
    {
        const formData = new FormData(cartaSolicitud);
        renderPdfFotBachiller(formData);
    } );

    estfotocopiamatricula.addEventListener('change', ()=>
    {
        const formData1 = new FormData(cartaSolicitud);
        renderPdfMatricula(formData1);
    });
    

cartaSolicitud.addEventListener('submit', (event)=>
{
    event.preventDefault();
    var formData = new FormData(cartaSolicitud);
    var request = new XMLHttpRequest();    
    var ajaxUrl = base_url + '/SolicitudPasantias/insertar';
    request.open("POST", ajaxUrl, true);
    // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(formData);
    
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
          
            if(objData.status)
            {   
                $("#modalFormSolicitud").modal("hide");
                BuscarTablaSolicitud();
                Swal.fire("Solicitud",objData.msg,"success");
                tableSolicitud.ajax.reload();
            }else 
            {
                Swal.fire( "Error!",objData.msg,"error")
            }
        }

    }
});
//recibimos el id del formulario verificar solicitud pasantia
let formVerificarSolicitud = document.querySelector("#formVerificaSolicitud");
formVerificarSolicitud.addEventListener('submit',(event)=>{
    event.preventDefault();
    var formData = new FormData(formVerificarSolicitud);
    var request = new XMLHttpRequest();    
    var ajaxUrl = base_url + 'Seguimiento/verificarSolicitudPa';
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {   
                $("#verificarModalFormSolicitud").modal("hide");
                // BuscarTablaSolicitud();
                Swal.fire("Seguimiento",objData.msg,"success");
                
            }else 
            {
                Swal.fire( "Error!",objData.msg,"error")
            }
        }

    }

    
});



function fntRecibir(idSolicitud)
{
    //console.log("verifiacr sol");
    let id = idSolicitud;
    //console.log(id);
    Swal.fire({
        title: 'Recibir Solicitud',
        text: "¿Realmente quieres recibir la solicitud ?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Aceptar!',
        cancelButtonText: 'No,Cancelar!'
      
      }).then((result) => {
        if (result.isConfirmed) {
            var request = new XMLHttpRequest();
            var ajaxUrl = base_url+'Seguimiento/recibirSolicitudP';
            var strData = "idSolicitud="+id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function()
            {
                if(request.status == 200 & request.readyState ==4)
                {

                    var objData = JSON.parse(this.responseText);
                   console.log(objData);
                    if(objData.status)
                    {
                        Swal.fire("Recibido",objData.msg,"success");
                    
                        tableSolicitud.ajax.reload();
                        
                       
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }
                   
                    
                } if(this.status)
                {
                    console.log("trueeee");
                    msg();
                }
                //location.reload();   
            }
        
        }
      })
}
function msg()
{
    $("#btn_recibir").button("hide");
}

function verPdf(idSolicitud)
{
    
    console.log(idSolicitud);
    let request = new XMLHttpRequest();
    let ajaxUrl = base_url + 'SolicitudPasantias/generarPdf/'+idSolicitud;
    window.open(ajaxUrl);
    request.open("GET",ajaxUrl,true);
    request.send();
}

window.addEventListener('load',function()
{   
    fntCarrera();
    fntSede();
    fntEstadoSeg();
},false);



function fntCarrera()/*ES DEL CARRERA A CARRERA-SEDE*/
{   
    if (document.querySelector('#nombreCarrera')) {
        var ajaxUrl = base_url+'/Carreras/getSelectCarreras';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#nombreCarrera').innerHTML = request.responseText;
                
                $('#nombreCarrera').selectpicker('render');
            }
        }
    }
}

function fntSede()/*ES DE SEDE A CARRERA-SEDE*/
{   
    if (document.querySelector('#nombreSede')) {
        var ajaxUrl = base_url+'/Sedes/getSelectSedes';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#nombreSede').innerHTML = request.responseText;
                $('#nombreSede').selectpicker('render');
            }
        }
    }
}

function fntEstadoSeg()/*ES DE ESTADOS DEL SEGUIMIENTO A LAS SOLICITUDES*/
{   
    if (document.querySelector('#estadoSegui')) {
        var ajaxUrl = base_url+'/Seguimiento/getSelectEstadoSeg';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#estadoSegui').innerHTML = request.responseText;
                
                $('#estadoSegui').selectpicker('render');
            }
        }
    }
}


function finalizarPasantia(idSolicitud)
{
    // document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btn-concluir').classList.replace("btn-info", "btn-success");
    document.querySelector('#btn-concluir').innerHTML ="Guardar Cambios";
    
    let request = new XMLHttpRequest();
    let ajaxUrl = base_url + 'SolicitudPasantias/getSolPasantia/'+idSolicitud;

    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState ==4)
        {  
            console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {   
                document.querySelector("#idSolicitudConcluida").value =  objData.data.id_solicitud;
                document.querySelector("#idCarreraSedeConcluida").value= objData.data.carrera_sede_id_carrera_sede;
                
            }
        }
    }
    $("#SolicitdCompletarModal").modal('show');
}

let concluirPasantia = document.querySelector("#concluirPasantia");
concluirPasantia.addEventListener('submit',(event)=>{
    event.preventDefault();
    console.log("1");
    var formData = new FormData(concluirPasantia);
    var request = new XMLHttpRequest();    
    var ajaxUrl = base_url + 'Seguimiento/concluirPasantia';
    
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
           console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {   
                // $("#verificarModalFormSolicitud").modal("hide");
                // BuscarTablaSolicitud();
                Swal.fire("Seguimiento",objData.msg,"success");
                
            }else 
            {
                Swal.fire( "Error!",objData.msg,"error")
            }
        }
        
    }
    
    
});

function verPri100(idSolicitud)
{
    console.log(idSolicitud);
    let request = new XMLHttpRequest();
    let ajaxUrl = base_url + 'SolicitudPasantias/generarPri100/'+idSolicitud;
    window.open(ajaxUrl);
    request.open("GET",ajaxUrl,true);
    request.send();
}