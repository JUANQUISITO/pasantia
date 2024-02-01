var tableAdministrativo = new DataTable("#AdministrativoTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
         ajax:{
            url:  '' + base_url + '/Administrativos/getObtenerAdministrativos',
             dataSrc:'',
         },
         columns:[
             {data:'nombres'},
             {data:'carnet'},
             {data:'nombre_cargo'},
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

/*DE PERSONAS A ADMINISTRATIVO*/
window.addEventListener('load',function()
{   
    fntPersonaAdmin();

},false);

function fntPersonaAdmin()
{   
    if (document.querySelector('#nombres')) {
        var ajaxUrl = base_url+'/Personas/getSelectPersonas';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#nombres').innerHTML = request.responseText;
                $('#nombres').selectpicker('render');
            }
        }
    }
}

/*DE CARGO A ADMINISTRATIVO*/
window.addEventListener('load',function()
{   
    fntCargoAdministrativo();

},false);

function fntCargoAdministrativo()
{   
    if (document.querySelector('#cargo')) {
        var ajaxUrl = base_url+'/Cargos/getSelectCargos';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#cargo').innerHTML = request.responseText;
                $('#cargo').selectpicker('render');
            }
        }
    }
}

/* DE CARRERA-SEDE A ADMINISTRATIVO*/

window.addEventListener('load',function()
{   
    fntCarreraSedeAdministrativo();
},false);

function fntCarreraSedeAdministrativo()
{   
    if (document.querySelector('#carreraSede')) {
        var ajaxUrl = base_url+'/CarreraSede/getSelectCarreraSedesAdministrativos';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#carreraSede').innerHTML = request.responseText;
                $('#carreraSede').selectpicker('render');
            }
        }
    }
}

function fntEditarAdmin(idAdministrativo)
{   
    //$("#frm_verficar_administrativo").hide();
    //$("#frm_nuevo_administrativo").show();
    console.log(idAdministrativo);
    document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Administrativo";
    document.querySelector("#btnAgregar").innerHTML = "Actualizar";

    var id = idAdministrativo;
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Administrativos/editar/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            var objData = JSON.parse(this.responseText);
            if(objData.status)
            {   
                document.querySelector("#idAdministrativo").value= objData.data.id_administrativo;                
                document.querySelector("#nombres").value= objData.data.persona_usuario_id_persona;
                document.querySelector("#apPat").value= objData.data.apellido_paterno;
                document.querySelector("#apMat").value= objData.data.apellido_materno;
                document.querySelector("#email").value= objData.data.e_mail;
                document.querySelector("#ci").value= objData.data.carnet;
                document.querySelector("#tel").value= objData.data.telefono;
                document.querySelector("#dir").value= objData.data.direccion;
                document.querySelector("#cargo").value= objData.data.cargo_id_cargo;
                document.querySelector("#carreraSede").value= objData.data.carrera_sede_id_carrera_sede;

            }
        }
    }
    $('#modalAdministrativo').modal('show');
}

function fntEliminarAdmin(id)
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
            var ajaxUrl = base_url+'/Administrativos/eliminar';
            var strData = "idAdministrativo="+id;
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
  
// esta funcion evita el fondo negro del modal y realiza el refresh 
function openModalAdministrativo()
{
    document.querySelector('#idAdministrativo').value ="";
    document.querySelector('#btnAgregar').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Administrativo";
    document.querySelector("#frm_verficar_administrativo").reset();
	
    $('#modalAdministrativo').modal('show');
    $("#frm_verficar_administrativo").show();
    IniciarModalNuevoAdministrativo()
}   

function IniciarModalNuevoAdministrativo(){
    $("#frm_nuevo_administrativo").hide();
}


$("#frm_verficar_administrativo").submit(function (event) {
    event.preventDefault();
    document.querySelector("#frm_nuevo_administrativo").reset();

    let nro_carnet_administrativo = $("#nro_carnet_administrativo").val();
    console.log(nro_carnet_administrativo);
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Administrativos/VerificarAdministrativo';
    var strData = "nro_carnet_administrativo=" + nro_carnet_administrativo;
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            // console.log(objData);
            // SI NO EXISTE EL NUMERO DE CARNET 
            if(objData.nro_carnet_administrativo){
               //SI EXISTE EL NUMERO DE CARNET 
               //$("#frm_verficar_administrativo").hide();
               $("#frm_nuevo_administrativo").show();
               console.log('el administrativo existe ');
               
            } else {

                //$("#frm_verficar_administrativo").hide();
                //$("#frm_nuevo_administrativo").show();
               //$("#idAdministrativo").val(objData.id_administrativo);
               Swal.fire({
                icon: 'warning',
                title: 'ALERTA',
                text: 'EL ADMINISTRATIVO YA ESTA REGISTRADO!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK!'
              }).then((result) => {
                if (result.isConfirmed) 
                {
                    //$("#frm_verficar_administrativo").hide();
                  
                    //window.close();
                    // location.reload(); 
                    //BuscarTablaSolicitud();
                    

                }
              })

                
            }
        }
    }
});

/*
function IniciarModalNuevoEstudiante(){
    $("#frm_nuevo_administrativo").hide();
}


$("#frm_verficar_estudiante").submit(function (event) {
    event.preventDefault();
    document.querySelector("#frm_nuevo_administrativo").reset();

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
                $("#frm_nuevo_administrativo").show();
                $("#carnet").val(objData.nro_carnet);
            } else {

                console.log('el estudiante existe ACTUALIZAR');
            }
        }

    }
});

$("#frm_nuevo_administrativo").submit(function(event){
    event.preventDefault();
    var request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Estudiantes/insertar';
    var strData = $("#frm_nuevo_administrativo").serialize();
    request.open("POST", ajaxUrl, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(strData);
    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var objData = JSON.parse(this.responseText);
            
            if(objData.status)
            {   
                $("#modalEstudiante").modal("hide");
                Swal.fire("Agregado",objData.msg,"success");
                tableEstudiantes.ajax.reload();
            }else 
            {
                Swal.fire( "Error!",objData.msg,"error")
            }
        }

    }
});
*/