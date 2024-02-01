//console.log("estamos aqui");

var tablePublicaciones = new DataTable("#PublicacionTable",{
  "aProcessing":true,
"aServerSide":true,
  "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
    
      ajax:{
          url:  '' + base_url + 'Publicaciones/getObtenerPublicaciones',
          dataSrc:'',
      },
      columns:
      [
          {data:'titulo'},
          {data:'nombre_empresa'},
          {data:'direccion'},
          {data:'carrera'},
          {data:'fecha_limite_postulacion'},
          {data:'fecha_publicacion'},
          {data:'status'},
          {data: 'options'}      
      ],

  scrollY: 400,
  responsive: true,
  "bDestroy": true,
  "iDisplayLength": 10,
  "order":[[5,"desc"]] 
});

/*ES DE institucion A PUBLICACION es decir las EMPRESAS*/

window.addEventListener('load',function()
{   
  fntInstitucion();
  fntCarreras();
},false);


function fntInstitucion()
{   
    if (document.querySelector('#institucion')) {
        var ajaxUrl = base_url+'/Empresas/getSelectEmpresas';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#institucion').innerHTML = request.responseText;
                $('#institucion').selectpicker('render');
            }
        }
    }
}


function fntCarreras()
{   
    if (document.querySelector('#area')) {
        var ajaxUrl = base_url+'/Carreras/getSelectCarreras';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#area').innerHTML = request.responseText;
                $('#area').selectpicker('render');
            }
        }
    }
}

window.addEventListener('load',function()
{   
  // fntPublicaciones();
},false);

/*
function fntPublicaciones()
{   
    if (document.querySelector('#area')) {
        var ajaxUrl = base_url+'/Publicaciones/getSelectPublicaciones';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#area').innerHTML = request.responseText;
                $('#area').selectpicker('render');
            }
        }
    }
}
*/
function editarPublicacion(idPublicacion)
{     
    document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Publicacion";
    document.querySelector("#regisPubli").innerHTML = "Actualizar"; /*el boton del modal de registro*/

    var id = idPublicacion;
    console.log(id);
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + '/Publicaciones/editar/'+id;
    console.log(ajaxUrl);
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
          console.log(this.responseText);
            var objData = JSON.parse(this.responseText);
            
            if(objData.status)
            {   
              document.querySelector("#idPublicacion").value= objData.data.id_convocatoria;
              document.querySelector("#titulo").value= objData.data.titulo;
              document.querySelector("#institucion").value= objData.data.empresa_id_empresa;
              document.querySelector("#cantPasantes").value= objData.data.cantidad_pasantes;
              document.querySelector("#remuneracion").value= objData.data.remuneracion;
              document.querySelector("#beneficios").value= objData.data.beneficios;
              document.querySelector("#tiempoPasantia").value= objData.data.tiempo_pasantia;
              document.querySelector("#descripcion").value= objData.data.descripcion_puesto;
              document.querySelector("#area").value= objData.data.carrera_id_carrera;
              document.querySelector("#fechaLimite").value= objData.data.fecha_publicacion;
              document.querySelector("#fechaPublicacion").value= objData.data.fecha_limite_postulacion;
              document.querySelector("#contacto").value= objData.data.persona_referencia;
              document.querySelector("#telContacto").value= objData.data.telefono_referencia;
            }
        }
    }
  $('#modalPublicacion').modal('show');
}

function eliminarPublicacion(id)
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
  }).then((result) => 
    {
      if (result.isConfirmed) 
      {
        var request = new XMLHttpRequest();
        var ajaxUrl = base_url+'/Publicaciones/eliminar';
        var strData = "idPublicacion="+id;
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
              tablePublicaciones.ajax.reload();
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


function verPublicacion(idPublicacion)
{     
    
    var id = idPublicacion;
    console.log(id);
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + 'Publicaciones/ver/'+id;
    console.log(ajaxUrl);
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
          
            var objData = JSON.parse(this.responseText);
            console.log(objData);
            if(objData.status)
            {   
              document.querySelector("#idVerPublicacion").value= objData.data.id_convocatoria;
              document.querySelector("#verTitulo").innerHTML= objData.data.titulo;
              document.querySelector("#verInstitucion").innerHTML= objData.data.empresa_id_empresa;
              document.querySelector("#direccionPubli").innerHTML= objData.data.direccion;
              document.querySelector("#verCantPasantes").innerHTML= objData.data.cantidad_pasantes;
              document.querySelector("#verRemuneracion").innerHTML= objData.data.remuneracion;
              document.querySelector("#verBeneficios").innerHTML= objData.data.beneficios;
              document.querySelector("#tiempoPas").innerHTML= objData.data.tiempo_pasantia;
              document.querySelector("#verDescripcion").innerHTML= objData.data.descripcion_puesto;
              document.querySelector("#verArea").innerHTML= objData.data.carrera;
              document.querySelector("#fechaPubli").innerHTML= objData.data.fecha_publicacion;
              document.querySelector("#fechaLim").innerHTML= objData.data.fecha_limite_postulacion;
              document.querySelector("#contac").innerHTML= objData.data.persona_referencia;
              document.querySelector("#telCon").innerHTML= objData.data.telefono_referencia;
              
            }
        }
    }
  $('#modalVerPublicacion').modal('show');
}

// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalPublicacion()
{
    document.querySelector('#idPublicacion').value ="";
    document.querySelector('#regisPubli').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nueva Publicacion";
    document.querySelector("#formPublicacion").reset();
	$('#modalPublicacion').modal('show');

}