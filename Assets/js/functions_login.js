

    let frmlogin = document.querySelector("#frmlogin");
    frmlogin.onsubmit = function(e)
    {
      e.preventDefault();
      var usuario = document.querySelector("#carnet").value;
      var clave = document.querySelector("#pass").value;
      if (usuario == "") {
        
        alerta('introduzca su nombre de usuario');
        document.getElementById("carnet").focus();
      } 
      else if (clave=="") {
       alerta('la contrasena esta vacia');
       document.getElementById("pass").focus();
       
      }
      else{
        const http = new XMLHttpRequest();
        let url = base_url + "/Home/validar";
        var formData = new FormData(frmlogin);
        http.open("POST",url,true);
        http.send(formData);
        http.onreadystatechange = function()
        {
          if(this.readyState !=4 ) return;
          if (this.status == 200) 
          {
            const res = JSON.parse(this.responseText);
           
            if (res=="ok") {
              window.location = base_url + "Personas/nuevaP";
            }
            else{
              
              const alertPlaceholder = document.getElementById('alerta');
              const encapsular = document.createElement('div')
              
              //wrapper.innerHTML ="";
              alertPlaceholder.innerHTML="";

              alertPlaceholder.append(encapsular)

              encapsular.innerHTML = 
                `<div class="alert alert-danger" role="alert">
                <div>${res}</div>
              </div>`
              alertPlaceholder.append(encapsular)
              
              
            }
           
          }
        } 
      }
    }

    function alerta(res)
    {
      const alertPlaceholder = document.getElementById('alerta');
        const encapsular = document.createElement('div')
        
        //wrapper.innerHTML ="";
        alertPlaceholder.innerHTML="";

        alertPlaceholder.append(encapsular)

        encapsular.innerHTML = 
          `<div class="alert alert-danger" role="alert">
          <div>${res}</div>
        </div>`
        alertPlaceholder.append(encapsular)
    }


