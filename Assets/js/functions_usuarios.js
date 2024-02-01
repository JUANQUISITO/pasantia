var tableUsuarios = new DataTable("#UserTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'Usuarios/getUsers',
            dataSrc:'',
        },
        columns:[
            {data:'nombre_usuario'},
            {data: 'nombre_completo'},
            {data:'nombre'},
            {data:'fecha_creada'},
            {data:'nombre_cargo'},
            {data:'carrera'},
            {data:'status'},
            {data: 'options'}
       
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[3,"desc"]] 
});

//al refrescar la pag SOLO ES NECESARIO UNA VEZ EL .addEventListener
window.addEventListener('load',function()      
{   
    fntRolesUsuario();
    fntCargosUsuario();
    fntCarrerasSedesUsuario();

},false);

function fntRolesUsuario()
{   
    if (document.querySelector('#listRolid')) {
        var ajaxUrl = base_url+'/Roles/getSelectRoles';
        console.log(ajaxUrl);
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#listRolid').innerHTML = request.responseText;
                $('#listRolid').selectpicker('render');
            }
        }
    }
}

function openModal()
{
    document.querySelector('#inputIdUsuario').value ="";
    document.querySelector('#btnAgregar').innerHTML ="Guardar";
    document.querySelector('#nuevo_usuariolabel').innerHTML = "Nuevo Usuario";
    document.querySelector("#formUsuario").reset();
	$('#modalFormUsuario').modal('show');

}

function fntCargosUsuario()
{   
    if (document.querySelector('#listCargo')) {
        var ajaxUrl = base_url+'/Cargos/getSelectCargos';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#listCargo').innerHTML = request.responseText;
                $('#listCargo').selectpicker('render');
            }
        }
    }
}

function fntCarrerasSedesUsuario()
{   
    
    if (document.querySelector('#listCarrera')) {
        
        var ajaxUrl = base_url+'/CarreraSede/getSelectCarreraSedesUsuarios';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#listCarrera').innerHTML = request.responseText;
                $('#listCarrera').selectpicker('render');
            }
        }
    }
}

function fntEditar(idUsuario)
{   
  
    document.querySelector("#nuevo_usuariolabel").innerHTML = "Actualizar Usuario";
    document.querySelector("#btnAgregar").innerHTML = "Actualizar";

    var id = idUsuario;
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + 'Usuarios/editar/'+id;
    request.open("GET",ajaxUrl,true);
    //console.log(ajaxUrl); mostrar los datos capturados del id 
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            var objData = JSON.parse(this.responseText);
            console.log(objData);
            if(objData.status)
            {   
                document.querySelector("#inputIdUsuario").value= objData.data.id_persona;
                document.querySelector("#inputUsuario").value= objData.data.nombre_usuario;
                //document.querySelector("#inputPassword").value= objData.data.clave;
                document.querySelector("#inputPassword").value= "";
                document.querySelector("#listRolid").value= objData.data.rol_id_rol;
                document.querySelector("#inputIdAdministrativo").value= objData.data.id_administrativo;
                document.querySelector("#listCargo").value= objData.data.cargo_id_cargo;
                document.querySelector("#listCarrera").value= objData.data.carrera_sede_id_carrera_sede;
            }
        }
    }
    $('#modalFormUsuario').modal('show');
}
function fntEliminar(id)
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
            var ajaxUrl = base_url+'/Usuarios/eliminar';
            var strData = "idUsuario="+id;
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
  
    
