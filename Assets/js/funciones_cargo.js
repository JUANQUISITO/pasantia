
var tableCargos = new DataTable("#cargosTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
         ajax:{
            url:  '' + base_url + '/Cargos/getObtenerCargos',
             dataSrc:'',
         },
         columns:[
             {data:'nombre_cargo'},
             {data:'status'},
             {data: 'options'},
       
         ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]] 
});

function EliminarCargo(id)
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
            var ajaxUrl = base_url +'/Cargos/eliminar';
            var strData = "idCargo="+id;
           
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
                        // mejorar location.reload(); 
						tableCargos.ajax.reload();
						 console.log("hasta aqui2");
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }   
                }     
            }
        }
      })
}

function EditarCargo(idCargo)
{   
    //alert("Hello! abriste el modal actualizar!!");
    console.log
    //cambio de labels y botones
    
    document.querySelector('#exampleModalLabel').innerHTML = "Actualizar Cargo"; 
    document.querySelector('#btnAgregar').innerHTML = " Actualizar";

    var id = idCargo;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'/Cargos/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var objData = JSON.parse(this.responseText);
            //console.log(objData);
            if(objData.status)
            {
                document.querySelector("#idCargo").value = objData.data.id_cargo;
                document.querySelector("#cargo").value = objData.data.nombre_cargo;
            }
        }
    }
    $('#modalCargo').modal('show');

}

function openModal()
{
    document.querySelector('#idCargo').value ="";
    document.querySelector('#btnAgregar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Cargo";
    document.querySelector("#formCargo").reset();
	$('#modalCargo').modal('show');

}