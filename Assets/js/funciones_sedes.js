var tableSedes = new DataTable("#SedesTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'Sedes/getObtenerDatosSedes',
            dataSrc:'',
        },
        columns:[
            {data:'sede'},
            {data:'descripcion'},
            {data:'direccion'},
            {data:'status'},
            {data: 'options'}
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]] 
});

function EliminarSedes(id)
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
            var ajaxUrl = base_url +'/Sedes/eliminar';
            // console.log("funciona");
            var strData = "idSede="+id;
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
                        tableSedes.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    } 
                }                  
            }
        }
      })
}

function EditarSedes(idSede)
{   
    //cambio de labels y botones
    document.querySelector("#exampleModalLabel").innerHTML ="Actualizar Sedes";
    document.querySelector("#btn_registrar").innerHTML = "Actualizar";
    
    var id = idSede;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'/Sedes/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        { 
           console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                document.querySelector("#idSede").value = objData.data.id_sedes;
                document.querySelector("#sede").value = objData.data.sede;
                document.querySelector("#descripcion").value = objData.data.descripcion;
                document.querySelector("#direccion").value = objData.data.direccion;
            }
        }
    }
    $('#modalSede').modal('show');
}

// esta funcion evita el fondo negro del modal y realiza el refresh 
function openModalSede()
{
    document.querySelector('#idSede').value ="";
    document.querySelector('#btn_registrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nueva Sede";
    document.querySelector("#formSede").reset();
	$('#modalSede').modal('show');
}