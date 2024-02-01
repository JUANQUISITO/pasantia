/*=============================
             MATERIAS
=============================*/
var tableMaterias = new DataTable("#MateriasTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'Materias/ObtenerDatos',
            dataSrc:'',
        },
        columns:[
            {data:'nombre_materia'},
            {data:'sigla_materia'},
            {data:'semestre'},
            {data:'status'},
            {data: 'options'}
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]] 
});


function EliminarMaterias(id)
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
            var ajaxUrl = base_url +'/Materias/eliminar';
            console.log("funciona");
            var strData = "idMateria="+id;
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
                        tableMaterias.ajax.reload();
                    }else 
                    {
                        Swal.fire( "Atencion!",objData.msg,"error")
                    }
                }
            }
        }
      })
}

function EditarMaterias(idMateria)
{   
 
    //cambio de labels y botones
    document.querySelector("#exampleModalLabel").innerHTML ="Actualizar Materia";
    document.querySelector("#btn_registrar").innerHTML = "Actualizar";
    
    var id = idMateria;
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url+'/Materias/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        { 
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {
                document.querySelector("#idMateria").value = objData.data.id_materia;
                document.querySelector("#materia").value = objData.data.nombre_materia;
                document.querySelector("#siglaMateria").value = objData.data.sigla_materia;
                document.querySelector("#semestre").value = objData.data.semestre;
            }
        }
    }
    $('#modalMateria').modal('show');
}

function openModalMaterias()
{
    document.querySelector('#idMateria').value ="";
    document.querySelector('#btn_registrar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nueva Materia";
    document.querySelector("#formMateria").reset();
	$('#modalMateria').modal('show');
}



