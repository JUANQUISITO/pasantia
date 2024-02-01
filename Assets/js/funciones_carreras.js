var tableCarreras = new DataTable("#CarreraTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'Carreras/getObtenerCarreras',
            dataSrc:'',
        },
        columns:[
            {data:'carrera'},
            {data:'descripcion'},
            {data:'status'},
            {data: 'options'}      
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[1,"asc"]] 
});

function EliminarCarreras(id)
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
            var ajaxUrl = base_url +'/Carreras/eliminar';
            // console.log("funciona");
            var strData = "idCarrera="+id;
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
                        tableCarreras.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    } 
                }                  
            }
        }
      })
}

function EditarCarreras(idCarrera)
{   
    //cambio de labels y botones
    document.querySelector("#exampleModalLabel").innerHTML ="Actualizar Carreras";
    document.querySelector("#btn_registrar").innerHTML = "Actualizar";
    
    var id = idCarrera;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'/Carreras/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        { 
        //   console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                document.querySelector("#idCarrera").value = objData.data.id_carrera;
                document.querySelector("#carrera").value = objData.data.carrera;
                document.querySelector("#descripcion").value = objData.data.descripcion;
            }
        }
    }
    $('#modalCarrera').modal('show');
}

// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalCarrera()
{
    document.querySelector('#idCarrera').value ="";
    document.querySelector('#btn_registrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Carrera";
    document.querySelector("#formCarrera").reset();
	$('#modalCarrera').modal('show');

}