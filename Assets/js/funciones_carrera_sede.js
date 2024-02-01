

var tableCarreraSedes = new DataTable("#CarreraSedesTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'CarreraSede/getObtenerCarreraSedes',
            dataSrc:'',
        },
        columns:[
            {data:'carrera'},
            {data:'sede'},
            {data:'status'},
            {data: 'options'}      
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]] 
});

window.addEventListener('load',function()
{   
    fntCarrera();
    fntSede();
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

function EditarCarreraSede(idCarreraSede)
{       
    document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Carrera-Sede";
    document.querySelector("#btnAgregarCarreraSede").innerHTML = "Actualizar";

    var id = idCarreraSede;
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/CarreraSede/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {   
                document.querySelector("#idCarreraSede").value= objData.data.id_carrera_sede;
                document.querySelector("#nombreCarrera").value= objData.data.carrera_id_carrera;
                document.querySelector("#nombreSede").value= objData.data.sedes_id_sedes;
            }
        }
    }
    $('#modalCarreraSede').modal('show');
}

function EliminarCarreraSede(id)
{ 
    console.log(id);
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
            var ajaxUrl = base_url+'/CarreraSede/eliminar';
            var strData = "idCarreraSede="+id;
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
                        tableCarreraSedes.ajax.reload();
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
  
// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalCarreraSede()
{
    document.querySelector('#idCarreraSede').value ="";
    document.querySelector('#btnAgregarCarreraSede').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Carrera-Sede";
    document.querySelector("#formCarreraSede").reset();
	$('#modalCarreraSede').modal('show');

}