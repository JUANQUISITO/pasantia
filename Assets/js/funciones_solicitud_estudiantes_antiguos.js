console.log("antiguos");
var tableSolicitudEstudiantesAntiguos = new DataTable("#SolEstAntiguosTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'SolicitudesEstudiantesAntiguos/getSolEstAntiguos',
            dataSrc:'',
        },
        columns:[
            {data:'nombres_ant'},
            {data:'ci_ant'},
            {data:'matricula_ant'},
            {data:'carrera_ant'},
            {data:'correo_ant'},
            {data:'telefono_ant'},
            {data:'direccion_ant'},
            {data:'fecha_solicitud'},
            {data:'status'},
            {data:'options'}      
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[7,"DESC"]] 
});


function EliminarSolEstAntiguos(id)
{
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
            var ajaxUrl = base_url +'/SolicitudesEstudiantesAntiguos/eliminar';
            console.log("funciona");
            var strData = "idEmpresa="+id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function()
            {
                if(request.status == 200 & request.readyState ==4)
                {
                    var objData = JSON.parse(this.responseText);
                    
                    if(objData.status)
                    {
                        Swal.fire("Eliminar",objData.msg,"success");
                        tableEmpresas.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }
                    
                }
                  
            }
        }
      })
}
function recibirEstudiante(idEstudiante)
{
    console.log("nuevo estudiante");
}
function EditarSolEstAntiguos(idEmpresa)
{  

    //cambio de labels y botones
    document.querySelector("#exampleModalLabel").innerHTML ="Actualizar Solicitud";
    document.querySelector("#btn_registrar").innerHTML = "Actualizar";
    
    var id = idEmpresa;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'/SolicitudesEstudiantesAntiguos/editar/'+id;
    console.log(ajaxUrl);
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        { 
          
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                document.querySelector("#idEmpresa").value = objData.data.id_empresa;
                document.querySelector("#nombre").value = objData.data.nombre_empresa;
                document.querySelector("#areaEmpresa").value = objData.data.area_empresa;
                document.querySelector("#nit").value = objData.data.nit;
                document.querySelector("#ciudad").value = objData.data.ciudad;
                document.querySelector("#direccion").value = objData.data.direccion;
                document.querySelector("#telefonoemp").value = objData.data.telefono;
                document.querySelector("#nombrePersona").value = objData.data.persona_contacto;
                document.querySelector("#cargo").value = objData.data.cargo;
                document.querySelector("#telefContacto").value = objData.data.telefono_contacto;        
            }
        }
    }
    $('#modalEmpresa').modal('show');
}

// esta funcion evita el fondo negro del modal y realiza el refresh 
function openModalEmpresa()
{
    document.querySelector('#idEmpresa').value ="";
    document.querySelector('#btn_registrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nueva Empresa";
    document.querySelector("#formEmpresa").reset();
	$('#modalEmpresa').modal('show');
}