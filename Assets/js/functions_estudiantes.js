

ListaEstudiantes();

function BuscarTablaEstudiante(){
    let id_carrera = $("#nombreCarrera").val();
    let id_sede = $("#nombreSede").val();
    if(id_carrera> 0 && id_sede > 0)
    {
        ListaEstudiantes(id_carrera, id_sede)
    }else 
    {
        ListaEstudiantes(id_carrera, id_sede)
    }

}

function ListaEstudiantes(id_carrera= '', id_sede=''){
    //let data = new FormData();
    //data.append("nro_carnet", nro_carnet);
    var tableEstudiantes = new DataTable("#tableEstudiantes", {
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
    
        ajax: {
            url: '' + base_url + '/Estudiantes/getStudents',
            type : "POST",
            //data: {filter_data : nro_carnet},
            data: {id_carrera : id_carrera, id_sede: id_sede},
            dataSrc: '',
        },
        columns: [
            { data: 'nombre_completo' },
            { data: 'carrera' },
            { data: 'sede' },
            { data: 'carnet' },
            { data: 'nro_matricula' },
            { data: 'telefono' },
            { data: 'direccion' },
            {data: 'fecha_creada'},
            { data: 'status' },
            { data: 'options' }
    
        ],
    
        scrollY: 400,
        responsive: true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[7, "desc"]]
    });
}

window.addEventListener('load',function()
{   
    fntCarrera();
    fntSede();
    fntCarreraSede();
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

function openModal() {
    document.querySelector('#idEstudiante').value = "";
    // document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    // document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btn_registrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Estudiante";
    document.querySelector("#frm_verficar_estudiante").reset();

    $('#modalEstudiante').modal('show');
    $("#frm_verficar_estudiante").show();
    IniciarModalNuevoEstudiante();
    tableEstudiantes.reset;
    $("#carnet").attr("readonly","readonly");

}


function fntEditar(idEstudiante) {
    $("#frm_verficar_estudiante").hide();
    //cambio de labels y botones
    document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Estudiante";
    document.querySelector("#btn_registrar").innerHTML = "Actualizar";
    document.querySelector("#carnet").removeAttribute("readonly");
    // $("#carnet").removeAttr("readonly");

    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Estudiantes/editar/' + idEstudiante;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            var objData = JSON.parse(this.responseText);
            
            if (objData.status) {
                document.querySelector("#idEstudiante").value = objData.data.id_estudiante;
                document.querySelector("#idPersona").value = objData.data.persona_usuario_id_persona;
                document.querySelector("#nombres").value = objData.data.nombres;
                document.querySelector("#apellidoPat").value = objData.data.apellido_paterno;
                document.querySelector("#apellidoMat").value = objData.data.apellido_materno;
                document.querySelector("#carnet").value = objData.data.carnet;
                document.querySelector("#nroMatricula").value = objData.data.nro_matricula;
                document.querySelector("#telefono").value = objData.data.telefono;
                document.querySelector("#direccion").value = objData.data.direccion;
                document.querySelector("#listCarreraSede").value = objData.data.carrera_sede_id_carrera_sede;
                
            }
        }
    }
    $('#modalEstudiante').modal('show');

}

function fntEliminar(id) {
    var id = id;
  
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
            var ajaxUrl = base_url + '/Estudiantes/eliminar';
            
            var strData = "idEstudiante=" + id;
            request.open("POST", ajaxUrl, true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
                if (request.status == 200 & request.readyState == 4) {
                    var objData = JSON.parse(this.responseText);

                    if (objData.status) {
                        Swal.fire("Estudiante", objData.msg, "success");
                        // mejorar location.reload(); 
                        $("#tableEstudiantes").DataTable().reload();
                    } else {
                        Swal.fire("Atencion!", objData.msg, "error")
                    }

                }

            }
        }
    })
}



function IniciarModalNuevoEstudiante(){
    $("#frm_nuevo_estudiante").hide();
}

$("#frm_verficar_estudiante").submit(function (event) {
    event.preventDefault();
    document.querySelector("#frm_nuevo_estudiante").reset();

    let nro_carnet = $("#nro_carnet").val();
    
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Estudiantes/VerificarEstudiante';
    var strData = "nro_carnet=" + nro_carnet;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var objData = JSON.parse(this.responseText);
            if(objData.nro_carnet){
                $("#frm_verficar_estudiante").hide();
                $("#frm_nuevo_estudiante").show();
                $("#carnet").val(objData.nro_carnet);
                
            } else {

                alert('el estudiante existe ACTUALIZAR');
            }
        }

    }
});


