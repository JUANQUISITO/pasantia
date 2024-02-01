
/*-------------------CONVENIOS------------*/
var tableConvenios = new DataTable("#ConveniosTable",{
  "aProcessing":true,
"aServerSide":true,
  "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
    
      ajax:{
          url:  '' + base_url + 'Convenios/mostrarConvenios',
          dataSrc:'',
      },
      columns:[
          {data:'codigo'},
          {data:'nombre_empresa'},
          {data:'nombre_tipo'},
          {data:'status'},
          {data:'fecha_inicio'},
          {data:'fecha_final'},
          {data: 'options'}
     
      ],

  scrollY: 400,
  responsive: true,
  "bDestroy": true,
  "iDisplayLength": 10
});

window.addEventListener('load',function()
{   
fntTipoConvenio();
},false);

function fntTipoConvenio()/*ES DEL TIPO_CONVENIO A CONVENIO*/
{   
  if (document.querySelector('#tipoConvenio')) {
      var ajaxUrl = base_url+'/TipoConvenios/getSelectTipos';
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

window.addEventListener('load',function()
{   
fntEmpresa();
},false);

function fntEmpresa()/*ES DE EMPRESA A CONVENIO*/
{   
  if (document.querySelector('#empresa')) {
      var ajaxUrl = base_url+'/Empresas/getSelectEmpresas';
      var request = new XMLHttpRequest();
      request.open("GET",ajaxUrl,true);
      request.send();

      request.onreadystatechange = function()
      {
          if(this.status == 200 && this.readyState == 4)
          {
              document.querySelector('#empresa').innerHTML = request.responseText;
              $('#empresa').selectpicker('render');
          }
      }
  }

}

let formConvenio = document.querySelector("#formConvenio");
//previsualizar
    const imagenDefault = document.querySelector('#imagenDefault');
    const convenioPdf = document.querySelector('#archivo');
    
    function renderformConvenio(formDataConve)
    {
        const fileConv = formDataConve.get('archivo');
        const pdfConv =  URL.createObjectURL(fileConv);
        imagenDefault.setAttribute("src", pdfConv);
    }

    convenioPdf.addEventListener('change',()=>
    {
        const formDataConve = new FormData(formConvenio);
        renderformConvenio(formDataConve);
    } );

  
    

// esta funcion evita el fondo negro del modal y realiza el refresh entre actualizar y crear uno nuevo
function openModalConvenio()
{
  document.querySelector('#idConvenio').value ="";
  document.querySelector('#btnAgregarConvenio').innerHTML ="Guardar";
  document.querySelector('#exampleModalLabel').innerHTML = "Nuevo Convenio";
  let pdfconvenio = document.querySelector("#pdfconvenio");
  pdfconvenio.style.display = "none";
  // se cambio de btn-pdfconvenio a btnconvenio ya que el gion no deja funcionar bien el display de css
  let btnpdfconvenio = document.querySelector("#btnpdfconvenio"); 
  btnpdfconvenio.style.display = "none";

  document.querySelector("#formConvenio").reset();
  $('#modalConvenio').modal('show');


}

function fntEditar(idConvenio)
{     
  let imagen_default = document.querySelector("#imagenDefault");
  imagen_default.style.display = "none";
  $("#pdfconvenio").show("slow");
  $("#btnpdfconvenio").show("slow");
  document.querySelector("#exampleModalLabel").innerHTML = "Actualizar Convenio";
  document.querySelector("#btnAgregarConvenio").innerHTML = "Actualizar";

  var id = idConvenio;
  const request = new XMLHttpRequest();
  var ajaxUrl = base_url + 'Convenios/editar/'+id;
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
            document.querySelector("#idConvenio").value= objData.data.id_convenio;
            document.querySelector("#empresa").value= objData.data.empresa_id_empresa;
            document.querySelector("#tipoConvenio").value= objData.data.tipo_convenio_id_tipo_convenio;
            document.querySelector("#fechaInicio").value= objData.data.fecha_inicio;
            document.querySelector("#fechaFinal").value= objData.data.fecha_final;
           // document.querySelector("#archivo").value= objData.data.archivo;
        
           if(objData.data.archivo != "")
            {
              const pdfconvenio = document.getElementById('pdfconvenio');
              const encapsular = document.createElement('div')
              //wrapper.innerHTML ="";
              
              pdfconvenio.innerHTML="";
              pdfconvenio.append(encapsular)
              encapsular.innerHTML = 
               
                 `
                 <iframe src="${objData.data.archivo}" title="fotocopia convenio"  type="application/pdf" ></iframe>
                   
                 `
              pdfconvenio.append(encapsular)

              const pdfconvenio2 = document.getElementById('btnpdfconvenio');
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

$('#modalConvenio').modal('show');
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
  }).then((result) => 
    {
      if (result.isConfirmed) 
      {
        var request = new XMLHttpRequest();
        var ajaxUrl = base_url+'/Convenios/eliminar';
        var strData = "idConvenio="+id;
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
              tableConvenios.ajax.reload();
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
  $('#modalVerConvenio').modal('show');

  let imagen_default = document.querySelector("#imagenDefault");
  imagen_default.style.display = "none";

  var idC = id;
  const request = new XMLHttpRequest();
  var ajaxUrl = base_url + 'Convenios/ver/'+idC;
  request.open("GET",ajaxUrl,true);
  request.send();
  request.onreadystatechange = function()
  {
    if(this.status == 200 && this.readyState == 4)
    {
      var objData = JSON.parse(this.responseText);
      if(objData.status)
      {   
        document.querySelector("#idVerConvenio").value= objData.data.id_convenio;
        document.querySelector("#verCodigoConvenio").innerHTML= objData.data.codigo;
        document.querySelector("#verEmpresaConvenio").innerHTML= objData.data.nombre_empresa;
        document.querySelector("#verTipoConvenio").innerHTML= objData.data.nombre_tipo;
        document.querySelector("#verFechaInicioConvenio").innerHTML= objData.data.fecha_inicio;
        document.querySelector("#verFechaFinalConvenio").innerHTML= objData.data.fecha_final;
    
        if(objData.data.archivo != "")
        {
          const pdfconvenio = document.getElementById('pdfVerConvenio');
          const encapsular = document.createElement('div')
          //wrapper.innerHTML ="";
          
          pdfconvenio.innerHTML="";
          pdfconvenio.append(encapsular)
          encapsular.innerHTML = 
            
              `
              <iframe src="${objData.data.archivo}" title="fotocopia convenio"  type="application/pdf" ></iframe>
                
              `
          pdfconvenio.append(encapsular)

          const pdfconvenio2 = document.getElementById('btnpdfVerConvenio');
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
