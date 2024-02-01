
var rolTable = new DataTable('#RolTable', {
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url: '' + base_url + 'Roles/getRoles',
            dataSrc:'',
        },
        columns:[
            {data:'nombre'},
            {data:'descripcion'},
            {data:'status'},
            {data: 'options'}
        ],
    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10
});


function openModal()
{
    document.querySelector('#idRoles').value ="";
    // document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    // document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btn-edit').innerHTML ="Guardar";
    document.querySelector('#titulo-label').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
	$('#modalFormRol').modal('show');

}
function EliminarRol(id)
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
            var ajaxUrl = base_url +'Roles/eliminar';
            var strData = "idRol="+id;
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
                        rolTable.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }
                    
                }
                  
            }
        
        }
      })
}

function EditarRol(idRol)
{   
    //cambio de labels y botones
    document.querySelector('#titulo-label').innerHTML = "Actualizar Rol"; 
    document.querySelector('#btn-edit').innerHTML = " Actualizar";

    var id = idRol;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'Roles/editar/'+id;
    
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                document.querySelector("#idRoles").value = objData.data.id_rol;
                document.querySelector("#nombrerol").value = objData.data.nombre;
                document.querySelector("#descripcion").value = objData.data.descripcion;
            }
        }
    }
    $('#modalFormRol').modal('show');

}

function PermisosRol(idRol)
{
    var id = idRol;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'Permisos/getPermisos/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
           document.querySelector("#contentAjax").innerHTML =this.responseText;
           $('#modalFormPermisos').modal('show');
           document.querySelector('#formPermisos').addEventListener('submit',fntGuardarPermisos,false);

        }
    }
}

function fntGuardarPermisos(event)
{   
    event.preventDefault();
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'Permisos/setPermisos';
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {   
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                Swal.fire("Permisos del Usuario",objData.msg,"success");
            }else 
            {
                Swal.fire("Error",objData.msg,"error");
            }
        }
    }

}