
/*-------------------DOCENT------------*/
var tableDocentes = new DataTable("#DocenteTable",{
    "aProcessing":true,
	"aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
      
        ajax:{
            url:  '' + base_url + 'Docentes/getDocentes',
            dataSrc:'',
        },
        columns:[
            {data:'nombres'},
            {data:'carrera'},
            {data:'sede'},
            {data:'status'},
            {data:'options'}      
        ],

    scrollY: 400,
    responsive: true,
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[1,"desc"]] 
});

window.addEventListener('load',function()
{   
  fntMateriaDocente();
  fntCarreraSede();
},false);

function fntMateriaDocente()/*ES DEL TIPO_CONVENIO A CONVENIO*/
{   
    if (document.querySelector('#materia')) {
        var ajaxUrl = base_url+'/Materias/getSelectMaterias';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#tipoConvenio').innerHTML = request.responseText;
                $('#tipoConvenio').selectpicker('render');
            }
        }
    }

}
function fntCarreraSede()
{   
    if (document.querySelector('#listCarreraSede')) {
        var ajaxUrl = base_url+'CarreraSede/getSelectCarreraSedesUsuarios';
        var request = new XMLHttpRequest();
        request.open("GET",ajaxUrl,true);
        request.send();

        request.onreadystatechange = function()
        {
            if(this.status == 200 && this.readyState == 4)
            {
                document.querySelector('#listCarreraSede').innerHTML = request.responseText;
                $('#listCarreraSede').selectpicker('render');
            }
        }
    }
}

function fntEditar(idDocente)
{     
    let imagen_default = document.querySelector("#imagen_default");
    imagen_default.style.display = "none";
    // $("#imagen_default").hide();
    document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Datos Docente";
    document.querySelector("#btnAgregarConvenio").innerHTML = "Actualizar";

    var id = idDocente;
    const request = new XMLHttpRequest();
    var ajaxUrl = base_url + 'Docentes/editar/'+id;
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
              document.querySelector("#idDocente").value= objData.data.id_docente;
              document.querySelector("#fechaIngreso").value= objData.data.fecha_ingreso;
              document.querySelector("#materia").value= objData.data.materias_id_materia;
              document.querySelector("#semestre").value= objData.data.semestre;
              document.querySelector("#carreraSedeDocente").value= objData.data.carrera_sede_id_carrera_sede;
             // document.querySelector("#curriculum").value= objData.data.curriculum;
             // document.querySelector("#archivo").value= objData.data.archivo;
          
             if(objData.data.archivo != "")
              {
                const pdfdocente = document.getElementById('pdfdocente');
                const encapsular = document.createElement('div')
                //wrapper.innerHTML ="";
                
                pdfdocente.innerHTML="";
                pdfdocente.append(encapsular)
                encapsular.innerHTML = 
                 
                   `
                   <iframe src="${objData.data.archivo}" title="fotocopia convenio"  type="application/pdf" ></iframe>
                     
                   `
                pdfdocente.append(encapsular)

                const pdfconvenio2 = document.getElementById('btn-pdfdocente');
                const encapsular2 = document.createElement('div')
                //wrapper.innerHTML ="";
                pdfconvenio2.innerHTML="";
                pdfconvenio2.append(encapsular2)
                encapsular2.innerHTML = 
                 
                  `
                  <a href="${objData.data.archivo}" target="_blank" title="fotocopia convenio" style="border:none">ver documento</a>
                   
                  `
                pdfconvenio2.append(encapsular2)
              }
              else{
                alert("no se encontro el archivo");
              }
            }
        }
    }
  $('#modalDocente').modal('show');
}

function fntEliminar(id)
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
        var ajaxUrl = base_url+'/Docentes/eliminar';
        var strData = "idDocente="+id;
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
              tableDocentes.ajax.reload();
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



function fntVer(id)
{ 
  $('#modalVerDocente').modal('show');
  
  let imagen_default = document.querySelector("#imagen_default");
  imagen_default.style.display = "none";
  
  var idC = id;
  const request = new XMLHttpRequest();
  var ajaxUrl = base_url + 'Docentes/ver/'+idC;
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
        document.querySelector("#idVerDocente").value= objData.data.id_docente;
        document.querySelector("#verFechaIngreso").innerHTML= objData.data.codigo;
        document.querySelector("#verMateria").innerHTML= objData.data.nombre_empresa;
        document.querySelector("#verSemestre").innerHTML= objData.data.nombre_tipo;
        document.querySelector("#verCarreraSedeDocente").innerHTML= objData.data.fecha_inicio;
    
        if(objData.data.archivo != "")
        {
          const pdfdocente = document.getElementById('pdfVerDocente');
          const encapsular = document.createElement('div')
          //wrapper.innerHTML ="";
          
          pdfdocente.innerHTML="";
          pdfdocente.append(encapsular)
          encapsular.innerHTML = 
            
              `
              <iframe src="${objData.data.archivo}" title="fotocopia convenio"  type="application/pdf" ></iframe>
                
              `
          pdfdocente.append(encapsular)

          const pdfconvenio2 = document.getElementById('btn-pdfVerDocente');
          const encapsular2 = document.createElement('div')
          //wrapper.innerHTML ="";
          pdfconvenio2.innerHTML="";
          pdfconvenio2.append(encapsular2)
          encapsular2.innerHTML =        
            `
            <a href="${objData.data.archivo}" target="_blank" title="fotocopia convenio" style="border:none">ver documento</a>
              
            `
          pdfconvenio2.append(encapsular2)
        }
        else{
          alert("no se encontro el archivo");
        }
      }
    }
  }
}

// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalDocente()
{
    document.querySelector('#idDocente').value ="";
    document.querySelector('#btnAgregarDocente').innerHTML ="Guardar";
    document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Docente";
    document.querySelector("#formDocente").reset();
	  $('#modalDocente').modal('show');
}