$("#frm_nuevo_estudiante").submit(function(event){
    event.preventDefault();
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Estudiantes/insertar';
    var strData = $("#frm_nuevo_estudiante").serialize();
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
			var objData = JSON.parse(this.responseText);
           
            if(objData.status)
            {   
                $("#modalEstudiante").modal("hide");
                BuscarTablaEstudiante();
                Swal.fire("Estudiante",objData.msg,"success");
                tableEstudiantes.ajax.reload();

            }else 
            {
                Swal.fire( "Error!",objData.msg,"error")
            }
        }

    }
});

function fntCarreraSede()
{   
    if (document.querySelector('#listCarreraSede')) {
        var ajaxUrl = base_url+'CarreraSede/getSelectCarreraSedesUsuarios';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#listCarreraSede').innerHTML = request.responseText;
                $('#listCarreraSede').selectpicker('render');
            }
        }
    }
}


// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalEstudiante()
{
    document.querySelector('#idEstudiante').value ="";
    document.querySelector('#btnRegistrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Estudiante";
    document.querySelector("#formEstudiante").reset();
	$('#modalEstudiante').modal('show');

}

function fntSolicitud(idEstudiante){
    if(!!idEstudiante){
     
        $('#modalFormEstudianteSolicitud').modal('show');
        $("#idEstudianteSolicitud").val(idEstudiante);

        var request = new XMLHttpRequest();
        var ajaxUrl = base_url + '/Estudiantes/VerificarSolicitudEstudiante';
        var strData = "id_estudiante=" + idEstudiante;
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function () {
            if (request.status == 200 & request.readyState == 4) {
                
                var objData = JSON.parse(this.responseText);
                //   $("#idEstudianteSolicitud").val(objData.id_estudiante);
                  $("#idCarreraSede").val(objData.carrera_sede_id_carrera_sede);
                
            }
        }
    
    }
    //mostrar mensaje o que se recargue la pagina

}

//formulario
let estudianteSolicitud = document.querySelector("#estudianteSolicitud");
   
//previsualizar
    const prevFotBachiller = document.querySelector('#prevFotBachiller');
    const estFottitulobachiller = document.querySelector('#estFottitulobachiller');
    function renderPdfFotBachiller(formData)
    {
        const file = formData.get('estFottitulobachiller');
        const pdf =  URL.createObjectURL(file);
        prevFotBachiller.setAttribute("src", pdf);
    }

    const previewMatricula = document.querySelector('#previewMatricula');
    const estfotocopiamatricula = document.querySelector('#estfotocopiamatricula');
    function renderPdfMatricula(formData2)
    {
        const file2 = formData2.get('estfotocopiamatricula');
        const pdf2 =  URL.createObjectURL(file2);
        previewMatricula.setAttribute("src", pdf2);
    }

    estFottitulobachiller.addEventListener('change',()=>
    {
        const formData = new FormData(estudianteSolicitud);
        renderPdfFotBachiller(formData);
    } );

    estfotocopiamatricula.addEventListener('change', ()=>
    {
        const formData1 = new FormData(estudianteSolicitud);
        renderPdfMatricula(formData1);
    });

    //agregar al controlador 
    estudianteSolicitud.addEventListener('submit', (event)=>
    {
        event.preventDefault();
        var formData = new FormData(estudianteSolicitud);
        var request = new XMLHttpRequest();    
        var ajaxUrl = base_url + 'SolicitudPasantias/insertar';
        request.open("POST",ajaxUrl,true);
        
        request.send(formData);
    
        request.onreadystatechange = function () {
            if (request.status == 200 & request.readyState == 4) {
                var objData = JSON.parse(this.responseText);
                 if(objData.status)
                {   
                    $("#modalFormEstudianteSolicitud").modal("hide");
                    Swal.fire("Solicitud de Pasantia ",objData.msg,"success");
                    tableEstudiantes.ajax.reload(function()
                    {
                    });
                }else 
                {
                    Swal.fire( "Error!",objData.msg,"error")
                }
                
            }
    
        }
    });
   
    /*
    $('#btn_registrar').click(function(e){
        $('#btn_registrar').prop('disabled', true);
        setTimeout(function() {
          $('#btn_registrar').prop('disabled', false);
        }, 10000);
        $('#console').html('<br />Disabled');
    });
    */




