




function salir() {
  Swal.fire({
    title: '¿Esta seguro?',
    text: "Si sale del sistema tendra que volver a insertar sus datos !",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'No',
    confirmButtonText: 'Si,salir!'
  }).then((result) => {
    if (result.isConfirmed) {
        let request = new XMLHttpRequest();
        var ajaxUrl = base_url + '/Home/Salir';
        request.open("POST",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
          window.location.href = 'Home';
        }
      
    }
  })
}


function EliminarConvenios(idConvenio){
  var idConvenio = idConvenio;   
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
          var ajaxUrl = base_url + "/Convenios/eliminar";
          var strData = "idConvenios=" +id;
         ;
          request.open("POST", ajaxUrl, true);
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function()
          {
            if (this.readyState == 4 && this.status == 200) {
                  
              //const res = JSON.parse(this.responseText);
             // alertas(res.msg, res.icono);
              //tblUsuarios.ajax.reload();
              var objData = JSON.parse(this.responseText);
              if (objData.status) {
                Swal.fire("Eliminar", objData.msg, "sucess");  
              } else{
                Swal.fire("Atencion", objData.msg, "error");  
              }

            }
          }
        

      }
      
    });
}

function modal_02() {
  Swal.fire({
    html:'Informate mucho <a href="#">más aqui</a>',
    confirmButtonText:'¡Aceptar!',
    toast:true,
    icon:'success',
    padding:'1rem',
    position:'top-right',
    showCloseButton:true,
    timer:'3000',
    timerProgressBar:true, 
    customClass:{
      actions:'content'
    }
  }) 
}


function modal_03() {
Swal.fire({
  title:'Iniciar Sessión',
  padding:'2rem',
  showCloseButton:true,
  showConfirmButton:false,
  html:'<div class="modal-body">'+
  '<div class="buttons_modal">' +
    '<button class="btn_facebook">Ingresa con Facebook</button>'+
    '<button class="btn_google">Ingresa con Google</button>'+
    '<button class="btn_email" id="btn_email">Ingresa con correo electrónico</button>'+
  '</div>'+
  '<form class="form_login" id="form_login" style="display: none;">'+
    '<div class="container_form">'+
      '<span class="text-center">O ingresa tu correo y tu contraseña <br></span>'+
      '<div class="container_inputs_login">'+
        '<div class="mb-3">'+
          '<input type="text" placeholder="Ingrese e-mail" class="form-control text-left" id="recipient-name">'+
        '</div>'+
        '<div class="mb-3">'+
          '<input type="password" placeholder="Ingrese contraseña" class="form-control" id="message-text">'+
        '</div>'+
        '<button type="submit" class="btn_email_ingreso">Ingresa a tu cuenta</button>'+
      '</div>'+
    '</div>'+
  '</form>'+
  '<div class="link_form_registro">'+
    '<p>¿Aún no tienes cuenta? <b class="link_registrate" id="link_modal_registro" data-bs-toggle="modal" data-bs-target="#MuestraModalRegistro">Regístrate</b></p>'+
  '</div>'+
'</div>',	
})
}

function modificar() {
  Swal.fire({
    title: '¿Esta seguro?',
    text: "Podria borrar los datos anteriores !",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'No',
    confirmButtonText: 'Si,modificar!'
    
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Confirmado!',
        'Modificado Exitosamente.',
        'success'
        
      )
    }
  })
}




function btnEliminarUser(id) {
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "El usuario no se eliminara de forma permanente, solo cambiará el estado a inactivo!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No'
  }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Convenios/eliminar/" + id;
          const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblUsuarios.ajax.reload();
              }
          }
          
      }
  })
}